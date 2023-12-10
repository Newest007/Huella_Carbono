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
                    <a class="nav-link active" aria-current="page" href="datos">Colegio Don Bosco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GraficaSC">Colegio Santa Cecilia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GraficaSJ">Colegio San José</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="GraficaMA">Casa María Auxiliadora</a>
                </li>
            </ul>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('datos.mostrarGraficaDB')}}">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-4"></div>
                            <div class="col-3">
                                <select id="anio" name="anio" class="form-select">
                                    <option selected>Seleccione un año</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                                <center><button type="submit" class="btn btn-primary mt-3">Ver Gráfica</button></center>
                            </div>
                        </div>
                        </form>
                        @if($anioSeleccionado !== null)
                        <center><h5>Graficas del año: {{$anioSeleccionado}}</h5></center>
                        <script>
                            var mesesAgua = @json($mesesAgua);
                            var consumoAgua = @json($consumoAgua);
                            var mesesDiesel = @json($mesesDiesel);
                            var consumoDiesel = @json($consumoDiesel);
                            var mesesEner = @json($mesesEner);
                            var consumoEner = @json($consumoEner);
                            var mesesGas = @json($mesesGas);
                            var consumoGas = @json($consumoGas);
                            var mesesPapel = @json($mesesPapel);
                            var consumoPapel = @json($consumoPapel);
                        </script>

                        <div class="row">
                            <div class="col-6 mt-4">
                                <h3>Consumo de agua</h3>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesAgua->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-agua"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <h3>Consumo de Diesel</h3>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesDiesel->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-diesel"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 mt-4">
                                <h3>Consumo de Energía</h3>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesEner->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-ener"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <h3>Consumo de Gasolina</h3>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesGas->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-gas"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-4">
                                <h3>Consumo de Papel</h3>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesPapel->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-papel"></div>
                                        @endif
                                    </div>
                                </div>
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
                    <div class="mb-3" id="chart"></div>
                </div>
            </div>
            @endif
        </div>
    </div>


@endsection