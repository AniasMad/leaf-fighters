<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\QuestController as AdminQuestController;
use App\Http\Controllers\User\QuestController as UserQuestController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Quest routes

    Route::resource('/quests', QuestController::class);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::resource('/quests', UserQuestController::class)->middleware(['auth', 'role:user,admin'])->names('user.quests')->only(['index', 'show']);
Route::resource('/admin/quests', AdminQuestController::class)->middleware(['auth', 'role:admin'])->names('admin.quests');

require __DIR__.'/auth.php';
