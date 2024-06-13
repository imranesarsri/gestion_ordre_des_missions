<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pkg_PriseDeServices\PersonnelController;

// Grouping routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::prefix('/gestionPersonnels')->group(function () {
        Route::get('/personnels', [PersonnelController::class, 'index'])->name('personnels.index');
        Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');
        Route::post('/personnels/store', [PersonnelController::class, 'store'])->name('personnels.store');
        Route::get('/personnels/{id}', [PersonnelController::class, 'show'])->name('personnels.show');
        Route::get('/personnels/{id}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit');
        Route::put('/personnels/{id}/update', [PersonnelController::class, 'update'])->name('personnels.update');
        Route::delete('/personnels/{id}/destroy', [PersonnelController::class, 'destroy'])->name('personnels.destroy');

        Route::get('/personnel/export', [PersonnelController::class, 'export'])->name('personnels.export');
        Route::post('/personnels/import', [PersonnelController::class, 'import'])->name('personnels.import');
    });
});

Auth::routes(['register' => false]);
