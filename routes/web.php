<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ConsultarAgenda\ConsultarAgendaController;
use App\Http\Controllers\AgendarCliente\AgendarClienteController;

// PUBLICO
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autenticacao'])->name('login.autenticacao');

// PROTEGIDO
Route::middleware(['guest'])->group(function () {
    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    Route::prefix('agendarcliente')->name('agendarcliente.')->group(function () {
        Route::get('/', [AgendarClienteController::class, 'index'])->name('index');
        Route::post('/', [AgendarClienteController::class, 'store'])->name('store');
    });

    Route::prefix('consultaragenda')->name('consultaragenda.')->group(function () {
        Route::get('/', [ConsultarAgendaController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [ConsultarAgendaController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ConsultarAgendaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ConsultarAgendaController::class, 'destroy'])->name('destroy');
    });
});