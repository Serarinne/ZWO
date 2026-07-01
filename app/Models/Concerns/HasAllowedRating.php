<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait HasAllowedRating
{
    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('slug')->whereNotNull('seo_title');
    }

    public function scopeAllowedRating(Builder $query): Builder
    {
        if ($user = Auth::user()) {
            $ratings = $user->allowed_ratings;

            if (is_array($ratings) && !empty($ratings)) {
                return $query->whereIn('rating', $ratings);
            }
        }

        return $query->where('rating', 'general');
    }
}