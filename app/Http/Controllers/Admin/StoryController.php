<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Http\Controllers\Controller;
use Auth;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.stories.index');
        }

        $stories = Story::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.stories.index')->with('stories', $stories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.stories.index');
        }
        return view('admin.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.home');
        }
        // Validation rules
        $rules = [
            'title' => 'required|string|unique:quests,title|min:2|max:40',
            'description' => 'required|string|min:5|max:200',
            'numPage' => 'required|integer|min:1|max:100'
        ];

        $messages = [
            'title.unique' => 'Story title must be unique',
        ];

        $request->validate($rules, $messages);

        $story = new Story;
        $story->title = $request->title;
        $story->description = $request->description;
        $story->numPage = $request->numPage;

        $story->save();

        return redirect()->route('admin.stories.index')->with('status', 'Created a new Story!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $story = Story::findOrFail($id);

        return view('admin.stories.show')->with('story', $story);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $story = Story::findOrFail($id);
        return view('admin.stories.edit', [
            'story' => $story
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $story = Story::findOrFail($id);

        $rules = [
            'title' => 'required|string|unique:quests,title|min:2|max:40',
            'description' => 'required|string|min:5|max:200',
            'numPage' => 'required|integer|min:1|max:10'
        ];

        $messages = [
            'title.unique' => 'Story title must be unique',
        ];

        $request->validate($rules, $messages);

        $story->title = $request->title;
        $story->description = $request->description;
        $story->numPage = $request->numPage;

        $story->save();

        return redirect()->route('admin.stories.index')->with('status', 'Story updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $story = Story::findOrFail($id);
        $story->delete();

        return redirect()->route('admin.stories.index')->with('status', 'Story deleted successfully.');
    }
}
