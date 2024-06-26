<?php

namespace App\Models;

use App\Models\Asignaciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tareas extends Model
{
    use HasFactory;

    protected $fillable = [
        'asignacion_id',
        'descripcion',
        'entrega',
        'nota',
        'estado',
    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignaciones::class, 'asignacion_id');
    }
}
