<?php

namespace App\Models;

use App\Models\Asignaciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'curso_id',
        'fecha_inicio',
        'fecha_finalizacion',
        'importe',
        'estado',
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }



}
