<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AnswerController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// Protected routes (auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/courses/index', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/{id}/update', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{id}/delete', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('/courses/{course_id}/modules/index', [ModuleController::class, 'getByCourse'])->name('modules.index');
    Route::get('/courses/{course_id}/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/courses/{course_id}/modules/store', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/courses/{course_id}/modules/{id}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::post('/courses/{course_id}/modules/{id}/update', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/courses/{course_id}/modules/{id}/delete', [ModuleController::class, 'destroy'])->name('modules.destroy');

    Route::get('/modules/{module_id}/tasks/index', [TaskController::class, 'getByModule'])->name('tasks.index');
    Route::get('/modules/{module_id}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/modules/{module_id}/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/modules/{module_id}/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/modules/{module_id}/tasks/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/modules/{module_id}/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/tasks/{task_id}/answer/index', [AnswerController::class, 'getByTask'])->name('answer.index');
    Route::get('/tasks/{task_id}/answer/create', [AnswerController::class, 'create'])->name('answer.create');
    Route::post('/tasks/{task_id}/answer/store', [AnswerController::class, 'create'])->name('answer.store');
    Route::get('/tasks/{task_id}/answer/view', [AnswerController::class, 'create'])->name('answer.view');
    Route::post('/tasks/{task_id}/answer/grade', [AnswerController::class, 'create'])->name('answer.grade');
});

// Authentication routes
require __DIR__ . '/auth.php';
