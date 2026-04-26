@extends('layouts.app')
@section('meta_title', 'Our Products | THP Construction')
@section('content')

{{-- Hero --}}
<section class="pt-40 pb-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">What We Offer</span>
        <h1 class="text-5xl md:text-7xl font-heading font-black mb-6">
            Our <span class="italic text-accent">Products</span>
        </h1>
        <p class="text-white/60 max-w-2xl mx-auto text-lg leading-relaxed">
            Premium construction materials and solutions — engineered for durability, designed for modern living.
        </p>
    </div>
</section>

{{-- Filter Bar --}}
<section class="bg-white border-b sticky top-[80px] z-30 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-wrap items-center gap-4 py-4">
            {{-- Category filters --}}
            <div class="flex flex-wrap gap-2 flex-1">
                <a href="{{ route('products.index') }}"
                   class="px-5 py-2 rounded-full text-xs font-bold tracking-widest uppercase transition-all border {{ !request('category') ? 'bg-primary text-white border-primary' : 'border-gray-200 text-primary hover:border-primary' }}">
                    All
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('products.index', ['category' => $cat->slug] + request()->except('category', 'page')) }}"
                   class="px-5 py-2 rounded-full text-xs font-bold tracking-widest uppercase transition-all border {{ request('category') === $cat->slug ? 'bg-primary text-white border-primary' : 'border-gray-200 text-primary hover:border-primary' }}">
                    {{ $cat->name }} <span class="opacity-50">({{ $cat->products_count }})</span>
                </a>
                @endforeach
            </div>
            {{-- Search + Sort --}}
            <div class="flex gap-2 items-center">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products…"
                           class="pl-9 pr-4 py-2 border rounded-full text-sm focus:ring-2 focus:ring-accent outline-none w-48">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <select name="sort" onchange="this.form.submit()" class="px-3 py-2 border rounded-full text-sm focus:ring-2 focus:ring-accent outline-none">
                    <option value="">Sort by</option>
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low → High</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High → Low</option>
                </select>
            </div>
        </form>
    </div>
</section>

{{-- Products Grid --}}
<section class="py-20 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($products->isEmpty())
        <div class="py-32 text-center">
            <p class="text-darkText/40 text-xl font-heading">No products found.</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block text-accent font-bold hover:underline">Clear filters</a>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
            <a href="{{ route('products.show', $product->slug) }}"
               class="group bg-white overflow-hidden lux-shadow hover:shadow-2xl transition-all duration-500 flex flex-col">
                {{-- Image --}}
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    @if($product->first_image)
                    <img src="{{ asset('storage/'.$product->first_image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="h-16 w-16 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    @endif

                    {{-- Badges --}}
                    <div class="absolute top-3 left-3 flex flex-col gap-1">
                        @if($product->featured)
                        <span class="px-2 py-0.5 bg-accent text-white text-[10px] font-bold tracking-widest uppercase">Featured</span>
                        @endif
                        @if($product->sale_price && $product->price)
                        <span class="px-2 py-0.5 bg-red-500 text-white text-[10px] font-bold tracking-widest uppercase">Sale</span>
                        @endif
                    </div>

                    @if(!$product->in_stock)
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                        <span class="bg-white text-gray-700 text-xs font-bold px-3 py-1 uppercase tracking-widest">Out of Stock</span>
                    </div>
                    @endif
                </div>

                {{-- Info --}}
                <div class="p-6 flex flex-col flex-1">
                    @if($product->category)
                    <span class="text-accent text-[10px] font-bold tracking-[0.3em] uppercase mb-2 block">{{ $product->category->name }}</span>
                    @endif
                    <h3 class="font-heading font-bold text-primary text-lg mb-2 group-hover:text-accent transition-colors leading-tight">{{ $product->name }}</h3>
                    @if($product->short_description)
                    <p class="text-darkText/60 text-sm leading-relaxed mb-4 flex-1">{{ Str::limit($product->short_description, 80) }}</p>
                    @endif
                    <div class="mt-auto pt-4 border-t border-gray-100 flex items-end justify-between">
                        <div>
                            @if($product->price)
                            @if($product->sale_price)
                            <div class="text-lg font-heading font-bold text-accent">৳{{ number_format($product->sale_price, 0) }}</div>
                            <div class="text-xs text-gray-400 line-through">৳{{ number_format($product->price, 0) }}</div>
                            @else
                            <div class="text-lg font-heading font-bold text-primary">৳{{ number_format($product->price, 0) }}</div>
                            @endif
                            <div class="text-[10px] text-gray-400 uppercase tracking-widest">per {{ $product->unit }}</div>
                            @else
                            <span class="text-sm text-gray-400 italic">Contact for price</span>
                            @endif
                        </div>
                        <span class="text-accent group-hover:translate-x-1 transition-transform duration-300">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-16">{{ $products->links() }}</div>
        @endif
    </div>
</section>

{{-- CTA --}}
<section class="py-24 bg-primary text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl md:text-5xl font-heading font-black mb-6">Need a Custom Quote?</h2>
        <p class="text-white/60 mb-10 text-lg">Tell us your requirements — we'll create a tailored package for your project.</p>
        <a href="{{ route('contact.index') }}" class="inline-block px-12 py-5 bg-accent text-white font-bold tracking-widest uppercase text-sm hover:bg-yellow-500 transition-all">Get a Free Quote</a>
    </div>
</section>
@endsection
