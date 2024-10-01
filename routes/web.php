<?php

use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

//TODO DOCUMENTAR CREACION DE RUTAS
Route::get('/visitantes', [VisitController::class, 'index'])->name('visits.index');
Route::get('/visitantes/create', [VisitController::class, 'create'])->name('visits.create');
Route::get('/visitantes/edit', [VisitController::class, 'edit'])->name('visits.edit');
Route::get('/visitantes/show', [VisitController::class, 'show'])->name('visits.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});
