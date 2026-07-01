<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($characters as $character)
        <url>
            <loc>{{ url('characters/' . $character->slug) }}</loc>
            <lastmod>{{ $character->updated_at ? \Carbon\Carbon::parse($character->updated_at)->toAtomString() : now()->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>