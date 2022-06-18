<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirplaneSeatController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.','middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index']);

    // airport
    Route::resource('airport', AirportController::class);
    Route::get('/print/airport', [AirportController::class, 'print'])->name('print.airport');
    Route::get('/trash/airport', [AirportController::class, 'show_restore'])->name('trash.airport');
    Route::get('/trash/airport/{id}', [AirportController::class, 'restore'])->name('restore.airport');
    Route::get('/trash/airport/delete/{id}', [AirportController::class, 'delete'])->name('delete.airport');

    // route
    Route::resource('route', RouteController::class);
    Route::get('/print/route', [RouteController::class, 'print'])->name('print.route');
    Route::get('/trash/route', [RouteController::class, 'show_restore'])->name('trash.route');
    Route::get('/trash/route/restore/{id}', [RouteController::class, 'restore'])->name('restore.route');
    Route::get('/trash/route/delete/{id}', [RouteController::class, 'delete'])->name('delete.route');

    // airline
    Route::resource('airline', AirlineController::class);
    Route::get('/print/airline', [AirlineController::class, 'print'])->name('print.airline');
    Route::get('/trash/airline', [AirlineController::class, 'show_restore'])->name('trash.airline');
    Route::get('/trash/airline/restore/{id}', [AirlineController::class, 'restore'])->name('restore.airline');
    Route::get('/trash/airline/delete/{id}', [AirlineController::class, 'delete'])->name('delete.airline');

    // plane
    Route::resource('plane', PlaneController::class);
    Route::get('/print/plane', [PlaneController::class, 'print'])->name('print.plane');
    Route::get('/print/detail-plane/{plane}', [PlaneController::class, 'print_detail'])->name('print_detail.plane');
    Route::get('/trash/plane', [PlaneController::class, 'show_restore'])->name('trash.plane');
    Route::get('/trash/plane/restore/{id}', [PlaneController::class, 'restore'])->name('restore.plane');
    Route::get('/trash/plane/delete/{id}', [PlaneController::class, 'delete'])->name('delete.plane');

    // schedule
    Route::resource('schedule', ScheduleController::class);
    Route::get('/print/schedule', [ScheduleController::class, 'print'])->name('print.schedule');
    Route::get('/trash/schedule', [ScheduleController::class, 'show_restore'])->name('trash.schedule');
    Route::get('/trash/schedule/restore/{id}', [ScheduleController::class, 'restore'])->name('restore.schedule');
    Route::get('/trash/schedule/delete/{id}', [ScheduleController::class, 'delete'])->name('delete.schedule');

    // airplane seat
    Route::resource('airplane_seat', AirplaneSeatController::class);
    Route::get('/print/airplane_seat', [AirplaneSeatController::class, 'print'])->name('print.airplane_seat');
    Route::get('/trash/airplane_seat', [AirplaneSeatController::class, 'show_restore'])->name('trash.airplane_seat');
    Route::get('/trash/airplane_seat/restore/{id}', [AirplaneSeatController::class, 'restore'])->name('restore.airplane_seat');
    Route::get('/trash/airplane_seat/delete/{id}', [AirplaneSeatController::class, 'delete'])->name('delete.airplane_seat');
});


