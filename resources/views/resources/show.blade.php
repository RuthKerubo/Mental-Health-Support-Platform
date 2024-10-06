<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $resource->title }}
            <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($resource->image_path)
                        <img src="{{ asset('storage/' . $resource->image_path) }}" alt="{{ $resource->title }}" class="w-full h-64 object-cover mb-6">
                    @endif
                    <h1 class="text-3xl font-bold mb-4">{{ $resource->title }}</h1>
                    <p class="mb-4">{{ $resource->description }}</p>
                    @if($resource->file_path)
                        <a href="{{ asset('storage/' . $resource->file_path) }}" download class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Download Resource
                        </a>
                    @endif
                    <!-- Add more details as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>