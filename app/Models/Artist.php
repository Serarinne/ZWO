<?php

namespace App\Models;

use App\Models\Concerns\HasStorageUrl;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Wallpaper;

class Artist extends Model
{
    use HasFactory, HasStorageUrl;

    protected $table = 'artists';

    protected $casts = [
        'links' => 'array',
        'debug' => 'boolean',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'webp' => $this->resolveImageUrl('image', 'webp', 'person.webp'),
                'jpg'  => $this->resolveImageUrl('image', 'jpg', 'person.jpg'),
            ]
        );
    }

    public function scopeSearch($query, $term)
    {
        if (strlen($term) <= 3) {
            return $query->where(function ($q) use ($term) {
                $q->where('name', 'LIKE', "%{$term}%");
            });
        }

        $formattedTerm = collect(explode(' ', $term))
            ->filter()
            ->map(fn ($word) => strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->whereFullText(['name'], $formattedTerm, ['mode' => 'boolean']);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
        // atau ->withDefault(['name' => 'Unknown Artist Owner']);
    }

    protected function isOfficial(): Attribute
    {
        return Attribute::make(
            get: fn () => ! is_null($this->user_id)
        );
    }

    public function socials(): HasMany
    {
        return $this->hasMany(ArtistSocial::class);
    }

    public function wallpapers(): BelongsToMany
    {
        return $this->belongsToMany(
            Wallpaper::class,
            'wallpaper_artist',
            'artist_id',
            'wallpaper_id'
        );
    }

    public function dataCount(): HasOne
    {
        return $this->hasOne(DataCount::class, 'data_id', 'id')
            ->where('type', 'artist')
            ->withDefault(['total' => 0]);
    }

    protected function wallpapersCount(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (array_key_exists('wallpapers_count', $attributes) && $attributes['wallpapers_count'] !== null) {
                    return (int) $attributes['wallpapers_count'];
                }

                if (array_key_exists('sorted_count', $attributes) && $attributes['sorted_count'] !== null) {
                    return (int) $attributes['sorted_count'];
                }

                if ($this->relationLoaded('dataCount')) {
                    return (int) ($this->dataCount?->total ?? 0);
                }

                return 0;
            }
        );
    }

    public function scopeWithWallpaperCount($query)
    {
        return $query->addSelect([
            'wallpapers_count' => DataCount::query()
                ->select('total')
                ->whereColumn('data_id', 'artists.id')
                ->where('type', 'artist')
                ->limit(1),
        ]);
    }

    public function scopeHasWallpapers($query)
    {
        return $query->join('data_counts as dc', function ($join) {
                $join->on('artists.id', '=', 'dc.data_id')
                    ->where('dc.type', '=', 'artist');
            })
            ->where('dc.total', '>', 0)
            ->addSelect('dc.total as wallpapers_count');
    }

    public function scopeInternalPopular($query)
    {
        return $query->hasWallpapers()
            ->orderByDesc('dc.total')
            ->orderBy('artists.id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}