<?php

use App\Http\Controllers\VisitController;
use App\Livewire\GuestForm;
use Illuminate\Support\Facades\Route;

// Ruta pública para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//VISTAS
Route::get('/invitados/visitas', [VisitController::class, 'create'])->name('visitas');

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Ruta para el dashboard (solo usuarios autenticados)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para la gestión de visitantes
    Route::get('/visitantes', [VisitController::class, 'index'])->name('visits.index');
    Route::get('/visitantes/create', [VisitController::class, 'create'])->name('visits.create');
    Route::get('/visitantes/edit', [VisitController::class, 'edit'])->name('visits.edit');
    Route::get('/visitantes/show', [VisitController::class, 'show'])->name('visits.show');
});