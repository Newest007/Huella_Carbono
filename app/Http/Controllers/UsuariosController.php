<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewBag = array();
        $viewBag['usuarios'] = DB::table('user')->join('colegio','colegio.id_colegio','=','user.id_colegio')->where('id_rol','CLG001')->get();
        //$viewBag['usuarios'] = DB::table('user')->get();
        return view('GestionarUsuarios.verUsuarios',$viewBag);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('GestionarUsuarios.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_usuario)
    {
        User::destroy($id_usuario);
        $viewBag = array();
        $viewBag['usuarios'] = DB::table('user')->join('colegio','colegio.id_colegio','=','user.id_colegio')->where('id_rol','CLG001')->get();
        return redirect('usuarios')->with('success','Se ha eliminado el usuario correctamente');
    }
}
