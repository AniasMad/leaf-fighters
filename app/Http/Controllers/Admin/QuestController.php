<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Quest;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Support\Facades\DB;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.quests.index');
        }

        $quests = Quest::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.quests.index')->with('quests', $quests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.quests.index');
        }
        return view('admin.quests.create');
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
            'type' => 'required|string|min:4|max:20',
            'reward' => 'required|integer|min:1|max:20',
            'image' => 'file|image',
        ];

        $messages = [
            'title.unique' => 'Quest title must be unique',
        ];

        $request->validate($rules, $messages);

        $quest = new Quest;
        $quest->title = $request->title;
        $quest->description = $request->description;
        $quest->type = $request->type;
        $quest->reward = $request->reward;

        // Store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $quest->image = $filename;
        }

        $quest->save();

        return redirect()->route('admin.quests.index')->with('status', 'Created a new Quest!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quest = Quest::findOrFail($id);

        return view('admin.quests.show')->with('quest', $quest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quest = Quest::findOrFail($id);
        return view('admin.quests.edit', [
            'quest' => $quest
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $quest = Quest::findOrFail($id);

        $rules = [
            'title' => 'required|string|unique:quests,title|min:2|max:40',
            'description' => 'required|string|min:5|max:200',
            'type' => 'required|string|min:4|max:20',
            'reward' => 'required|integer|min:1|max:20',
            'image' => 'file|image',
        ];

        $messages = [
            'title.unique' => 'Quest title must be unique',
        ];

        $request->validate($rules, $messages);

        $quest->title = $request->title;
        $quest->description = $request->description;
        $quest->type = $request->type;
        $quest->reward = $request->reward;

        if ($request->hasFile('image')) { // Update the image!
            // Upload new image
            $newImage = $request->file('image');
            $filename = date('Y-m-d-His') . '_' . $request->name . '.' . $newImage->getClientOriginalExtension();
            $newImage->storeAs('public/images/', $filename);
          
            if ($quest->image) { // Delete old image
                Storage::delete('public/images/' . $quest->image);
            }

            $quest->image = $filename;
        }

        $quest->save();

        return redirect()->route('admin.quests.index')->with('status', 'Quest updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quest = Quest::findOrFail($id);
        if ($quest->image) { // Delete old image
            Storage::delete('public/images/' . $quest->image);
        }
        $quest->delete();

        return redirect()->route('admin.quests.index')->with('status', 'Quest deleted successfully.');
    }

    public function complete(Request $request, Quest $quest)
    {
        $user = Auth::user();

            
        $user->quests()->updateExistingPivot($quest->id, ['status' => 'Completed']);

        return redirect()->back()->with('success', 'Quest completed successfully.');
    }
}
