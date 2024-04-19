<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Quest;
use Illuminate\Support\Facades\Storage;
use Auth;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $quests = $user->quests()->where('status', '!=', 'Completed')->orderBy('created_at', 'desc')->paginate(8);

        return view('user.game')->with('quests', $quests);
    }

    public function questLog()
    {
        $user = Auth::user();

        $quests = $user->quests()->where('status', '=', 'Completed')->orderBy('created_at', 'desc')->paginate(8);

        return view('user.questLog')->with('quests', $quests);
    }
}
