<style type="text/css">
 body {
  background: url('https://www.municipiodeoaxaca.gob.mx/assets/img/slides/slide_home.jpg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}
</style>

<!-- Navigation -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.bundle.min.js')}}">


<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
    <div class="container">
      <a class="navbar-brand" >MUNICIPIO DE OAXACA DE JUÁREZ</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            @if (Route::has('login'))
              @auth
                <a class="nav-link" href="{{ url('/home') }}">Inicio
                      <span class="sr-only">(current)</span>
                </a>
              @else    
                <a class="nav-link" href="{{ url('login') }}">Iniciar Sesión
                      <span class="sr-only">(current)</span>
                </a>
              @endauth
            @endif
          </li>

        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Page Content -->
  <div class="container">
    <div class="card border-0 shadow my-5" style="background-color:#630d23">
      <div class="card-body p-5">
        <h1 class="font-weight-light" style="color:white;">REGIDURÍA DE BIENES, PANTEONES Y SERVICIOS MUNICIPALES Y DE MERCADOS Y COMERCIO EN VÍA PÚBLICA</h1>
        <p class="lead" style="color:white;">C. LUIS ARTURO AVALOS DÍAZ COVARRUBIAS</p>
        <div style="height: 150px"></div>
        <p class="lead mb-0"></p>
      </div>
    </div>
  </div>


<script src="{{asset('js/jquery.slim.min.js')}}"></script>