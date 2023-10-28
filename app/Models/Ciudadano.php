<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudadano extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','apellido_p', 'apellido_m','sexo','calle','num_calle','estado','curp','fecha_nacimiento','num_telefonico','cargo_id'];
}
