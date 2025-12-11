<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Parcela;
use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $parcelas = $finca->parcelas()->paginate(6);
        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.index', compact('finca', 'parcelas' , 'tipoCultivos'));

    }
    /**
     * Show the form for creating a new resource.
     */

    public function new($id) {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $tipoCultivos = TipoCultivo::all();

        return view('parcelas.new' , compact('finca', 'tipoCultivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request , $id)
    {
        $nombre = $request->input('nombre');
        $hectareas = $request->input('hectareas');
        $fecha_siembra = $request->input('fecha_siembra');
        $estado = $request->input('estado');
        $notas = $request->input('notas');
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        Parcela::create([
            'nombre' => $nombre,
            'finca_id' =>$finca->id ,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $hectareas,
            'fecha_siembra' => $fecha_siembra,
            'estado' => $estado,
            'notas' => $notas,
        ]);

        return redirect()->route('mis_parcelas', ['finca' => $finca->id]);

    }
    /***
     * Eliminar una Parcela
     */
    public function  eliminar($idFinca , $idParcela)
    {
       $user = auth()->user();
       $finca = $user->fincas()->findOrFail($idFinca);
       $parcela = $finca->parcelas()->findOrFail($idParcela);
       $parcela->delete();
       return redirect()->route('mis_parcelas',['finca'=>$finca->id]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idFinca , $idParcela)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($idFinca);
        $parcela = $finca->parcelas()->findOrFail($idParcela);
        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.edit', compact('finca' , 'parcela' , 'tipoCultivos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $idFinca , $idParcela)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($idFinca);
        $parcela = $finca->parcelas()->findOrFail($idParcela);
        $nombre = $request->input('nombre');
        $hectareas = $request->input('hectareas');
        $fecha_siembra = $request->input('fecha_siembra');
        $estado = $request->input('estado');
        $notas = $request->input('notas');

        $parcela->update([
            'nombre' => $nombre,
            'finca_id' => $finca->id,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $hectareas,
            'fecha_siembra' => $fecha_siembra,
            'estado' => $estado,
            'notas' => $notas,
        ]);
      return redirect()->route('mis_parcelas',['finca'=>$finca->id]);
    }



    /////APIIII
    ///

    public function apiGetParcelas($id)
    {

        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $parcelas = $finca->parcelas()->get();
        return $parcelas->toResourceCollection();

    }

    /**
     * POST /api/v1/parcelas
     * Crear una nueva parcela en una finca
     */
    public function apiNewParcela(Request $request)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($request->finca_id);

        $parcela = Parcela::create([
            'nombre' => $request->nombre,
            'finca_id' => $finca->id,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $request->hectareas,
            'fecha_siembra' => $request->fecha_siembra,
            'estado' => $request->estado,
            'notas' => $request->notas,
        ]);

        return response()->json([
            'mensaje' => 'Parcela creada',
            'parcela' => $parcela
        ]);
    }
    public function apiUpdateParcela(Request $request, $id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;

        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para actualizar esta parcela');
        }

        $parcela->update([
            'nombre' => $request->nombre,
            'tipo_cultivo_id' => $request->tipo_cultivo_id,
            'hectareas' => $request->hectareas,
            'fecha_siembra' => $request->fecha_siembra,
            'estado' => $request->estado,
            'notas' => $request->notas,
        ]);

        return response()->json([
            'mensaje' => 'Parcela actualizada',
            'parcela' => $parcela
        ]);
    }

    public function apiCambiarCultivo(Request $request , $id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;
        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para actualizar esta parcela');
        }
        $parcela->update([
            'tipo_cultivo_id' => $request->tipo_cultivo_id
        ]);

        return response()->json([
            'mensaje' => 'Tipo cultivo cambiado',
            'parcela' => $parcela
        ]);
    }

    public function apiDeleteParcela($id)
    {
        $parcela = Parcela::findOrFail($id);
        $finca = $parcela->finca;

        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para eliminar esta parcela');
        }

        $parcela->delete();

        return response()->json([
            'mensaje' => 'Parcela eliminada'
        ]);
    }
}
