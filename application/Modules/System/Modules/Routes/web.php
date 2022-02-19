<?php

use Application\Modules\System\Modules\Controllers\ModuleActionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Application\Modules\System\Modules\Controllers\ModuleController;

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

//    Route::get('/modules/create/{project_id?}', [ModuleController::class,'create'])->name('createModule');
//    Route::get('/modules/{project_id?}', [ModuleController::class,'index'])->name('viewModules');
//    Route::post('/modules/save', [ModuleController::class,'store'])->name('saveModule');
//    Route::get('/modules/{id}/edit', [ModuleController::class,'edit'])->name('editModule');
//    Route::get('/modules/{id}/view', [ModuleController::class,'show'])->name('viewModule');
//    Route::post('/modules/delete', [ModuleController::class,'destroy'])->name('deleteModule');
//    Route::post('/modules/update', [ModuleController::class,'update'])->name('updateModule');



});
