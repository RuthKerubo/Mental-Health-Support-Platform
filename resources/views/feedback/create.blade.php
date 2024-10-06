<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Give Feedback') }}
                </h2>
                <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('feedback.store', $resource) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ str_repeat('⭐', $i) }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="emotional_state" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Emotional State</label>
                            <select name="emotional_state" id="emotional_state" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="very_positive">😄 Very Positive</option>
                                <option value="positive">🙂 Positive</option>
                                <option value="neutral">😐 Neutral</option>
                                <option value="negative">🙁 Negative</option>
                                <option value="very_negative">😢 Very Negative</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comment</label>
                            <textarea name="comment" id="comment" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="found_helpful" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">I found this resource helpful</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="is_anonymous" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Submit anonymously</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="contact_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Email (optional)</label>
                            <input type="email" name="contact_email" id="contact_email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="needs_follow_up" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">I would like a follow-up</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="preferred_contact_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preferred Contact Method</label>
                            <select name="preferred_contact_method" id="preferred_contact_method" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="contact_details" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contact Details</label>
                            <input type="text" name="contact_details" id="contact_details" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Submit Feedback
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>