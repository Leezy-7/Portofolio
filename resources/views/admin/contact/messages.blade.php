@extends('admin.components.layout')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200">
        <h3 class="text-lg font-semibold">Contact Messages</h3>
        <p class="text-gray-600 mt-1">Manage messages from your portfolio contact form</p>
    </div>
    
    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($messages->count() > 0)
            <div class="space-y-4">
                @foreach($messages as $message)
                <div class="border border-gray-200 rounded-lg p-6 {{ $message->is_read ? 'bg-gray-50' : 'bg-blue-50 border-blue-200' }}">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-2">
                                <h4 class="text-lg font-semibold text-gray-900">{{ $message->name }}</h4>
                                @if(!$message->is_read)
                                    <span class="bg-blue-500 text-white text-xs px-2 py-1 rounded-full">New</span>
                                @endif
                            </div>
                            <p class="text-gray-600">{{ $message->email }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ $message->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                        <div class="flex space-x-2">
                            @if(!$message->is_read)
                                <form action="{{ route('admin.contact.messages.read', $message->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600 transition-colors">
                                        Mark as Read
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('admin.contact.messages.destroy', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded border">
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $message->message }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No messages yet</h3>
                <p class="text-gray-500">Messages from your portfolio contact form will appear here.</p>
            </div>
        @endif
    </div>
</div>
@endsection 