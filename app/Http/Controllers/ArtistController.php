<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q'));

        $artists = Artist::query()
            ->select([
                'artists.id',
                'artists.slug',
                'artists.name',
                'artists.image',
            ])
            ->internalPopular()
            ->when($search !== '', fn ($q) => $q->search($search))
            ->paginate(30)
            ->onEachSide(1)
            ->appends([
                'q' => $search !== '' ? $search : null,
            ]);

        return view('artists.index', compact('artists', 'search'));
    }

    public function show(Request $request, string $artist)
    {
        $artist = Artist::query()
            ->select([
                'artists.id',
                'artists.slug',
                'artists.name',
                'artists.image',
                'artists.seo_title',
                'artists.seo_description',
                'artists.seo_keywords',
                'artists.description',
            ])
            ->where('artists.slug', $artist)
            ->firstOrFail();

        $wallpapers = $artist->wallpapers()
            ->published()
            ->allowedRating()
            ->select([
                'wallpapers.id',
                'wallpapers.slug',
                'wallpapers.rating',
                'wallpapers.thumbnail',
                'wallpapers.preview',
                'wallpapers.favorites_count',
                'wallpapers.views_count',
                'wallpapers.created_at',
            ])
            ->latest('wallpapers.id')
            ->paginate(30)
            ->onEachSide(1)
            ->withQueryString();

        return view('artists.view', compact('artist', 'wallpapers'));
    }
}