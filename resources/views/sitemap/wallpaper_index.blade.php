<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @for ($i = 1; $i <= $totalPages; $i++)
    <sitemap>
        <loc>{{ url('sitemap-wallpapers-' . $i . '.xml') }}</loc>
        @if($latest)
        <lastmod>{{ $latest->updated_at ? \Carbon\Carbon::parse($latest->updated_at)->toAtomString() : now()->toAtomString() }}</lastmod>
        @endif
    </sitemap>
    @endfor
</sitemapindex>