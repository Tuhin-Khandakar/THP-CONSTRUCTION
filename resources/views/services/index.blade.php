@extends('layouts.app')

@section('meta_title', 'Our Services | THP Construction')

@section('content')
<!-- Page Header -->
<section class="pt-40 pb-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">What We Do</span>
        <h1 class="text-5xl md:text-7xl font-heading font-black mb-8">
            {!! str_replace('Engineering', '<span class="italic text-accent">Engineering</span>', e($settings['services_title'] ?? 'Architectural & Engineering Services')) !!}
        </h1>
        <p class="text-white/60 max-w-2xl mx-auto text-lg leading-relaxed">
            {{ $settings['services_description'] ?? 'From initial soil testing to final interior touches, we provide a complete end-to-end ecosystem for luxury construction.' }}
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-32 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($services as $s)
            <div class="bg-white p-16 lux-shadow group hover:bg-primary transition-all duration-500">
                <div class="w-12 h-1 border-t-4 border-accent mb-8 group-hover:w-full transition-all duration-500"></div>
                @if($s->image)
                    <img src="{{ asset('storage/' . $s->image) }}" alt="{{ $s->title }}" class="h-12 w-12 object-cover rounded-lg mb-6 group-hover:invert">
                @elseif($s->icon)
                    <div class="mb-6 text-primary group-hover:text-white [&>svg]:h-12 [&>svg]:w-12">
                        {!! $s->icon !!}
                    </div>
                @endif
                <h3 class="text-2xl font-heading font-bold text-primary mb-6 group-hover:text-white">{{ $s->title }}</h3>
                <p class="text-darkText/60 group-hover:text-white/60 leading-relaxed mb-8">
                    {{ $s->description }}
                </p>
                <a href="{{ route('contact.index', ['service' => $s->title]) }}" class="flex items-center text-xs font-bold tracking-widest uppercase text-accent opacity-0 group-hover:opacity-100 transition-opacity">
                    Consult Expert
                    <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
            </div>
            @empty
            <div class="col-span-full text-center py-20 text-darkText/50">
                <p>New services are being added. Please check back later.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Building Packages Section -->
<section class="py-32 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-6xl font-heading font-black text-primary mb-6">{{ $settings['packages_title'] ?? 'Building Packages' }}</h2>
            <p class="text-darkText/50">{{ $settings['packages_description'] ?? 'Transparent pricing for premium construction. All packages include modern finishing.' }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            @php
                $packages = [
                    ['title' => 'Single Storey', 'area' => '750 sqft', 'price' => '7.7 Lakhs'],
                    ['title' => 'Luxury Duplex', 'area' => '1100 sqft', 'price' => '26 Lakhs'],
                    ['title' => '4 Story Tower', 'area' => '2200 sqft', 'price' => '1.28 Crore'],
                    ['title' => '6 Story Plaza', 'area' => '3200 sqft', 'price' => '1.60 Crore'],
                    ['title' => '8 Story Elite', 'area' => '3600 sqft', 'price' => '6.45 Crore'],
                ];
            @endphp

            @foreach($packages as $p)
            <div class="border border-light p-8 text-center flex flex-col justify-between hover:border-accent transition-colors">
                <div>
                    <h4 class="font-heading font-bold text-primary mb-2">{{ $p['title'] }}</h4>
                    <p class="text-xs text-darkText/40 uppercase tracking-widest mb-6">{{ $p['area'] }}</p>
                    <div class="text-2xl font-heading font-bold text-accent mb-6">From {{ $p['price'] }}</div>
                </div>
                <a href="{{ route('contact.index', ['service' => $p['title']]) }}" class="text-xs font-bold tracking-widest uppercase py-3 border border-primary/10 hover:bg-primary hover:text-white transition-all">Details</a>
            </div>
            @endforeach
        </div>
        <p class="text-center text-xs text-darkText/40 mt-12 italic">*Prices may vary based on soil condition and specific material choices.</p>
    </div>
</section>
@endsection
