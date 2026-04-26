@extends('layouts.app')

@section('meta_title', $project->title . ' | Portfolio')

@section('content')
<section class="pt-40 pb-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end">
            <div>
                <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">{{ $project->category }}</span>
                <h1 class="text-4xl md:text-6xl font-heading font-black mb-4">{{ $project->title }}</h1>
            </div>
            <div class="mt-8 md:mt-0 pb-2">
                <span class="px-6 py-2 bg-accent/20 border border-accent/20 text-accent rounded-full text-xs font-bold uppercase tracking-widest">{{ $project->status }}</span>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
            <!-- Gallery -->
            <div class="lg:col-span-2 space-y-8">
                @if($project->images && count($project->images) > 0)
                    @foreach($project->images as $image)
                        <div class="overflow-hidden bg-light">
                            <img src="{{ Storage::url($image) }}" class="w-full object-cover lux-shadow" alt="Project Image">
                        </div>
                    @endforeach
                @else
                    <div class="aspect-w-16 aspect-h-9 bg-light flex items-center justify-center italic text-darkText/20">
                        Detailed images coming soon.
                    </div>
                @endif
            </div>

            <!-- Details -->
            <div class="lg:col-span-1">
                <div class="sticky top-32 space-y-12">
                    <div>
                        <h3 class="text-xl font-heading font-bold text-primary mb-6 pb-4 border-b border-light uppercase tracking-widest">Project Details</h3>
                        <div class="space-y-6">
                            @if($project->area_sqft)
                            <div>
                                <div class="text-[10px] font-bold text-darkText/40 uppercase tracking-widest mb-1">Total Area</div>
                                <div class="text-lg font-bold text-primary italic">{{ $project->area_sqft }} SQFT</div>
                            </div>
                            @endif
                            @if($project->cost_range)
                            <div>
                                <div class="text-[10px] font-bold text-darkText/40 uppercase tracking-widest mb-1">Investment Range</div>
                                <div class="text-lg font-bold text-primary italic">{{ $project->cost_range }}</div>
                            </div>
                            @endif
                            <div>
                                <div class="text-[10px] font-bold text-darkText/40 uppercase tracking-widest mb-1">Architecture</div>
                                <div class="text-lg font-bold text-primary italic">THP Modern European</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-heading font-bold text-primary mb-6 pb-4 border-b border-light uppercase tracking-widest">Overview</h3>
                        <p class="text-darkText/60 leading-relaxed italic">
                            {{ $project->description }}
                        </p>
                    </div>

                    <a href="{{ route('contact.index', ['project' => $project->title]) }}" 
                       class="block w-full py-6 bg-accent text-white text-center font-bold tracking-[0.3em] uppercase hover:bg-primary transition-all duration-500 shadow-xl">
                        Inquire About Similar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
