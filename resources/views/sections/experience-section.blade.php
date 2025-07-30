<!-- Experience Section - Linear Layout -->
<section id="experience" class="py-24 bg-black relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-white mb-6">Professional Journey</h2>
            <div class="w-32 h-1 bg-electric-blue mx-auto mb-6"></div>
            <p class="text-xl text-blue-200">Building expertise through diverse challenges</p>
        </div>
        
        <!-- Experience Layout -->
        <div class="space-y-8">
            @foreach($data['experiences'] as $index => $experience)
            <div class="experience-card p-8 rounded-3xl transform hover:scale-105 transition-all duration-500 animate-slide-up" style="animation-delay: {{ $index * 0.2 }}s">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex-1 mb-6 md:mb-0">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-electric-blue rounded-full flex items-center justify-center mr-4">
                                <span class="text-black font-bold text-lg">{{ $index + 1 }}</span>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-1">{{ $experience['title'] }}</h3>
                                <p class="text-electric-blue font-semibold text-lg">{{ $experience['company'] }}</p>
                            </div>
                        </div>
                        <p class="text-gray-300 text-lg leading-relaxed">{{ $experience['description'] }}</p>
                    </div>
                    <div class="md:ml-8 md:text-right">
                        <div class="inline-block bg-navy px-6 py-3 rounded-2xl border border-electric-blue/30">
                            <p class="text-electric-blue font-bold text-lg">{{ $experience['period'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> 