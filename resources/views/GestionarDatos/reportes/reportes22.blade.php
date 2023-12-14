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
                    <a class="nav-link active" aria-current="page" href="GenerarReporteDos">Año 2022</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GenerarReporteTres">Consumo 2023</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GenerarReporteCuatro">Consumo 2024</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GenerarReporteCinco">Consumo 2025</a>
                </li>
            </ul>

            <div class="card table-card">
                
                <div class="row m-4">
                    <div class="card-group">
                        <div class="col-6">
                            <div class="card border text-center">
                                <div class="card-body p-4">
                                    <h5 class="card-title m-4">Reporte Mensual</h5>
                                    <hr>
                                    <form action="pdf_anio" method="post" target="_blank">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="mes" class="form-label">Seleccione el mes</label>
                                            <select name="mes" class="form-select">
                                                <option value="Enero">Enero</option>
                                                <option value="Febrero">Febrero</option>
                                                <option value="Marzo">Marzo</option>
                                                <option value="Abril">Abril</option>
                                                <option value="Mayo">Mayo</option>
                                                <option value="Junio">Junio</option>
                                                <option value="Julio">Julio</option>
                                                <option value="Agosto">Agosto</option>
                                                <option value="Septiembre">Septiembre</option>
                                                <option value="Octubre">Octubre</option>
                                                <option value="Noviembre">Noviembre</option>
                                                <option value="Diciembre">Diciembre</option>                                                
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" >Generar Reporte</button>
                                        <div class="mb-2">
                                            <label for="anio" class="form-label">Seleccione el año</label>
                                            <select name="anio" class="form-select">
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>                                                
                                            </select>
                                            
                                            <label for="anio" class="form-label">Seleccione el colegio</label>
                                            <select class="form-select" id="colegio" name="colegio">
                                            @foreach($colegios as $colegio)
                                            <option value="{{$colegio->Nombre}}">{{$colegio->Nombre}}</option>
                                            @endforeach
                                        </div>
                                        
                                    </form>

                                </div>  
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card border text-center">
                                <div class="card-body p-4">
                                    <h5 class="card-title m-4">Reporte Anual</h5>
                                    <hr>
                                    <form>
                                        <br><br>
                                        <a type="submit" class="btn btn-primary mt-1" href="pdf_anio" target="_blank">Generar Reporte</a>
                                        <br><br><br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- NO BORRAR -->


@endsection