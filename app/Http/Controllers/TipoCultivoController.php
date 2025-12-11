<?php

namespace App\Http\Controllers;

use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class TipoCultivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cambiado all() por paginate
        $tipoCultivos = TipoCultivo::paginate(6);
        return view('tipo_cultivo.index', compact('tipoCultivos'));
    }

    public function filtrar(Request $request)
    {
        $familia = $request->input('familia');
        $ciclo = $request->input('ciclo');

        // mostrar todos
        if (($familia == 'todas') && ($ciclo == 'todos')) {
            $tipoCultivos = TipoCultivo::paginate(6);

        } // Filtrar por familia
        else if ($ciclo == 'todos') {
            $tipoCultivos = TipoCultivo::where('familia', '=', $familia)
                ->paginate(6)
                ->withQueryString();

        } // Filtrar por ciclo
        else if ($familia == 'todas') {
            $tipoCultivos = TipoCultivo::where('ciclo', '=', $ciclo)
                ->paginate(6)
                ->withQueryString();
        } // Filtrar por los dos
        else {
            $tipoCultivos = TipoCultivo::where('familia', '=', $familia)
                ->where('ciclo', '=', $ciclo)
                ->paginate(6)
                ->withQueryString();
        }

        return view('tipo_cultivo.index', compact('tipoCultivos'));
    }

    public function buscar(Request $request)
    {
        $buscar = $request->input('buscar');
        if ($buscar == null || $buscar == '') {
            $tipoCultivos = TipoCultivo::paginate(6);
        } else {
            $tipoCultivos = TipoCultivo::where('nombre', 'like', "%$buscar%")
                ->orWhere('nombre_cientifico', 'like', "%$buscar%")
                ->paginate(6)
                ->withQueryString();
        }

        return view('tipo_cultivo.index', compact('tipoCultivos'));
    }


    //APIIIIIIIIIIII
    public function apiGetTiposCultivo()
    {
        $tipos = TipoCultivo::all();
        return $tipos->toResourceCollection();
    }
}
