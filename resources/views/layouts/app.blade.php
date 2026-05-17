<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('meta_title', 'THP Construction | Modern Luxury Within Reach')</title>
    <meta name="description" content="@yield('meta_description', 'THP Construction provides premium European-style modern construction in Bangladesh. 100-year structural warranty, eco-friendly concrete hollow blocks.')">
    
    @if(!empty($settings['site_favicon']))
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings['site_favicon']) }}">
    @else
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @endif
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a2744',
                        accent: '#c9a84c',
                        light: '#f8f5ef',
                        darkText: '#2c2c2c',
                    },
                    fontFamily: {
                        heading: ['Playfair Display', 'serif'],
                        body: ['DM Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        .lux-shadow { box-shadow: 0 10px 40px -10px rgba(26, 39, 68, 0.1); }
        .gold-gradient { background: linear-gradient(135deg, #c9a84c 0%, #e5c167 50%, #c9a84c 100%); }
    </style>
    @yield('styles')
</head>
<body class="bg-light font-body text-darkText selection:bg-accent selection:text-white">

    <!-- Header / Navbar -->
    <!-- Header / Navbar -->
    <nav x-data="{ 
            mobileMenu: false, 
            atTop: {{ request()->routeIs('home') ? 'true' : 'false' }},
            isHome: {{ request()->routeIs('home') ? 'true' : 'false' }}
         }" 
         x-on:scroll.window="if(isHome) atTop = (window.scrollY > 50) ? false : true"
         :class="atTop ? 'bg-transparent py-6' : 'bg-primary/95 backdrop-blur-md py-4 shadow-lg'"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-4 group">
                    @if($settings['site_logo'] ?? false)
                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="THP Logo" class="h-12 w-auto">
                    @endif
                    <div class="flex flex-col">
                        <span class="text-2xl font-heading font-bold tracking-widest uppercase text-accent">THP</span>
                        <span class="text-[10px] tracking-[0.3em] font-medium text-white/70">CONSTRUCTION</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('home') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">Home</a>
                    <a href="{{ route('about') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">About</a>
                    <a href="{{ route('services.index') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">Services</a>
                    <a href="{{ route('products.index') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">Products</a>
                    <a href="{{ route('projects.index') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">Projects</a>
                    <a href="{{ route('gallery.index') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">Gallery</a>
                    <a href="{{ route('blog.index') }}" class="text-sm font-medium tracking-wide transition-colors" :class="atTop ? 'text-white hover:text-accent' : 'text-white hover:text-accent'">Blog</a>
                    <a href="{{ route('contact.index') }}" 
                       class="px-6 py-2.5 rounded text-sm font-bold tracking-widest uppercase transition-all duration-300 shadow-xl"
                       :class="atTop ? 'bg-accent text-white hover:bg-white hover:text-primary' : 'bg-accent text-white hover:bg-white hover:text-primary'">
                        Inquire Now
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="mobileMenu = !mobileMenu" class="p-2 transition-colors" :class="atTop ? 'text-primary' : 'text-white'">
                        <svg x-show="!mobileMenu" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                        <svg x-show="mobileMenu" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-primary text-white p-6 absolute top-full left-0 w-full shadow-2xl">
            <div class="flex flex-col space-y-6 text-center">
                <a href="{{ route('home') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">Home</a>
                <a href="{{ route('about') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">About</a>
                <a href="{{ route('services.index') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">Services</a>
                <a href="{{ route('products.index') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">Products</a>
                <a href="{{ route('projects.index') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">Projects</a>
                <a href="{{ route('gallery.index') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">Gallery</a>
                <a href="{{ route('blog.index') }}" @click="mobileMenu = false" class="text-lg font-medium hover:text-accent">Blog</a>
                <a href="{{ route('contact.index') }}" @click="mobileMenu = false" class="bg-accent text-white py-3 rounded uppercase font-bold tracking-widest">Inquire Now</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white py-20 mt-20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-accent/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                <!-- Branding -->
                <div>
                    <div class="mb-6 flex items-center gap-4">
                        @if($settings['site_logo'] ?? false)
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="THP Logo" class="h-12 w-auto">
                        @endif
                        <div class="flex flex-col">
                            <span class="text-3xl font-heading font-bold tracking-widest text-accent">THP</span>
                            <div class="text-xs tracking-[0.4em] font-medium text-white/50">CONSTRUCTION</div>
                        </div>
                    </div>
                    <p class="text-white/70 leading-relaxed max-w-xs">
                        {{ $settings['footer_about'] ?? '"Modern Luxury Within Reach" — Lead by Engr. Tasnim Haque Pranto, we redefine construction with European elegance and local resilience.' }}
                    </p>
                    <div class="mt-8 flex space-x-4">
                        @if($settings['footer_facebook'] ?? false)
                        <a href="{{ $settings['footer_facebook'] }}" class="p-2 bg-white/5 border border-white/10 rounded-full hover:bg-accent transition-colors" target="_blank">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Fast Links -->
                <div>
                    <h4 class="text-xl font-heading mb-6 font-bold text-accent">Quick Links</h4>
                    <ul class="space-y-4 text-white/70">
                        <li><a href="{{ route('home') }}" class="hover:text-accent transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-accent transition-colors">Why Hollow Block?</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-accent transition-colors">Our Services</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-accent transition-colors">Our Products</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-accent transition-colors">Recent Projects</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-accent transition-colors">Gallery</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-accent transition-colors">Construction Blog</a></li>
                    </ul>
                </div>

                <!-- Services Preview -->
                <div>
                    <h4 class="text-xl font-heading mb-6 font-bold text-accent">Specialties</h4>
                    <ul class="space-y-4 text-white/70">
                        @foreach(\App\Models\Service::orderBy('order')->take(5)->get() as $service)
                        <li class="flex items-center group"><span class="w-1.5 h-1.5 bg-accent rounded-full mr-3 group-hover:scale-150 transition-transform"></span>{{ $service->title }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-xl font-heading mb-6 font-bold text-accent">Visit Us</h4>
                    <div class="space-y-6 text-white/70 text-sm">
                        <div class="flex items-start">
                            <svg class="h-5 w-5 text-accent mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <span>{{ $settings['contact_address'] ?? '48/1 Satirpara, Narsingdi Sadar, Dhaka, Bangladesh.' }}</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="h-5 w-5 text-accent mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            <a href="tel:{{ str_replace([' ', '+'], '', $settings['contact_whatsapp'] ?? '8801352221279') }}" class="hover:text-accent transition-colors">{{ $settings['contact_whatsapp'] ?? '+8801352221279' }}</a>
                        </div>
                        <div class="flex items-start">
                            <svg class="h-5 w-5 text-accent mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            <a href="mailto:{{ $settings['contact_email'] ?? 'support@thpconstructions.com' }}" class="break-all hover:text-accent transition-colors">{{ $settings['contact_email'] ?? 'support@thpconstructions.com' }}</a>
                        </div>
                    </div>


                </div>
            </div>

            <div class="border-t border-white/10 mt-20 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-white/40">
                <p>&copy; {{ date('Y') }} {{ $settings['footer_copyright'] ?? 'THP Construction. All rights reserved. Designed for Excellence.' }}</p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ str_replace([' ', '+'], '', $settings['contact_whatsapp'] ?? '8801352221279') }}" target="_blank" 
       class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-2xl hover:scale-110 transition-transform active:scale-95 group">
        <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.48 5.228 3.48 8.404c0 6.556-5.332 11.888-11.888 11.888-2.015 0-3.991-.512-5.742-1.488l-6.241 1.613zm6.34-3.554c1.516.899 3.13 1.371 4.781 1.371 5.105 0 9.259-4.154 9.259-9.259 0-2.473-.962-4.798-2.709-6.545s-4.073-2.709-6.545-2.709c-5.105 0-9.26 4.153-9.26 9.259 0 1.761.503 3.479 1.454 4.974l-.953 3.478 3.573-.924zm11.397-5.071c-.265-.133-1.564-.772-1.806-.859-.241-.087-.417-.133-.591.133s-.673.859-.824 1.033-.306.191-.57.058c-.265-.133-1.118-.412-2.13-1.313-.788-.702-1.32-1.569-1.474-1.833-.153-.265-.016-.407.117-.539.12-.12.265-.306.398-.459.133-.153.177-.265.265-.441.087-.176.044-.331-.022-.463s-.591-1.424-.81-1.954c-.213-.517-.43-.447-.591-.455-.152-.008-.327-.009-.501-.009s-.459.066-.697.327c-.237.261-.904.883-.904 2.152s.924 2.496 1.053 2.67c.129.174 1.819 2.778 4.406 3.896.615.266 1.096.425 1.47.545.617.198 1.18.17 1.623.104.494-.074 1.564-.639 1.784-1.257s.22-.119.155-.228c-.066-.113-.241-.183-.506-.316z"/></svg>
        <span class="absolute right-full mr-4 bg-white text-primary px-4 py-2 rounded shadow-lg text-sm font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity">WhatsApp Pranto</span>
    </a>

    @if(($settings['popup_enabled'] ?? '0') == '1' && !empty($settings['popup_image']))
    <!-- Popup Banner -->
    <div x-data="{ 
            showPopup: false,
            init() {
                this.showPopup = true;
                // Auto-close after 10 seconds as requested
                setTimeout(() => {
                    this.showPopup = false;
                }, 10000);
            }
         }" 
         x-show="showPopup"
         x-cloak
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-primary/40 backdrop-blur-sm">
        
        <div class="relative max-w-2xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl lux-shadow transform transition-all border-4 border-accent/20">
            <!-- Close Button -->
            <button @click="showPopup = false" class="absolute top-4 right-4 z-10 bg-white/80 hover:bg-white text-primary p-2 rounded-full shadow-lg transition-all hover:rotate-90">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>

            <!-- Content -->
            <a href="{{ $settings['popup_link'] ?? '#' }}" class="block group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/' . $settings['popup_image']) }}" alt="Offer" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-8">
                        <span class="bg-accent text-white px-8 py-3 rounded-full font-bold tracking-widest uppercase text-sm shadow-xl transform translate-y-4 group-hover:translate-y-0 transition-transform">Learn More</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endif

    @yield('scripts')
</body>
</html>
