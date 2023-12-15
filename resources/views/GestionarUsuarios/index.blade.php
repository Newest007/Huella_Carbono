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
                            <li class="breadcrumb-item">Gestionar Usuarios</li>
                            <li class="breadcrumb-item">Añadir</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card mt-3">
                    <div class="card-header mt-3">
                        <center><h2 class="card-title">Añadir nuevo usuario</h2></center>
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
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userName" class="form-label">Nombre</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">person</i></span>
                                        <input type="text" class="form-control" id="userName" name="nombre" value="{{old('nombre')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userLastName" class="form-label">Apellido</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">group</i></span>
                                        <input type="text" class="form-control" id="userLastName" name="apellido" value="{{old('apellido')}}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userEmail" class="form-label">Correo Electrónico</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">mail</i></span>
                                        <input type="email" class="form-control" id="userEmail" name="correoElectrónico" value="{{old('correoElectrónico')}}">
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userSchool" class="form-label">Institución Salesiana</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="material-icons-two-tone">corporate_fare</i></span>
                                        <select class="form-select" id="colegio" name="colegio">
                                            @foreach($colegios as $colegio)
                                            <option value="{{$colegio->Nombre}}">{{$colegio->Nombre}}</option>
                                            @endforeach
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