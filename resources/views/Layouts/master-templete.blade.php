<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>App Name - @yield('titulo')</title>
    <style>
         .slideDown{
            display: none;
        }
        .fadeInjs{
            opacity: 0;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header" style="text-align: center;padding: 0px;">
                <a href="{{route('adminInicio')}}"><img style="width: 70%" src="{{asset('images/logo2.1mejoradodark.png')}}"
                    id="icon" alt="Icon" /></a>
            </div>

            <ul class="list-unstyled components">
                <p>Menu de Navegacion</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Indices</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Títulos </a>
                        </li>
                        <li>
                            <a href="#">Capítulos</a>
                        </li>
                        <li>
                            <a href="#">Artículos</a>
                        </li>
                    </ul>
                </li>
                <li> 
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Etiquetas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('info')}}">Info Ley 842</a>
                    <a href="{{route('nosotros')}}">Contactanos</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://www.copnia.gov.co/" class="download" target="_blank">COPNIA</a>
                </li>
                <li>
                    <a href="{{route('adminLogin')}}" class="article">Administrador</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('inicio')}}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('info')}}">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adminLogin')}}">Administrador</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                @yield('contenido')
            </div>
           
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('.slideDown').slideDown(1000, function(){
                $('.fadeInjs').animate({opacity:1, duration: 400});
            });
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });

    </script>

    @yield('codigoExtra')
    
</body>

</html>
