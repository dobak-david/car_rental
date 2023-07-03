<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationsController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::resource('/', CarsController::class);

/* Route::resource('/reservations', ReservationsController::class); */

Route::group(['prefix' => 'reservations'], function() {
    Route::get('/create', [ReservationsController::class, 'create'])->name('reservations.create');
    Route::post('/store', [ReservationsController::class, 'store'])->name('reservations.store');
});

Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::resource('/reservations', ReservationsController::class);
    Route::get('/cars', [CarsController::class, 'listcars'])->name('cars.list');
    Route::get('/cars/edit', [CarsController::class, 'edit'])->name('cars.edit');
    Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');
    Route::post('/cars/store', [CarsController::class, 'store'])->name('cars.store');

});

Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
