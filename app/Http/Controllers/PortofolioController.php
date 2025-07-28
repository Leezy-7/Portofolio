<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Contact;
use App\Models\SocialLink;

class PortofolioController extends Controller
{
    public function index()
    {
        // Get data from database or use fallback data if database is empty
        $about = About::first();
        $experiences = Experience::where('is_active', true)->orderBy('order')->get();
        $projects = Project::where('is_active', true)->orderBy('order')->get();
        $contact = Contact::first();
        $socialLinks = SocialLink::where('is_active', true)->get();

        // Create social links array for easier access in view
        $social = [];
        foreach ($socialLinks as $link) {
            $social[$link->platform] = $link->url;
        }

        // Fallback data if database is empty
        $data = [
            'about' => $about ? [
                'name' => $about->name,
                'title' => $about->title,
                'description' => $about->description,
                'skills' => $about->skills ?? [],
                'profile_photo' => $about->profile_photo
            ] : [
                'name' => 'Your Name',
                'title' => 'Full Stack Developer',
                'description' => 'Passionate developer with experience in creating innovative web solutions. I love turning complex problems into simple, beautiful and intuitive designs.',
                'skills' => ['PHP', 'Laravel', 'JavaScript', 'Vue.js', 'MySQL', 'TailwindCSS'],
                'profile_photo' => null
            ],
            'experiences' => $experiences->count() > 0 ? $experiences->toArray() : [
                [
                    'title' => 'Senior Developer',
                    'company' => 'Tech Company',
                    'period' => '2022 - Present',
                    'description' => 'Leading development team and building scalable web applications'
                ],
                [
                    'title' => 'Frontend Developer',
                    'company' => 'Digital Agency',
                    'period' => '2020 - 2022',
                    'description' => 'Developed responsive user interfaces and improved user experience'
                ],
                [
                    'title' => 'Junior Developer',
                    'company' => 'Startup',
                    'period' => '2019 - 2020',
                    'description' => 'Built web applications using modern frameworks and tools'
                ]
            ],
            'projects' => $projects->count() > 0 ? $projects->toArray() : [
                [
                    'title' => 'E-Commerce Platform',
                    'description' => 'Full-featured online shopping platform with payment integration',
                    'image' => 'https://via.placeholder.com/400x250/3B82F6/FFFFFF?text=E-Commerce',
                    'technologies' => ['Laravel', 'Vue.js', 'MySQL'],
                    'link' => '#'
                ],
                [
                    'title' => 'Task Management System',
                    'description' => 'Collaborative project management tool with real-time updates',
                    'image' => 'https://via.placeholder.com/400x250/1E40AF/FFFFFF?text=Task+Manager',
                    'technologies' => ['PHP', 'JavaScript', 'Bootstrap'],
                    'link' => '#'
                ],
                [
                    'title' => 'Portfolio Website',
                    'description' => 'Responsive portfolio website with modern design and animations',
                    'image' => 'https://via.placeholder.com/400x250/2563EB/FFFFFF?text=Portfolio',
                    'technologies' => ['Laravel', 'TailwindCSS', 'Alpine.js'],
                    'link' => '#'
                ]
            ],
            'contact' => $contact ? [
                'email' => $contact->email,
                'phone' => $contact->phone,
                'location' => $contact->location
            ] : [
                'email' => 'your.email@example.com',
                'phone' => '+62 123 456 7890',
                'location' => 'Indonesia'
            ],
            'social' => count($social) > 0 ? $social : [
                'instagram' => 'https://instagram.com/yourusername',
                'whatsapp' => 'https://wa.me/62123456789',
                'linkedin' => 'https://linkedin.com/in/yourusername'
            ]
        ];

        return view('portofolio', compact('data'));
    }
}
