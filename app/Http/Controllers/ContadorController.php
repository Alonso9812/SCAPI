<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContadorController extends Controller
{
    public function contarRegistros()
    {
        $num_registros = DB::table('reservaciones')->count();
        return response()->json(['num_registros' => $num_registros]);
    }
}
