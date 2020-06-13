@extends('layouts.master2')

@section('content')
<div class="page-header">
    <h1 class="all-tittles">Inicio</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <h4 class="all-tittles">Acerca de</h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam quam dicta et, ipsum quo. Est saepe deserunt, adipisci eos id cum, ducimus rem, dolores enim laudantium eum repudiandae temporibus sapiente.
            </p>
        </div>
        <div class="col-xs-12 col-sm-6">
            <h4 class="all-tittles">Desarrollador</h4>
            <ul class="list-unstyled">
                <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Carlos Alfaro <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
            </ul>
        </div>
    </div>
</div>
<div class="footer-copyright full-reset all-tittles">© 2018 Carlos Alfaro</div>
@endsection
