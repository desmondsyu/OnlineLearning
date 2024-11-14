<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Default route: custom home page
Route::get('/', function () {
    return view('custom_home');
})->name('home');

// Authentication routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [AuthenticatedSessionController::class, 'create'])->name('register'); // Example for registration

// Protected routes (auth middleware)
Route::middleware(['auth'])->group(function () {
    // Inventory routes
    Route::resource('inventory', InventoryController::class);

    // Category routes
    Route::resource('categories', CategoryController::class);

    // Supplier routes
    Route::resource('suppliers', SupplierController::class);
});

