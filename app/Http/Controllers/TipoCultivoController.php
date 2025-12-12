<?php

namespace App\Http\Controllers;

use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class TipoCultivoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Obtenir todos los tipos de cultivos
     */
    public function index()
    {
        $tipoCultivos = TipoCultivo::paginate(6);
        return view('tipo_cultivo.index', compact('tipoCultivos'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * Filtrar por familia y ciclo
     */

    public function filtrar(Request $request)
    {
        $familia = $request->input('familia');
        $ciclo = $request->input('ciclo');

        // mostrar todos
        if (($familia == 'todas') && ($ciclo == 'todos')) {
            $tipoCultivos = TipoCultivo::paginate(6);

        }
        // Filtrar por familia
        else if ($ciclo == 'todos') {
            $tipoCultivos = TipoCultivo::where('familia', '=', $familia)
                ->paginate(6)
                ->withQueryString();

        }
        // Filtrar por ciclo
        else if ($familia == 'todas') {
            $tipoCultivos = TipoCultivo::where('ciclo', '=', $ciclo)
                ->paginate(6)
                ->withQueryString();
        }
        // Filtrar por los dos
        else {
            $tipoCultivos = TipoCultivo::where('familia', '=', $familia)
                ->where('ciclo', '=', $ciclo)
                ->paginate(6)
                ->withQueryString();
        }

        return view('tipo_cultivo.index', compact('tipoCultivos'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     * filtro de buscar
     */
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

    /**
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     * @throws \Throwable
     * Obtener la lista completa de tipos de cultivo disponibles
     */
    public function apiGetTiposCultivo()
    {
        $tipos = TipoCultivo::all();
        return $tipos->toResourceCollection();
    }
}
