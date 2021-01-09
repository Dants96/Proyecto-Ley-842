<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>Nosotros - @yield('titulo')</title>
    <style>
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h3>Ley 842 de 2013</h3>
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

            <!--Contenido-->
            <div>
                <div id="divimgAbout" class="divimgAboutPRE card" style="padding: 10px">
                    <img id="imgAbout" class="imgAboutPRE" src="https://i.imgur.com/lQn6Win.png">
                    <br>
                    <h1>¿Quiénes somos?</h1>
                    <h3>Somos una iniciativa que busca facilitar la interpretación de los reglamentos que rigen el desempeño de la respectiva profesión. Nuestra intención es hacer de la lectura y consulta de la información yaciente en la Ley 842 de 2003, una experiencia amigable que supla no sólo la flexibilidad de administración, sino que también ofrezca una serie de herramientas que optimicen la búsqueda de información.</h3>
                    <br>
                    <h1>Muestra historia</h1>
                    <h3>Como estudiantes de últimos semestres de ingeniería de sistemas de la universidad de Nariño, mediante la asignatura con nombre Ingeniería Legal y Ética, desarrollamos una plataforma que permitiese entender a fondo las implicaciones que el formato que solía poseer la ley 842 no facilitaba.</h3>
                    <div class="card">
                        <img class="imgLabout" src="https://i.imgur.com/wU8MjB2.png">
                        <div style="flex-direction: row; display:flex; justify-content: space-between;">
                            <h2 class="ffeat">Daniel A. Tutistar</h2>
                            <h2 class="ffeat">Mateo Luna O.</h2>
                        </div>
                        <div style="flex-direction: row; display:flex; justify-content: space-between;">
                            <h2 class="ffeatc">dants@ley842.com</h2>
                            <h2 class="ffeatc">m@ley842.com</h2>
                        </div>
                    </div>
                </div>
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
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
                $('#divimgAbout').addClass("divimgAboutPOS");
                $('#divimgAbout').removeClass("divimgAboutPRE");      
            });
        });

    </script>

    @yield('codigoExtra')
    
</body>

</html>