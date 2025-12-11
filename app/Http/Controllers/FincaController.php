<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $fincas = $user->fincas()->paginate(6);
        return view('fincas.index', compact('fincas' , 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function new() {
        return view('fincas.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function guardar(Request $request)
    {
        $nombre = $request->input('nombre');
        $ubicacion = $request->input('ubicacion');
        $hectareasTotales = $request->input('hectareasTotales');
        $descripcion = $request->input('descripcion');

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finca = Finca::findOrFail($id);
        return view('fincas.show', compact('finca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $finca = Finca::findOrFail($id);
        return view('fincas.edit', compact('finca'));
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     */

    /***
     * Eliminar una Finca
    */
    public function  eliminar($id)
    {
       $finca = Finca::findorfail($id);
       $finca->delete();
       return redirect()->route('mis_fincas');

    }



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
    public function apiGetFincas() {
        return Finca::where('user_id','=',auth()->id())->get()->toResourceCollection();

    }
    public function apiGetFincasById($id)
    {
        $finca = Finca::findOrFail($id);
        if ($finca->user_id == auth()->id()) {
            return $finca->toResource();
        } else {
            abort(403); //Forbidden
        }
    }
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
