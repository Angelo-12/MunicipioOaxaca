<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/sweet-alert.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
  <div class="login-container full-cover-background">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
           <i class="zmdi zmdi-collection-case-play zmdi-hc-5x"></i>

       </p>
       <h4 class="text-center all-tittles" style="margin-bottom: 30px;">Restablecer Contraseña</h4>

       @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <br>
        <br>

       <form method="POST" action="{{ route('password.email') }}">
        @csrf 


       <div class="group-material-login {{$errors->has('email') ? 'has-error' : '' }}">
              <input type="text" name="email" value="{{old('email')}}"
              class="material-login-control"  maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label>
                <i class="zmdi zmdi-account">
                  </i> &nbsp; 
                  Email
              </label>
              <strong>{{ $errors->first('email') }}</strong>
        </div><br>
            
        <button class="btn-login " type="submit">Enviar enlace de restablecimiento de contraseña &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
          
    </form>
    </div>   
  </div>
</body>
</html>
