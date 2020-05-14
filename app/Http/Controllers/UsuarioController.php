<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //MOSTRAR TODOS LOS USUARIOS

    public function show()
    {
        $usuarios = Usuario::get();

        return view('admin.usuarios.show_usuario', [ 'usuarios' => $usuarios]);
    }

    //MOSTRAR UN USUARIO

    public function edit(Usuario $usuario)
    {
        return view('admin.usuarios.update_usuario', [ 'usuario' => $usuario]);
    }

    //CREAR USUARIO

    public function create()
    {
    	$validator = $this->validator();

    	// return request();

    	Usuario::create([
            'nombre_usuario' => request('nombre_usuario'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'rol' => request('rol')
        ]);

        return redirect(route('admin/usuarios'))->with('create', true);
    }

    //MODIFICAR USUARIO

    public function update(Usuario $usuario)
    {
        $usuario->update($this->validator());

        return redirect(route('admin/usuarios'))->with('update', true);
    }

    //ELIMINAR UN USUARIO

    public function delete(Usuario $usuario)
    {
        $usuario->delete();

        return redirect(route('admin/usuarios'))->with('delete', true);      
    }

    //VALIDAR DATOS

    protected function validator()
    {
        return request()->validate([
			'nombre_usuario' => 'required|max:20|regex:/^[A-zÀ-ú]*$/|unique:usuarios',
    		'email' => 'required|max:50|unique:usuarios',
    		'password' => 'required|min:8',
        ]);
    }

}
