@extends('admin.components.layout')

@section('title', 'Social Links Management')
@section('page-title', 'Social Links Management')

@section('content')
<div class="space-y-8">
    <!-- Add New Social Link -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Add Social Link</h3>
            <p class="text-gray-600 mt-1">Add a new social media profile link</p>
        </div>
        
        <form action="{{ route('admin.social.store') }}" method="POST" class="p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="platform" class="block text-sm font-medium text-gray-700 mb-2">Platform</label>
                    <select id="platform" 
                            name="platform" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            required>
                        <option value="">Select Platform</option>
                        <option value="instagram" {{ old('platform') == 'instagram' ? 'selected' : '' }}>Instagram</option>
                        <option value="whatsapp" {{ old('platform') == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                        <option value="linkedin" {{ old('platform') == 'linkedin' ? 'selected' : '' }}>LinkedIn</option>
                        <option value="github" {{ old('platform') == 'github' ? 'selected' : '' }}>GitHub</option>
                        <option value="twitter" {{ old('platform') == 'twitter' ? 'selected' : '' }}>Twitter</option>
                        <option value="facebook" {{ old('platform') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                        <option value="youtube" {{ old('platform') == 'youtube' ? 'selected' : '' }}>YouTube</option>
                        <option value="behance" {{ old('platform') == 'behance' ? 'selected' : '' }}>Behance</option>
                        <option value="dribbble" {{ old('platform') == 'dribbble' ? 'selected' : '' }}>Dribbble</option>
                    </select>
                    @error('platform')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                    <input type="url" 
                           id="url" 
                           name="url" 
                           value="{{ old('url') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="https://..."
                           required>
                    @error('url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-end space-x-4">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1"
                               {{ old('is_active', true) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                    <button type="submit" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Add Link
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Existing Social Links -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Social Links</h3>
            <p class="text-gray-600 mt-1">Manage your social media profile links</p>
        </div>
        
        @if($socialLinks->count() > 0)
            <div class="divide-y divide-gray-200">
                @foreach($socialLinks as $link)
                <div class="p-6">
                    <form action="{{ route('admin.social.update', $link) }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Platform</label>
                            <select name="platform" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    required>
                                <option value="instagram" {{ $link->platform == 'instagram' ? 'selected' : '' }}>Instagram</option>
                                <option value="whatsapp" {{ $link->platform == 'whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                                <option value="linkedin" {{ $link->platform == 'linkedin' ? 'selected' : '' }}>LinkedIn</option>
                                <option value="github" {{ $link->platform == 'github' ? 'selected' : '' }}>GitHub</option>
                                <option value="twitter" {{ $link->platform == 'twitter' ? 'selected' : '' }}>Twitter</option>
                                <option value="facebook" {{ $link->platform == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="youtube" {{ $link->platform == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                <option value="behance" {{ $link->platform == 'behance' ? 'selected' : '' }}>Behance</option>
                                <option value="dribbble" {{ $link->platform == 'dribbble' ? 'selected' : '' }}>Dribbble</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                            <input type="url" 
                                   name="url" 
                                   value="{{ $link->url }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   required>
                        </div>

                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_active" 
                                       value="1"
                                       {{ $link->is_active ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Active</span>
                            </label>
                        </div>

                        <div class="flex space-x-2">
                            <button type="submit" 
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                                Update
                            </button>
                            <button type="button" 
                                    onclick="document.getElementById('delete-form-{{ $link->id }}').submit()"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors text-sm">
                                Delete
                            </button>
                        </div>
                    </form>
                    
                    <form id="delete-form-{{ $link->id }}" 
                          action="{{ route('admin.social.destroy', $link) }}" 
                          method="POST" 
                          class="hidden"
                          onsubmit="return confirm('Are you sure you want to delete this social link?')">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No social links</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by adding your first social media link above.</p>
            </div>
        @endif
    </div>
</div>
@endsection
