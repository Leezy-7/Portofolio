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
            'skills' => 'required|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $skills = array_map('trim', explode(',', $request->skills));

        $about = About::firstOrNew(['id' => 1]);
        
        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($about->profile_photo && file_exists(public_path($about->profile_photo))) {
                unlink(public_path($about->profile_photo));
            }
            
            $image = $request->file('profile_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $about->profile_photo = 'image/' . $imageName;
        }

        $about->name = $request->name;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->skills = $skills;
        $about->save();

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $technologies = array_map('trim', explode(',', $request->technologies));

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $imagePath = 'image/' . $imageName;
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        $technologies = array_map('trim', explode(',', $request->technologies));

        // Handle file upload
        $imagePath = $project->image; // Keep current image if no new upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $imagePath = 'image/' . $imageName;
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
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
