<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Contact;
use App\Models\SocialLink;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'about' => About::count(),
            'experiences' => Experience::count(),
            'projects' => Project::count(),
            'contact' => Contact::count(),
            'social_links' => SocialLink::count()
        ];
        
        return view('admin.dashboard', compact('stats'));
    }

    // About Management
    public function aboutIndex()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function aboutStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|string'
        ]);

        $skills = array_map('trim', explode(',', $request->skills));

        About::updateOrCreate(
            ['id' => 1],
            [
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'skills' => $skills
            ]
        );

        return redirect()->back()->with('success', 'About information updated successfully');
    }

    // Experience Management
    public function experienceIndex()
    {
        $experiences = Experience::orderBy('order')->get();
        return view('admin.experience.index', compact('experiences'));
    }

    public function experienceCreate()
    {
        return view('admin.experience.create');
    }

    public function experienceStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        Experience::create($request->all());

        return redirect()->route('admin.experience.index')->with('success', 'Experience added successfully');
    }

    public function experienceEdit(Experience $experience)
    {
        return view('admin.experience.edit', compact('experience'));
    }

    public function experienceUpdate(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $experience->update($request->all());

        return redirect()->route('admin.experience.index')->with('success', 'Experience updated successfully');
    }

    public function experienceDestroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('success', 'Experience deleted successfully');
    }

    // Project Management
    public function projectIndex()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.project.index', compact('projects'));
    }

    public function projectCreate()
    {
        return view('admin.project.create');
    }

    public function projectStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
            'technologies' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $technologies = array_map('trim', explode(',', $request->technologies));

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'technologies' => $technologies,
            'link' => $request->link,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Project added successfully');
    }

    public function projectEdit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    public function projectUpdate(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
            'technologies' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $technologies = array_map('trim', explode(',', $request->technologies));

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'technologies' => $technologies,
            'link' => $request->link,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Project updated successfully');
    }

    public function projectDestroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project deleted successfully');
    }

    // Contact Management
    public function contactIndex()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'location' => 'required|string'
        ]);

        Contact::updateOrCreate(
            ['id' => 1],
            $request->all()
        );

        return redirect()->back()->with('success', 'Contact information updated successfully');
    }

    // Social Links Management
    public function socialIndex()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social.index', compact('socialLinks'));
    }

    public function socialStore(Request $request)
    {
        $request->validate([
            'platform' => 'required|string',
            'url' => 'required|url',
            'is_active' => 'boolean'
        ]);

        SocialLink::create([
            'platform' => $request->platform,
            'url' => $request->url,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->back()->with('success', 'Social link added successfully');
    }

    public function socialUpdate(Request $request, SocialLink $socialLink)
    {
        $request->validate([
            'platform' => 'required|string',
            'url' => 'required|url',
            'is_active' => 'boolean'
        ]);

        $socialLink->update([
            'platform' => $request->platform,
            'url' => $request->url,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->back()->with('success', 'Social link updated successfully');
    }

    public function socialDestroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->back()->with('success', 'Social link deleted successfully');
    }
}
