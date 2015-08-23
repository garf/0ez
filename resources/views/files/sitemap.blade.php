{!! '<' !!}{!! '?xml' !!} version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($posts as $post)
    <url>
        <loc>{{ route('view', ['slug' => $post->slug]) }}</loc>
        <lastmod>{{ date('Y-m-d', strtotime($post->updated_at)) }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
</urlset>