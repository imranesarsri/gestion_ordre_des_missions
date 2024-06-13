<?php

use App\Http\Controllers\pkg_Conges\CongesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    // Routes for managing Conges
    Route::resource('/conges', CongesController::class);
    // Route::get('/conges/{id}', [CongesController::class, 'show'])->name('conges.show');
    Route::get('/conges/{conge}/decision', [CongesController::class, 'decision'])->name('conges.decision');
    Route::get('/conges/personnesl/export', [CongesController::class, 'export'])->name('conges.export');
    Route::post('/conges/import', [CongesController::class, 'import'])->name('conges.import');
});

Auth::routes(['register' => false]);

