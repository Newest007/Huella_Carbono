@extends('layouts.template')
@section('content')
@section('title','Gestionar Usuarios')
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

        <!-- Formulario para consumo de agua -->

        <div class="container">
            <div class="row justify-content-center">
                
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de agua </h2></center>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
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
                                    <label for="userLastName" class="form-label">Cantidad (Metros cúbicos)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                                
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
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
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
                                    <label for="userLastName" class="form-label">Cantidad (Galones)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
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
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
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
                                    <label for="userLastName" class="form-label">Cantidad (Kw/h)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
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
                        <center><h2 class="card-title">Añadir Cosumo de gasolina</h2></center>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
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
                                    <label for="userLastName" class="form-label">Cantidad (Galones)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
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
                        <center><h2 class="card-title">Añadir Cosumo de papel</h2></center>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
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
                                    <label for="userLastName" class="form-label">Cantidad (Toneladas)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario para consumo de gas propano -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir Cosumo de gas propano</h2></center>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body mt-3">
                        <form method="POST" action="{{route('usuarios.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="year" class="form-label">Año</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>2024</option>
                                            <option>2023</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userName" class="form-label">Mes</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <select class="form-select" aria-label="Default select example">
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
                                    <label for="userLastName" class="form-label">Cantidad (Toneladas)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
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