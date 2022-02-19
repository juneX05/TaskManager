<?php

use Application\Modules\System\Actions\Controllers\ActionModuleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Application\Modules\System\Actions\Controllers\ActionController;

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

//    Route::get('/actions', [ActionController::class,'index'])->name('viewActions');
//    Route::get('/actions/create', [ActionController::class,'create'])->name('createAction');
//    Route::post('/actions/save', [ActionController::class,'store'])->name('saveAction');
//    Route::get('/actions/{id}/edit', [ActionController::class,'edit'])->name('editAction');
//    Route::get('/actions/{id}/view', [ActionController::class,'show'])->name('viewAction');
//    Route::post('/actions/delete', [ActionController::class,'destroy'])->name('deleteAction');
//    Route::post('/actions/update', [ActionController::class,'update'])->name('updateAction');

//    Route::get('/action/{id}/modules/create', [ActionModuleController::class,'create'])->name('createActionModule');
//    Route::post('/action/modules/save', [ActionModuleController::class,'store'])->name('saveActionModule');
//    Route::get('/action/{id}/modules/{module_id}/edit', [ActionModuleController::class,'edit'])->name('editActionModule');
//    Route::get('/action/{id}/modules/{module_id}/view', [ActionModuleController::class,'show'])->name('viewActionModule');
//    Route::post('/action/modules/delete', [ActionModuleController::class,'destroy'])->name('deleteActionModule');
//    Route::post('/action/modules/update', [ActionModuleController::class,'update'])->name('updateActionModule');

});
