<?php

use App\Http\Controllers\FincaController;
use App\Http\Controllers\ParcelaController;
use App\Http\Controllers\TipoCultivoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//RUTA PARA GENERAR TOKENS (no protegida) ------------------------------------------------------------------------
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    //Comprobar credenciales
    if (!Auth::attempt($credentials)) {
        abort(401);
    }

    //Generar token
    $token = Auth::user()->createToken('my-app-token')->plainTextToken;
    return response()->json(['token' => $token, 'user' => Auth::user()]);
});
//RUTAS PROTEGIDAS ------------------------------------------------------------------------------------------------
Route::middleware(['auth:sanctum'])->group(function () {
    //Muestra tus fincas (token)
    Route::get('/fincas', [FincaController::class, 'apiGetFincas']);
    //Muestra una sola finca por id, si es tuya te deja verla, sino te bloquea
    Route::get('/fincas/{id}', [FincaController::class, 'apiGetFincasById']);

    //Crea una nueva Finca
    Route::post('/fincas', [FincaController::class, 'apiNewFinca']);
    //Actualizar una finca existente
    Route::put('/fincas/{id}', [FincaController::class, 'apiUpdateFinca']);
    //Eliminar una finca

    Route::delete('/fincas/{id}', [FincaController::class, 'apiDeleteFinca']);

    // Obtener todas las parcelas de una finca específica
    Route::get('/fincas/{id}/parcelas', [ParcelaController::class, 'apiGetParcelas']);
    //Crear una parcela
    Route::post('/parcelas', [ParcelaController::class, 'apiNewParcela']);
    //Actualizar una parcela (cambiar cultivo, estado, etc.)
    Route::put('/parcelas/{id}', [ParcelaController::class, 'apiUpdateParcela']);
    //Cambiar tipo cultivo
    Route::put('/parcelas/{id}/cambiar-cultivo', [ParcelaController::class, 'apiCambiarCultivo']);
    //DELETE /api/v1/parcelas/{id} - Eliminar una parcela
    Route::delete('/parcelas/{id}', [ParcelaController::class, 'apiDeleteParcela']);

    //Tipos de Cultivo:
    Route::get('/tipos-cultivo' , [TipoCultivoController::class, 'apiGetTiposCultivo']);


});
