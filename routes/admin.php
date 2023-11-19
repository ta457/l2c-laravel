<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminGroupController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminExerciseController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminSectionController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {

  Route::get('/admin-dashboard', function () {
    return redirect('/admin-dashboard/users');
  })->name('admin');

  // routes for users CRUD ----------------------------------------------

  Route::get(
    '/admin-dashboard/users',
    [AdminUserController::class, 'index']
  );

  Route::post(
    '/admin-dashboard/users',
    [AdminUserController::class, 'store']
  );

  Route::get(
    '/admin-dashboard/users/{user}',
    [AdminUserController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/users/{user}',
    [AdminUserController::class, 'update']
  );

  Route::delete(
    '/admin-dashboard/users/{user}',
    [AdminUserController::class, 'destroy']
  );

  Route::post(
    '/admin-dashboard/users/destroy-all',
    [AdminUserController::class, 'destroyAll']
  );

  // routes for groups CRUD -----------------------------------------------

  Route::get(
    '/admin-dashboard/groups',
    [AdminGroupController::class, 'index']
  );

  Route::post(
    '/admin-dashboard/groups',
    [AdminGroupController::class, 'store']
  );

  Route::get(
    '/admin-dashboard/groups/{group}',
    [AdminGroupController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/groups/{group}',
    [AdminGroupController::class, 'update']
  );

  Route::delete(
    '/admin-dashboard/groups/{group}',
    [AdminGroupController::class, 'destroy']
  );

  Route::post(
    '/admin-dashboard/groups/destroy-all',
    [AdminGroupController::class, 'destroyAll']
  );

  // routes for courses CRUD -----------------------------------------------

  Route::get(
    '/admin-dashboard/courses',
    [AdminCourseController::class, 'index']
  );

  Route::post(
    '/admin-dashboard/courses',
    [AdminCourseController::class, 'store']
  );

  Route::get(
    '/admin-dashboard/courses/{course}',
    [AdminCourseController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/courses/{course}',
    [AdminCourseController::class, 'update']
  );

  Route::delete(
    '/admin-dashboard/courses/{course}',
    [AdminCourseController::class, 'destroy']
  );

  Route::post(
    '/admin-dashboard/courses/destroy-all',
    [AdminCourseController::class, 'destroyAll']
  );

  // routes for articles CRUD -----------------------------------------------

  Route::get(
    '/admin-dashboard/articles',
    [AdminArticleController::class, 'index']
  );

  Route::post(
    '/admin-dashboard/articles',
    [AdminArticleController::class, 'store']
  );

  Route::get(
    '/admin-dashboard/articles/{article}',
    [AdminArticleController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/articles/{article}',
    [AdminArticleController::class, 'update']
  );

  Route::delete(
    '/admin-dashboard/articles/{article}',
    [AdminArticleController::class, 'destroy']
  );

  Route::post(
    '/admin-dashboard/articles/destroy-all',
    [AdminArticleController::class, 'destroyAll']
  );

  // routes for exercises CRUD -----------------------------------------------

  Route::get(
    '/admin-dashboard/exercises',
    [AdminExerciseController::class, 'index']
  );

  Route::post(
    '/admin-dashboard/exercises',
    [AdminExerciseController::class, 'store']
  );

  Route::get(
    '/admin-dashboard/exercises/{exercise}',
    [AdminExerciseController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/exercises/{exercise}',
    [AdminExerciseController::class, 'update']
  );

  Route::delete(
    '/admin-dashboard/exercises/{exercise}',
    [AdminExerciseController::class, 'destroy']
  );

  Route::post(
    '/admin-dashboard/exercises/destroy-all',
    [AdminExerciseController::class, 'destroyAll']
  );

  // routes for quizzes CRUD -----------------------------------------------

  Route::get(
    '/admin-dashboard/quizzes',
    [AdminQuizController::class, 'index']
  );

  Route::post(
    '/admin-dashboard/quizzes',
    [AdminQuizController::class, 'store']
  );

  Route::get(
    '/admin-dashboard/quizzes/{quiz}',
    [AdminQuizController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/quizzes/{quiz}',
    [AdminQuizController::class, 'update']
  );

  Route::delete(
    '/admin-dashboard/quizzes/{quiz}',
    [AdminQuizController::class, 'destroy']
  );

  Route::post(
    '/admin-dashboard/quizzes/destroy-all',
    [AdminQuizController::class, 'destroyAll']
  );

  // routes for article content CRUD -------------------------------------------

  Route::get(
    '/admin-dashboard/articles/{article}/content',
    [AdminSectionController::class, 'index']
  );

  Route::get(
    '/admin-dashboard/sections/{section}/edit',
    [AdminSectionController::class, 'edit']
  );

  Route::patch(
    '/admin-dashboard/sections/{section}/edit',
    [AdminSectionController::class, 'update']
  );
});

