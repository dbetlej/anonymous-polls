<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group( function() {
    Route::resource('polls', PollController::class)->except(['store', 'update', 'show']);
    Route::get('questions/create/{poll}', [QuestionController::class, 'create'])->name('questions.create');
    Route::get('questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
//    Route::resource('questions', QuestionController::class)->except(['store', 'update', 'show']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('polls', [PollController::class, 'index'])->name('polls.index');
Route::get('polls/{poll:slug}', [PollController::class, 'show'])->name('polls.show')->middleware(['poll']);

require __DIR__.'/auth.php';
