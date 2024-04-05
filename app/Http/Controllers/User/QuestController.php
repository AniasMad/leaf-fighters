<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quest;
use Auth;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quests = Quest::paginate(10);
        return view('user.quests.index')->with('quests', $quests);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quest = Quest::findOrFail($id);

        return view('user.quests.show')->with('quest', $quest);
    }
}
