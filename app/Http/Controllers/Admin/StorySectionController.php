<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\StorySection;
use App\Models\Story;
use App\Http\Controllers\Controller;
use Auth;

class StorySectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.storysections.index');
        }

        $storysections = StorySection::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.storysections.index', [
            'storysections' => $storysections 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.storysections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'story_id' => 'required|exists:stories,id',
            'text' => 'required|string|min:5|max:500',
            'image' => 'file|image',
            'order' => 'required|integer|min:1|max:200'          
        ];

        $request->validate($rules);

        $storysection = new StorySection;
        $storysection->story_id = $request->story_id;
        $storysection->text = $request->text;
        $storysection->order = $request->order;

        // Store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $storysection->image = $filename;
        }

        $storysection->save();

        return redirect()->route('admin.storysections.index')->with('status', 'Created a new Story Section!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $storysection = StorySection::findOrFail($id);
        return view('admin.storysections.show', [
            'storysection' => $storysection
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $storysection = StorySection::findOrFail($id);
        $stories = Story::all();
        return view('admin.storysections.edit', [
            'storysection' => $storysection,
            'stories' => $stories
        ]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $storysection = StorySection::findOrFail($id);

        $rules = [
            'story_id' => 'required|exists:stories,id',
            'text' => 'required|string|min:5|max:500',
            'image' => 'file|image',
            'order' => 'required|integer|min:1|max:200'  
        ];

        $request->validate($rules);

        $storysection->story_id = $request->story_id;
        $storysection->text = $request->text;
        $storysection->order = $request->order;

        if ($request->hasFile('image')) { // Update the image!
            // Upload new image
            $newImage = $request->file('image');
            $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/images/', $filename);
          
            if ($storysection->image) { // Delete old image
                Storage::delete('public/images/' . $storysection->image);
            }

            $storysection->image = $filename;
        }

        $storysection->save();

        return redirect()->route('admin.storysections.index')->with('status', 'Story Section updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storysection = StorySection::findOrFail($id);
        if ($storysection->image) { // Delete old image
            Storage::delete('public/images/' . $storysection->image);
        }
        $storysection->delete();

        return redirect()->route('admin.storysections.index')->with('status', 'Story Section deleted successfully.');
    }
}
