<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TrajectsController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\PassengersController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\ProposerController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profile', [DashboardController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/students/register', [StudentsController::class, 'showRegisterForm'])->name('students.register')->middleware('guest');
Route::post('/students/register', [StudentsController::class, 'register'])->name('students.register')->middleware('guest');
Route::get('/students/login', [StudentsController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/students/login', [StudentsController::class, 'login'])->name('students.login')->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/students/logout', [StudentsController::class, 'logout'])->name('students.logout');


Route::get('/trajects', [TrajectsController::class, 'index'])->name('trajects.index');
Route::get('/trajects/create', [TrajectsController::class, 'create'])->name('trajects.create');
Route::post('/trajects', [TrajectsController::class, 'store'])->name('trajects.store');
Route::get('/trajects/{trajects}', [TrajectsController::class, 'show'])->name('trajects.show');
Route::get('/trajects/{trajects}/edit', [TrajectsController::class, 'edit'])->name('trajects.edit');
Route::put('/trajects/{trajects}', [TrajectsController::class, 'update'])->name('trajects.update');
Route::delete('/trajects/{trajects}', [TrajectsController::class, 'destroy'])->name('trajects.destroy');


Route::get('/drivers', [DriversController::class, 'index'])->name('drivers.index');
Route::get('/drivers/create', [DriversController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriversController::class, 'store'])->name('drivers.store');
Route::get('/drivers/{drivers}', [DriversController::class, 'show'])->name('drivers.show');
Route::get('/drivers/{drivers}/edit', [DriversController::class, 'edit'])->name('drivers.edit');
Route::put('/drivers/{drivers}', [DriversController::class, 'update'])->name('drivers.update');
Route::delete('/drivers/{drivers}', [DriversController::class, 'destroy'])->name('drivers.destroy');


Route::get('/passengers', [PassengersController::class, 'index'])->name('passengers.index');
Route::get('/passengers/create', [PassengersController::class, 'create'])->name('passengers.create');
Route::post('/passengers', [PassengersController::class, 'store'])->name('passengers.store');
Route::get('/passengers/{passengers}', [PassengersController::class, 'show'])->name('passengers.show');
Route::get('/passengers/{passengers}/edit', [PassengersController::class, 'edit'])->name('passengers.edit');
Route::put('/passengers/{passengers}', [PassengersController::class, 'update'])->name('passengers.update');
Route::delete('/passengers/{passengers}', [PassengersController::class, 'destroy'])->name('passengers.destroy');


Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations.index');
Route::get('/reservations/create/{trajects}', [ReservationsController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{reservations}', [ReservationsController::class, 'show'])->name('reservations.show');
Route::get('/reservations/{reservations}/edit', [ReservationsController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{reservations}', [ReservationsController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{reservations}', [ReservationsController::class, 'destroy'])->name('reservations.destroy');


Route::get('/evaluations', [EvaluationsController::class, 'index'])->name('evaluations.index');
Route::get('/evaluations/create', [EvaluationsController::class, 'create'])->name('evaluations.create');
Route::post('/evaluations', [EvaluationsController::class, 'store'])->name('evaluations.store');
Route::get('/evaluations/{evaluations}', [EvaluationsController::class, 'show'])->name('evaluations.show');
Route::get('/evaluations/{evaluations}/edit', [EvaluationsController::class, 'edit'])->name('evaluations.edit');
Route::put('/evaluations/{evaluations}', [EvaluationsController::class, 'update'])->name('evaluations.update');
Route::delete('/evaluations/{evaluations}', [EvaluationsController::class, 'destroy'])->name('evaluations.destroy');


Route::get('/proposer', [ProposerController::class, 'index'])->name('proposer.index');
Route::get('/proposer/create', [ProposerController::class, 'create'])->name('proposer.create');
Route::post('/proposer', [ProposerController::class, 'store'])->name('proposer.store');
Route::get('/proposer/{proposer}', [ProposerController::class, 'show'])->name('proposer.show');
Route::get('/proposer/{proposer}/edit', [ProposerController::class, 'edit'])->name('proposer.edit');
Route::put('/proposer/{proposer}', [ProposerController::class, 'update'])->name('proposer.update');
Route::delete('/proposer/{proposer}', [ProposerController::class, 'destroy'])->name('proposer.destroy');



