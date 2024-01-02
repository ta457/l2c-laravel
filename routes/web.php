<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HTMLCodeEditor;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TutorialsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('/search', [LandingPageController::class, 'show']);

Route::get('/tutorials', [TutorialsController::class, 'index']);
Route::get('/courses/{course:slug}/{article}', [CourseController::class, 'show']);
Route::post('/courses/{course:slug}/{article}', [CourseController::class, 'store']);
Route::delete('/courses/{course:slug}/{article}', [CourseController::class, 'delete']);

Route::get('/exercises', [ExerciseController::class, 'index']);
Route::get('/exercises/{course:slug}/{exercise}', [ExerciseController::class, 'show']);
Route::post('/exercises/{course:slug}/{exercise}', [ExerciseController::class, 'store']);
Route::get('/quizzes/{course:slug}/{quiz}', [QuizController::class, 'show']);
Route::post('/quizzes/{course:slug}/{quiz}', [QuizController::class, 'store']);

Route::get('/html-editor', [HTMLCodeEditor::class, 'index']);
Route::get('/html-editor/{subsection}', [HTMLCodeEditor::class, 'show']);

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/editor.php';
