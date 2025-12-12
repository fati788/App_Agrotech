<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Index que devuelve las fincas del usuario logeado
     */
    public function index()
    {
        $user = auth()->user();
        $fincas = $user->fincas()->paginate(6);
        return view('fincas.index', compact('fincas' , 'user'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Crear una nueva finca desde la vista
     */

    public function new() {
        return view('fincas.new');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Guardar la nueva finca
     */
    public function guardar(Request $request)
    {
        $nombre = $request->input('nombre');
        $ubicacion = $request->input('ubicacion');
        $hectareasTotales = $request->input('hectareasTotales');
        $descripcion = $request->input('descripcion');

        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'hectareasTotales' => 'required',
            'descripcion' => 'required',
        ]);

        Finca::create([
            'nombre' => $nombre,
            'ubicacion' => $ubicacion,
            'hectareasTotales' => $hectareasTotales,
            'descripcion' => $descripcion,
            'user_id' => auth()->id()
        ]);
        return redirect('mis_fincas');
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Ver las informaciones de una finca
     */
    public function show(string $id)
    {
        $finca = Finca::findOrFail($id);
        return view('fincas.show', compact('finca'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Editar una finca
     */
    public function edit(string $id)
    {
        $finca = Finca::findOrFail($id);
        return view('fincas.edit', compact('finca'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Guardar los cambios
     */
    public function update(Request $request, string $id)
    {
        $finca = Finca::findOrFail($id);
        $nombre = $request->input('nombre');
        $ubicacion = $request->input('ubicacion');
        $hectareasTotales = $request->input('hectareasTotales');
        $descripcion = $request->input('descripcion');
        $finca->update([
            'nombre' => $nombre,
            'ubicacion' => $ubicacion,
            'hectareasTotales' => $hectareasTotales,
            'descripcion' => $descripcion,
        ]);
        return redirect('mis_fincas');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Eliminar una finca
     */
    public function  eliminar($id)
    {
       $finca = Finca::findorfail($id);
       $finca->delete();
       return redirect()->route('mis_fincas');

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Resumen de fincas del usuario con estadísticas
     */
    public function dashboard()
    {
        $user = auth()->user();
        $totalFincas = $user->fincas()->count();
        $hectareasTotales = $user->fincas()->sum('hectareasTotales');
        $totalParcelas = $user->fincas()->withCount('parcelas')->get()->sum('parcelas_count');

        $cultivos = TipoCultivo::withCount(['parcelas' => function($q) use ($user) {
            $q->whereIn('finca_id', $user->fincas->pluck('id'));
        }])->get();

        return view('dashboard', compact('totalFincas', 'hectareasTotales', 'totalParcelas', 'cultivos'));
    }




    //////APIIIIIIII

    /**
     * @return mixed
     * Obtener la lista de fincas del usuario autenticado
     */
    public function apiGetFincas() {
        return Finca::where('user_id','=',auth()->id())->get()->toResourceCollection();

    }

    /**
     * @param $id
     * @return void
     * Obtener detalles de una finca específica (solo si pertenece al
     * usuario)
     */
    public function apiGetFincasById($id)
    {
        $finca = Finca::findOrFail($id);
        if ($finca->user_id == auth()->id()) {
            return $finca->toResource();
        } else {
            abort(403); //Forbidden
        }
    }

    /**
     * @param Request $request
     * @return mixed
     * Crear una nueva finca
     */
    public function apiNewFinca(Request $request){
        $nombre = $request->input('nombre');
        $ubicacion = $request->input('ubicacion');
        $hectareasTotales = $request->input('hectareasTotales');
        $descripcion = $request->input('descripcion');
        $user_id = auth()->user()->id;
      $finca =  Finca::create([
            'nombre' => $nombre,
            'ubicacion' => $ubicacion,
            'hectareasTotales' => $hectareasTotales,
            'descripcion' => $descripcion,
              'user_id' => $user_id
        ]);
      return $finca->toResource();

    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     * Actualizar una finca existente
     */

    public function apiUpdateFinca($id , Request $request)
    {
        $finca = Finca::findOrFail($id);

        if ($finca->user_id != auth()->id()) {
            abort(403, 'No tienes permiso para actualizar esta finca');
        }

        $finca->update([
            'nombre' => $request->input('nombre', $finca->nombre),
            'ubicacion' => $request->input('ubicacion', $finca->ubicacion),
            'hectareasTotales' => $request->input('hectareasTotales', $finca->hectareas_totales),
            'descripcion' => $request->input('descripcion', $finca->descripcion),
        ]);

        return $finca->toResource();


    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * Eliminar una finca
     */
    public function apiDeleteFinca($id){
        $finca = Finca::findOrFail($id);

            //Verificar que la finca  pertenece al usuario logueado

            if ($finca->user_id != auth()->id()) {
                abort(403 , 'No tienes permiso para ELIMINAR esta finca'); //Forbidden
            }


        $finca->delete();
        return response()->json([
            "mensaje" => "Finca eliminada",
            "finca" => $finca->toResource()
        ]);

    }
}
