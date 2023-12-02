@extends('layouts.template')
@section('content')
@section('title','Gestionar Datos')
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
                            <li class="breadcrumb-item">Gestionar Datos</li>
                            <li class="breadcrumb-item">Visualizar Datos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- fin de breadcrumb -->

        <!-- INICIO DE CONTENIDO -->

        @if(session('successPapel'))
            <div class="alert alert-success mt-3">{{session('successPapel')}}</div>
        @endif
        @if(session('errorPapel'))
            <div class="alert alert-success mt-3">{{session('errorPapel')}}</div>
        @endif
        
        <div class="container mt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosAgua">Consumo de Agua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosDiesel">Consumo Diesel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosEnergia">Consumo Energético</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosGas">Consumo Gasolina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="VerDatosPapel">Consumo Papel</a>
                </li>
            </ul>
        </div>

        <div class="card table-card">
            <div class="card-header">
                <center><h5>Datos Registrados del Consumo de Papel</h5></center>
            </div>
            <div class="pro-scroll " style=";position:relative;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if($consumoPapel)
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Colegio Perteneciente</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Consumo en m3</th>
                                        <th>Toneladas de CO2</th>
                                        <th>Eliminar Dato</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumoPapel as $papel)
                                    <tr>
                                        <td>{{$papel->Nombre}}</td>
                                        <td>{{$papel->id_Anio}}</td>
                                        <td>{{$papel->Mes}}</td>
                                        <td>{{$papel->Consumo_m3}}</td>
                                        <td>{{$papel->Ton_CO2}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar{{$papel->id_colegio}}{{$papel->id_Anio}}{{$papel->Mes}}">Eliminar</button>
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

        @foreach($consumoPapel as $papel)
        <div class="modal fade" id="eliminar{{$papel->id_colegio}}{{$papel->id_Anio}}{{$papel->Mes}}" tabindex="-1" role="dialog" aria-labelledby="eliminar{{$papel->id_colegio}}{{$papel->id_Anio}}{{$papel->Mes}}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminar{{$papel->id_colegio}}{{$papel->id_Anio}}{{$papel->Mes}}Label">Confirmación de eliminación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('datosPapel.destroy', ['id_colegio' => $papel->id_colegio, 'id_Anio' => $papel->id_Anio, 'Mes' => $papel->Mes] )}}">
                        @csrf
                        @method('DELETE')
                        <center><h4>Estas por eliminar uno de los registros del colegio {{$papel->Nombre}}, ¿Estas seguro? </h4></center>
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