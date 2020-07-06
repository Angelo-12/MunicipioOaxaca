<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <div class="login-container full-cover-background">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
           <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
       </p>
       <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>

       <form method="POST" action="{{route('verificar')}}">
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
            <div class="group-material-login {{$errors->has('password') ? 'has-error' : '' }}">
              <input type="password" name="password" class="material-login-control" maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
              <strong>{{ $errors->first('password') }}</strong>
            </div>
              <a class="" href="{{ route('password.request') }}">
                ¿Olvido su contraseña?
              </a>
              <button class="btn-login" type="submit">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
          


           </form>
    </div>   
  </div>
</body>
</html>