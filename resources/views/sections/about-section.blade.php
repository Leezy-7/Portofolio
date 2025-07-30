<!-- About Section -->
<section id="about" class="py-24 bg-dark-blue relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-white mb-6 animate-slide-up">About Me</h2>
            <div class="w-32 h-1 bg-electric-blue mx-auto mb-6"></div>
            <p class="text-xl text-blue-200 max-w-3xl mx-auto">Crafting digital experiences with precision and passion</p>
        </div>
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="animate-slide-up">
                <p class="text-lg text-gray-300 mb-8 leading-relaxed">{{ $data['about']['description'] }}</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($data['about']['skills'] as $skill)
                    <div class="bg-navy text-electric-blue px-6 py-3 rounded-xl text-center font-semibold hover:bg-electric-blue hover:text-black transition-all duration-300 transform hover:scale-105 border border-electric-blue/30">
                        {{ $skill }}
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="animate-slide-left">
                <div class="experience-card p-8 rounded-2xl text-white">
                    <h3 class="text-3xl font-bold mb-6 text-electric-blue">Professional Stats</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between py-3 border-b border-gray-700">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-4 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Years Experience
                            </span>
                            <span class="text-2xl font-bold text-electric-blue">2+</span>
                        </li>
                        <li class="flex items-center justify-between py-3 border-b border-gray-700">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-4 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Projects Completed
                            </span>
                            <span class="text-2xl font-bold text-electric-blue">10+</span>
                        </li>
                        <li class="flex items-center justify-between py-3">
                            <span class="flex items-center">
                                <svg class="w-6 h-6 mr-4 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Specialization
                            </span>
                            <span class="text-lg font-semibold text-electric-blue">Front-End</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> 