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
                <a class="nav-link active" aria-current="page" href="">Consumo de Agua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Enlace</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Enlace</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Deshabilitado</a>
            </li>
        </ul>
        </div>

        <div class="card table-card mt-4">
            <div class="card-header">
                <center><h5>Datos Registrados del Consumo de Agua</h5></center>
            </div>
            <div class="pro-scroll " style=";position:relative;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if($consumoAgua)
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Colegio Perteneciente</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Consumo en m3</th>
                                        <th>Toneladas de CO2 en m3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumoAgua as $agua)
                                    <tr>
                                        <td>{{$agua->Nombre}}</td>
                                        <td>{{$agua->id_Anio}}</td>
                                        <td>{{$agua->Mes}}</td>
                                        <td>{{$agua->Consumo_m3}}</td>
                                        <td>{{$agua->Ton_CO2_m3}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card table-card mt-4">
                    <div class="card-header">
                        <center><h5>Datos DE PRUEBA </h5></center>
                    </div>
                    <div class="pro-scroll " style=";position:relative;">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>HeadPhone</td>
                                            <td><img src="assets/images/widget/p1.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-warning">Pending</label></div>
                                            </td>
                                            <td>$10</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16  text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td><img src="assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-danger">Cancel</label></div>
                                            </td>
                                            <td>$20</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16  text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Jacket</td>
                                            <td><img src="assets/images/widget/p3.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-success">Success</label></div>
                                            </td>
                                            <td>$35</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Sofa</td>
                                            <td><img src="assets/images/widget/p4.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-danger">Cancel</label></div>
                                            </td>
                                            <td>$85</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td><img src="assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-success">Success</label></div>
                                            </td>
                                            <td>$20</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>HeadPhone</td>
                                            <td><img src="assets/images/widget/p1.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-warning">Pending</label></div>
                                            </td>
                                            <td>$50</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td><img src="assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge bg-light-danger">Cancel</label></div>
                                            </td>
                                            <td>$30</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        
    </div> <!-- NO BORRAR -->


@endsection