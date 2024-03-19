<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NuevosPuntos extends Model
{
    use HasFactory;

    protected $table = 'nuevos_puntos';

    protected $fillable = [
        'nombrePunto',
        'descripcionPunto',
        'ubicacionPunto' ,
        'galeria'=> 'file|mimes:jpg,jpeg,png,gif|max:4098',
        'statusPunto',
    ];
    public $timestamps = false;
}
