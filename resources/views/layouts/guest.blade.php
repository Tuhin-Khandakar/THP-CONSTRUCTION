<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#1a2744',
                            accent: '#c9a84c',
                        }
                    }
                }
            }
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@700;900&display=swap');
            body { font-family: 'DM Sans', sans-serif; }
            .font-heading { font-family: 'Playfair Display', serif; }
        </style>
    </head>
    <body class="text-gray-900 antialiased bg-[#f8f5ef]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-8 text-center">
                <a href="/" class="flex flex-col items-center">
                    @php $settings = \App\Models\Setting::all()->pluck('value', 'key'); @endphp
                    @if(isset($settings['site_logo']) && $settings['site_logo'])
                        <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo" class="h-16 w-auto">
                    @else
                        <span class="text-4xl font-heading font-black text-primary tracking-tighter">THP</span>
                        <span class="text-[10px] tracking-[0.4em] font-bold text-accent uppercase">Construction</span>
                    @endif
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-100">
                <h2 class="text-2xl font-heading font-bold text-primary mb-6 text-center">Admin Login</h2>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
