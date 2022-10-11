<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VacancyController;
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
    return view('welcome');
})->name('home');

Route::get('/dashboard', [VacancyController::class, 'index'])->middleware(['auth', 'verified'])->name('vacancies.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->middleware(['auth', 'verified'])->name('vacancies.create');
Route::get('/vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacancies.edit');
Route::get('/vacancies/{vacancy}', [VacancyController::class, 'show'])->name('vacancies.show');
//notifications
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'recruiter.role'])->name('notifications');
require __DIR__ . '/auth.php';
