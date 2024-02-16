<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;
    protected $table="recibos";
    protected $primaryKey="id";
    protected $fillable = ['nombre','apellido_paterno', 'apellido_materno','cantidad_numero','cantidad_letra','fecha','fecha_creacion','concepto','nombre_agente'];

    // public $timestamps = false;

}
