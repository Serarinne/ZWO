<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'views_count' => 'integer',
    ];

    public function scopeSearch($query, $term)
    {
        if (strlen($term) <= 3) {
            return $query->where(function ($q) use ($term) {
                $q->where('title', 'LIKE', "%{$term}%")
                  ->orWhere('excerpt', 'LIKE', "%{$term}%")
                  ->orWhere('body', 'LIKE', "%{$term}%");
            });
        }

        $formattedTerm = collect(explode(' ', $term))
            ->filter()
            ->map(fn ($word) => strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->whereFullText(['title', 'excerpt', 'body'], $formattedTerm, ['mode' => 'boolean']);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault([
            'name' => 'Unknown User',
            'email' => 'unknown@ntewallpapers.com',
        ]);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(PostCategory::class, 'post_category', 'post_id', 'category_id');
    }

    public function revisions(): HasMany
    {
        return $this->hasMany(PostRevision::class);
    }

    protected function readingTime(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $content = strip_tags($attributes['body'] ?? '');
                $wordCount = str_word_count($content);
                $minutes = max(1, ceil($wordCount / 200));

                return $minutes . ' min read';
            }
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}