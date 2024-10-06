<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Feedback Details') }}
                </h2>
                <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Feedback for: {{ $feedback->resource->title }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="mb-2"><strong>Rating:</strong> {{ str_repeat('⭐', $feedback->rating) }}</p>
                            <p class="mb-2"><strong>Emotional State:</strong> {{ ucfirst(str_replace('_', ' ', $feedback->emotional_state)) }}</p>
                            <p class="mb-2"><strong>Found Helpful:</strong> {{ $feedback->found_helpful ? 'Yes' : 'No' }}</p>
                            <p class="mb-2"><strong>Submitted Anonymously:</strong> {{ $feedback->is_anonymous ? 'Yes' : 'No' }}</p>
                        </div>
                        <div>
                            <p class="mb-2"><strong>Needs Follow-up:</strong> {{ $feedback->needs_follow_up ? 'Yes' : 'No' }}</p>
                            @if($feedback->needs_follow_up)
                                <p class="mb-2"><strong>Preferred Contact Method:</strong> {{ ucfirst($feedback->preferred_contact_method) }}</p>
                                <p class="mb-2"><strong>Contact Details:</strong> {{ $feedback->contact_details }}</p>
                            @endif
                            @if(!$feedback->is_anonymous)
                                <p class="mb-2"><strong>Contact Email:</strong> {{ $feedback->contact_email }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-md font-semibold mb-2">Comment:</h4>
                        <p class="bg-gray-100 dark:bg-gray-700 p-4 rounded">{{ $feedback->comment ?? 'No comment provided.' }}</p>
                    </div>
                    @if($feedback->attachments)
                        <div class="mt-6">
                            <h4 class="text-md font-semibold mb-2">Attachments:</h4>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach(json_decode($feedback->attachments) as $attachment)
                                    <div class="bg-gray-100 dark:bg-gray-700 p-2 rounded">
                                        <a href="{{ asset('storage/' . $attachment) }}" target="_blank" class="text-blue-500 hover:underline">
                                            View Attachment
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="mt-6 flex justify-between items-center">
                        <p class="text-sm text-gray-500">Submitted on: {{ $feedback->created_at->format('F j, Y, g:i a') }}</p>
                        <a href="{{ route('feedback.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Back to Feedback List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>