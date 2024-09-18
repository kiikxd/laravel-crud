<?php

use App\Http\Controllers\ContestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PrintController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

// Pemanggilan Rute dalam website
Route::resource('contests', ContestController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('judges', JudgeController::class);
// ------------------------------

// Rute untuk login dan register
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');
// -------------------------------------

// Rute yang dilindungi oleh middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); // Halaman utama setelah login
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Rute untuk melakukan print data
Route::get('/print-contests', [PrintController::class, 'pritnContests'])->name('print.contests');
Route::get('/print-participants', [PrintController::class, 'printParticipants'])->name('print.participants');

