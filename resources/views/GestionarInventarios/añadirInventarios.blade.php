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
                            <li class="breadcrumb-item">Gestionar Inventario</li>
                            <li class="breadcrumb-item">Añadir Objetos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class ="row">
            <div class="col-sm-12">
                <div class="card bg-dark">

                    <div class="login-box">
                        <div class="card-header">
                            <h2>Registro de nuevo Objeto</h2>
                        </div>
                        <div class="card-body">
                            <form>
                            <div class="row align-items-center">
                                <div class="row">
                                    <div class="col">
                                        <div class="user-box">
                                            <input type="text" id="name" name="" required="">
                                            <label>Nombre y Apellido</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="user-box">
                                            <input type="text" id="colegio" name="" required="">
                                            <label>Colegio perteneciente</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="user-box">
                                            <input type="email" id="email" name="" required="">
                                            <label>Correo electronico</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="user-box">
                                            <input type="text" name="" required="">
                                            <label>Contraseña</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" placeholder="Ingresa tu nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico">
                                </div>
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>   
    </div>


@endsection