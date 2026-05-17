@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-primary">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ isset($settings['hero_image']) && $settings['hero_image'] ? asset('storage/' . $settings['hero_image']) : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop' }}" 
             class="w-full h-full object-cover opacity-30" alt="Modern Building">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/50 via-primary/80 to-primary"></div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center"
         x-data="{ visible: false }" x-init="setTimeout(() => visible = true, 300)">
        <div x-show="visible" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0">
            <span class="inline-block px-4 py-1.5 mb-6 rounded-full border border-accent/30 text-accent text-xs font-bold tracking-[0.4em] uppercase bg-accent/5">
                {{ $settings['hero_subtitle'] ?? 'Modern Luxury Within Reach' }}
            </span>
            <h1 class="text-5xl md:text-8xl font-heading font-black text-white mb-8 leading-tight">
                {!! str_replace(['Excellence', 'Luxury'], ['<span class="text-accent italic">Excellence</span>', '<span class="text-accent italic">Luxury</span>'], e($settings['hero_title'] ?? 'Architectural Excellence For Modern Living.')) !!}
            </h1>
            <p class="text-lg md:text-xl text-white/70 mb-12 max-w-2xl mx-auto leading-relaxed">
                {{ $settings['hero_description'] ?? 'Specializing in Concrete Hollow Block construction — 4x stronger, eco-friendly, and European-inspired designs for the discerning homeowner.' }}
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ route('projects.index') }}" class="px-10 py-5 bg-accent text-white font-bold tracking-widest uppercase text-sm hover:bg-white hover:text-primary transition-all duration-300 shadow-2xl">
                    View Portfolio
                </a>
                <a href="{{ route('contact.index') }}" class="px-10 py-5 border border-white/20 text-white font-bold tracking-widest uppercase text-sm hover:bg-white/10 transition-all duration-300">
                    Get Free Quote
                </a>
            </div>
        </div>

        <!-- Floating Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-24 bg-white border-b border-light" x-data="{ 
    counts: { projects: 0, blocks: 0, warranty: 0, clients: 0 },
    targets: { 
        projects: {{ $settings['stats_projects'] ?? 150 }}, 
        blocks: {{ $settings['stats_strength'] ?? 300 }}, 
        warranty: {{ $settings['stats_warranty'] ?? 100 }}, 
        clients: {{ $settings['stats_clients'] ?? 250 }} 
    },
    started: false,
    startCounting() {
        if (this.started) return;
        this.started = true;
        Object.keys(this.targets).forEach(key => {
            let interval = setInterval(() => {
                if (this.counts[key] >= this.targets[key]) {
                    this.counts[key] = this.targets[key];
                    clearInterval(interval);
                } else {
                    this.counts[key] += Math.ceil(this.targets[key] / 50);
                }
            }, 30);
        });
    }
}" x-intersect="startCounting()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-heading font-bold text-primary mb-2"><span x-text="counts.projects">0</span>+</div>
                <div class="text-sm tracking-widest uppercase text-darkText/50 font-bold">Projects Done</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-heading font-bold text-primary mb-2"><span x-text="counts.blocks">0</span>%</div>
                <div class="text-sm tracking-widest uppercase text-darkText/50 font-bold">More Strength</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-heading font-bold text-primary mb-2"><span x-text="counts.warranty">0</span> Yrs</div>
                <div class="text-sm tracking-widest uppercase text-darkText/50 font-bold">Warranty</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-heading font-bold text-primary mb-2"><span x-text="counts.clients">0</span>+</div>
                <div class="text-sm tracking-widest uppercase text-darkText/50 font-bold">Happy Clients</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-32 bg-light relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-20">
            <div class="max-w-2xl">
                <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">{{ $settings['expertise_subtitle'] ?? 'Our Expertise' }}</span>
                <h2 class="text-4xl md:text-6xl font-heading font-black text-primary leading-tight">
                    {!! str_replace('Luxury Construction.', '<span class="text-accent underline decoration-accent/30 underline-offset-8">Luxury Construction.</span>', e($settings['expertise_title'] ?? 'Comprehensive Solutions for Luxury Construction.')) !!}
                </h2>
            </div>
            <div class="mt-8 md:mt-0">
                <a href="{{ route('services.index') }}" class="inline-flex items-center text-sm font-bold tracking-widest uppercase group text-primary">
                    View All Services
                    <svg class="ml-2 h-5 w-5 transform group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white p-12 lux-shadow hover:-translate-y-2 transition-all duration-500 group">
                <div class="w-16 h-16 gold-gradient flex items-center justify-center text-white mb-8 group-hover:scale-110 transition-transform">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" class="h-8 w-8 object-contain brightness-0 invert">
                    @else
                        <div class="h-8 w-8">
                            {!! $service->icon ?? '<svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>' !!}
                        </div>
                    @endif
                </div>
                <h3 class="text-2xl font-heading font-bold text-primary mb-4">{{ $service->title }}</h3>
                <p class="text-darkText/60 leading-relaxed">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-32 bg-primary text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-24">
            <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">{{ $settings['portfolio_subtitle'] ?? 'Portfolio' }}</span>
            <h2 class="text-4xl md:text-6xl font-heading font-black mb-8">{{ $settings['portfolio_title'] ?? 'Selected Masterpieces' }}</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            @foreach($featuredProjects as $project)
            <div class="group relative overflow-hidden" x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false">
                <div class="aspect-w-16 aspect-h-9 overflow-hidden h-[400px]">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000" alt="{{ $project->title }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000" alt="Project">
                    @endif
                </div>
                <div class="absolute inset-0 bg-primary/20 group-hover:bg-primary/40 transition-colors"></div>
                <div class="absolute inset-x-0 bottom-0 p-10 bg-gradient-to-t from-primary px-8 transform translate-y-4 group-hover:translate-y-0 transition-transform">
                    <span class="text-accent text-xs font-bold tracking-widest uppercase mb-2 block">{{ $project->category ?? 'Luxury Project' }}</span>
                    <h3 class="text-3xl font-heading font-bold mb-4">{{ $project->title }}</h3>
                    <div class="flex items-center text-sm text-white/70 italic opacity-0 group-hover:opacity-100 transition-opacity">
                        View Project Details 
                        <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </div>
                </div>
                <a href="{{ route('projects.show', $project) }}" class="absolute inset-0 z-10"></a>
            </div>
            @endforeach
        </div>
        
        <div class="mt-20 text-center">
            <a href="{{ route('projects.index') }}" class="inline-block px-12 py-5 border-2 border-accent text-accent font-bold tracking-widest uppercase text-sm hover:bg-accent hover:text-white transition-all">
                Browse Full Portfolio
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
@php $featuredProducts = \App\Models\Product::where('active', true)->where('featured', true)->with('category')->orderBy('order')->take(4)->get(); @endphp
@if($featuredProducts->count())
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">What We Sell</span>
            <h2 class="text-4xl md:text-6xl font-heading font-black text-primary mb-6">
                Our <span class="italic text-accent">Products</span>
            </h2>
            <p class="text-darkText/60">Premium construction materials — sourced, tested, and trusted for modern luxury builds.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <a href="{{ route('products.show', $product->slug) }}"
               class="group bg-light overflow-hidden lux-shadow hover:shadow-2xl transition-all duration-500 flex flex-col">
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
                    @if($product->sale_price && $product->price)
                    <span class="absolute top-3 left-3 px-2 py-0.5 bg-red-500 text-white text-[10px] font-bold tracking-widest uppercase">Sale</span>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-1">
                    @if($product->category)
                    <span class="text-accent text-[10px] font-bold tracking-[0.3em] uppercase mb-1 block">{{ $product->category->name }}</span>
                    @endif
                    <h3 class="font-heading font-bold text-primary text-lg mb-2 group-hover:text-accent transition-colors leading-tight">{{ $product->name }}</h3>
                    <div class="mt-auto pt-4 border-t border-gray-200 flex items-end justify-between">
                        <div>
                            @if($product->price)
                            @if($product->sale_price)
                            <div class="text-base font-heading font-bold text-accent">৳{{ number_format($product->sale_price, 0) }}</div>
                            <div class="text-xs text-gray-400 line-through">৳{{ number_format($product->price, 0) }}</div>
                            @else
                            <div class="text-base font-heading font-bold text-primary">৳{{ number_format($product->price, 0) }}</div>
                            @endif
                            <div class="text-[10px] text-gray-400 uppercase">per {{ $product->unit }}</div>
                            @else
                            <span class="text-sm text-gray-400 italic">Contact for price</span>
                            @endif
                        </div>
                        <svg class="h-5 w-5 text-accent group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-16 text-center">
            <a href="{{ route('products.index') }}" class="inline-block px-12 py-5 border-2 border-primary text-primary font-bold tracking-widest uppercase text-sm hover:bg-primary hover:text-white transition-all">
                Browse All Products
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-32 bg-accent relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <svg fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" class="w-full h-full"><path d="M0 0 L100 0 L100 100 L0 100 Z" fill="url(#grid)"/></svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-4xl md:text-7xl font-heading font-black text-primary mb-10 leading-tight">
            {!! nl2br(e($settings['cta_title'] ?? 'Ready to Build Your Legacy Project?')) !!}
        </h2>
        <p class="text-xl text-primary/80 mb-12 max-w-2xl mx-auto font-medium">
            {{ $settings['cta_description'] ?? 'Join 250+ homeowners who trusted THP for structural integrity and modern architectural beauty.' }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="https://wa.me/8801352221279" class="px-10 py-5 bg-primary text-white font-bold tracking-widest uppercase text-sm hover:bg-white hover:text-primary transition-all duration-300">
                Book a Consultation
            </a>
            <a href="{{ route('contact.index') }}" class="px-10 py-5 border-2 border-primary text-primary font-bold tracking-widest uppercase text-sm hover:bg-primary hover:text-white transition-all duration-300">
                Request a Callback
            </a>
        </div>
    </div>
</section>
@endsection
