<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Resource;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Resource $resource)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'emotional_state' => 'required|string',
            'comment' => 'nullable|string',
            'is_anonymous' => 'boolean',
            'contact_email' => 'nullable|email',
            'found_helpful' => 'boolean',
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
        ]);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
