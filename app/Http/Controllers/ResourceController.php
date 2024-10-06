<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Resource::query();

        // Search functionality
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
        }

        // Category filter (if you have categories)
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $resources = $query->latest()->paginate(16);
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')],
            ['title' => 'Resources', 'url' => null]
        ];
    
        return view('resources.index', compact('resources', 'breadcrumbs'));
    }

       

     /**
     * Display the specified resource.
     */
   
    public function show(Resource $resource)
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => route('dashboard')],
            ['title' => 'Resources', 'url' => route('resources.index')],
            ['title' => $resource->title, 'url' => null]
        ];
    
        return view('resources.show', compact('resource', 'breadcrumbs'));
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
    public function store(Request $request)
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
