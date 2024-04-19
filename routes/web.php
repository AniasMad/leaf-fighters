<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\QuestController as AdminQuestController;
use App\Http\Controllers\User\QuestController as UserQuestController;

use App\Http\Controllers\Admin\StoryController as AdminStoryController;

use App\Http\Controllers\Admin\StorySectionController as AdminStorySectionController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StoryGameController;

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

    Route::resource('/quests', AdminQuestController::class);
});

Route::get('/dashboard', function () {
    return redirect()->route('user.game');
});

// User Views
Route::get('/game', [GameController::class, 'index'])
    ->middleware(['auth', 'role:admin,user'])
    ->name('user.game');

Route::get('/questLog', [GameController::class, 'questLog'])
    ->middleware(['auth', 'role:admin,user'])
    ->name('user.questLog');

Route::post('/quests/{quest}/complete', [AdminQuestController::class, 'complete'])
    ->middleware(['auth', 'role:admin,user'])
    ->name('quests.complete');

Route::get('/storygame', [StoryGameController::class, 'index'])
    ->middleware(['auth', 'role:admin,user'])
    ->name('user.storygame');

Route::get('/stories/{story}', [StoryGameController::class, 'show'])
    ->middleware(['auth', 'role:admin,user'])
    ->name('user.storygameshow');

// Admin Views
Route::resource('/admin/quests', AdminQuestController::class)->middleware(['auth', 'role:admin'])->names('admin.quests');
Route::resource('/admin/stories', AdminStoryController::class)->middleware(['auth', 'role:admin'])->names('admin.stories');
Route::resource('/admin/storysections', AdminStorySectionController::class)->middleware(['auth', 'role:admin'])->names('admin.storysections');

require __DIR__.'/auth.php';
