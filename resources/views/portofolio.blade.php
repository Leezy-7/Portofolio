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
            border-radius: 24px 24px 0 0;
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
                        Experiences
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
            <div class="w-40 h-40 glass-effect rounded-full mx-auto mb-8 flex items-center justify-center animate-float overflow-hidden">
                @if(isset($data['about']['profile_photo']) && $data['about']['profile_photo'])
                    <img src="{{ asset($data['about']['profile_photo']) }}" alt="{{ $data['about']['name'] }}" class="w-full h-full object-cover">
                @else
                    <svg class="w-20 h-20 text-electric-blue" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                @endif
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

    @include('sections.about-section')

    @include('sections.experience-section')

    @include('sections.project-section')

    @include('sections.contact-section')

    <!-- Footer with Social Links -->
    <footer class="bg-black border-t border-electric-blue/20 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-3xl font-bold mb-8 text-white">Social Media</h3>
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
                    <p class="text-gray-400 text-lg">&copy; 2025 {{ $data['about']['name'] }}. Crafted with passion and precision.</p>
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
