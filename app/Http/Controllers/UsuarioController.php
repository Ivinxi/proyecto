<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuario;
use App\Factura;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsuarioController extends Controller
{

    public function perfil(){
        return view('perfil');
    }

    public function facturasUsuario(){
        $usuario = Usuario::find(Auth::user()->id_usuario);

        $facturas = $usuario->factura->sortDesc();

        return view('facturas_usuario', [ 'facturas' => $facturas]);
    }

    //MOSTRAR TODOS LOS USUARIOS

    public function show()
    {
        $usuarios = Usuario::withTrashed()
                    ->orderBy('deleted_at')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(15);

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
            'rol' => request('rol'),
    		'apellidos' => request('apellidos'),
    		'telefono' => request('telefono'),
    		'direccion1' => request('direccion1'),
    		'direccion2' => request('direccion2'),
    		'provincia' => request('provincia'),
    		'localidad' => request('localidad'),
    		'codigo_postal' => request('codigo_postal'),
        ]);

        return redirect()->back()->with('create', true);
    }

    //MODIFICAR USUARIO

    public function update(Usuario $usuario)
    {

        if($usuario->email == request('email')) {
            $usuario->update($this->validatorSinEmail());
        }
        else
        {
            $usuario->update($this->validator());
        }
       
        $usuario->rol = request('rol');

        $usuario->save();

        if(request()->is('admin/usuarios/update/*')){
            return redirect(route('admin/usuarios'))->with('update', true);
        }else{
            return redirect(route('perfil'))->with('update', true);
        }

        return redirect()->back()->with('update', true);
        
    }

    //ELIMINAR UN USUARIO

    public function delete(Usuario $usuario)
    {

        $usuario->delete();


        return redirect()->back()->with('delete', true);      
    }

    //RESTAURAR USUARIO

    public function restore($id_usuario)
    {
        Usuario::withTrashed()->find($id_usuario)->restore();

        return redirect()->back()->with('restore', true);
    }

    public function updatePerfil(){

        $usuario = Usuario::find(Auth::user()->id_usuario);

        if($usuario){

            if($usuario->email == request('email')) {
                $usuario->update($this->validatorSinEmail());
            }
            else
            {
                $usuario->update($this->validator());
            } 
            
            $usuario->rol = Auth::user()->rol;

            $usuario->save();           
        }

        return redirect(route('perfil'))->with('update', true);
    }

    //VALIDAR DATOS

    protected function validator()
    {
        return request()->validate([
			'nombre_usuario' => 'max:50|regex:/^[A-zÀ-ú ]*$/',
    		'email' => 'max:50|unique:usuarios',
    		'password' => 'min:8',
    		'apellidos' => 'nullable|max:50|regex:/^[A-zÀ-ú ]*$/',
    		'telefono' => 'nullable|size:9|regex:/^[0-9 ]*$/',
    		'direccion1' => 'nullable|max:50|regex:/^[A-zÀ-ú0-9\,\.\º\-\ª\/ ]*$/',
    		'direccion2' => 'nullable|max:50|regex:/^[A-zÀ-ú0-9\,\.\º\-\ª\/ ]*$/',
    		'provincia' => 'nullable|max:20|regex:/^[A-zÀ-ú ]*$/',
    		'localidad' => 'nullable|max:20|regex:/^[A-zÀ-ú ]*$/',
    		'codigo_postal' => 'nullable|size:5|regex:/^[0-9 ]*$/',  
        ]);
    }

    protected function validatorSinEmail()
    {
        return request()->validate([
			'nombre_usuario' => 'max:50|regex:/^[A-zÀ-ú ]*$/',
    		'apellidos' => 'nullable|max:50|regex:/^[A-zÀ-ú ]*$/',
    		'telefono' => 'nullable|size:9|regex:/^[0-9 ]*$/',
    		'direccion1' => 'nullable|max:50|regex:/^[A-zÀ-ú0-9\,\.\º\-\ª ]*$/',
    		'direccion2' => 'nullable|max:50|regex:/^[A-zÀ-ú0-9\,\.\º\-\ª ]*$/',
    		'provincia' => 'nullable|max:20|regex:/^[A-zÀ-ú ]*$/',
    		'localidad' => 'nullable|max:20|regex:/^[A-zÀ-ú ]*$/',
    		'codigo_postal' => 'nullable|size:5|regex:/^[0-9 ]*$/',  
        ]);
    }
}
