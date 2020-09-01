<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oaxaca de Júarez </title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" >
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/inputs.css')}}">
    <link rel="stylesheet" href="{{asset('css/clockpicker.css')}}">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css" >
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css">
  </head>

  <body class="nav-md hidden">

    <div class="centrado" id="onload">
      <div class="lds-dual-ring"></div>
    </div>

    <div class="container body">
      <div class="main_container" >
        <div class="col-md-3 left_col" >
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title">
                Oaxaca
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('img/')}}/{{Auth::user()->foto_perfil}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
              <h2>{{Auth::user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Inicio <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.html">Estadisticas</a></li>
                      <li><a href="index2.html">Reportes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Registro de Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('Usuarios/index')}}">Administrador</a></li>
                      <li><a href="{{url('Secretarias/index')}}">Secretarias</a></li>
                      <li><a href="{{url('Vendedores/index')}}">Vendedores</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-address-card"></i> Permisos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('Permisos/index/Pendientes')}}">Pendientes</a></li>
                      <li><a href="{{url('Permisos/index/Anuales')}}">Anuales</a></li>
                      <li><a href="{{url('Permisos/index/Eventuales')}}">Eventuales</a></li>
                      <li><a href="{{url('Permisos/index/Provisionales')}}">Provisionales</a></li>
                      <li><a href="{{url('Permisos/index/Revalidados')}}">Revalidados</a></li>
                      <li><a href="{{url('Permisos/index/Sancionados')}}">Sancionados</a></li>
                      <li><a href="{{url('Permisos/index/Cancelados')}}">Cancelados</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="{{url('Zonas/index')}}">
                      <i class="fa fa-thumbtack"></i>
                      Zonas de comercializacion
                    </a>
                  </li>

                  <li>
                    <a href="{{url('Organizaciones/index')}}">
                      <i class="fa fa-sitemap"></i> 
                      Organizaciones 
                    </a>
                  </li>
                 
                  <li>
                    <a href="{{url('Actividades/index')}}"><i class="fa fa-clipboard-list">
                      </i>Actividades Comerciales
                    </a>
                  </li>

                  <li>
                    <a href="{{url('Agencia/index')}}"><i class="fa fa-map-pin"></i>
                      </i>Agencias y Colonias
                    </a>
                  </li>

                  <li>
                    <a href="{{url('Observaciones/index')}}">
                      <i class="fa fa-mail-bulk"></i>
                      Quejas y Sugerencias 
                    </a>
                  </li>


                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                     {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="{{url('home')}}"> Perfil</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">2</span>
                          <span>Notificaciones</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Ayuda</a>
                      <a class="dropdown-item"   href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Cerrar Sesion
                      </a>

                      <form method="POST" action="{{route('logout')}}" id="logout-form">
                        @csrf
                      </form>

                    </div>
                  </li>

  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>Todas la notificaciones</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col content" role="main">
            <div  id="contenido">
        
                @yield('content')
                
            </div>
        </div>
        
      </div>
    </div>

    <!-- jQuery -->
    <script src="https://kit.fontawesome.com/c5ea17a0cf.js" crossorigin="anonymous"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/fastclick.js')}}"></script>
    <script src="{{asset('js/nprogress.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/mapas.js')}}"></script>
    <script src="{{asset('js/funciones.js')}}"></script>
    <script src="{{asset('js/clockpicker.js')}}"></script>
    <script type="text/javascript">
      $('.clockpicker').clockpicker();
    </script>
  </body>
</html>