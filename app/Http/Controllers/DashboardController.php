<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();

        if($user->hasRole('admin')){
            return view('admin.quests.index');
        }
        else {
            return view('user.game');
        }
    }
}
