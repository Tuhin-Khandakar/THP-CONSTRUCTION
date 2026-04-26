@extends('layouts.app')

@section('meta_title', 'Gallery | THP Construction')

@section('content')
    <!-- Gallery Hero -->
    <section class="pt-40 pb-20 bg-primary text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Visual Journey</span>
                <h1 class="text-5xl md:text-8xl font-heading font-black mb-8 leading-tight text-white">
                    Our <span class="text-accent italic">Gallery</span>
                </h1>
                <p class="text-white/60 text-lg leading-relaxed">
                    Explore our moments of teamwork, exploration, and construction excellence.
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-white" x-data="{ activeCategory: '{{ request('category', 'All') }}' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Filters -->
            @if($categories->count() > 0)
                <div class="flex flex-wrap justify-center gap-4 mb-16">
                    <a href="{{ route('gallery.index') }}" 
                       class="px-8 py-3 rounded-full text-sm font-bold tracking-widest uppercase transition-all duration-300 border-2"
                       :class="activeCategory === 'All' ? 'bg-accent border-accent text-white' : 'border-gray-100 text-gray-400 hover:border-accent hover:text-accent'">
                        All
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('gallery.index', ['category' => $category]) }}" 
                           class="px-8 py-3 rounded-full text-sm font-bold tracking-widest uppercase transition-all duration-300 border-2"
                           :class="activeCategory === '{{ $category }}' ? 'bg-accent border-accent text-white' : 'border-gray-100 text-gray-400 hover:border-accent hover:text-accent'">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($items as $item)
                    <div class="group relative overflow-hidden bg-primary aspect-[4/3] lux-shadow">
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-90 group-hover:opacity-100">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                            <span class="text-accent text-[10px] font-bold uppercase tracking-widest mb-2 block transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">{{ $item->category ?? 'Moment' }}</span>
                            <h3 class="text-white text-2xl font-heading font-bold mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">{{ $item->title ?? 'Untitled' }}</h3>
                            @if($item->description)
                                <p class="text-white/60 text-sm transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100">{{ $item->description }}</p>
                            @endif
                        </div>

                        <!-- Lightbox Link (Optional for later) -->
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                             <div class="bg-accent text-white p-3 rounded-full shadow-lg">
                                 <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                 </svg>
                             </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="inline-block p-6 rounded-full bg-gray-50 mb-6">
                            <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-primary mb-2">No Photos Found</h3>
                        <p class="text-darkText/50">Check back later for more updates!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-24 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-5xl font-heading font-black text-primary mb-8">Want to see our work in person?</h2>
            <p class="text-darkText/60 mb-12 max-w-2xl mx-auto">Visit our sites or schedule a meeting to learn more about our construction processes and team values.</p>
            <a href="{{ route('contact.index') }}" class="inline-block px-12 py-5 bg-primary text-white font-bold rounded-lg hover:bg-accent transition-all duration-300 transform hover:-translate-y-1">
                Contact Us Now
            </a>
        </div>
    </section>

@endsection
