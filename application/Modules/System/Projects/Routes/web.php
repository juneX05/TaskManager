<?php

use Application\Modules\System\Projects\Controllers\ProjectModuleActionController;
use Application\Modules\System\Projects\Controllers\ProjectModuleActionTaskController;
use Application\Modules\System\Projects\Controllers\ProjectModuleController;
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
    Route::get('/projects/{id}/edit', [ProjectController::class,'edit'])->name('editProject');
    Route::get('/projects/{id}/view', [ProjectController::class,'show'])->name('viewProject');
    Route::post('/projects/delete', [ProjectController::class,'destroy'])->name('deleteProject');
    Route::post('/projects/update', [ProjectController::class,'update'])->name('updateProject');

    Route::controller(ProjectModuleController::class)
        ->prefix('/project/modules/')
        ->group(function () {
            $nameTitle = 'ProjectModule';
            Route::get('{project_id}/create', 'create')->name('create' . $nameTitle);
            Route::post('save', 'store')->name('save' . $nameTitle);
            Route::get('{id}/edit', 'edit')->name('edit' . $nameTitle);
            Route::get('{id}/view', 'show')->name('view' . $nameTitle);
            Route::post('delete', 'destroy')->name('delete' . $nameTitle);
            Route::post('update', 'update')->name('update' . $nameTitle);
        });

    Route::controller(ProjectModuleActionController::class)
        ->prefix('/project/module/actions/')
        ->group(function () {
            $nameTitle = 'ProjectModuleAction';
            Route::get('{module_id}/create', 'create')->name('create' . $nameTitle);
            Route::post('save', 'store')->name('save' . $nameTitle);
            Route::get('{id}/edit', 'edit')->name('edit' . $nameTitle);
            Route::get('{id}/view', 'show')->name('view' . $nameTitle);
            Route::post('delete', 'destroy')->name('delete' . $nameTitle);
            Route::post('update', 'update')->name('update' . $nameTitle);
        });

    Route::controller(ProjectModuleActionTaskController::class)
        ->prefix('/project/module/action/tasks')
        ->group(function () {
            $nameTitle = 'ProjectModuleActionTask';
            Route::get('{action_id}/create', 'create')->name('create' . $nameTitle);
            Route::post('save', 'store')->name('save' . $nameTitle);
            Route::get('{id}/edit', 'edit')->name('edit' . $nameTitle);
            Route::get('{id}/view', 'show')->name('view' . $nameTitle);
            Route::post('delete', 'destroy')->name('delete' . $nameTitle);
            Route::post('update', 'update')->name('update' . $nameTitle);
        });

});
