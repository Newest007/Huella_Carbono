<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <title>Don Bosco Green Alliance</title>
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="{{asset('assets/style.css')}}" rel="stylesheet">
</head>

    <body>
    <section class="vh-80" style="background-image: url('{{asset('assets/pxfuel.jpg')}}');background-attachment:fixed;background-size:cover;background-repeat:no-repeat;">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

                
            <img src="{{asset('assets/don bosco.jpg')}}"
                   alt="logo"> 

                    <form action="{{route('login') }}" method="post" >
                   @csrf
                    <br>
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    @if($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                      <li style="color:red">{{$error}}</li>
                        @endforeach
                      </ul>
                    @endif
                    <div class="form-outline mb-4">
              <input type="email"  name="email" required autofocus value="{{old('email')}}" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email..."/>
            </div>
            
            <div class="form-outline mb-4">
              <input type="password" required autofocus name="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Contraseña..." />
            </div>
            
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" name="remember" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" style="font-family: Verdana;position: relative;left:10px;" for="form1Example3"> Recordar mi sesion </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" style="background-color:green; border:green">Login</button>

            </form>
    
            </div>
             </div>
               </div>
             </div>
            </div>
        </section>
            </body>
            </html>