<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parcela extends Model
{

    protected $fillable = ['nombre', 'finca_id', 'tipo_cultivo_id' , 'hectareas' , 'fecha_siembra' , 'estado' , 'notas'];
    public function finca(): BelongsTo
    {
      return $this->belongsTo(Finca::class);
    }
    public function tipoCultivo(): BelongsTo
    {
        return $this->belongsTo(TipoCultivo::class);
    }
}
