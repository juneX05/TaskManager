<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Application\Modules\System\Projects\Controllers\ProjectController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/projects', [ProjectController::class,'index'])->name('viewProjects');
    Route::get('/projects/create', [ProjectController::class,'create'])->name('createProject');
    Route::post('/projects/save', [ProjectController::class,'store'])->name('saveProject');
    Route::get('/projects/manage_user_projects', [ProjectController::class,'manageUsersProjects'])->name('manageUsersProjects');
    Route::post('/projects/save/user_projects', [ProjectController::class,'saveUsersProjects'])->name('saveUsersProjects');
    Route::post('/projects/get_user_projects', [ProjectController::class,'userProjects'])->name('getUserProjects');
    Route::get('/projects/{id}/edit', [ProjectController::class,'edit'])->name('editProject');
    Route::post('/projects/delete', [ProjectController::class,'destroy'])->name('deleteProject');
    Route::post('/projects/update', [ProjectController::class,'update'])->name('updateProject');

});
