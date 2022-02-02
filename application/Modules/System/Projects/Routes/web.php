<?php

use Illuminate\Support\Facades\Route;
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

    Route::get('/project', [ProjectController::class, 'index'])->name('viewProjects');
    Route::get('/project/{id}/view', [ProjectController::class, 'show'])->name('viewProject');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('createProject');
    Route::post('/project/save', [ProjectController::class, 'store'])->name('saveProject');
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('editProject');
    Route::post('/project/delete', [ProjectController::class, 'destroy'])->name('deleteProject');
    Route::post('/project/update', [ProjectController::class, 'update'])->name('updateProject');

});
