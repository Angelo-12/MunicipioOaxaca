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

       <form method="POST" action="{{ route('password.update') }}">
        @csrf 

        <input type="hidden" name="token" value="{{ $token }}">

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
        </div>

        <div class="group-material-login {{$errors->has('password') ? 'has-error' : '' }}"">
          <input type="password" name="password" class="material-login-control" maxlength="70">
          <span class="highlight-login"></span>
          <span class="bar-login"></span>
          <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
          <strong>{{ $errors->first('password') }}</strong>
        </div>

        <div class="group-material-login">
          <input type="password" name="password_confirmation" id="password-confirm" class="material-login-control" maxlength="70">
          <span class="highlight-login"></span>
          <span class="bar-login"></span>
          <label><i class="zmdi zmdi-lock"></i> &nbsp;Confirmar Contraseña</label>
        </div>

        <br>
            
        <button class="btn-login" type="submit">Actualizar Contraseña &nbsp; </button>
          


           </form>
    </div>   
  </div>
</body>
</html>