<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href=" {{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }} ">  <!--mejor forma -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        @yield('estilos')
        <link rel="stylesheet" href=" {{ asset('adminlte/dist/css/adminlte.min.css') }} ">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">


            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{route('admin')}}" class="brand-link">
                <img src="http://127.0.0.1:8000/adminlte/dist/img/AdminLTELogo.png"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">OmniLife</span>
                </a>

                <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Empleados
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.employee.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Listado de Empleados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.employee.create')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Crear</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                    </ul>
                </nav>
                </div>
            </aside>

            <div id="app">
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <div class="content-wrapper">
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('titulo')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Início</a></li>
                        
                        @yield('breadcrumb')
                        
                        </ol>
                    </div>
                    </div>
                </section>
                <section class="content">

                @yield('contenido')

                </section>
            </div>


            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.2-pre
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>


            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}" defer></script>
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
        <script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}" defer></script>
        <script src="{{ asset('adminlte/dist/js/demo.js')}}" defer></script>
        {{-- <script src="{{ asset('js/app_admin.js')}}" defer></script> --}}
        @yield('scripts')
    </body>
</html>
