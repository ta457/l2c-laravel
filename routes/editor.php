<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminGroupController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminExerciseController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminSectionController;
use Illuminate\Support\Facades\Route;

Route::middleware('editor')->group(function () {

  Route::get('/editor-dashboard', function () {
    return redirect('/editor-dashboard/groups');
  })->name('editor');

  // routes for groups CRUD -----------------------------------------------

  Route::get(
    '/editor-dashboard/groups',
    [AdminGroupController::class, 'index']
  );

  Route::post(
    '/editor-dashboard/groups',
    [AdminGroupController::class, 'store']
  );

  Route::get(
    '/editor-dashboard/groups/{group}',
    [AdminGroupController::class, 'edit']
  );

  Route::patch(
    '/editor-dashboard/groups/{group}',
    [AdminGroupController::class, 'update']
  );

  Route::delete(
    '/editor-dashboard/groups/{group}',
    [AdminGroupController::class, 'destroy']
  );

  Route::post(
    '/editor-dashboard/groups/destroy-all',
    [AdminGroupController::class, 'destroyAll']
  );

  // routes for courses CRUD -----------------------------------------------

  Route::get(
    '/editor-dashboard/courses',
    [AdminCourseController::class, 'index']
  );

  Route::post(
    '/editor-dashboard/courses',
    [AdminCourseController::class, 'store']
  );

  Route::get(
    '/editor-dashboard/courses/{course}',
    [AdminCourseController::class, 'edit']
  );

  Route::patch(
    '/editor-dashboard/courses/{course}',
    [AdminCourseController::class, 'update']
  );

  Route::delete(
    '/editor-dashboard/courses/{course}',
    [AdminCourseController::class, 'destroy']
  );

  Route::post(
    '/editor-dashboard/courses/destroy-all',
    [AdminCourseController::class, 'destroyAll']
  );

  // routes for articles CRUD -----------------------------------------------

  Route::get(
    '/editor-dashboard/articles',
    [AdminArticleController::class, 'index']
  );

  Route::post(
    '/editor-dashboard/articles',
    [AdminArticleController::class, 'store']
  );

  Route::get(
    '/editor-dashboard/articles/{article}',
    [AdminArticleController::class, 'edit']
  );

  Route::patch(
    '/editor-dashboard/articles/{article}',
    [AdminArticleController::class, 'update']
  );

  Route::delete(
    '/editor-dashboard/articles/{article}',
    [AdminArticleController::class, 'destroy']
  );

  Route::post(
    '/editor-dashboard/articles/destroy-all',
    [AdminArticleController::class, 'destroyAll']
  );

  // routes for exercises CRUD -----------------------------------------------

  Route::get(
    '/editor-dashboard/exercises',
    [AdminExerciseController::class, 'index']
  );

  Route::post(
    '/editor-dashboard/exercises',
    [AdminExerciseController::class, 'store']
  );

  Route::get(
    '/editor-dashboard/exercises/{exercise}',
    [AdminExerciseController::class, 'edit']
  );

  Route::patch(
    '/editor-dashboard/exercises/{exercise}',
    [AdminExerciseController::class, 'update']
  );

  Route::delete(
    '/editor-dashboard/exercises/{exercise}',
    [AdminExerciseController::class, 'destroy']
  );

  Route::post(
    '/editor-dashboard/exercises/destroy-all',
    [AdminExerciseController::class, 'destroyAll']
  );

  // routes for quizzes CRUD -----------------------------------------------

  Route::get(
    '/editor-dashboard/quizzes',
    [AdminQuizController::class, 'index']
  );

  Route::post(
    '/editor-dashboard/quizzes',
    [AdminQuizController::class, 'store']
  );

  Route::get(
    '/editor-dashboard/quizzes/{quiz}',
    [AdminQuizController::class, 'edit']
  );

  Route::patch(
    '/editor-dashboard/quizzes/{quiz}',
    [AdminQuizController::class, 'update']
  );

  Route::delete(
    '/editor-dashboard/quizzes/{quiz}',
    [AdminQuizController::class, 'destroy']
  );

  Route::post(
    '/editor-dashboard/quizzes/destroy-all',
    [AdminQuizController::class, 'destroyAll']
  );

  // routes for article sections CRUD -------------------------------------------

  Route::get(
    '/editor-dashboard/articles/{article}/content',
    [AdminSectionController::class, 'index']
  );

  Route::post(
    '/editor-dashboard/articles/{article}',
    [AdminSectionController::class, 'store']
  );

  Route::get(
    '/editor-dashboard/sections/{section}',
    [AdminSectionController::class, 'edit']
  );

  Route::patch(
    '/editor-dashboard/sections/{section}',
    [AdminSectionController::class, 'update']
  );

  Route::delete(
    '/editor-dashboard/sections/{section}',
    [AdminSectionController::class, 'delete']
  );

  Route::patch(
    '/editor-dashboard/sections/{section}/backward',
    [AdminSectionController::class, 'updateSectionBackward']
  );

  Route::patch(
    '/editor-dashboard/sections/{section}/forward',
    [AdminSectionController::class, 'updateSectionForward']
  );

  // routes for subsections CRUD -----------------------------------------------
  Route::post(
    '/editor-dashboard/sections/{section}/store-subsection',
    [AdminSectionController::class, 'storeSubsection']
  );

  Route::patch(
    '/editor-dashboard/subsections/{subsection}',
    [AdminSectionController::class, 'updateSubsection']
  );

  Route::delete(
    '/editor-dashboard/subsections/{subsection}',
    [AdminSectionController::class, 'deleteSubsection']
  );

  Route::patch(
    '/editor-dashboard/subsections/{subsection}/backward',
    [AdminSectionController::class, 'updateSubsectionBackward']
  );

  Route::patch(
    '/editor-dashboard/subsections/{subsection}/forward',
    [AdminSectionController::class, 'updateSubsectionForward']
  );
});

