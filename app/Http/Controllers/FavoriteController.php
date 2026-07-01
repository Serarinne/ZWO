<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Wallpaper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function index(): View
    {
        $wallpapers = Wallpaper::query()
            ->select('wallpapers.*')
            ->join('favorites', 'favorites.wallpaper_id', '=', 'wallpapers.id')
            ->where('favorites.user_id', Auth::id())
            ->published()
            ->allowedRating()
            ->latest('favorites.created_at')
            ->paginate(30);

        return view('favorites.index', compact('wallpapers'));
    }

    public function toggle(int|string $id): JsonResponse
    {
        if (! Auth::check()) {
            return response()->json(['message' => 'Please log in first.'], 401);
        }

        $userId = Auth::id();
        $wallpaper = Wallpaper::published()->allowedRating()->findOrFail($id);
        $oldUpdatedAt = $wallpaper->updated_at;

        $isAdding = DB::transaction(function () use ($userId, $wallpaper, $oldUpdatedAt) {
            $favorite = Favorite::query()
                ->where('user_id', $userId)
                ->where('wallpaper_id', $wallpaper->id)
                ->first();

            if ($favorite !== null) {
                $favorite->delete();

                DB::table('wallpapers')
                    ->where('id', $wallpaper->id)
                    ->decrement('favorites_count', 1, ['updated_at' => $oldUpdatedAt]);

                return false;
            }

            Favorite::create([
                'user_id'      => $userId,
                'wallpaper_id' => $wallpaper->id,
            ]);

            DB::table('wallpapers')
                ->where('id', $wallpaper->id)
                ->increment('favorites_count', 1, ['updated_at' => $oldUpdatedAt]);

            return true;
        });

        return response()->json([
            'is_favorited'    => $isAdding,
            'favorites_count' => $wallpaper->favorites_count + ($isAdding ? 1 : -1),
            'message'         => $isAdding ? 'Wallpaper added to favorites.' : 'Wallpaper removed from favorites.',
        ]);
    }
}