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
                            <li class="breadcrumb-item">Gestionar Datos</li>
                            <li class="breadcrumb-item">Visualizar Graficas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- fin de breadcrumb -->

        <!-- INICIO DE CONTENIDO -->

        <div class="mt-3">
            <div class="row mb-4">
                <div class="col-4"></div>
                <div class="col-3">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Selecciones un año</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2023</option>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center><h5>GRAFICA DE MUESTRAAAA</h5></center>
                        </div>
                        <div class="card-body">
                            <div class="row pb-2">
                                <div class="col-auto m-b-10">
                                    <h3 class="mb-1">$21,356.46</h3>
                                    <span>Total Sales</span>
                                </div>
                                <div class="col-auto m-b-10">
                                    <h3 class="mb-1">$1935.6</h3>
                                    <span>Average</span>
                                </div>
                            </div>
                            <div id="account-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Customer Satisfaction</h6>
                        <span>It takes continuous effort to maintain high customer satisfaction levels Internal and external.</span>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col">
                                <div id="satisfaction-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                                <h2 class="m-0">53.94%</h2>
                                <span class="text-primary">Conversion Rate</span>
                                <p class="mb-3 mt-3">Number of conversions divided by the total visitors. </p>
                            </div>
                            <div id="support-chart"></div>
                            <div class="card-footer border-0 bg-primary text-white background-pattern-white">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0 text-white">10</h4>
                                        <span>2018</span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white">15</h4>
                                        <span>2017</span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white">13</h4>
                                        <span>2016</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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



        </div>


    </div>


@endsection