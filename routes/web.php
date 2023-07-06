<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [ProjectController::class, 'index']);

// Route::resource('projects', ProjectController::class);
// Route::resource('activities', ActivityController::class);
Route::resource('tags', TagController::class);

//projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store')->middleware('logs.project.operations');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update')->middleware('logs.project.operations');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

//activities
Route::post('/activities-tags/{activity}', [ActivityController::class, 'addTagsToActivity']);

Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities/store', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{activityDTO}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/edit/{activity}', [ActivityController::class, 'edit'])->name('activities.edit');
Route::post('/activities/edit/{activity}', [ActivityController::class, 'update'])->name('activities.update');
Route::post('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');


