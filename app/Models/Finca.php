<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Finca extends Model
{

    protected $fillable = ['nombre' , 'ubicacion' , 'hectareasTotales' , 'user_id' , 'descripcion'];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function parcelas(): HasMany{
        return $this->hasMany(Parcela::class);
    }
}
