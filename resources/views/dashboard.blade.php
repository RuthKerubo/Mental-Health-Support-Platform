<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Welcome Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg col-span-full">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Welcome back, {{ Auth::user()->name }}!</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">How are you feeling today?</p>
                        <div class="mt-4 flex space-x-4">
                            <button class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600">😊 Good</button>
                            <button class="px-4 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600">😐 Okay</button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600">😔 Not Great</button>
                        </div>
                    </div>
                </div>

                <!-- Quick Access -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Quick Access</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('resources.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Browse Resources</a></li>
                            <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Join a Support Group</a></li>
                            <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Schedule a Consultation</a></li>
                            <li><a href="{{ route('feedback.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">My Feedback</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Mood Tracker -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Mood Tracker</h3>
                        <div class="h-48 bg-gray-200 dark:bg-gray-700 rounded-lg">
                            <!-- Placeholder for mood graph -->
                            <p class="text-center py-20 text-gray-500 dark:text-gray-400">Mood graph will be displayed here</p>
                        </div>
                    </div>
                </div>

                <!-- Recommended Resources -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Recommended Resources</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Stress Management Techniques</a></li>
                            <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Mindfulness Exercises</a></li>
                            <li><a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">Sleep Improvement Guide</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Upcoming Events</h3>
                        <ul class="space-y-2">
                            <li class="flex justify-between"><span>Meditation Workshop</span><span class="text-gray-500 dark:text-gray-400">Tomorrow, 3 PM</span></li>
                            <li class="flex justify-between"><span>Anxiety Support Group</span><span class="text-gray-500 dark:text-gray-400">Friday, 6 PM</span></li>
                        </ul>
                    </div>
                </div>

                <!-- Help Center -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Help Center</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Need immediate assistance?</p>
                        <a href="#" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Contact Helpline</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>