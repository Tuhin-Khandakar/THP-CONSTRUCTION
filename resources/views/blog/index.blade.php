@extends('layouts.app')

@section('meta_title', 'Construction Blog | THP Insights')

@section('content')
<section class="pt-40 pb-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Knowledge Base</span>
        <h1 class="text-5xl md:text-7xl font-heading font-black mb-4">
            {!! str_replace('Insights', '<span class="italic text-accent">Insights</span>', e($settings['blogs_title'] ?? 'THP Insights')) !!}
        </h1>
        <p class="text-white/60 max-w-2xl mx-auto text-lg leading-relaxed">
            {{ $settings['blogs_description'] ?? 'Stay updated with the latest trends in modern architecture and construction technology.' }}
        </p>
    </div>
</section>

<section class="py-32 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($blogs as $blog)
            <div class="bg-white group overflow-hidden lux-shadow">
                <div class="relative overflow-hidden aspect-w-16 aspect-h-9">
                    <img src="{{ $blog->featured_image ? Storage::url($blog->featured_image) : 'https://images.unsplash.com/photo-1503387762-592dea58ef23?q=80&w=2000&auto=format&fit=crop' }}" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000" alt="{{ $blog->title }}">
                    <div class="absolute top-6 left-6 px-4 py-1 bg-accent text-white text-[10px] font-bold tracking-widest uppercase">
                        {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recent' }}
                    </div>
                </div>
                <div class="p-10">
                    <h3 class="text-2xl font-heading font-bold text-primary mb-6 line-clamp-2 hover:text-accent transition-colors">
                        <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                    </h3>
                    <p class="text-darkText/60 text-sm leading-relaxed mb-8 line-clamp-3">
                        {{ $blog->excerpt }}
                    </p>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="text-xs font-bold tracking-[0.2em] uppercase text-primary inline-flex items-center group-hover:text-accent">
                        Read Article
                        <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <p class="text-darkText/40 italic">Stay tuned for expert construction insights coming soon.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-20">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
