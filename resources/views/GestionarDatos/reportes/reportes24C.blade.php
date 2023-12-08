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
                    <a class="nav-link" aria-current="page" href="GenerarReporteDosC">Año 2022</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GenerarReporteTresC">Consumo 2023</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="GenerarReporteCuatroC">Consumo 2024</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GenerarReporteCincoC">Consumo 2025</a>
                </li>
            </ul>

            <div class="card table-card">
                
                <div class="row m-3">
                    <div class="card-group">
                        <div class="col-6">
                            <div class="card border text-center">
                                <div class="card-body p-4">
                                    <h5 class="card-title m-4">Reporte Mensual</h5>
                                    <hr>
                                    <form>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Seleccione el mes</label>
                                            <select class="form-select">
                                                <option>Enero</option>
                                                <option>Febrero</option>
                                                <option>Marzo</option>
                                                <option>Abril</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Generar Reporte</button>
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
                                        <button type="submit" class="btn btn-primary mt-1">Generar Reporte</button>
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