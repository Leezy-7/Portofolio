@extends('admin.components.layout')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6 mb-8">
    <a href="{{ route('admin.about.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow cursor-pointer">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">About</p>
                <p class="text-lg font-semibold">{{ $stats['about'] }}</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.experience.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow cursor-pointer">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6M8 6v-.5m8 .5V6M8 6H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V8a2 2 0 00-2-2h-2"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Experiences</p>
                <p class="text-lg font-semibold">{{ $stats['experiences'] }}</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.project.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow cursor-pointer">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Projects</p>
                <p class="text-lg font-semibold">{{ $stats['projects'] }}</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.contact.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow cursor-pointer">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Contact</p>
                <p class="text-lg font-semibold">{{ $stats['contact'] }}</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.contact.messages') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow cursor-pointer">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Messages</p>
                <p class="text-lg font-semibold">{{ $stats['messages'] ?? 0 }}</p>
            </div>
        </div>
    </a>

    <a href="{{ route('admin.social.index') }}" class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow cursor-pointer">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-500">Social Links</p>
                <p class="text-lg font-semibold">{{ $stats['social_links'] }}</p>
            </div>
        </div>
    </a>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Quick Actions</h3>
        </div>
        <div class="p-6 space-y-4">
            <a href="{{ route('admin.about.index') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span>Update About Information</span>
                </div>
            </a>
            
            <a href="{{ route('admin.experience.create') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Add New Experience</span>
                </div>
            </a>
            
            <a href="{{ route('admin.project.create') }}" class="block p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    <span>Add New Project</span>
                </div>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">System Info</h3>
        </div>
        <div class="p-6">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-500">Laravel Version:</span>
                    <span class="font-medium">{{ app()->version() }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">PHP Version:</span>
                    <span class="font-medium">{{ phpversion() }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Environment:</span>
                    <span class="font-medium">{{ app()->environment() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
