<!-- Contact Section -->
<section id="contact" class="py-24 gradient-bg relative">
    <div class="absolute inset-0 bg-black/30"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        @if(session('success'))
            <div class="bg-green-500 text-white px-6 py-4 rounded-xl mb-8 text-center animate-fade-in">
                {{ session('success') }}
            </div>
        @endif
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-white mb-6">Contact</h2>
            <div class="w-32 h-1 bg-white mx-auto mb-6"></div>
            <p class="text-xl text-blue-200">Ready to bring your ideas to life?</p>
        </div>
        <div class="grid md:grid-cols-2 gap-16">
            <div class="space-y-8">
                <div class="flex items-center space-x-6 p-6 glass-effect rounded-2xl">
                    <div class="w-16 h-16 bg-electric-blue rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Email</h3>
                        <p class="text-blue-200 text-lg">{{ $data['contact']['email'] }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6 p-6 glass-effect rounded-2xl">
                    <div class="w-16 h-16 bg-electric-blue rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Phone</h3>
                        <p class="text-blue-200 text-lg">{{ $data['contact']['phone'] }}</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6 p-6 glass-effect rounded-2xl">
                    <div class="w-16 h-16 bg-electric-blue rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">Location</h3>
                        <p class="text-blue-200 text-lg">{{ $data['contact']['location'] }}</p>
                    </div>
                </div>
            </div>
            <div class="glass-effect p-8 rounded-2xl">
                <form action="{{ route('contact.message.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <input type="text" name="name" placeholder="Your Name" class="w-full px-6 py-4 bg-black/30 border border-electric-blue/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all duration-300" required>
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Your Email" class="w-full px-6 py-4 bg-black/30 border border-electric-blue/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all duration-300" required>
                    </div>
                    <div>
                        <textarea name="message" rows="5" placeholder="Your Message" class="w-full px-6 py-4 bg-black/30 border border-electric-blue/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-electric-blue focus:border-transparent resize-none transition-all duration-300" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-electric-blue text-black py-4 rounded-xl font-bold hover:bg-blue-400 transform hover:scale-105 transition-all duration-300 animate-glow">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section> 