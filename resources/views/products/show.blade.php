@extends('layouts.app')
@section('meta_title', $product->name . ' | THP Construction')
@section('content')

<div class="pt-36 pb-20 bg-light">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Breadcrumb --}}
    <nav class="text-xs text-darkText/40 uppercase tracking-widest mb-10 flex items-center gap-2">
        <a href="{{ route('products.index') }}" class="hover:text-accent transition-colors">Products</a>
        <span>/</span>
        @if($product->category)
        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-accent transition-colors">{{ $product->category->name }}</a>
        <span>/</span>
        @endif
        <span class="text-primary font-bold">{{ $product->name }}</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

        {{-- Gallery --}}
        <div x-data="{ active: 0 }">
            @if($product->images && count($product->images))
            {{-- Main Image --}}
            <div class="relative overflow-hidden bg-white lux-shadow aspect-square mb-4">
                @foreach($product->images as $i => $img)
                <img src="{{ asset('storage/'.$img) }}"
                     alt="{{ $product->name }}"
                     x-show="active === {{ $i }}"
                     class="w-full h-full object-cover">
                @endforeach
                @if(!$product->in_stock)
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                    <span class="bg-white text-gray-700 text-sm font-bold px-4 py-2 uppercase tracking-widest">Out of Stock</span>
                </div>
                @endif
            </div>
            {{-- Thumbnails --}}
            @if(count($product->images) > 1)
            <div class="grid grid-cols-5 gap-2">
                @foreach($product->images as $i => $img)
                <button @click="active = {{ $i }}"
                        :class="active === {{ $i }} ? 'ring-2 ring-accent' : 'ring-1 ring-gray-200'"
                        class="aspect-square overflow-hidden rounded">
                    <img src="{{ asset('storage/'.$img) }}" class="w-full h-full object-cover">
                </button>
                @endforeach
            </div>
            @endif
            @else
            <div class="aspect-square bg-white lux-shadow flex items-center justify-center">
                <svg class="h-24 w-24 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            @endif
        </div>

        {{-- Product Details --}}
        <div class="lg:sticky lg:top-28">
            @if($product->category)
            <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">{{ $product->category->name }}</span>
            @endif

            <h1 class="text-4xl md:text-5xl font-heading font-black text-primary mb-4 leading-tight">{{ $product->name }}</h1>

            @if($product->sku)
            <p class="text-xs text-darkText/40 uppercase tracking-widest mb-6">SKU: {{ $product->sku }}</p>
            @endif

            @if($product->short_description)
            <p class="text-darkText/70 text-lg leading-relaxed mb-8 border-l-4 border-accent pl-5">{{ $product->short_description }}</p>
            @endif

            {{-- Price --}}
            @if($product->price)
            <div class="mb-8">
                @if($product->sale_price)
                <div class="text-4xl font-heading font-bold text-accent">৳{{ number_format($product->sale_price, 0) }}</div>
                <div class="text-gray-400 line-through text-lg mt-1">৳{{ number_format($product->price, 0) }}</div>
                <div class="text-green-600 text-sm font-semibold mt-1">
                    Save ৳{{ number_format($product->price - $product->sale_price, 0) }}
                    ({{ round((($product->price - $product->sale_price) / $product->price) * 100) }}% off)
                </div>
                @else
                <div class="text-4xl font-heading font-bold text-primary">৳{{ number_format($product->price, 0) }}</div>
                @endif
                <div class="text-sm text-gray-400 mt-1">per {{ $product->unit }}</div>
            </div>
            @else
            <div class="mb-8">
                <p class="text-2xl font-heading font-bold text-darkText/50 italic">Contact for pricing</p>
            </div>
            @endif

            {{-- Stock Status --}}
            <div class="flex items-center gap-2 mb-8">
                @if($product->in_stock)
                <span class="flex items-center gap-1.5 text-green-600 font-semibold text-sm">
                    <span class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                    In Stock{{ $product->stock !== null ? ' (' . $product->stock . ' available)' : '' }}
                </span>
                @else
                <span class="flex items-center gap-1.5 text-red-500 font-semibold text-sm">
                    <span class="h-2 w-2 rounded-full bg-red-400"></span>
                    Out of Stock
                </span>
                @endif
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <a href="https://wa.me/{{ str_replace([' ', '+'], '', $settings['contact_whatsapp'] ?? '8801352221279') }}?text=I'm interested in: {{ urlencode($product->name) }}"
                   target="_blank"
                   class="flex-1 flex items-center justify-center gap-3 px-8 py-4 bg-[#25D366] text-white font-bold tracking-widest uppercase text-sm hover:bg-green-600 transition-all">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.48 5.228 3.48 8.404c0 6.556-5.332 11.888-11.888 11.888-2.015 0-3.991-.512-5.742-1.488l-6.241 1.613zm6.34-3.554c1.516.899 3.13 1.371 4.781 1.371 5.105 0 9.259-4.154 9.259-9.259 0-2.473-.962-4.798-2.709-6.545s-4.073-2.709-6.545-2.709c-5.105 0-9.26 4.153-9.26 9.259 0 1.761.503 3.479 1.454 4.974l-.953 3.478 3.573-.924zm11.397-5.071c-.265-.133-1.564-.772-1.806-.859-.241-.087-.417-.133-.591.133s-.673.859-.824 1.033-.306.191-.57.058c-.265-.133-1.118-.412-2.13-1.313-.788-.702-1.32-1.569-1.474-1.833-.153-.265-.016-.407.117-.539.12-.12.265-.306.398-.459.133-.153.177-.265.265-.441.087-.176.044-.331-.022-.463s-.591-1.424-.81-1.954c-.213-.517-.43-.447-.591-.455-.152-.008-.327-.009-.501-.009s-.459.066-.697.327c-.237.261-.904.883-.904 2.152s.924 2.496 1.053 2.67c.129.174 1.819 2.778 4.406 3.896.615.266 1.096.425 1.47.545.617.198 1.18.17 1.623.104.494-.074 1.564-.639 1.784-1.257s.22-.119.155-.228c-.066-.113-.241-.183-.506-.316z"/></svg>
                    Order via WhatsApp
                </a>
                <a href="{{ route('contact.index', ['service' => $product->name]) }}"
                   class="flex-1 flex items-center justify-center px-8 py-4 border-2 border-primary text-primary font-bold tracking-widest uppercase text-sm hover:bg-primary hover:text-white transition-all">
                    Request a Quote
                </a>
            </div>
        </div>
    </div>

    {{-- Description + Video --}}
    <div class="mt-20 grid grid-cols-1 {{ ($product->video || $product->video_file) ? 'lg:grid-cols-2' : '' }} gap-16">
        @if($product->description)
        <div class="bg-white p-10 lux-shadow">
            <h2 class="text-2xl font-heading font-bold text-primary mb-6">Product Details</h2>
            <div class="prose prose-lg text-darkText/70 max-w-none leading-relaxed">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>
        @endif

        @if($product->video || $product->video_file)
        <div class="bg-white p-10 lux-shadow">
            <h2 class="text-2xl font-heading font-bold text-primary mb-6">Product Video</h2>
            
            @if($product->video_file)
                <div class="rounded overflow-hidden bg-black">
                    <video controls class="w-full h-auto max-h-[400px]">
                        <source src="{{ asset('storage/'.$product->video_file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @elseif($product->video)
                @php
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $product->video, $matches);
                    $videoId = $matches[1] ?? null;
                @endphp
                @if($videoId)
                    <div class="aspect-w-16 aspect-h-9 rounded overflow-hidden">
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen class="w-full h-64 md:h-80 rounded"></iframe>
                    </div>
                @endif
            @endif
        </div>
        @endif
    </div>

    {{-- Related Products --}}
    @if($related->count())
    <div class="mt-24">
        <h2 class="text-3xl font-heading font-black text-primary mb-10">Related Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($related as $rel)
            <a href="{{ route('products.show', $rel->slug) }}" class="group bg-white overflow-hidden lux-shadow hover:shadow-2xl transition-all duration-500">
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    @if($rel->first_image)
                    <img src="{{ asset('storage/'.$rel->first_image) }}" alt="{{ $rel->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-heading font-bold text-primary group-hover:text-accent transition-colors">{{ $rel->name }}</h3>
                    @if($rel->price)
                    <p class="text-accent font-bold mt-1">৳{{ number_format($rel->display_price, 0) }}<span class="text-gray-400 font-normal text-xs"> /{{ $rel->unit }}</span></p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
</div>
@endsection
