<?php

namespace App\Models;

use App\Notifications\CustomResetPasswordNotification;
use App\Models\Concerns\HasStorageUrl;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Artist;
use App\Models\UserLink;
use App\Models\Wallpaper;
use App\Models\Post;
use App\Models\Notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasStorageUrl;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'allowed_ratings',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'banned_at' => 'datetime',
        'password' => 'hashed',
        'allowed_ratings' => 'array',
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
                $q->where('name', 'LIKE', "%{$term}%")
                  ->orWhere('username', 'LIKE', "%{$term}%")
                  ->orWhere('email', 'LIKE', "%{$term}%");
            });
        }

        $formattedTerm = collect(explode(' ', $term))
            ->filter()
            ->map(fn ($word) => strlen($word) < 3 ? $word . '*' : '+' . $word . '*')
            ->implode(' ');

        return $query->where(function ($q) use ($term, $formattedTerm) {
            $q->whereFullText(['name', 'username'], $formattedTerm, ['mode' => 'boolean'])
              ->orWhere('email', 'LIKE', "%{$term}%");
        });
    }

    public function wallpapers(): HasMany
    {
        return $this->hasMany(Wallpaper::class, 'user_id');
    }

    public function favoriteWallpapers(): BelongsToMany
    {
        return $this->belongsToMany(Wallpaper::class, 'favorites', 'user_id', 'wallpaper_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function publishedPosts(): HasMany
    {
        return $this->hasMany(Post::class)->published();
    }

    public function postRevisions(): HasMany
    {
        return $this->hasMany(PostRevision::class);
    }

    public function artist(): HasOne
    {
        return $this->hasOne(Artist::class, 'user_id');
    }

    public function links(): HasMany
    {
        return $this->hasMany(UserLink::class, 'user_id');
    }

    protected function rank(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculateRank((int) ($this->points ?? 0))
        );
    }

    protected function ratings(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->allowed_ratings ?? ['safe']
        );
    }

    protected function paginationLimit(): Attribute
    {
        return Attribute::make(
            get: fn () => max(12, min(100, (int) ($this->per_page ?? 24)))
        );
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}