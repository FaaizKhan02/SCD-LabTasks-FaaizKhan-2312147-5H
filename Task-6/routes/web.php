<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/events');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/details/{id}', [EventController::class, 'details'])->name('events.details');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');