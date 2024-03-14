<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioVoluntariado extends Model
{
    use HasFactory;

    protected $table = 'usuario_voluntariados';

    protected $fillable = [
        'usuario_id',
        'voluntariado_id',
    ];

    public $timestamps=false;
}
