<?php

use Illuminate\Support\Facades\Route;
use Application\Modules\System\Tasks\Controllers\TaskController;

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

    Route::get('/task', [TaskController::class, 'index'])->name('viewTasks');
    Route::get('/task/{id}/view', [TaskController::class, 'show'])->name('viewTask');
    Route::get('/task/create', [TaskController::class, 'create'])->name('createTask');
    Route::post('/task/save', [TaskController::class, 'store'])->name('saveTask');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('editTask');
    Route::post('/task/delete', [TaskController::class, 'destroy'])->name('deleteTask');
    Route::post('/task/update', [TaskController::class, 'update'])->name('updateTask');

});
