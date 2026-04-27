@extends('layouts.app')

@section('meta_title', 'About Us | THP Construction')

@section('content')
    <!-- About Hero -->
    <section class="pt-40 pb-20 bg-primary text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div>
                    <span
                        class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">{{ $settings['about_subtitle'] ?? 'The Mission' }}</span>
                    <h1 class="text-5xl md:text-8xl font-heading font-black mb-8 leading-tight">
                        {!! str_replace('&', '<span class="text-accent italic">&</span>', e($settings['about_title'] ?? 'Beyond Brick & Mortar.')) !!}
                    </h1>
                    <p class="text-white/60 text-lg leading-relaxed mb-8">
                        {{ $settings['about_description'] ?? 'THP Construction was founded on the principle that modern luxury shouldn\'t be exclusive.' }}
                    </p>
                    <div class="flex items-center space-x-8">
                        <div>
                            <div class="text-3xl font-heading font-bold text-accent">100 Yrs</div>
                            <div class="text-[10px] tracking-widest uppercase text-white/40">Warranty</div>
                        </div>
                        <div class="w-px h-10 bg-white/10"></div>
                        <div>
                            <div class="text-3xl font-heading font-bold text-white">400%</div>
                            <div class="text-[10px] tracking-widest uppercase text-white/40">Efficiency</div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -inset-4 bg-accent/20 blur-3xl rounded-full"></div>
                    <img src="{{ $settings['about_image_1'] ? asset('storage/' . $settings['about_image_1']) : 'https://images.unsplash.com/photo-1541888946425-d81bb19480c5?q=80&w=2070&auto=format&fit=crop' }}"
                        class="relative z-10 w-full h-[600px] object-cover lux-shadow" alt="Construction Excellence">
                </div>
            </div>
        </div>
    </section>

    <!-- Trustee Board Section -->
    @if($trustees->count() > 0)
        <section class="py-32 bg-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Trustee Board</span>
                    <h2 class="text-4xl md:text-6xl font-heading font-black text-primary mb-8">
                        {{ $settings['trustee_title'] ?? 'Our Honored Trustees' }}</h2>
                    <p class="text-darkText/60">
                        {{ $settings['trustee_description'] ?? 'The guiding force behind our vision and values.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($trustees as $member)
                        <div class="bg-white p-8 lux-shadow text-center group">
                            <div
                                class="mb-6 relative mx-auto w-40 h-40 overflow-hidden rounded-full border-4 border-transparent group-hover:border-accent transition-colors duration-500">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-primary/10 flex items-center justify-center">
                                        <svg class="h-16 w-16 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <h3 class="text-xl font-heading font-bold text-primary mb-2">{{ $member->name }}</h3>
                            <div class="text-xs font-bold text-accent uppercase tracking-widest mb-4">{{ $member->designation }}
                            </div>
                            @if($member->details)
                                <div x-data="{ expanded: false }">
                                    <p class="text-darkText/60 text-sm leading-relaxed" x-show="!expanded">
                                        {{ Str::limit($member->details, 120) }}
                                    </p>
                                    <p class="text-darkText/60 text-sm leading-relaxed" x-show="expanded" style="display: none;">
                                        {{ $member->details }}
                                    </p>
                                    @if(strlen($member->details) > 120)
                                        <button @click="expanded = !expanded" class="text-accent text-[10px] font-bold uppercase tracking-widest mt-2 hover:underline focus:outline-none">
                                            <span x-show="!expanded">Read More</span>
                                            <span x-show="expanded">Read Less</span>
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Founder Profile -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                <div class="lg:w-1/3">
                    <div class="relative group max-w-xs mx-auto lg:ml-0">
                        <div
                            class="absolute inset-0 bg-accent -translate-x-6 translate-y-6 group-hover:-translate-x-4 group-hover:translate-y-4 transition-transform duration-500">
                        </div>
                        <img src="{{ $settings['founder_image'] ? asset('storage/' . $settings['founder_image']) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop' }}"
                            class="relative z-10 w-full h-[320px] object-cover"
                            alt="{{ $settings['founder_name'] ?? 'Founder' }}">
                    </div>
                </div>
                <div class="lg:w-2/3">
                    <span class="text-accent font-bold tracking-[0.3em] uppercase text-sm mb-4 block">Founder & CEO</span>
                    <h2 class="text-3xl md:text-4xl xl:text-5xl font-heading font-black text-primary mb-8 lg:whitespace-nowrap">
                        {{ $settings['founder_name'] ?? 'Engr. Tasnim Haque Pranto' }}</h2>
                    <div class="text-sm tracking-widest text-darkText/40 uppercase mb-8">
                        {{ $settings['founder_title'] ?? 'BSc Civil Engineering' }}</div>
                    <p class="text-darkText/70 leading-relaxed space-y-6">
                        {!! nl2br(e($settings['founder_bio'] ?? '')) !!}
                    </p>
                    @if($settings['founder_signature'] ?? false)
                        <div class="mt-12">
                            <img src="{{ asset('storage/' . $settings['founder_signature']) }}" class="h-16 opacity-30 invert"
                                alt="Signature">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Section -->
    @if($team->count() > 0)
        <section class="py-32 bg-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <span class="text-accent font-bold tracking-[0.3em] uppercase text-xs mb-4 block">Our Team</span>
                    <h2 class="text-4xl md:text-6xl font-heading font-black text-primary mb-8">
                        {{ $settings['team_title'] ?? 'Meet The Experts' }}</h2>
                    <p class="text-darkText/60">
                        {{ $settings['team_description'] ?? 'The passionate professionals who turn your dreams into reality.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($team as $member)
                        <div class="bg-white p-8 lux-shadow text-center group">
                            <div
                                class="mb-6 relative mx-auto w-40 h-40 overflow-hidden rounded-full border-4 border-transparent group-hover:border-accent transition-colors duration-500">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-primary/10 flex items-center justify-center">
                                        <svg class="h-16 w-16 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <h3 class="text-xl font-heading font-bold text-primary mb-2">{{ $member->name }}</h3>
                            <div class="text-xs font-bold text-accent uppercase tracking-widest mb-4">{{ $member->designation }}
                            </div>
                            @if($member->details)
                                <div x-data="{ expanded: false }">
                                    <p class="text-darkText/60 text-sm leading-relaxed" x-show="!expanded">
                                        {{ Str::limit($member->details, 120) }}
                                    </p>
                                    <p class="text-darkText/60 text-sm leading-relaxed" x-show="expanded" style="display: none;">
                                        {{ $member->details }}
                                    </p>
                                    @if(strlen($member->details) > 120)
                                        <button @click="expanded = !expanded" class="text-accent text-[10px] font-bold uppercase tracking-widest mt-2 hover:underline focus:outline-none">
                                            <span x-show="!expanded">Read More</span>
                                            <span x-show="expanded">Read Less</span>
                                        </button>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Why Hollow Block -->
    <section class="py-32 bg-primary text-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-24">
                <h2 class="text-4xl md:text-6xl font-heading font-black mb-8">
                    {!! str_replace('Hollow Blocks?', '<span class="text-accent">Hollow Blocks?</span>', e($settings['hb_title'] ?? 'Why Concrete Hollow Blocks?')) !!}
                </h2>
                <p class="text-white/60">
                    {{ $settings['hb_subtitle'] ?? 'The future of construction is here. Stronger, Faster, Greener.' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="text-center p-12 bg-white/5 border border-white/10 hover:bg-accent/10 transition-colors">
                    <div class="text-accent text-5xl font-heading font-bold mb-6">01</div>
                    <h4 class="text-xl font-bold mb-4">{{ $settings['hb_card1_title'] ?? 'Superior Strength' }}</h4>
                    <p class="text-white/50 text-sm">
                        {{ $settings['hb_card1_text'] ?? 'Our Grade A blocks withstand 3x-4x more pressure than traditional red bricks, ensuring a lifetime of safety.' }}
                    </p>
                </div>
                <div class="text-center p-12 bg-white/5 border border-white/10 hover:bg-accent/10 transition-colors">
                    <div class="text-accent text-5xl font-heading font-bold mb-6">02</div>
                    <h4 class="text-xl font-bold mb-4">{{ $settings['hb_card2_title'] ?? 'Thermal Insulation' }}</h4>
                    <p class="text-white/50 text-sm">
                        {{ $settings['hb_card2_text'] ?? 'Hollow cores trap air, providing natural insulation that keeps your home 5°C cooler in summer.' }}
                    </p>
                </div>
                <div class="text-center p-12 bg-white/5 border border-white/10 hover:bg-accent/10 transition-colors">
                    <div class="text-accent text-5xl font-heading font-bold mb-6">03</div>
                    <h4 class="text-xl font-bold mb-4">{{ $settings['hb_card3_title'] ?? 'Eco-Friendly' }}</h4>
                    <p class="text-white/50 text-sm">
                        {{ $settings['hb_card3_text'] ?? 'Reduces topsoil depletion and coal burning. Our blocks are the greener choice for a better Bangladesh.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection