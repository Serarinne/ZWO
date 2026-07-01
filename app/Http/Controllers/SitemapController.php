<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Character;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
  	protected $limit = 10000;
  	
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function wallpaperIndex()
    {
        // Tambahkan filter whereNotNull untuk SEO dan slug
        $query = Wallpaper::published();

        $totalWallpapers = $query->count();
        $totalPages = max(1, ceil($totalWallpapers / $this->limit));
        
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.wallpaper_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function wallpapers($page)
    {
        $offset = ($page - 1) * $this->limit;

        // Terapkan filter yang sama saat memuat data URL
        $wallpapers = Wallpaper::published()
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($wallpapers->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.wallpapers', compact('wallpapers'))
            ->header('Content-Type', 'text/xml');
    }

    public function characterIndex()
    {
        $query = Character::published()
            // Tambahan filter khusus Series ID = 1
            ->whereExists(function ($sub) {
                $sub->select(DB::raw(1))
                    ->from('character_series') // Sesuaikan jika nama tabel Anda berbeda (misal: characterseries)
                    ->whereColumn('character_series.character_id', 'characters.id')
                    ->where('character_series.series_id', 1);
            })
            // Filter image atau wallpaper yang sudah ada sebelumnya
            ->where(function($q) {
                $q->whereNotNull('image')
                  ->orWhereExists(function ($sub) {
                      $sub->select(DB::raw(1))
                          ->from('wallpaper_character')
                          ->whereColumn('wallpaper_character.character_id', 'characters.id');
                  });
            });

        $totalCharacters = $query->count();
        $totalPages = max(1, ceil($totalCharacters / $this->limit));
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.character_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function characters($page)
    {
        $offset = ($page - 1) * $this->limit;
        
        $characters = Character::published()
            // Tambahan filter khusus Series ID = 1
            ->whereExists(function ($sub) {
                $sub->select(DB::raw(1))
                    ->from('character_series') // Sesuaikan jika nama tabel Anda berbeda
                    ->whereColumn('character_series.character_id', 'characters.id')
                    ->where('character_series.series_id', 1);
            })
            // Filter image atau wallpaper yang sudah ada sebelumnya
            ->where(function($q) {
                $q->whereNotNull('image')
                  ->orWhereExists(function ($sub) {
                      $sub->select(DB::raw(1))
                          ->from('wallpaper_character')
                          ->whereColumn('wallpaper_character.character_id', 'characters.id');
                  });
            })
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($characters->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.characters', compact('characters'))
            ->header('Content-Type', 'text/xml');
    }

    public function tagIndex()
    {
        $query = Tag::published()
            ->where(function($q) {
                $q->whereNotNull('image')
                  ->orWhereExists(function ($sub) {
                      $sub->select(DB::raw(1))
                          ->from('wallpaper_tag')
                          ->whereColumn('wallpaper_tag.tag_id', 'tags.id');
                  });
            });

        $totalTags = $query->count();
        $totalPages = max(1, ceil($totalTags / $this->limit));
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.tag_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function tags($page)
    {
        $offset = ($page - 1) * $this->limit;
        
        $tags = Tag::published()
            ->where(function($q) {
                $q->whereNotNull('image')
                  ->orWhereExists(function ($sub) {
                      $sub->select(DB::raw(1))
                          ->from('wallpaper_tag')
                          ->whereColumn('wallpaper_tag.tag_id', 'tags.id');
                  });
            })
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($tags->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.tags', compact('tags'))
            ->header('Content-Type', 'text/xml');
    }
}