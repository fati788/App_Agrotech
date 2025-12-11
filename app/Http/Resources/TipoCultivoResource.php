<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoCultivoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'nombre_cientifico' => $this->nombre_cientifico,
            'familia' => $this->familia,
            'ciclo' => $this->ciclo,
            'descripcion' => $this->descripcion,
        ];
    }
}
