<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
use App\usuario;

class usuarioController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return usuario::where('id_usuario', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $usuario = new usuario();
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->id_usuario = auth()->id();
        $usuario->save();

        return $usuario;
    }

    public function update(Request $request, $id)
    {
        $usuario = usuario::find($id);   
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->save();

        return $usuario;
    }

    public function destroy($id)
    {
        $usuario = usuario::find($id);   
        $usuario->delete();
    }
}
