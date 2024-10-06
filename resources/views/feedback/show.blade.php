<x-app-layout>

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $resource->title }}</h1>
        
        <p class="text-gray-700 mb-4">{{ $resource->description }}</p>
        
        <p class="text-sm text-gray-500">Published: {{ $resource->published_at->format('M d, Y') }}</p>
        
        <!-- Feedback Section -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Leave Feedback</h2>
            <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="resource_id" value="{{ $resource->id }}">

                <div>
                    <label for="rating" class="block text-sm font-medium">Rating</label>
                    <select id="rating" name="rating" class="w-full p-2 border rounded">
                        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                        <option value="4">⭐⭐⭐⭐ Very Good</option>
                        <option value="3">⭐⭐⭐ Good</option>
                        <option value="2">⭐⭐ Fair</option>
                        <option value="1">⭐ Poor</option>
                    </select>
                </div>

                <div>
                    <label for="comment" class="block text-sm font-medium">Your Feedback</label>
                    <textarea id="comment" name="comment" rows="4" class="w-full p-2 border rounded"></textarea>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Submit Feedback
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

</x-app-layout>
