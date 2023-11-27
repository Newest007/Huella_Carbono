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
    </div> <!-- NO BORRAR -->


@endsection