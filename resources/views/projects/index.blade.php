@extends('layouts.app')

@section('meta_title', 'Portfolio | THP Construction Masterpieces')

@section('content')
<section class="pt-40 pb-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Our Work</span>
        <h1 class="text-5xl md:text-7xl font-heading font-black mb-8">
            {!! str_replace('Marvels', '<span class="italic text-accent">Marvels</span>', e($settings['projects_title'] ?? 'Engineering Marvels')) !!}
        </h1>
        <p class="text-white/60 max-w-2xl mx-auto text-lg leading-relaxed">
            {{ $settings['projects_description'] ?? 'Witness the fusion of European design and structural resilience across Bangladesh.' }}
        </p>
    </div>
</section>

<section class="py-20 bg-light" x-data="{ category: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-20">
            <button @click="category = 'all'" :class="category === 'all' ? 'bg-primary text-white' : 'bg-white text-primary'" class="px-8 py-3 rounded-full text-sm font-bold tracking-widest uppercase transition-all shadow-sm">All Projects</button>
            <button @click="category = 'Duplex'" :class="category === 'Duplex' ? 'bg-primary text-white' : 'bg-white text-primary'" class="px-8 py-3 rounded-full text-sm font-bold tracking-widest uppercase transition-all shadow-sm">Duplex Houses</button>
            <button @click="category = 'Commercial'" :class="category === 'Commercial' ? 'bg-primary text-white' : 'bg-white text-primary'" class="px-8 py-3 rounded-full text-sm font-bold tracking-widest uppercase transition-all shadow-sm">Commercial</button>
            <button @click="category = 'Interior'" :class="category === 'Interior' ? 'bg-primary text-white' : 'bg-white text-primary'" class="px-8 py-3 rounded-full text-sm font-bold tracking-widest uppercase transition-all shadow-sm">Interior</button>
        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @forelse($projects as $project)
            <div x-show="category === 'all' || category === '{{ $project->category }}'" 
                 class="group bg-white overflow-hidden lux-shadow transition-all duration-700"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100">
                <div class="relative aspect-w-4 aspect-h-3 overflow-hidden">
                    @if($project->images && count($project->images) > 0)
                        <img src="{{ Storage::url($project->images[0]) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-1000" alt="{{ $project->title }}">
                    @else
                        <div class="w-full h-full bg-primary/10 flex items-center justify-center">
                            <span class="text-primary/20 italic">No image available</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                        <a href="{{ route('projects.show', $project) }}" class="p-4 bg-accent text-white rounded-full">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </a>
                    </div>
                </div>
                <div class="p-10">
                    <span class="text-accent text-[10px] font-bold tracking-[0.3em] uppercase mb-4 block">{{ $project->category }}</span>
                    <h3 class="text-2xl font-heading font-bold text-primary mb-6">{{ $project->title }}</h3>
                    <div class="flex justify-between items-center text-xs font-medium text-darkText/40 border-t border-light pt-6 mt-6">
                        <span>{{ $project->area_sqft }} SQFT</span>
                        <span class="uppercase tracking-widest text-accent">{{ $project->status }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-white lux-shadow">
                <p class="text-darkText/40 font-heading text-2xl">Our portfolio is being updated with recent successes.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-20">
            {{ $projects->links() }}
        </div>
    </div>
</section>
@endsection
