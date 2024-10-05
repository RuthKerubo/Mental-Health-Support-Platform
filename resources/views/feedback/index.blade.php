<!-- resources/views/feedback/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-8">My Feedback</h1>

    <div class="grid grid-cols-1 gap-6">
        @forelse ($feedbacks as $feedback)
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold">{{ $feedback->resource->title }}</h2>
                <p class="text-gray-700">{{ $feedback->comment }}</p>
                <p class="text-sm text-gray-500">Rating: {{ $feedback->rating }} stars</p>
                <p class="text-sm text-gray-500">Submitted on: {{ $feedback->created_at->format('M d, Y') }}</p>
            </div>
        @empty
            <p class="text-gray-500">You haven't submitted any feedback yet.</p>
        @endforelse
    </div>
</div>
@endsection
