<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
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
		<div class="pcm-logo" style="color:white">
			<img src="https://lh4.googleusercontent.com/WBI2lI_TsmehP23LZTSCd7UYQpBTsvNdUylx8XvLse4Xou8I3UPGDVLXifmN74tiyT8SIc55RBYrKdTOYi5btFs=w16383"width="40" height="40">  Don Bosco Green Alliance
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<!--
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a>-->
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
				<a href="/verColegio" class="b-brand" style="color:white">
					<!-- ========   change your logo hear   ============ -->
					<img src="{{asset('assets/dbga logo square.png')}}"width="40" height="40">  Don Bosco Green Alliance
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Gestionar datos</label>
					</li>
					<li class="pc-item">
						<a href="VerGraficasColegio" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">dashboard</i></span><span class="pc-mtext">Graficas</span></a>
					</li>
					<li class="pc-item">
						<a href="/AñadirDatosColegio" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Registrar datos</span></a>
					</li>
					<li class="pc-item">
						<a href="VerDatosColegio" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Ver datos</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Gestionar Inventario</label>
					</li>
					<li class="pc-item">
						<a href="/AñadirInventarioColegio" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Registrar</span></a>
					</li>
					<li class="pc-item">
						<a href="/VerInventarioColegio" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Visualizar</span></a>
					</li>
					<li class="pc-item pc-caption">
						<label>Página por defecto</label>
					</li>
					<li class="pc-item">
						<a href="/verDefault" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">group_add</i></span><span class="pc-mtext">Pagina Muestra</span></a>
					</li>
					
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
					<!--<li class="dropdown pc-h-item">
						<a class="pc-head-link active dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							Opciones de cuenta
						</a>
						<div class="dropdown-menu pc-h-dropdown">
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">account_circle</i>
								<span>My Account</span>
							</a>
							<div class="pc-level-menu">
								<a href="#!" class="dropdown-item">
									<i class="material-icons-two-tone">list_alt</i>
									<span class="float-right"><i data-feather="chevron-right" class="mr-0"></i></span>
									<span>Level2.1</span>
								</a>
								<div class="dropdown-menu pc-h-dropdown">
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>My Account</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Settings</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Support</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Lock Screen</span>
									</a>
									<a href="#!" class="dropdown-item">
										<i class="fas fa-circle"></i>
										<span>Logout</span>
									</a>
								</div>
							</div>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">settings</i>
								<span>Settings</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">support</i>
								<span>Support</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">https</i>
								<span>Lock Screen</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i class="material-icons-two-tone">chrome_reader_mode</i>
								<span>Logout</span>
							</a>
						</div>
					</li>-->
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
							<!--<div class=" dropdown-header">
								<h5 class="text-overflow m-0"><span class="badge bg-light-primary">Bienvenido!</a></span></h5>
							</div>-->
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
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="{{asset('js/vendor-all.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/feather.min.js')}}"></script>
    <script src="{{asset('js/pcoded.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
    <!-- <script src="assets/js/plugins/clipboard.min.js"></script> -->
    <!-- <script src="assets/js/uikit.min.js"></script> -->

<!-- Apex Chart -->
<script src="{{asset('js/plugins/apexcharts.min.js')}}"></script>
<!--<script>
    $("body").append('<div class="fixed-button active"><a href="https://gumroad.com/dashboardkit" target="_blank" class="btn btn-md btn-success"><i class="material-icons-two-tone text-white">shopping_cart</i> Upgrade To Pro</a> </div>');
</script>-->

<!-- custom-chart js -->
<script src="{{asset('js/pages/dashboard-sale.js')}}"></script>
</body>

</html>
