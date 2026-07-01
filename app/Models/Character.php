<?php

namespace App\Models;

use App\Models\Concerns\HasAllowedRating;
use App\Models\Concerns\HasStorageUrl;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Wallpaper;

class Character extends Model
{
    use HasFactory, HasStorageUrl, HasAllowedRating;

    protected $table = 'characters';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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
        $term = trim((string) $term);

        if ($term === '') {
            return $query;
        }

        if (mb_strlen($term) <= 3) {
            return $query->where('keywords', 'LIKE', "%{$term}%");
        }

        $formattedTerm = collect(preg_split('/\s+/', $term))
            ->filter()
            ->map(fn ($word) => mb_strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->whereFullText(['keywords'], $formattedTerm, ['mode' => 'boolean']);
    }

    public function wallpapers(): BelongsToMany
    {
        return $this->belongsToMany(
            Wallpaper::class,
            'wallpaper_character',
            'character_id',
            'wallpaper_id'
        );
    }

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(
            Series::class,
            'character_series',
            'character_id',
            'series_id'
        );
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'character_relationships',
            'parent_id',
            'child_id'
        )->withPivot('relation_type');
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(
            self::class,
            'character_relationships',
            'child_id',
            'parent_id'
        )->withPivot('relation_type');
    }

    protected function parent(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->relationLoaded('parents')
                ? $this->parents->first()
                : null
        );
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

                if (method_exists($this, 'dataCount') && $this->relationLoaded('dataCount')) {
                    return (int) ($this->dataCount?->total ?? 0);
                }

                return 0;
            }
        );
    }

    public function scopeHasWallpapers($query)
    {
        return $query->join('data_counts as dc', function ($join) {
                $join->on('characters.id', '=', 'dc.data_id')
                    ->where('dc.type', '=', 'character');
            })
            ->where('dc.total', '>', 0)
            ->addSelect('dc.total as wallpapers_count');
    }

    public function scopeInternalPopular($query)
    {
        return $query->hasWallpapers()
            ->orderByDesc('dc.total')
            ->orderBy('characters.id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}