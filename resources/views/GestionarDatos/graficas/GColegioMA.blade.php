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
                    <a class="nav-link" aria-current="page" href="GraficaDB">Colegio Don Bosco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="GraficaSC">Colegio Santa Cecilia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GraficaSJ">Colegio San José</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="GraficaMA">Casa María Auxiliadora</a>
                </li>
            </ul>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6>Customer Satisfaction</h6>
                                <span>It takes continuous effort to maintain high customer satisfaction levels Internal and external.</span>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        <div id="satisfaction-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <h2 class="m-0">53.94%</h2>
                                <span class="text-primary">Conversion Rate</span>
                                <p class="mb-3 mt-3">Number of conversions divided by the total visitors. </p>
                                <div id="support-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">1432</h2>
                        <span class="text-primary">Order delivered</span>
                        <p class="mb-3 mt-3">Total number of order delivered in this month.</p>
                    </div>
                    <div class="card-footer border-0">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0">130</h4>
                                <span>May</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0">251</h4>
                                <span>June</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 ">235</h4>
                                <span>July</span>
                            </div>
                        </div>
                    </div>
                    <div id="support-chart1"></div>
                </div>
            </div>
        </div>
    </div> <!-- NO BORRAR -->


@endsection