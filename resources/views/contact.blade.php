@extends('layouts.app')

@section('meta_title', 'Contact Us | Get a Free Consultation')

@section('content')
<section class="pt-40 pb-20 bg-primary text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl font-heading font-black mb-8">
            {!! str_replace('Together', '<span class="italic text-accent">Together</span>', e($settings['contact_title'] ?? 'Let\'s Build It Together')) !!}
        </h1>
        <p class="text-white/60 max-w-2xl mx-auto text-lg leading-relaxed">
            {{ $settings['contact_description'] ?? 'Have a project in mind? Reach out to start your journey towards a modern luxury home.' }}
        </p>
    </div>
</section>

<section class="py-32 bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact Info -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white p-12 lux-shadow">
                    <h3 class="text-2xl font-heading font-bold text-primary mb-8">Chat With Us</h3>
                    <div class="space-y-6">
                        <a href="https://wa.me/{{ str_replace([' ', '+'], '', $settings['contact_whatsapp'] ?? '8801625412437') }}" class="flex items-center group p-4 border border-light hover:border-accent transition-colors">
                            <div class="w-12 h-12 bg-[#25D366]/10 text-[#25D366] flex items-center justify-center rounded-full mr-4">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.48 5.228 3.48 8.404c0 6.556-5.332 11.888-11.888 11.888-2.015 0-3.991-.512-5.742-1.488l-6.241 1.613zm6.34-3.554c1.516.899 3.13 1.371 4.781 1.371 5.105 0 9.259-4.154 9.259-9.259 0-2.473-.962-4.798-2.709-6.545s-4.073-2.709-6.545-2.709c-5.105 0-9.26 4.153-9.26 9.259 0 1.761.503 3.479 1.454 4.974l-.953 3.478 3.573-.924zm11.397-5.071c-.265-.133-1.564-.772-1.806-.859-.241-.087-.417-.133-.591.133s-.673.859-.824 1.033-.306.191-.57.058c-.265-.133-1.118-.412-2.13-1.313-.788-.702-1.32-1.569-1.474-1.833-.153-.265-.016-.407.117-.539.12-.12.265-.306.398-.459.133-.153.177-.265.265-.441.087-.176.044-.331-.022-.463s-.591-1.424-.81-1.954c-.213-.517-.43-.447-.591-.455-.152-.008-.327-.009-.501-.009s-.459.066-.697.327c-.237.261-.904.883-.904 2.152s.924 2.496 1.053 2.67c.129.174 1.819 2.778 4.406 3.896.615.266 1.096.425 1.47.545.617.198 1.18.17 1.623.104.494-.074 1.564-.639 1.784-1.257s.22-.119.155-.228c-.066-.113-.241-.183-.506-.316z"/></svg>
                            </div>
                            <div>
                                <div class="text-xs uppercase tracking-widest text-darkText/40">WhatsApp</div>
                                <div class="text-lg font-bold text-primary italic">{{ $settings['contact_whatsapp'] ?? '+880 1625 412437' }}</div>
                            </div>
                        </a>
                        <div class="flex items-center p-4 border border-light">
                            <div class="w-12 h-12 bg-accent/10 text-accent flex items-center justify-center rounded-full mr-4">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <div class="text-xs uppercase tracking-widest text-darkText/40">Email Us</div>
                                <div class="text-lg font-bold text-primary italic">{{ $settings['contact_email'] ?? 'haqtasnim21@gmail.com' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Office -->
                <div class="bg-primary p-12 text-white">
                    <h4 class="text-xl font-heading font-bold text-accent mb-6">Our Studio</h4>
                    <p class="text-white/60 mb-8 leading-relaxed">
                        {!! nl2br(e($settings['contact_address'] ?? "48/1 Satirpara, Narsingdi Sadar, \nDhaka, Bangladesh.")) !!}
                    </p>
                    <div class="aspect-w-1 aspect-h-1 grayscale brightness-150">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116666.07590881144!2d90.627768!3d23.940523!2m3!1f0!2f3!1m3!1d3651.902422204561!2d90.71650837604675!3d23.92849508235223!2m3!1f0!2f3!1m3!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754326588a44b41%3A0xe530f2f53434685!2sNarsingdi!5e0!3m2!1sen!2sbd!4v1713597000000!5m2!1sen!2sbd" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:col-span-2 bg-white p-12 lg:p-20 lux-shadow">
                @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="text-[10px] font-bold uppercase tracking-widest text-primary mb-3 block">Full Name</label>
                            <input type="text" name="name" required class="w-full bg-light border-0 px-6 py-4 focus:ring-2 focus:ring-accent outline-none transition-all">
                        </div>
                        <div>
                            <label class="text-[10px] font-bold uppercase tracking-widest text-primary mb-3 block">Phone Number</label>
                            <input type="text" name="phone" required class="w-full bg-light border-0 px-6 py-4 focus:ring-2 focus:ring-accent outline-none transition-all">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="text-[10px] font-bold uppercase tracking-widest text-primary mb-3 block">Email Address</label>
                            <input type="email" name="email" class="w-full bg-light border-0 px-6 py-4 focus:ring-2 focus:ring-accent outline-none transition-all">
                        </div>
                        <div>
                            <label class="text-[10px] font-bold uppercase tracking-widest text-primary mb-3 block">Interested Service</label>
                            <select name="service_type" class="w-full bg-light border-0 px-6 py-4 focus:ring-2 focus:ring-accent outline-none transition-all">
                                <option value="">Select a Service</option>
                                <option value="Duplex House">Duplex House</option>
                                <option value="Apartment Bldg">Apartment Bldg</option>
                                <option value="Interior Design">Interior Design</option>
                                <option value="Renovation">Renovation</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-widest text-primary mb-3 block">Project Vision</label>
                        <textarea name="message" rows="6" required class="w-full bg-light border-0 px-6 py-4 focus:ring-2 focus:ring-accent outline-none transition-all"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-primary text-white font-bold tracking-[0.3em] uppercase py-6 hover:bg-accent transition-all duration-500 shadow-xl group">
                        Send Inquiry
                        <svg class="inline-block ml-2 h-5 w-5 transform group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
