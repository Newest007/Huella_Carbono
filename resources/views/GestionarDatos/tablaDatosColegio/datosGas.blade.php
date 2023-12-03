@extends('layouts.templateUser')
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

        @if(session('successGas'))
            <div class="alert alert-success mt-3">{{session('successGas')}}</div>
        @endif
        @if(session('errorGas'))
            <div class="alert alert-success mt-3">{{session('errorGas')}}</div>
        @endif
        
        <div class="container mt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosAguaC">Consumo de Agua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosDieselC">Consumo Diesel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosEnergiaC">Consumo Energético</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="VerDatosGasC">Consumo Gasolina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosPapelC">Consumo Papel</a>
                </li>
            </ul>
        </div>

        <div class="card table-card">
            <div class="card-header">
                <center><h5>Datos Registrados del Consumo de Gasolina</h5></center>
            </div>
            <div class="pro-scroll " style=";position:relative;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if($consumoGas)
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Colegio Perteneciente</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Cantidad (Galones)</th>
                                        <th>Combustible en m3</th>
                                        <th>Ton de CO2/m3</th>
                                        <th>Kg de CO2/m3</th>
                                        <th>Eliminar Dato</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumoGas as $gas)
                                    <tr>
                                        <td>{{$gas->Nombre}}</td>
                                        <td>{{$gas->id_Anio}}</td>
                                        <td>{{$gas->Mes}}</td>
                                        <td>{{$gas->Cantidad}}</td>
                                        <td>{{$gas->Combustible_m3}}</td>
                                        <td>{{$gas->Ton_CO2_m3}}</td>
                                        <td>{{$gas->Km_CO2_m3}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar{{$gas->id_colegio}}{{$gas->id_Anio}}{{$gas->Mes}}">Eliminar</button>
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

        @foreach($consumoGas as $gas)
        <div class="modal fade" id="eliminar{{$gas->id_colegio}}{{$gas->id_Anio}}{{$gas->Mes}}" tabindex="-1" role="dialog" aria-labelledby="eliminar{{$gas->id_colegio}}{{$gas->id_Anio}}{{$gas->Mes}}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminar{{$gas->id_colegio}}{{$gas->id_Anio}}{{$gas->Mes}}Label">Confirmación de eliminación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('datosGasC.destroy', ['id_colegio' => $gas->id_colegio, 'id_Anio' => $gas->id_Anio, 'Mes' => $gas->Mes] )}}">
                        @csrf
                        @method('DELETE')
                        <center><h4>Estas por eliminar uno de los registros del colegio {{$gas->Nombre}}, ¿Estas seguro? </h4></center>
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