<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/services') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/projects') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/gallery') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    @foreach(\App\Models\Project::all() as $project)
    <url>
        <loc>{{ route('projects.show', $project) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <url>
        <loc>{{ url('/blog') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>

    @foreach(\App\Models\Blog::all() as $blog)
    <url>
        <loc>{{ route('blog.show', $blog->slug) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
    
    <url>
        <loc>{{ url('/products') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>
    </url>

    @foreach(\App\Models\Product::where('active', true)->get() as $product)
    <url>
        <loc>{{ route('products.show', $product->slug) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <url>
        <loc>{{ url('/contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
</urlset>
