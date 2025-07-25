<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - {{ $data['about']['name'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-left': 'slideLeft 0.8s ease-out',
                        'float': 'float 4s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    colors: {
                        'dark-blue': '#0f172a',
                        'navy': '#1e293b',
                        'electric-blue': '#3b82f6',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideLeft {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        @keyframes glow {
            from { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            to { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6); }
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #3b82f6 100%);
        }
        .dark-gradient {
            background: linear-gradient(135deg, #000000 0%, #1e293b 50%, #0f172a 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .experience-card {
            position: relative;
            background: linear-gradient(145deg, #1e293b, #0f172a);
            border: 1px solid rgba(59, 130, 246, 0.3);
        }
        .experience-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #60a5fa);
            border-radius: 12px 12px 0 0;
        }
    </style>
</head>
<body class="bg-black text-white">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-black/80 backdrop-blur-md z-50 border-b border-blue-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="text-2xl font-bold text-electric-blue animate-glow">Portfolio</div>
                <div class="hidden md:flex space-x-8">
                    <a href="#about" class="text-gray-300 hover:text-electric-blue transition-all duration-300 relative group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-electric-blue transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#experience" class="text-gray-300 hover:text-electric-blue transition-all duration-300 relative group">
                        Experience
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-electric-blue transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#projects" class="text-gray-300 hover:text-electric-blue transition-all duration-300 relative group">
                        Projects
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-electric-blue transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#contact" class="text-gray-300 hover:text-electric-blue transition-all duration-300 relative group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-electric-blue transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen gradient-bg flex items-center justify-center relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="text-center animate-fade-in relative z-10">
            <div class="w-40 h-40 glass-effect rounded-full mx-auto mb-8 flex items-center justify-center animate-float">
                <svg class="w-20 h-20 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </div>
            <h1 class="text-6xl md:text-8xl font-bold mb-6 bg-gradient-to-r from-white to-electric-blue bg-clip-text text-transparent">
                {{ $data['about']['name'] }}
            </h1>
            <p class="text-2xl md:text-3xl mb-12 text-blue-200">{{ $data['about']['title'] }}</p>
            <a href="#about" class="inline-block bg-electric-blue text-black px-10 py-4 rounded-full font-bold hover:bg-blue-400 transform hover:scale-110 transition-all duration-300 animate-glow">
                Explore My Work
            </a>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-electric-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

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
                                <span class="text-2xl font-bold text-electric-blue">5+</span>
                            </li>
                            <li class="flex items-center justify-between py-3 border-b border-gray-700">
                                <span class="flex items-center">
                                    <svg class="w-6 h-6 mr-4 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Projects Completed
                                </span>
                                <span class="text-2xl font-bold text-electric-blue">50+</span>
                            </li>
                            <li class="flex items-center justify-between py-3">
                                <span class="flex items-center">
                                    <svg class="w-6 h-6 mr-4 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Specialization
                                </span>
                                <span class="text-lg font-semibold text-electric-blue">Full Stack</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section - Linear Layout -->
    <section id="experience" class="py-24 bg-black relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-white mb-6">Professional Journey</h2>
                <div class="w-32 h-1 bg-electric-blue mx-auto mb-6"></div>
                <p class="text-xl text-blue-200">Building expertise through diverse challenges</p>
            </div>
            
            <!-- Linear Experience Layout -->
            <div class="space-y-8">
                @foreach($data['experiences'] as $index => $experience)
                <div class="experience-card p-8 rounded-2xl transform hover:scale-105 transition-all duration-500 animate-slide-up" style="animation-delay: {{ $index * 0.2 }}s">
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
                            <div class="inline-block bg-navy px-6 py-3 rounded-xl border border-electric-blue/30">
                                <p class="text-electric-blue font-bold text-lg">{{ $experience['period'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

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
                <div class="experience-card rounded-2xl overflow-hidden hover:scale-105 transform transition-all duration-500 animate-slide-up group">
                    <div class="relative overflow-hidden">
                        <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
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

    <!-- Contact Section -->
    <section id="contact" class="py-24 gradient-bg relative">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-5xl font-bold text-white mb-6">Let's Connect</h2>
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
                    <form class="space-y-6">
                        <div>
                            <input type="text" placeholder="Your Name" class="w-full px-6 py-4 bg-black/30 border border-electric-blue/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all duration-300">
                        </div>
                        <div>
                            <input type="email" placeholder="Your Email" class="w-full px-6 py-4 bg-black/30 border border-electric-blue/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-electric-blue focus:border-transparent transition-all duration-300">
                        </div>
                        <div>
                            <textarea rows="5" placeholder="Your Message" class="w-full px-6 py-4 bg-black/30 border border-electric-blue/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-electric-blue focus:border-transparent resize-none transition-all duration-300"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-electric-blue text-black py-4 rounded-xl font-bold hover:bg-blue-400 transform hover:scale-105 transition-all duration-300 animate-glow">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer with Social Links -->
    <footer class="bg-black border-t border-electric-blue/20 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-3xl font-bold mb-8 text-white">Let's Stay Connected</h3>
                <div class="flex justify-center space-x-8 mb-12">
                    <a href="{{ $data['social']['instagram'] }}" target="_blank" class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center hover:scale-110 transform transition-all duration-300 animate-glow">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.004 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.321-1.297C4.198 14.553 3.708 13.402 3.708 12.105s.49-2.448 1.42-3.321c.873-.807 2.024-1.297 3.321-1.297 1.297 0 2.448.49 3.321 1.297.93.873 1.42 2.024 1.42 3.321s-.49 2.448-1.42 3.586c-.873.807-2.024 1.297-3.321 1.297zm7.007-9.007H13.47c-.245 0-.49-.245-.49-.49V5.506c0-.245.245-.49.49-.49h1.986c.245 0 .49.245.49.49v1.985c0 .245-.245.49-.49.49zm1.985 9.007c-1.297 0-2.448-.49-3.321-1.297-.93-.873-1.42-2.024-1.42-3.586s.49-2.448 1.42-3.321c.873-.807 2.024-1.297 3.321-1.297s2.448.49 3.321 1.297c.93.873 1.42 2.024 1.42 3.321s-.49 2.448-1.42 3.586c-.873.807-2.024 1.297-3.321 1.297z"/>
                        </svg>
                    </a>
                    <a href="{{ $data['social']['whatsapp'] }}" target="_blank" class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center hover:scale-110 transform transition-all duration-300 animate-glow">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.570-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.686"/>
                        </svg>
                    </a>
                    <a href="{{ $data['social']['linkedin'] }}" target="_blank" class="w-16 h-16 bg-electric-blue rounded-full flex items-center justify-center hover:scale-110 transform transition-all duration-300 animate-glow">
                        <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
                <div class="border-t border-gray-700 pt-8">
                    <p class="text-gray-400 text-lg">&copy; 2024 {{ $data['about']['name'] }}. Crafted with passion and precision.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Enhanced scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-slide-up').forEach(section => {
            observer.observe(section);
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.gradient-bg');
            if (parallax) {
                const speed = scrolled * 0.5;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });
    </script>
</body>
</html>
