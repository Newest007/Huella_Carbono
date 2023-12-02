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
        
        @if(session('successEnergia'))
            <div class="alert alert-success mt-3">{{session('successEnergia')}}</div>
        @endif
        @if(session('errorEnergia'))
            <div class="alert alert-success mt-3">{{session('errorEnergia')}}</div>
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
                    <a class="nav-link active" aria-current="page" href="VerDatosEnergia">Consumo Energético</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosGas">Consumo Gasolina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosPapel">Consumo Papel</a>
                </li>
            </ul>
        </div>

        <div class="card table-card">
            <div class="card-header">
                <center><h5>Datos Registrados del Consumo de Energía Eléctrica</h5></center>
            </div>
            <div class="pro-scroll " style=";position:relative;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if($consumoEnergia)
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Colegio Perteneciente</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Consumo en kWts</th>
                                        <th>Toneladas de CO2</th>
                                        <th>Eliminar Dato</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumoEnergia as $energia)
                                    <tr>
                                        <td>{{$energia->Nombre}}</td>
                                        <td>{{$energia->id_Anio}}</td>
                                        <td>{{$energia->Mes}}</td>
                                        <td>{{$energia->Consumo_kWts}}</td>
                                        <td>{{$energia->Ton_CO2}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar{{$energia->id_colegio}}{{$energia->id_Anio}}{{$energia->Mes}}">Eliminar</button>
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

        @foreach($consumoEnergia as $energia)
        <div class="modal fade" id="eliminar{{$energia->id_colegio}}{{$energia->id_Anio}}{{$energia->Mes}}" tabindex="-1" role="dialog" aria-labelledby="eliminar{{$energia->id_colegio}}{{$energia->id_Anio}}{{$energia->Mes}}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminar{{$energia->id_colegio}}{{$energia->id_Anio}}{{$energia->Mes}}Label">Confirmación de eliminación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('datosEnergia.destroy', ['id_colegio' => $energia->id_colegio, 'id_Anio' => $energia->id_Anio, 'Mes' => $energia->Mes] )}}">
                        @csrf
                        @method('DELETE')
                        <center><h4>Estas por eliminar uno de los registros del colegio {{$energia->Nombre}}, ¿Estas seguro? </h4></center>
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