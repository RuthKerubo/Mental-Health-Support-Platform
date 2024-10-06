<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('My Feedback') }}
                </h2>
                <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
            <a href="{{ route('resources.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Browse Resources</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($feedbacks->isEmpty())
                        <p class="text-center">You haven't provided any feedback yet.</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($feedbacks as $feedback)
                                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $feedback->resource->title }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                        Rating: {{ str_repeat('⭐', $feedback->rating) }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                        Emotional State: {{ ucfirst(str_replace('_', ' ', $feedback->emotional_state)) }}
                                    </p>
                                    <a href="{{ route('feedback.show', $feedback) }}" class="text-blue-500 hover:underline">View Details</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6">
                            {{ $feedbacks->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>