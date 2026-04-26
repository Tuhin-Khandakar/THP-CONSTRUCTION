@extends('layouts.app')

@section('meta_title', $blog->meta_title ?? $blog->title)
@section('meta_description', $blog->meta_description ?? $blog->excerpt)

@section('content')
<article class="pt-40 pb-32">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="text-center mb-16">
            <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Knowledge Base</span>
            <h1 class="text-4xl md:text-6xl font-heading font-black text-primary mb-8 leading-tight">{{ $blog->title }}</h1>
            <div class="flex items-center justify-center space-x-6 text-sm text-darkText/40 italic">
                <span>Published on {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recently' }}</span>
                <span class="w-1.5 h-1.5 bg-accent rounded-full"></span>
                <span>By THP Engineering Team</span>
            </div>
        </header>

        @if($blog->featured_image)
        <div class="mb-16 transform -mx-4 sm:-mx-8 lg:-mx-20">
            <img src="{{ Storage::url($blog->featured_image) }}" class="w-full h-[500px] object-cover lux-shadow" alt="{{ $blog->title }}">
        </div>
        @endif

        <div class="prose prose-lg max-w-none prose-headings:font-heading prose-headings:text-primary prose-p:text-darkText/70 prose-a:text-accent">
            {!! $blog->content !!}
        </div>

        <div class="mt-20 pt-10 border-t border-light flex justify-between items-center">
            <div class="flex space-x-4">
                <span class="text-xs font-bold uppercase tracking-widest text-primary">Share:</span>
                <a href="#" class="text-darkText/40 hover:text-accent transition-colors">Facebook</a>
                <a href="#" class="text-darkText/40 hover:text-accent transition-colors">LinkedIn</a>
            </div>
            <a href="{{ route('blog.index') }}" class="text-xs font-bold uppercase tracking-widest text-accent flex items-center">
                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Back to Blog
            </a>
        </div>
    </div>
</article>
@endsection
