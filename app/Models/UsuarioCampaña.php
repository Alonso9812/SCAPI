<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioCampaña extends Model
{
    use HasFactory;

    protected $table = 'usuariocampaña';

    protected $fillable = [
        'usuario_id',
        'campaña_id',
    ];

    public $timestamps=false;
}
