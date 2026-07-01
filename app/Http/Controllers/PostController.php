<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'categories'])
            ->published()
            ->latest('published_at')
            ->paginate(12);

        return view('posts.index', compact('posts'));
    }

    public function show(Request $request, Post $post)
    {
        $post->load(['author', 'categories']);

        $ip = $request->ip();
        $cacheKey = 'viewed_post_' . $post->id . '_' . $ip;

        if (!Cache::has($cacheKey)) {
            $post->increment('views_count');
            Cache::put($cacheKey, true, 1440); // Cache 24 jam
        }

        return view('posts.view', compact('post'));
    }

    public function category(PostCategory $category)
    {
        $posts = $category->posts()
            ->with(['author', 'categories'])
            ->published()
            ->latest('published_at')
            ->paginate(12);

        return view('posts.category', compact('posts', 'category'));
    }
}