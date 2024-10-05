@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-8">Mental Health Resources</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($resources as $resource)
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $resource->title }}</h2>
                <p class="text-gray-700">{{ $resource->description }}</p>
                
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm text-gray-500">Published: {{ $resource->published_at->format('M d, Y') }}</span>
                    <a href="{{ route('resources.show', $resource->slug) }}" class="text-blue-600 hover:underline">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
