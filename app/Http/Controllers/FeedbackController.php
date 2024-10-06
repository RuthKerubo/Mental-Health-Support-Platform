<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Resource;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('resource')->where('user_id', auth()->id())->latest()->paginate(10);
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')],
            ['title' => 'My Feedback', 'url' => null]
        ];
        return view('feedback.index', compact('feedbacks', 'breadcrumbs'));
    }

    public function create(Resource $resource)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')],
            ['title' => 'Resources', 'url' => route('resources.index')],
            ['title' => $resource->title, 'url' => route('resources.show', $resource)],
            ['title' => 'Give Feedback', 'url' => null]
        ];
        return view('feedback.create', compact('resource', 'breadcrumbs'));
    }

    public function store(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'emotional_state' => 'required|string',
            'comment' => 'nullable|string',
            'is_anonymous' => 'boolean',
            'contact_email' => 'nullable|email',
            'found_helpful' => 'boolean',
            'needs_follow_up' => 'boolean',
            'preferred_contact_method' => 'nullable|string',
            'contact_details' => 'nullable|string',
        ]);

        Feedback::create([
            'resource_id' => $resource->id,
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'emotional_state' => $validated['emotional_state'],
            'comment' => $validated['comment'] ?? null,
            'is_anonymous' => $validated['is_anonymous'] ?? true,
            'contact_email' => $validated['is_anonymous'] ? null : $validated['contact_email'],
            'found_helpful' => $validated['found_helpful'] ?? false,
            'needs_follow_up' => $validated['needs_follow_up'] ?? false,
            'preferred_contact_method' => $validated['preferred_contact_method'] ?? null,
            'contact_details' => $validated['contact_details'] ?? null,
        ]);

        return redirect()->route('resources.show', $resource)->with('success', 'Thank you for your feedback!');
    }

    public function show(Feedback $feedback)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')],
            ['title' => 'My Feedback', 'url' => route('feedback.index')],
            ['title' => 'Feedback Details', 'url' => null]
        ];
        return view('feedback.show', compact('feedback', 'breadcrumbs'));
    }
}