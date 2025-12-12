<?php

use App\Http\Controllers\FincaController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\TipoCultivoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::get('/', function () {
    $url = Storage::disk('s3')->url('fondo.jpg');
    return view('welcome', compact('url'));
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [FincaController::class , 'dashboard'])->name('home');
    //Fincas
    Route::get('/mis_fincas', [FincaController::class , 'index'])->name('mis_fincas');
    Route::get('/fincas/{finca}/eliminar', [FincaController::class, 'eliminar'])->name('fincas.eliminar');
    Route::get('/nueva-finca', [FincaController::class, 'new'])->name('fincas.nueva');
    Route::post('/guardar-fincas', [FincaController::class, 'guardar'])->name('fincas.guardar');
    Route::get('/fincas/{finca}/editar', [FincaController::class, 'edit'])->name('fincas.editar');
    Route::put('/fincas/{finca}', [FincaController::class, 'update'])->name('fincas.actualizar');
    Route::get('/fincas/{finca}/detalle', [FincaController::class, 'show'])->name('fincas.detalle');
    Route::get('/dashboard', [FincaController::class , 'dashboard'])->name('dashboard');

    //Parcelas

    Route::get('/fincas/{finca}/parcelas', [ParcelaController::class, 'index'])->name('mis_parcelas');
    Route::get('/fincas/{finca}/parcelas/nueva-finca', [ParcelaController::class, 'new'])->name('parcelas.nueva');
    Route::post('/fincas/{finca}/parcelas', [ParcelaController::class, 'guardar'])->name('parcelas.guardar');
    Route::get('/fincas/{finca}/parcelas/{parcela}/eliminar', [ParcelaController::class, 'eliminar'])->name('parcelas.eliminar');
    Route::get('/fincas/{finca}/parcelas/{parcela}/editar', [ParcelaController::class, 'edit'])->name('parcelas.editar');
    Route::put('/fincas/{finca}/parcelas/{parcela}', [ParcelaController::class, 'update'])->name('parcelas.actualizar');
    Route::get('/fincas/{finca}/parcelas/filtrar', [ParcelaController::class, 'filtrar'])->name('parcelas.filtrar');
    Route::get('/fincas/{finca}/parcelas/buscar', [ParcelaController::class, 'buscar'])->name('parcelas.buscar');



    //Tipo Cultivo

    Route::get('/tipo_cultivos', [TipoCultivoController::class, 'index'])->name('tipo_cultivos');
    Route::get('/tipo_cultivos/filtrar', [TipoCultivoController::class, 'filtrar'])->name('tipo_cultivos.filtrar');
    Route::get('/tipo_cultivos/buscar', [TipoCultivoController::class, 'buscar'])->name('tipo_cultivos.buscar');


});

