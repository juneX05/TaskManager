<?php

use Application\Modules\System\Tasks\Controllers\TaskModuleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

//    Route::get('/tasks', [TaskController::class,'index'])->name('viewTasks');
//    Route::get('/tasks/create', [TaskController::class,'create'])->name('createTask');
//    Route::post('/tasks/save', [TaskController::class,'store'])->name('saveTask');
//    Route::get('/tasks/{id}/edit', [TaskController::class,'edit'])->name('editTask');
//    Route::get('/tasks/{id}/view', [TaskController::class,'show'])->name('viewTask');
//    Route::post('/tasks/delete', [TaskController::class,'destroy'])->name('deleteTask');
//    Route::post('/tasks/update', [TaskController::class,'update'])->name('updateTask');

//    Route::get('/task/{id}/modules/create', [TaskModuleController::class,'create'])->name('createTaskModule');
//    Route::post('/task/modules/save', [TaskModuleController::class,'store'])->name('saveTaskModule');
//    Route::get('/task/{id}/modules/{module_id}/edit', [TaskModuleController::class,'edit'])->name('editTaskModule');
//    Route::get('/task/{id}/modules/{module_id}/view', [TaskModuleController::class,'show'])->name('viewTaskModule');
//    Route::post('/task/modules/delete', [TaskModuleController::class,'destroy'])->name('deleteTaskModule');
//    Route::post('/task/modules/update', [TaskModuleController::class,'update'])->name('updateTaskModule');

});
