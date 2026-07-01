<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q'));

        $tags = Tag::query()
            ->select([
                'tags.id',
                'tags.slug',
                'tags.name',
                'tags.image',
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

        return view('tags.index', compact('tags', 'search'));
    }

    public function show(Request $request, string $tag)
    {
        $tag = Tag::query()
            ->select([
                'tags.id',
                'tags.slug',
                'tags.name',
                'tags.image',
                'tags.seo_title',
                'tags.seo_description',
                'tags.seo_keywords',
                'tags.description',
            ])
            ->published()
            ->allowedRating()
            ->where('tags.slug', $tag)
            ->firstOrFail();

        $wallpapers = $tag->wallpapers()
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

        return view('tags.view', compact('tag', 'wallpapers'));
    }
}