<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\StorySection;
use Illuminate\Support\Facades\Storage;

class StoryGameController extends Controller
{
    public function index()
    {
        $stories = Story::all();

        return view('user.storygame')->with('stories', $stories);
    }

    public function show(Story $story)
    {
        $sections = $story->sections()->orderBy('order')->get();

        return view('user.storygameshow', compact('story', 'sections'));
    }
}
