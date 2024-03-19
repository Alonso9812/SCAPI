<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Campanas extends Model
{
    
    use  HasFactory;

    protected $table = 'campañas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion' ,
        'fecha',
        'alimentacion',
        'capacidad',
        'tipo',
        'galeria',
        'inOex',
        'status',
    ];

    public $timestamps = false;
}