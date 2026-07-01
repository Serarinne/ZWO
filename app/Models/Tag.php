<?php

namespace App\Models;

use App\Models\Concerns\HasAllowedRating;
use App\Models\Concerns\HasStorageUrl;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\DataCount;
use App\Models\Wallpaper;

class Tag extends Model
{
    use HasFactory, HasStorageUrl, HasAllowedRating;

    protected $table = 'tags';

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'webp' => $this->resolveImageUrl('image', 'webp', 'tag.webp'),
                'jpg'  => $this->resolveImageUrl('image', 'jpg', 'tag.jpg'),
            ]
        );
    }

    public function scopeSearch($query, $term)
    {
        if (strlen($term) <= 3) {
            return $query->where(function ($q) use ($term) {
                $q->where('name', 'LIKE', "%{$term}%")
                  ->orWhere('keywords', 'LIKE', "%{$term}%");
            });
        }

        $formattedTerm = collect(explode(' ', $term))
            ->filter()
            ->map(fn ($word) => strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->whereFullText(['name', 'keywords'], $formattedTerm, ['mode' => 'boolean']);
    }

    public function wallpapers(): BelongsToMany
    {
        return $this->belongsToMany(
            Wallpaper::class,
            'wallpaper_tag',
            'tag_id',
            'wallpaper_id'
        );
    }

    public function dataCount(): HasOne
    {
        return $this->hasOne(DataCount::class, 'data_id', 'id')
            ->where('type', 'tag')
            ->withDefault(['total' => 0]);
    }

    public function scopeTrending($query, $limit = 8)
    {
        return $query
            ->addSelect([
                'sorted_count' => DataCount::query()
                    ->select('total')
                    ->whereColumn('data_id', 'tags.id')
                    ->where('type', 'tag')
                    ->limit(1)
            ])
            ->orderByDesc('sorted_count')
            ->limit($limit);
    }

    public function scopeWithWallpaperCount($query)
    {
        return $query->addSelect([
            'wallpapers_count' => DataCount::query()
                ->select('total')
                ->whereColumn('data_id', 'tags.id')
                ->where('type', 'tag')
                ->limit(1)
        ]);
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

    public function scopeHasWallpapers($query)
    {
        return $query->join('data_counts as dc', function ($join) {
                $join->on('tags.id', '=', 'dc.data_id')
                    ->where('dc.type', '=', 'tag');
            })
            ->where('dc.total', '>', 0)
            ->addSelect('dc.total as wallpapers_count');
    }

    public function scopeInternalPopular($query)
    {
        return $query->hasWallpapers()
            ->orderByDesc('dc.total')
            ->orderBy('tags.id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}