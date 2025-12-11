<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParcelaResource extends JsonResource
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
            'hectareas' => $this->hectareas,
            'fecha_siembra' => $this->fecha_siembra,
            'estado' => $this->estado,
            'notas' => $this->notas,
            'tipo_cultivo' => [
                'id' => $this->tipoCultivo->id ?? null,
                'nombre' => $this->tipoCultivo->nombre ?? null,
            ],
            'finca_id' => $this->finca_id,
        ];
    }
}
