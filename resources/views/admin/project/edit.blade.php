@extends('admin.components.layout')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold">Edit Portfolio Project</h3>
                <p class="text-gray-600 mt-1">Update your project information</p>
            </div>
            <a href="{{ route('admin.project.index') }}" 
               class="text-gray-600 hover:text-gray-800">
                ← Back to Projects
            </a>
        </div>
    </div>
    
    <form action="{{ route('admin.project.update', $project) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Project Title</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $project->title) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="e.g., E-Commerce Platform"
                       required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="link" class="block text-sm font-medium text-gray-700 mb-2">Project Link</label>
                <input type="url" 
                       id="link" 
                       name="link" 
                       value="{{ old('link', $project->link) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="https://example.com">
                @error('link')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea id="description" 
                      name="description" 
                      rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder="Describe your project..."
                      required>{{ old('description', $project->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Project Image</label>
            @if($project->image)
                <div class="mb-3">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }} project image" class="w-32 h-32 object-cover rounded-lg border">
                    <p class="text-sm text-gray-500 mt-1">Current image</p>
                </div>
            @endif
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-gray-500 text-sm mt-1">Choose a new image file to replace current image (JPG, PNG, GIF) - leave empty to keep current</p>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="technologies" class="block text-sm font-medium text-gray-700 mb-2">Technologies Used</label>
            <input type="text" 
                   id="technologies" 
                   name="technologies" 
                   value="{{ old('technologies', implode(', ', $project->technologies)) }}"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   placeholder="e.g., Laravel, Vue.js, MySQL, TailwindCSS"
                   required>
            <p class="text-gray-500 text-sm mt-1">Separate technologies with commas</p>
            @error('technologies')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                <input type="number" 
                       id="order" 
                       name="order" 
                       value="{{ old('order', $project->order) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="0">
                <p class="text-gray-500 text-sm mt-1">Lower numbers appear first</p>
                @error('order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-end">
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1"
                           {{ old('is_active', $project->is_active) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Active (display on portfolio)</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.project.index') }}" 
               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Update Project
            </button>
        </div>
    </form>
</div>
@endsection
