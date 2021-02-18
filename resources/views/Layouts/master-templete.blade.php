<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <title>Ley Lector - @yield('titulo')</title>
    <style>
        a{
    display: inline-block;
    text-decoration: none;
  }
  .underlineHover:after {
    display: block;
    left: 0;
    bottom: -10px;
    width: 0;
    height: 2px;
    background-color: #6d7fcc !important;
    content: "";
    transition: width 0.2s;
  }

  .underlineHover:hover {
    color: #0d0d0d;
  }

  .underlineHover:hover:after {
    width: 100%;
  }
         .slideDown, .slideDownLg{
            display: none;
        }
        .fadeInjs{
            opacity: 0;
        }
        .jumbotron{
            padding-top:2rem;
        }
        .navbar.navbar-light{
            background-color: #f5f5f5 !important;
            box-shadow: none;
            border: 1px solid #e0e0e0;
        }

        .shadow-std{
            border-top: solid 2.3px #4700A3;
        }

        .jumbotron p{
            color: #4e4e4e;
        }
       

        .titulo-header, .capitulo-header{
            margin-bottom: 20px;
        }

        .header-info{
            margin-bottom: 25px;
        }
        .header-info p{
            margin: 0;
            font-size: smaller;
        }
        .nav-tool i{
            font-size: 2rem;
        }

        body[data-fsz="0"]{
                font-size: 0.8rem;
            
        }
        body[data-fsz="1"]{
                font-size: 1.0rem;
        }
        body[data-fsz="2"]{
                font-size: 1.2rem;
        }

        body[data-disp="apagado"], body[data-disp="apagado"] .jumbotron{
                background: #0d0d0d;
                color: #f5f5f5;
        }

        body[data-disp="apagado"] #btn-luz{
            color: #ffc107;
        }

        #sidebar .dropdown-menu.show {
        display: block;
        background: #6d7fcc;
        color: #F5F5F5;
        border: none;
        border-radius: 0%;
    }

    #sidebar .dropdown-menu.show a:hover {
        background: #fafafa
    }


        /* boton tool */
    .container-tool, .button-tool, .nav-tool{
    position: fixed;
    }

    .container-tool{
    margin: auto;
    top: 89%;
    left: 97%;
    margin-left: -20px;
    }

    #toggle-tool{
    display: none;
    }

    .button-tool{
    z-index: 999;
    width: 43px;
    height: 43px;
    background: #002569;
    border-radius: 100%;
    transition: all 0.5s ease-in-out;
    box-shadow: 1px 3px 10px 0 rgba(0,0,0,0.3);
    cursor: pointer;
    }

    .button-tool:before{
    position: absolute;
    top: 20px;
    left: 9px;
    content: '';
    width: 25px;
    height: 2px;
    background: #fff;
    transform: rotate(90deg);
    }

    .button-tool:after{
    position: absolute;
    top: 20px;
    left: 9px;
    content: '';
    width: 25px;
    height: 2px;
    background: #fff;
    }

    .nav-tool{
    transform: translateY(-10%);
    opacity: 0;
    bottom: 5%;
    right: 2.5%;
    transition: all 0.5s ease-in-out;
    background: white;
    width: 80px;
    border-radius: 0px;
    transform: translateY(0%);
    box-shadow: 2px 3px 10px 0 rgba(0,0,0,0.1);
    }

    .nav-tool a{
    font-size: large;
    text-align: center;
    display: block;
    margin: 20px 0;
    color: black;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: all 300ms;
    pointer-events: none;
    }

    .nav-tool a:hover{
    color: #5f5f5f;
    }

    #toggle-tool:checked ~ .nav-tool{
    opacity: 1;
    transform: translateY(-10%);
    }

    #toggle-tool:checked ~ .nav-tool a{
    pointer-events: all;
    }

    #toggle-tool:checked ~ .button-tool{
    transform: rotate(135deg);
    box-shadow: 0 0 0 0 transparent;
    }

        
    </style>
    @yield('estilos')
