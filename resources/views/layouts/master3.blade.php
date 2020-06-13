<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/sweet-alert.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile nav-lateral-scroll">
            <div class="logo full-reset all-tittles">
                Oaxaca de Juarez
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <figure>
                    <img src="assets/img/logo.png" alt="Biblioteca" class="img-responsive center-box" style="width:55%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">
                    Sistema de Control de Comercio en Via Publica
                </p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="home.html"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="admin.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Administrador</a></li>
                            <li><a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva Secretaria</a></li>
                            <li><a href="personal.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Vendedor</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-card zmdi-hc-fw"></i>&nbsp;&nbsp; Permisos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="{{url('Permisos/index/Pendientes')}}"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Pendientes</a></li>
                            <li><a href="{{url('Permisos/index/Anuales')}}" ><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Anuales</a></li>
                            <li><a href="{{url('Permisos/index/Eventuales')}}" ><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Eventuales</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Provisionales</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Revalidaciones</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-block zmdi-hc-fw"></i>&nbsp;&nbsp; Sanciones</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-close zmdi-hc-fw"></i>&nbsp;&nbsp; Cancelaciones</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Zonas de Comercializacion <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.html"><i class="zmdi zmdi-google-maps zmdi-hc-fw"></i>&nbsp;&nbsp; Permitida</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-google-maps zmdi-hc-fw"></i>&nbsp;&nbsp; Restringida</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-google-maps zmdi-hc-fw"></i>&nbsp;&nbsp; Prohibida</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-accounts-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Organizaciones</a>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-card-membership zmdi-hc-fw"></i>&nbsp;&nbsp; Actividades Comerciales <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Comercial Movil</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Comercial Semifija</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Comercial Movil Con Equipo Rodante</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Comercial Fija</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Comercios Establecidos</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Tianguis</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-money zmdi-hc-fw"></i>&nbsp;&nbsp; Prestacion de Servicios</a></li>
                        </ul>
                    </li>
                    <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                    <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li>
                </>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Admin Name</span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="index.html" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
        
                <li class="desktop-menu-button hidden-xs" style="float: left !important;">
                    <i class="zmdi zmdi-swap"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
       
            <div class="content">
                <div class="container-fluid full-reset text-center" style="padding: 40px 0;" id="contenido">
                    @yield('content')
                </div>
            </div>
        </div>
        
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>

    </div>
</body>
</html>