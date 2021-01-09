<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Administrador - @yield('titulo')</title>
    <style>
        #sidebar, #sidebar .sidebar-header{
            background: #09347a;
        }
        #sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #0169a4;
}
ul ul a {
    background: #b7b7b7;
    color: black;
}

a.article {
    background: #f1632a !important;
    color: #fff !important;
}
a.article:hover {
    background: #f78153 !important;
}


    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="">
            <div class="sidebar-header" style="text-align: center;padding: 0px;">
                <a href="{{route('adminInicio')}}"><img style="width: 70%" src="{{asset('images/logo2.1t.png')}}" id="icon" alt="Icon" /></a>                
            </div>
            <ul class="list-unstyled components">
                <p style="text-align: center">Menu de Administracion</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Opciones de Sesión</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('noBuild')}}">Administrador Info</a>
                        </li>
                        <li>
                            <a href="{{route('noBuild')}}">Actualizar Info</a>
                        </li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('salir-form').submit();">Cerrar Sesión</a>
                            <form id="salir-form" action="{{route('adminLogout')}}" method="POST" style="display: none">@csrf</form>
                        </li>
                    </ul>
                </li>
                <li> 
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Agregar Sección</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{route('agregarForm', ['seccion'=>'titulo'])}}">Título</a>
                        </li>
                        <li>
                            <a href="{{route('agregarForm', ['seccion'=>'capitulo'])}}">Capítulo</a>
                        </li>
                        <li>
                            <a href="{{route('agregarForm', ['seccion'=>'articulo'])}}">Artículo</a>
                        </li>
                    </ul>
                </li>
                <li> 
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Modificar Sección</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="{{route('listarSecction', ['seccion'=>'titulo'])}}">Título</a>
                        </li>
                        <li>
                            <a href="{{route('listarSecction', ['seccion'=>'capitulo'])}}">Capítulo</a>
                        </li>
                        <li>
                            <a href="{{route('listarSecction', ['seccion'=>'articulo'])}}">Artículo</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('noBuild')}}">Ayuda</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{route('inicio')}}" class="article">Regresar al Lector</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
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
    @yield('codigoExtra')
    
</body>

</html>