</head>

<body data-fsz="0" data-disp="encendido">
    
    <div class="wrapper">
    
    
        <!-- Sidebar Holder -->
        
        <nav id="sidebar">
            <div class="sidebar-header" style="text-align: center;padding: 0px;">
                <a href="{{route('inicio')}}"><img style="width: 70%" src="{{asset('images/logo2.1mejoradodark.png')}}"
                    id="icon" alt="Icon" /></a>
            </div>

            <ul class="list-unstyled components">
                <p class="text-center">Menu de Navegacion</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Indices</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{route('LeyCompleta')}}">Ley Completa</a>
                        </li>
                        <li>
                            <a href="{{route('indexOf', ['seccion' => 'Títulos'])}}">Títulos</a>
                        </li>
                        <li>
                            <a href="{{route('indexOf', ['seccion' => 'Capítulos'])}}">Capítulos</a>
                        </li>
                        <li>
                            <a href="{{route('indexOf', ['seccion' => 'Artículos'])}}">Artículos</a>
                        </li>
                    </ul>
                </li>
                <li> 
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Etiquetas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <div class="dropright" style="cursor: pointer">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Mas Vistos
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{route('getMasvisto', ['seccion'=>'titulo'])}}">Título</a>
                                    <a href="{{route('getMasvisto', ['seccion'=>'capitulo'])}}">Capítulo</a>
                                    <a href="{{route('getMasvisto', ['seccion'=>'articulo'])}}">Artículo</a>
                                </div>
                            </div>
                        </li>
                        <!--
                        <li>
                            <a href="#">Etiqueta 1</a>
                        </li>
                        <li>
                            <a href="#">Etiqueta 2</a>
                        </li>
                    -->
                    </ul>
                </li>
                <li>
                    <a href="{{route('info')}}">Mas Información</a>
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

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
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
                                <a class="nav-link" href="{{route('info')}}">Info Ley</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('adminLogin')}}">Administrador</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container" id="contenido-pagina">
                @yield('contenido')
            </div>
           
        </div>
        
    </div>

    <div class="container-tool">
        <input type="checkbox" id="toggle-tool">
        <label for="toggle-tool" class="button-tool"></label>
        <nav class="nav-tool">
            <a title="Disminuir letra" href="" id="btn-menos" class="buton-tool"><i class="fas fa-search-minus"></i></a>
            <a title="Letra normal" href="" id="btn-normal" class="buton-tool"><i class="fas fa-search"></i></a>
            <a title="Aumentar letra" href="" id="btn-mas" class="buton-tool"><i class="fas fa-search-plus"></i></a>
            <a href="" title="Modo oscuro" id="btn-luz" class="buton-tool"><i class="fas fa-lightbulb"></i></a>
        </nav>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    
    <script defer src="{{ asset('fontawesome/js/all.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('.slideDown').slideDown(1000);
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            $('.slideDownLg').slideDown(2000);
            
            $('.buton-tool').on('click', function(event){
                event.preventDefault();
                let flag = document.body;
                switch(this.id){
                    case 'btn-menos':                    
                        if(flag.dataset.fsz >= 0){
                            flag.dataset.fsz --;
                        }                        
                    break
                    case 'btn-mas':                    
                        if(flag.dataset.fsz <= 1){
                            flag.dataset.fsz ++;
                        }                        
                    break
                    case 'btn-normal':                    
                        if(flag.dataset.fsz != 0){
                            flag.dataset.fsz = 0;
                        }                        
                    break
                    case 'btn-luz':
                        if(flag.dataset.disp == "encendido"){
                            flag.dataset.disp = "apagado"
                        }else{
                            flag.dataset.disp = 'encendido'
                        }
                    break
                }
                console.log(flag.dataset.fsz);
            });

        });



    </script>

    @yield('codigoExtra')
    
</body>

</html>
