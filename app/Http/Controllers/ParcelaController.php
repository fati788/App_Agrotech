<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Parcela;
use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Obtenir las parcelas de una finca
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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Nueva parcela dentro de una finca
     */

    public function new($id) {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $tipoCultivos = TipoCultivo::all();

        return view('parcelas.new' , compact('finca', 'tipoCultivos'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Guardar los datos de la nueva parcela
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

        $request->validate([
            'nombre' => 'required|string|max:255',
            'hectareas' => 'required|numeric|min:0',
            'tipo_cultivo_id' => 'required|exists:tipo_cultivos,id',
            'fecha_siembra' => 'required|date',
            'estado' => 'required|in:en_cultivo,en_descanso,preparacion',
            'notas' => 'required|string'
        ]);
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
     * @param $idFinca
     * @param $idParcela
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Editar una parcela
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
     * @param Request $request
     * @param $idFinca
     * @param $idParcela
     * @return \Illuminate\Http\RedirectResponse
     * Guardar los cambios
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'hectareas' => 'required|numeric|min:0',
            'tipo_cultivo_id' => 'required|exists:tipo_cultivos,id',
            'fecha_siembra' => 'required|date',
            'estado' => 'required|in:en_cultivo,en_descanso,preparacion',
            'notas' => 'required|string'
        ]);

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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * funcion para buscar
     */
    public function buscar(Request $request, $id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);
        $texto = $request->input('texto');

        if ($texto) {
            $parcelas = $finca->parcelas()
                ->where(function($q) use ($texto) {
                    $q->where('nombre', 'like', "%$texto%")
                        ->orWhere('estado', 'like', "%$texto%");
                })
                ->paginate(6)
                ->appends(['texto' => $texto]);
        } else {
            $parcelas = $finca->parcelas()->paginate(6);
        }

        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.index', compact('finca', 'parcelas', 'tipoCultivos'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * funcion para filtrar
     */
    public function filtrar(Request $request, $id)
    {
        $user = auth()->user();
        $finca = $user->fincas()->findOrFail($id);

        $tipo = $request->input('tipo_cultivo', 'todos');
        $estado = $request->input('estado', 'todos');

        if ($tipo == 'todos' && $estado == 'todos') {
            $parcelas = $finca->parcelas()->paginate(6);
        } elseif ($tipo == 'todos') {
            $parcelas = $finca->parcelas()->where('estado', $estado)->paginate(6);
        } elseif ($estado == 'todos') {
            $parcelas = $finca->parcelas()->where('tipo_cultivo_id', $tipo)->paginate(6);
        } else {
            $parcelas = $finca->parcelas()
                ->where('tipo_cultivo_id', $tipo)
                ->where('estado', $estado)
                ->paginate(6);
        }

        $tipoCultivos = TipoCultivo::all();
        return view('parcelas.index', compact('finca', 'parcelas', 'tipoCultivos'));
    }



    /////APIIII
    ///
    /**
     * @param $id
     * @return mixed
     * Obtener la lista de parcelas de una finca específica
     */
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Actualizar una parcela (cambiar cultivo, estado, etc.)
     */
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Asignar o cambiar el tipo de cultivo de una
     * parcela
     */
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Eliminar una parcela
     */

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
