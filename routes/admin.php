<?php

use App\Http\Controllers\Admin\AdminGroupController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {

  Route::get('/admin-dashboard', function () {
    return redirect('/admin-dashboard/users');
  })->name('admin');

  // user routes ----------------------------------------------

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

  // group routes -----------------------------------------------

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
});
