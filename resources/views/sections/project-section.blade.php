<!-- Projects Section -->
<section id="projects" class="py-24 bg-dark-blue">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-5xl font-bold text-white mb-6">Featured Projects</h2>
            <div class="w-32 h-1 bg-electric-blue mx-auto mb-6"></div>
            <p class="text-xl text-blue-200">Showcasing innovation through code</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($data['projects'] as $project)
            <div class="experience-card rounded-3xl overflow-hidden hover:scale-105 transform transition-all duration-500 animate-slide-up group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-white mb-4">{{ $project['title'] }}</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">{{ $project['description'] }}</p>
                    <div class="flex flex-wrap gap-3 mb-6">
                        @foreach($project['technologies'] as $tech)
                        <span class="bg-navy text-electric-blue px-4 py-2 rounded-full text-sm font-semibold border border-electric-blue/30">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <a href="{{ $project['link'] }}" class="inline-flex items-center text-electric-blue hover:text-blue-300 font-bold transition-colors duration-300 group">
                        View Project
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> 