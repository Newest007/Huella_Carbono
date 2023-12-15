@extends('layouts.template')
@section('content')
@section('title','Gestionar Usuarios')
@csrf
    <!-- inicio breadcrumb NO QUITAR  -->
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Huella de Carbono</h5> 
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Gestionar Usuarios</li>
                            <li class="breadcrumb-item">Visualizar Usuarios</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- fin de breadcrumb -->

        <!-- INICIO DE CONTENIDO -->
        @if(session('success'))
        <div class="alert alert-success mt-3">{{session('success')}}</div>
        @endif

        <div class="card table-card mt-4">
            <div class="card-header">
                <center><h5>USUARIOS REGISTRADOS </h5></center>
            </div>
            <div class="pro-scroll " style=";position:relative;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if($usuarios)
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Colegio Perteneciente</th>
                                        <th>Eliminar Usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->nombre}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->Nombre}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar{{$usuario->id_usuario}}">Eliminar</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Secciones de Modales -->
        <!-- Eliminar -->
        @foreach($usuarios as $usuario)
        <div class="modal fade" id="eliminar{{$usuario->id_usuario}}" tabindex="-1" role="dialog" aria-labelledby="eliminar{{$usuario->id_usuario}}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminar{{$usuario->id_usuario}}Label">Confirmación de eliminación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('usuarios.destroy', ['id_usuario' => $usuario->id_usuario])}}">
                        @csrf
                        @method('DELETE')
                        <center><h4>Estas por eliminar al usuario {{$usuario->nombre}}, ¿Estas seguro? </h4></center>
                </div>
                <div class="modal-footer">
                        <center><button type="submit" class="btn btn-danger">Si</button></center>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
                </div>
            </div>
        </div>
        @endforeach

        
    </div> <!-- NO BORRAR -->


@endsection