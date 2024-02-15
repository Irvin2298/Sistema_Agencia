<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nombramiento extends Model
{
    use HasFactory;
    protected $table="nombramientos";
    protected $primaryKey="id";
    protected $fillable = ['nombre','apellido_paterno', 'apellido_materno','cargo','fecha_inicio','fecha_fin','fecha_creacion','nombre_agente'];

    // public $timestamps = false;

}
