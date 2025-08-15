<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/residents', [ResidentController::class, 'index'])->name('residents.index');
Route::get('/residents/create', [ResidentController::class, 'create'])->name('residents.create');
Route::get('/residents/{id}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
Route::put('/residents/{id}', [ResidentController::class, 'update'])->name('residents.update');
Route::delete('/residents/{id}', [ResidentController::class, 'destroy'])->name('residents.destroy');