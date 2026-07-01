<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\RedirectResponse;

class WallpaperController extends Controller
{
    public function index()
    {
        $wallpaperBaseQuery = Wallpaper::query()
            ->published()
            ->allowedRating()
            ->select([
                'id',
                'slug',
                'rating',
                'thumbnail',
                'preview',
                'favorites_count',
                'file_type',
                'views_count',
                'created_at',
            ]);

        $latestWallpapers = (clone $wallpaperBaseQuery)
            ->latest('created_at')
            ->paginate(30)
            ->onEachSide(1)
            ->withQueryString();

        $popularWallpapers = (clone $wallpaperBaseQuery)
            ->orderByDesc('favorites_count')
            ->limit(6)
            ->get();

        $trendingTags = Tag::query()
            ->published()
            ->allowedRating()
            ->select(['id', 'name', 'slug', 'image'])
            ->trending(8)
            ->get();

        return view('wallpapers.index', compact(
            'latestWallpapers',
            'popularWallpapers',
            'trendingTags'
        ));
    }

    public function search(Request $request)
    {
        $query = trim((string) $request->input('q'));

        if ($query === '') {
            return view('wallpapers.search-index');
        }

        $wallpapers = Wallpaper::query()
            ->search($query)
            ->published()
            ->allowedRating()
            ->select([
                'id',
                'slug',
                'seo_title',
                'rating',
                'thumbnail',
                'preview',
                'favorites_count',
                'file_type',
                'views_count',
                'created_at',
            ])
            ->latest()
            ->paginate(28)
            ->withQueryString();

        return view('wallpapers.search-results', compact('query', 'wallpapers'));
    }

    public function show(Request $request, string $slug)
    {
        $wallpaper = Wallpaper::query()
            ->published()
            ->allowedRating()
            ->where('slug', $slug)
            ->select([
                'id',
                'slug',
                'seo_title',
                'seo_keywords',
                'seo_description',
                'image_alt',
                'image_description',
                'rating',
                'thumbnail',
                'preview',
                'original',
                'file_size',
                'file_type',
                'width',
                'height',
                'views_count',
                'favorites_count',
                'user_id',
                'updated_at',
                'created_at',
            ])
            ->with([
                'tags' => function ($query) {
                    $query->select(['tags.id', 'tags.name', 'tags.slug', 'tags.seo_title', 'tags.image'])
                        ->whereNotNull('seo_title')
                        ->where('seo_title', '!=', '');
                },
                'artists:id,name,slug,image',
                'uploader:id,name,username',
                'characters:id,name,slug,image',
                'characters.parents:id,name,slug,image',
                'characters.children:id,name,slug,image',
                'characters.series:id,name,slug,image',
            ])
            ->withCount('favoritedBy')
            ->firstOrFail();

        $viewerKey = auth()->check()
            ? 'user_' . auth()->id()
            : 'ip_' . $request->ip();

        $cacheKey = "wallpaper:viewed:{$wallpaper->id}:{$viewerKey}";

        if (! Cache::has($cacheKey)) {
            $wallpaper->increment('views_count', 1, [
                'updated_at' => $wallpaper->updated_at,
            ]);

            Cache::put($cacheKey, true, now()->addDay());
        }

        $allChars = $wallpaper->characters
            ->filter(fn ($char) => filled($char->slug) && filled($char->series))
            ->values();

        $allCharIds = $allChars->pluck('id');

        $groupedCharacters = $allChars->filter(function ($char) use ($allCharIds) {
            return $char->parents->whereIn('id', $allCharIds)->isEmpty();
        })->values();

        foreach ($groupedCharacters as $parent) {
            $parent->setRelation(
                'sub_versions',
                $allChars->whereIn('id', $parent->children->pluck('id'))->values()
            );
        }

        return view('wallpapers.view', compact('wallpaper', 'groupedCharacters'));
    }

    public function redirectToSlug(int|string $id): RedirectResponse
    {
        $wallpaper = Wallpaper::query()
                ->select(['id', 'slug'])
                ->findOrFail($id);

        return redirect()->route('wallpapers.show', ['slug' => $wallpaper->slug]);
    }

    public function download(string $id): RedirectResponse
    {
        $wallpaper = Wallpaper::query()
            ->published()
            ->allowedRating()
            ->where('id', $id)
            ->select([
                'id',
                'slug',
                'original',
            ])
            ->firstOrFail();

        abort_if(blank($wallpaper->original), 404);

        return redirect()->away($wallpaper->original);
    }
}