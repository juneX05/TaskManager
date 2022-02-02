<?php

use Illuminate\Support\Facades\Route;
use Application\Modules\Configurations\DevConfigs\Tabs\ProjectStatuses\Controllers\ProjectStatusController;

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

    Route::get('/project-status', [ProjectStatusController::class, 'index'])->name('viewProjectStatuses');
    Route::get('/project-status/{id}/view', [ProjectStatusController::class, 'show'])->name('viewProjectStatus');
    Route::get('/project-status/create', [ProjectStatusController::class, 'create'])->name('createProjectStatus');
    Route::post('/project-status/save', [ProjectStatusController::class, 'store'])->name('saveProjectStatus');
    Route::get('/project-status/{id}/edit', [ProjectStatusController::class, 'edit'])->name('editProjectStatus');
    Route::post('/project-status/delete', [ProjectStatusController::class, 'destroy'])->name('deleteProjectStatus');
    Route::post('/project-status/update', [ProjectStatusController::class, 'update'])->name('updateProjectStatus');

});
