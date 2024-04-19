<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $home = 'home';

        if($user->hasRole('admin'))
        {
            $home = 'admin.quests.index';
        }
        else if($user->hasRole('user')){
            $home = 'user.game';
        }
        return view($home);
    }
}
