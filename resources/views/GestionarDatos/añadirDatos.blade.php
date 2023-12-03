@extends('layouts.template')
@section('content')
@section('title','Gestionar Datos')
@csrf
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
                            <li class="breadcrumb-item">Añadir Datos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(session('errorAgua'))
            <div class="alert alert-danger mt-3">{{session('errorAgua')}}</div>
        @endif
        @if(session('successAgua'))
            <div class="alert alert-success mt-3">{{session('successAgua')}}</div>
        @endif
        @if(session('errorDiesel'))
            <div class="alert alert-danger mt-3">{{session('errorDiesel')}}</div>
        @endif
        @if(session('successDiesel'))
            <div class="alert alert-success mt-3">{{session('successDiesel')}}</div>
        @endif
        @if(session('errorEnergia'))
            <div class="alert alert-danger mt-3">{{session('errorEnergia')}}</div>
        @endif
        @if(session('successEnergia'))
            <div class="alert alert-success mt-3">{{session('successEnergia')}}</div>
        @endif
        @if(session('errorGasolina'))
            <div class="alert alert-danger mt-3">{{session('errorGasolina')}}</div>
        @endif
        @if(session('successGasolina'))
            <div class="alert alert-success mt-3">{{session('successGasolina')}}</div>
        @endif
        @if(session('errorPapel'))
            <div class="alert alert-danger mt-3">{{session('errorPapel')}}</div>
        @endif
        @if(session('successPapel'))
            <div class="alert alert-success mt-3">{{session('successPapel')}}</div>
        @endif

        <!-- Formulario para consumo de agua -->
        
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de agua </h2></center>
                    </div>
                    @error('consumoAgua')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('datos.storeAgua')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example" id="anioAgua" name="anioAgua">
                                            <option selected>2024</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="mesAgua" name="mesAgua" class="form-select" aria-label="Default select example">
                                            <option selected>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Consumo (Metros cúbicos) Ej: 600</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="consumoAgua" name="consumoAgua" value="{{old('consumoAgua')}}">
                                    </div>
                                </div>
                                <!--
                                <div class="col-xxl-3 col-sm-12">
                                    <label for="userLastName" class="form-label">Toneladas (Metros cúbicos) Ej: 0.30</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="decimal" class="form-control" id="toneladasAgua" name="toneladasAgua" value="{{old('toneladasAgua')}}">
                                    </div>
                                </div>-->
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Formulario para consumo de diesel -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de gasolina (Diesel) </h2></center>
                    </div>
                    @error('consumoDiesel')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('datos.storeDiesel')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="anioDiesel" name="anioDiesel" class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="mesDiesel" name="mesDiesel" class="form-select" aria-label="Default select example">
                                            <option selected>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Cantidad (Galones) Ej: 50</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="consumoDiesel" name="consumoDiesel" value="{{old('consumoDiesel')}}">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Formulario para consumo de energía -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de energía</h2></center>
                    </div>
                    @error('consumoEnergia')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('datos.storeEnergia')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="anioEnergia" name="anioEnergia" class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="mesEnergia" name="mesEnergia" class="form-select" aria-label="Default select example">
                                            <option selected>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Consumo (Kw/h) Ej: 300.50</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="decimal" class="form-control" id="consumoEnergia" name="consumoEnergia" value="{{old('consumoEnergia')}}">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Formulario para consumo de gasolina -->
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de Gasolina</h2></center>
                    </div>
                    @error('consumoGasolina')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('datos.storeGasolina')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="anioGasolina" name="anioGasolina" class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="mesGasolina" name="mesGasolina" class="form-select" aria-label="Default select example">
                                            <option selected>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Cantidad (Galones) Ej: 85</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="consumoGasolina" name="consumoGasolina" value="{{old('consumoGasolina')}}">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Formulario para consumo de papel -->
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de Papel</h2></center>
                    </div>
                    @error('consumoPapel')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('datos.storePapel')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="anioPapel" name="anioPapel" class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="mesPapel" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select id="mesPapel" name="mesPapel" class="form-select" aria-label="Default select example">
                                            <option selected>Enero</option>
                                            <option>Febrero</option>
                                            <option>Marzo</option>
                                            <option>Abril</option>
                                            <option>Mayo</option>
                                            <option>Junio</option>
                                            <option>Julio</option>
                                            <option>Agosto</option>
                                            <option>Septiembre</option>
                                            <option>Octubre</option>
                                            <option>Noviembre</option>
                                            <option>Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="consumoPapel" class="form-label">Consumo (Toneladas) Ej: 50</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="consumoPapel" name="consumoPapel" value="{{old('consumoPapel')}}">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </div>


@endsection