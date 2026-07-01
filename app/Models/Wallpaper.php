<?php

namespace App\Models;

use App\Models\Concerns\HasAllowedRating;
use App\Models\Concerns\HasStorageUrl;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Character;
use App\Models\User;
use App\Models\Tag;
use App\Models\Artist;

class Wallpaper extends Model
{
    use HasFactory, HasStorageUrl, HasAllowedRating;

    protected $table = 'wallpapers';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'views_count' => 'integer',
        'favorites_count' => 'integer',
        'file_size' => 'integer',
    ];

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'webp' => $this->resolveImageUrl('thumbnail', 'webp', 'image.webp'),
                'jpg'  => $this->resolveImageUrl('thumbnail', 'jpg', 'image.jpg'),
            ]
        );
    }

    protected function preview(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'webp' => $this->resolveImageUrl('preview', 'webp', 'image.webp'),
                'jpg'  => $this->resolveImageUrl('preview', 'jpg', 'image.jpg'),
                'mp4'  => $this->resolveImageUrl('preview', 'mp4', 'image.jpg'),
            ]
        );
    }

    protected function original(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->resolveImageUrl('original', 'webp', 'image.webp')
        );
    }

    public function scopeSearch($query, $term)
    {
        if (strlen($term) <= 3) {
            return $query->where('keywords', 'LIKE', "%{$term}%");
        }

        $formattedTerm = collect(explode(' ', $term))
            ->filter()
            ->map(fn ($word) => strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->whereFullText(['keywords'], $formattedTerm, ['mode' => 'boolean']);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'wallpaper_artist', 'wallpaper_id', 'artist_id');
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'wallpaper_character', 'wallpaper_id', 'character_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'wallpaper_tag', 'wallpaper_id', 'tag_id');
    }

    public function favoritedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'wallpaper_id', 'user_id')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected function formattedSize(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->file_size >= 1048576
                ? number_format($this->file_size / 1048576, 2) . ' MB'
                : number_format($this->file_size / 1024, 2) . ' KB'
        );
    }

    protected function isVideo(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) =>
                str_starts_with((string) ($attributes['file_type'] ?? ''), 'video/')
        );
    }

    protected function previewIsVideo(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (empty($this->preview)) {
                    return false;
                }

                $cleanPath = parse_url($this->preview, PHP_URL_PATH);
                $extension = strtolower(pathinfo($cleanPath, PATHINFO_EXTENSION));

                return in_array($extension, ['mp4', 'webm', 'mov'], true);
            }
        );
    }
}