<?php

namespace App\Models;

use App\Models\Concerns\HasAllowedRating;
use App\Models\Concerns\HasStorageUrl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Series extends Model
{
    use HasFactory, HasStorageUrl, HasAllowedRating;

    protected $table = 'series';

    protected $casts = [
        'debug' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'webp' => $this->resolveImageUrl('image', 'webp', 'image.webp'),
                'jpg'  => $this->resolveImageUrl('image', 'jpg', 'image.jpg'),
            ]
        );
    }

    public function scopeSearch($query, $term)
    {
        if (strlen($term) <= 3) {
            return $query->where(function ($q) use ($term) {
                $q->where('keywords', 'LIKE', "%{$term}%");
            });
        }

        $formattedTerm = collect(explode(' ', $term))
            ->filter()
            ->map(fn ($word) => strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->whereFullText(['keywords'], $formattedTerm, ['mode' => 'boolean']);
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_series', 'series_id', 'character_id');
    }

    public function parents(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'series_relationships', 'child_id', 'parent_id');
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'series_relationships', 'parent_id', 'child_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}