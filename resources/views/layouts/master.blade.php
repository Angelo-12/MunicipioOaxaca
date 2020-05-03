<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Regiduria de Bienes, Panteones y Servicios Municipales y de Mercados y Comercio en Via publica</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
  <link rel="stylesheet" href="{{asset('css/blue.css')}}">
  <link rel="stylesheet" href="{{asset('css/morris.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-jvectormap-1.2.2.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/inputs.css')}}">
</head>
<body class="hidden">
 
<div class="wrapper" id="app">
  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light" style="background-color:#313d4c">
    <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"> <i class="fas fa-bars"></i> </a>
        </li>
        
      </ul>
  
    
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
     
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
        </div>
        <div class="info">
          <a href="" class="d-block">
            
            {{Auth::user()->name}}

          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <router-link to="/inicio" class="nav-link">
                  <i class="nav-icon fas fa-clipboard-list" style="color:brown;"></i>
                  <p>
                    Inicio
                  </p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/perfil" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Perfil
                  </p>
                </router-link>
              </li>

              <li class="nav-item has-treeview menu-close">
                <a href="{{url('Usuarios/mostrar')}}" class="nav-link">
                  <i class="nav-icon fas fa-user-lock" style="color:#17a2b8;"></i>
                  <p>
                    Usuarios
              
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview menu-close">
                <a href="{{url('Usuarios/mostrar')}}" class="nav-link">
                  <i class="nav-icon fas fa-users " style="color:black;"></i>
                  <p>
                    Vendedores
              
                  </p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{url('Zonas/index')}}" class="nav-link">
                  <i class="nav-icon fas fa-thumbtack" style="color:green;"></i>
                  <p>
                    Zonas
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('Organizaciones/index')}}" class="nav-link">
                  <i class="nav-icon fas fa-sitemap " style="color:teal;"></i>
                  <p>
                    Organizaciones
                  </p>
                </a>
              </li>    
                  

          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Actividades
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/1')}}" class="nav-link">
                 
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Comercial movil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/2')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Comercial semifija</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/3')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Comercial movil</p>
                  <p>&emsp;&emsp;con equipo rodante</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/4')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Comercial fija</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/5')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Comercios</p>
                  <p>&emsp;&emsp;establecidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/6')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Tianguis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Actividades/comerciales/7')}}" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Prestacion de</p>
                  <p>&emsp;&emsp;servicios</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
               <i class="nav-icon fas fa-power-off red" ></i>
               <p>
                {{ __('Cerrar Sesion') }}
               </p>
              
            </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid" id="contenido">
        
        @yield('content')
        
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://kit.fontawesome.com/7646b98399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/angel.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('js/jquery.knob.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('js/fastclick.min.js')}}"></script>
<script src="{{asset('js/adminlte.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/funciones.js')}}"></script>

</body>
</html>
