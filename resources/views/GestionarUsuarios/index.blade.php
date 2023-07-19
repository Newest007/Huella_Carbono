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
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header mt-3 ">
                        <center><h2 class="card-title">Añadir nuevo usuario</h2></center>
                    </div>
                    <div class="card-body mt-3">
                        <form>
                            <div class="row mb-3">
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userName" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="userName">
                                </div>
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userLastName" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="userLastName">
                                </div>
                                
                            </div>
                            <div class="row mb-3">
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userEmail" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="userEmail">
                                </div>
                                <div class="col-xxl-6 col-sm-12">
                                    <label for="userSchool" class="form-label">Institución Salesiana</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option>Institución 1</option>
                                        <option>Institución 2</option>
                                        <option>Institución 3</option>
                                        <option>Institución 4</option>
                                    </select>
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