<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\TipoUsuario;

class TiposusuarioController extends Controller
{
    public function index() {$tiposUsuario = TipoUsuario::select('id', 'descripcion')-> get();
    return $tiposUsuario;

    }
}
