@extends('admin.layout')

@section('title', 'Project Management')
@section('page-title', 'Project Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h3 class="text-lg font-semibold">Portfolio Projects</h3>
        <p class="text-gray-600">Manage your project portfolio</p>
    </div>
    <a href="{{ route('admin.project.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
        Add Project
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            @foreach($projects as $project)
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ $project->image }}" 
                         alt="{{ $project->title }}"
                         class="w-full h-48 object-cover">
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-semibold text-gray-900">{{ $project->title }}</h4>
                        <span class="px-2 py-1 text-xs rounded-full {{ $project->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $project->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $project->description }}</p>
                    <div class="flex flex-wrap gap-1 mb-3">
                        @foreach($project->technologies as $tech)
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">{{ $tech }}</span>
                        @endforeach
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-500">Order: {{ $project->order }}</span>
                        <div class="space-x-2">
                            <a href="{{ route('admin.project.edit', $project) }}" 
                               class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('admin.project.destroy', $project) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No projects</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by adding your first project.</p>
            <div class="mt-6">
                <a href="{{ route('admin.project.create') }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    Add Project
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
