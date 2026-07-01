<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q'));

        $characters = Character::query()
            ->select([
                'characters.id',
                'characters.slug',
                'characters.name',
                'characters.image',
            ])
            ->published()
            ->allowedRating()
            ->internalPopular()
            ->when($search !== '', fn ($q) => $q->search($search))
            ->paginate(30)
            ->onEachSide(1)
            ->appends([
                'q' => $search !== '' ? $search : null,
            ]);

        return view('characters.index', compact('characters', 'search'));
    }

    public function show(Request $request, string $character)
    {
        $character = Character::query()
            ->select([
                'characters.id',
                'characters.slug',
                'characters.name',
                'characters.image',
                'characters.seo_title',
                'characters.seo_description',
                'characters.seo_keywords',
                'characters.description',
            ])
            ->published()
            ->allowedRating()
            ->where('characters.slug', $character)
            ->firstOrFail();

        $wallpapers = $character->wallpapers()
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

        return view('characters.view', compact('character', 'wallpapers'));
    }
}