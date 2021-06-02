<?php

use App\Http\Controllers\AnswerAcceptController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteAnswerController;
use App\Http\Controllers\VoteQuestionController;
use Illuminate\Support\Facades\Route;
// use Admin\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth'])->group(function () {

// });
// Route::resource('/', UserController::class);
Route::get('/',[QuestionController::class,'index']);
Route::resource('questions',QuestionController::class)->except('show');
Route::get('questions/{slug}',[QuestionController::class,'show'])->name('questions.show');
Route::post('answers/{answer}/accept',AnswerAcceptController::class)->name('answers.accept');
Route::middleware(['auth'])->group(function () {
    Route::resource('questions.answers',AnswerController::class)->except('index','create','show');
    Route::post('questions/{question}/favorites',[FavoritesController::class,'store'])->name('questions.favorites');
    Route::delete('questions/{question}/favorites',[FavoritesController::class,'destroy'])->name('questions.unfavorites');
    Route::post('questions/{question}/vote',VoteQuestionController::class)->name('questions.vote');
    Route::post('answers/{answer}/vote',VoteAnswerController::class)->name('answers.vote');
});

