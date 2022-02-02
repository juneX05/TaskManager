<?php

use Illuminate\Support\Facades\Route;
use Application\Modules\Configurations\DevConfigs\Tabs\TaskStatuses\Controllers\TaskStatusController;

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

    Route::get('/task-status', [TaskStatusController::class, 'index'])->name('viewTaskStatuses');
    Route::get('/task-status/{id}/view', [TaskStatusController::class, 'show'])->name('viewTaskStatus');
    Route::get('/task-status/create', [TaskStatusController::class, 'create'])->name('createTaskStatus');
    Route::post('/task-status/save', [TaskStatusController::class, 'store'])->name('saveTaskStatus');
    Route::get('/task-status/{id}/edit', [TaskStatusController::class, 'edit'])->name('editTaskStatus');
    Route::post('/task-status/delete', [TaskStatusController::class, 'destroy'])->name('deleteTaskStatus');
    Route::post('/task-status/update', [TaskStatusController::class, 'update'])->name('updateTaskStatus');

});
