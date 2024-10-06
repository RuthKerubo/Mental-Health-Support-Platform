<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Resources') }}
                <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
            </h2>
            <form action="{{ route('resources.index') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Search..."
                    class="px-3 py-1 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    value="{{ request('search') }}">
                <button type="submit"
                    class="px-3 py-1 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($resources as $resource)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
                                <div
                                    class="h-40 bg-gray-200 dark:bg-gray-600 flex items-center justify-center overflow-hidden">
                                    @if($resource->image_path)
                                        <img src="{{ asset('storage/' . $resource->image_path) }}" alt="{{ $resource->title }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                                <div class="p-4 flex-grow">
                                    <h3 class="text-lg font-semibold mb-2 truncate">{{ $resource->title }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">
                                        {{ $resource->description }}
                                    </p>
                                </div>
                                <div class="px-4 pb-4 mt-auto">
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('resources.show', $resource) }}"
                                            class="text-sm text-blue-500 hover:underline">View Details</a>
                                        <div class="flex justify-between items-center">
                                            @if($resource->file_path)
                                                <a href="{{ asset('storage/' . $resource->file_path) }}" download
                                                    class="text-sm px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 flex-grow mr-2">
                                                    Download
                                                </a>
                                            @endif
                                            <a href="{{ route('feedback.create', $resource) }}"
                                                class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 flex-grow text-center">
                                                Give Feedback
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>