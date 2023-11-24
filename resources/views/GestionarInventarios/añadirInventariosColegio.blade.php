@extends('layouts.templateUser')
@section('content')
@section('title','Gestionar Inventarios')
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
                            <li class="breadcrumb-item">Gestionar Inventario</li>
                            <li class="breadcrumb-item">Añadir Objetos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="card mt-4">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir objeto al inventario </h2></center>
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
                                    <label for="userLastName" class="form-label">Nombre (Descripción)</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="text" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Cantidad:</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Marca:</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Equipo generico</option>
                                        </select>
                                    </div>
                                </div>      
                            </div>
                            <div class="row mb-3">
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Extras:</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="text" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div> 
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Ubicación:</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="text" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-sm-12">
                                    <label for="userLastName" class="form-label">Consumo (Kw);</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="number" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="userLastName" class="form-label">Tipo:</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Desktop</option>
                                        </select>
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