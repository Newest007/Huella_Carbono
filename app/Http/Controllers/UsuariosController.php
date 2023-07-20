<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Colegio;
use App\Mail\CorreoPass;

class UsuariosController extends Controller
{

    public function index()
    {
        $viewBag = array();
        $viewBag['usuarios'] = DB::table('user')->join('colegio','colegio.id_colegio','=','user.id_colegio')->where('id_rol','CLG001')->get();
        //$viewBag['usuarios'] = DB::table('user')->get();
        return view('GestionarUsuarios.verUsuarios',$viewBag);
    }

    public function create()
    {
        $viewBag=array();
        $viewBag['colegios'] = Colegio::get();
        return view('GestionarUsuarios.index',$viewBag);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'correoElectrónico' => 'required|email|unique:user,email'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return redirect('/AñadirUsuarios')->withErrors($validator)->withInput();
        }
        else{
            $usuarios = new User();

            $colegioSeleccionado = $request->input('colegio');
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $correo = $request->input('correoElectrónico');
            $iniciales = strtoupper(substr($nombre,0,2));
            $numeros = rand(1000,9999);

            $colegio = json_decode(Colegio::where('Nombre',$colegioSeleccionado)->get()); //Obteniendo toda la información referente al colegio seleccionado en el select
            
            //Guardado de datos
            $usuarios->id_usuario = $iniciales.$numeros;
            $usuarios->id_colegio = $colegio[0]->id_colegio;
            $usuarios->id_rol = "CLG001";
            $usuarios->nombre = $nombre.' '.$apellido;
            $usuarios->email = $correo;
            

            //Generando contraseña y enviando el correo
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $contraseña = '';
            $tamaño = 9;

            for($i=0; $i < $tamaño; $i++){
                $contraseña .= $caracteres[random_int(0,strlen($caracteres) - 1)];
            }

            Mail::to($correo)->send(new CorreoPass($contraseña)); //Transmiento variable de acceso
            $usuarios->password = password_hash($contraseña, PASSWORD_BCRYPT);
            $usuarios->save();

            return redirect('VerUsuarios')->with('success','Se ha registrado el usuario '. $nombre.' '.$apellido . ' correctamente');
        }

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id_usuario)
    {
        User::destroy($id_usuario);
        $viewBag = array();
        $viewBag['usuarios'] = DB::table('user')->join('colegio','colegio.id_colegio','=','user.id_colegio')->where('id_rol','CLG001')->get();
        return redirect('usuarios')->with('success','Se ha eliminado el usuario correctamente');
    }
}
