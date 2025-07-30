@extends('admin.components.layout')

@section('title', 'About Management')
@section('page-title', 'About Management')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold">About Information</h3>
        <p class="text-gray-600 mt-1">Manage your personal information displayed on the portfolio</p>
    </div>
    
    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   value="{{ old('name', $about->name ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
            @if($about && $about->profile_photo)
                <div class="mb-3">
                    <img src="{{ asset($about->profile_photo) }}" alt="Current profile photo" class="w-32 h-32 object-cover rounded-full border">
                    <p class="text-sm text-gray-500 mt-1">Current photo</p>
                </div>
            @endif
            <input type="file" 
                   id="profile_photo" 
                   name="profile_photo" 
                   accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-gray-500 text-sm mt-1">Choose a profile photo (JPG, PNG, GIF) - leave empty to keep current</p>
            @error('profile_photo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Professional Title</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title', $about->title ?? '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   placeholder="e.g., Full Stack Developer"
                   required>
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea id="description" 
                      name="description" 
                      rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder="Tell visitors about yourself..."
                      required>{{ old('description', $about->description ?? '') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="skills" class="block text-sm font-medium text-gray-700 mb-2">Skills</label>
            <input type="text" 
                   id="skills" 
                   name="skills" 
                   value="{{ old('skills', $about && $about->skills ? implode(', ', $about->skills) : '') }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   placeholder="e.g., PHP, Laravel, JavaScript, Vue.js (comma separated)"
                   required>
            <p class="text-gray-500 text-sm mt-1">Separate skills with commas</p>
            @error('skills')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                {{ $about ? 'Update' : 'Save' }} About Information
            </button>
        </div>
    </form>
</div>
@endsection
