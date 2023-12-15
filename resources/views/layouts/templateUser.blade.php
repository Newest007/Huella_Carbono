<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">

    <!-- font css -->
    <link rel="stylesheet" href="{{asset('fonts/feather.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/material.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" id="main-style-link">

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo mt-2" style="color:white">
			<p> Don Bosco Green Alliance</p>
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="VerDatosAguaC" class="b-brand" style="color:white">
					<img src="{{asset('assets/dbga logo square.png')}}"width="40" height="40">  Don Bosco Green Alliance
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Gestionar datos</label>
					</li>
					<li class="pc-item">
						<a href="datosC" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">dashboard</i></span><span class="pc-mtext">Graficas</span></a>
					</li>
					<li class="pc-item">
						<a href="AñadirDatosC" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Registrar datos</span></a>
					</li>
					<li class="pc-item">
						<a href="VerDatosAguaC" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Ver datos</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Generación de reporte </label>
					</li>
					<li class="pc-item">
						<a href="GenerarReporteC" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">note_add</i></span><span class="pc-mtext">Generar reporte</span></a>
					</li>
					<!--  		GESTION DE INVENTARIO 
					<li class="pc-item pc-caption">
						<label>Gestionar Inventario</label>
					</li>
					<li class="pc-item">
						<a href="AñadirInventarioC" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Registrar</span></a>
					</li>
					<li class="pc-item">
						<a href="VerInventarioC" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Visualizar</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Página por defecto</label>
					</li>
					<li class="pc-item">
						<a href="/verDefault" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Pagina Muestra</span></a>
					</li>
					-->
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="mr-auto pc-mob-drp">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
					<a class="pc-head-link active arrow-none mr-0" aria-haspopup="false" aria-expanded="false">
					<span class="pc-micon mr-2"><i class="material-icons-two-tone">favorite</i></span>
					Sea Bienvenido!
					</a>
					</li>
				</ul>
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<span class="pc-micon mr-2" style="color:white"><i class="material-icons-two-tone">person</i></span>
							<span>
								<span class="user-name" style="color:white">{{session('nombre')}}</span>
								<span class="user-desc" style="color:white">{{session('nombreRol')}}</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<a href="/logout" class="dropdown-item">
								<i class="material-icons-two-tone">settings_power</i>
								<span>Cerrar Sesion</span>
							</a>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>
	<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        @yield('content')
    </div>
</div>
    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="{{asset('js/vendor-all.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/feather.min.js')}}"></script>
    <script src="{{asset('js/pcoded.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{asset('js/plugins/apexcharts.min.js')}}"></script>

<!-- custom-chart js -->
<script src="{{asset('js/pages/dashboard-sale.js')}}"></script>
</body>

</html>
