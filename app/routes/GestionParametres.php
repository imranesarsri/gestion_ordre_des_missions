<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionParametres\{
    EtablissementController,
    MotifsController,
    SpecialiteController,
    AvancementController,
    FonctionController,
    GradeController,
    VilleController,

};



Route::prefix('parametre')->middleware(['auth'])->group(function () {

    // Etablissement
    Route::prefix('etablissement')->group(function () {
        Route::get('/', [EtablissementController::class, 'index'])->name('etablissement.index');
        Route::get('/create', [EtablissementController::class, 'create'])->name('etablissement.create');
        Route::post('/create', [EtablissementController::class, 'store'])->name('etablissement.store');

        Route::get('/{id}/edit', [EtablissementController::class, 'edit'])->name('etablissement.edit');
        Route::put('/{id}', [EtablissementController::class, 'update'])->name('etablissement.update');
        Route::delete('/{id}', [EtablissementController::class, 'destroy'])->name('etablissement.destroy');

        Route::post('/import', [EtablissementController::class, 'import'])->name('etablissement.import');
        Route::get('/export', [EtablissementController::class, 'export'])->name('etablissement.export');
    });


    // Motif
    Route::post('/motifs/import', [MotifsController::class, 'import'])->name('motifs.import');
    Route::get('/motifs/export', [MotifsController::class, 'export'])->name('motifs.export');
    Route::resource('motifs', MotifsController::class);

    // Specialite
    Route::post('/specialite/import', [SpecialiteController::class, 'import'])->name('specialite.import');
    Route::get('/specialite/export', [SpecialiteController::class, 'export'])->name('specialite.export');
    Route::resource('specialite', SpecialiteController::class);

    // Avancement
    Route::post('/avancement/import', [AvancementController::class, 'import'])->name('avancement.import');
    Route::get('/avancement/export', [AvancementController::class, 'export'])->name('avancement.export');
    Route::resource('avancement', AvancementController::class);

    // Fonction
    Route::post('/fonction/import', [FonctionController::class, 'import'])->name('fonction.import');
    Route::get('/fonction/export', [FonctionController::class, 'export'])->name('fonction.export');
    Route::resource('fonction', FonctionController::class);

    // grade
    Route::post('/grade/import', [GradeController::class, 'import'])->name('grade.import');
    Route::get('/grade/export', [GradeController::class, 'export'])->name('grade.export');
    Route::resource('grade', GradeController::class);

    // ville
    Route::post('/ville/import', [VilleController::class, 'import'])->name('ville.import');
    Route::get('/ville/export', [VilleController::class, 'export'])->name('ville.export');
    Route::resource('ville', VilleController::class);

});