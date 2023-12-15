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
                    <a class="nav-link" aria-current="page" href="datos">Colegio Don Bosco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="datosSC">Colegio Santa Cecilia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="datosSJ">Colegio San José</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="datosMA">Casa María Auxiliadora</a>
                </li>
            </ul>

            <div class="col-12">
                <div class="card">
                    <script>
                        var anioAnual = @json($anioAnual);
                        var consumoAguaAnual = @json($consumoAguaAnual);
                        var consumoAguaTon = @json($consumoAguaTon);
                        var consumoDieselAnual = @json($consumoDieselAnual);
                        var consumoDieselTon = @json($consumoDieselTon);
                        var consumoEnergiaAnual = @json($consumoEnergiaAnual);
                        var consumoEnergiaTon = @json($consumoEnergiaTon);
                        var consumoGasAnual = @json($consumoGasAnual);
                        var consumoGasTon = @json($consumoGasTon);
                        var consumoPapelAnual = @json($consumoPapelAnual);
                        var consumoPapelTon = @json($consumoPapelTon);
                    </script>
                    <center><h4 class="my-4">Consumo por año</h4></center>
                    <div class="m-4" id="consumo-anual"></div>
                    <center><h4 class="mt-4">Ton de CO2 por año</h4></center>
                    <div class="m-4" id="consumo-co2"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <form method="POST" action="{{route('datos.mostrarGraficaSJ')}}">
                        @csrf
                        <div class="row mb-4">
                            <center><h4 class="mb">Graficas mensuales</h4></center>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <label for="año" class="form-label">Seleccione el año:</label>
                                <select id="anio" name="anio" class="form-select">
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
                            var co2Agua = @json($co2Agua);

                            var mesesDiesel = @json($mesesDiesel);
                            var consumoDiesel = @json($consumoDiesel);
                            var co2Diesel = @json($co2Diesel);

                            var mesesEner = @json($mesesEner);
                            var consumoEner = @json($consumoEner);
                            var co2Ener = @json($co2Ener);

                            var mesesGas = @json($mesesGas);
                            var consumoGas = @json($consumoGas);
                            var co2Gas = @json($co2Gas);

                            var mesesPapel = @json($mesesPapel);
                            var consumoPapel = @json($consumoPapel);
                            var co2Papel = @json($co2Papel);

                        </script>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card text-white bg-dark mt-3">
                    <div class="card-body">
                        <center><a class="h1">AGUA</a></center>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <center><h4>Consumo de agua (m3)</h4></center>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col">
                                    @if($mesesAgua->count() == 0)
                                    <center><h5>No hay datos que mostrar</h5></center>
                                    @else
                                    <div id="consumo-agua" class="mb-4"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <center><h4>Toneladas de CO2 de agua</h4></center>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col">
                                    @if($mesesAgua->count() == 0)
                                    <center><h5>No hay datos que mostrar</h5></center>
                                    @else
                                    <div id="consumo-agua-co2"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card text-white bg-dark mt-3">
                    <div class="card-body">
                        <center><a class="h1">Diesel</a></center>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <center><h4>Consumo de Diesel (m3)</h4></center>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col">
                                    @if($mesesDiesel->count() == 0)
                                    <center><h5>No hay datos que mostrar</h5></center>
                                    @else
                                    <div id="consumo-diesel" class="mb-4"></div>
                                    @endif
                                </div>
                            </div>
                            <center><h4>Toneladas de CO2 de Diesel</h4></center>
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col">
                                    @if($mesesDiesel->count() == 0)
                                    <center><h5>No hay datos que mostrar</h5></center>
                                    @else
                                    <div id="consumo-diesel-co2"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card text-white bg-dark mt-3">
                    <div class="card-body">
                        <center><a class="h1">Energía Eléctrica</a></center>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <center><h3>Consumo de Energia (kWts)</h3></center>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesEner->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-ener"></div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <center><h3>Toneladas de CO2 de Energia</h3></center>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesEner->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-ener-co2"></div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card text-white bg-dark mt-3">
                    <div class="card-body">
                        <center><a class="h1">Gasolina</a></center>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <center><h3>Consumo de Gasolina (m3)</h3></center>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesGas->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-gas"></div>
                                        @endif
                                    </div>
                                </div>
                                <center><h3>Toneladas de CO2 de Gasolina</h3></center>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesGas->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-gas-co2"></div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card text-white bg-dark mt-3">
                    <div class="card-body">
                        <center><a class="h1">Papel</a></center>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                                <center><h3>Consumo de Papel (m3)</h3></center>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesPapel->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-papel"></div>
                                        @endif
                                    </div>
                                </div>
                                <center><h3>Toneladas de CO2 de Papel</h3></center>
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col">
                                        @if($mesesPapel->count() == 0)
                                        <center><h5>No hay datos que mostrar</h5></center>
                                        @else
                                        <div id="consumo-papel-co2"></div>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card text-white bg-dark mt-3">
                    <div class="card-body">
                        <center><a class="h2">Cosumo General por Mes</a></center>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="mb-3" id="chart"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div> <!-- NO BORRAR -->


@endsection