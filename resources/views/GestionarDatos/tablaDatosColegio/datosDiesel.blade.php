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

        @if(session('successDiesel'))
            <div class="alert alert-success mt-3">{{session('successDiesel')}}</div>
        @endif
        @if(session('errorDiesel'))
            <div class="alert alert-success mt-3">{{session('errorDiesel')}}</div>
        @endif
        
        <div class="container mt-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosAguaC">Consumo de Agua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="VerDatosDieselC">Consumo Diesel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosEnergiaC">Consumo Energético</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosGasC">Consumo Gasolina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosPapelC">Consumo Papel</a>
                </li>
            </ul>

            <div class="card table-card">
                <div class="card-header">
                    <center><h5>Datos Registrados del Consumo de Diesel</h5></center>
                </div>
                <div class="pro-scroll " style=";position:relative;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            @if($consumoDiesel)
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Colegio Perteneciente</th>
                                            <th>Año</th>
                                            <th>Mes</th>
                                            <th>Cantidad (Galones)</th>
                                            <th>Combustible en m3</th>
                                            <th>Toneladas de CO2 en m3</th>
                                            <th>Kg de CO2/m3</th>
                                            <th>Eliminar Dato</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consumoDiesel as $diesel)
                                        <tr>
                                            <td>{{$diesel->Nombre}}</td>
                                            <td>{{$diesel->id_Anio}}</td>
                                            <td>{{$diesel->Mes}}</td>
                                            <td>{{$diesel->Cantidad}}</td>
                                            <td>{{$diesel->Combustible_m3}}</td>
                                            <td>{{$diesel->Ton_CO2_m3}}</td>
                                            <td>{{$diesel->kGr_CO2_m3}}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar{{$diesel->id_colegio}}{{$diesel->id_Anio}}{{$diesel->Mes}}">Eliminar</button>
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
        </div>

        @foreach($consumoDiesel as $diesel)
        <div class="modal fade" id="eliminar{{$diesel->id_colegio}}{{$diesel->id_Anio}}{{$diesel->Mes}}" tabindex="-1" role="dialog" aria-labelledby="eliminar{{$diesel->id_colegio}}{{$diesel->id_Anio}}{{$diesel->Mes}}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminar{{$diesel->id_colegio}}{{$diesel->id_Anio}}{{$diesel->Mes}}Label">Confirmación de eliminación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('datosDieselC.destroy', ['id_colegio' => $diesel->id_colegio, 'id_Anio' => $diesel->id_Anio, 'Mes' => $diesel->Mes] )}}">
                        @csrf
                        @method('DELETE')
                        <center><h4>Estas por eliminar uno de los registros del colegio {{$diesel->Nombre}}, ¿Estas seguro? </h4></center>
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