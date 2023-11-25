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
                    <a class="nav-link active" aria-current="page" href="VerDatosGas">Consumo Gasolina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="VerDatosPapel">Consumo Papel</a>
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
                                        <td>{{$gas->Consumo_m3}}</td>
                                        <td>{{$diesel->Km_CO2_m3}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- NO BORRAR -->


@endsection