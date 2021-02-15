@extends('layouts.master-templete')
@section('titulo')
Nosotros
@endsection
@section('estilos')
<style>
    .jumbotron .list-group-item{
        background: transparent;
    }

    .jumbotron .card{
        width: 18rem; 
        border-radius: 0;
        background: transparent !important;
        border: none;
    }

    body[data-disp="apagado"] img#logoLL{
        /*background-color: white;*/
        transition: 1.5s;
        border: 2px solid white !important;
        
    }

</style>    

@endsection
@section('contenido')

<div id="divimgAbout" class="jumbotron shadow-std no-rborder slideDown">
    <h1 class="h1">¿Quiénes somos y Que es Ley Lector?</h1>
    <p>Ley Lector es una iniciativa que busca facilitar la interpretación de los reglamentos que rigen el desempeño de la
        respectiva profesión. Nuestra intención es hacer de la lectura y consulta de la información yaciente en la Ley
        842 de 2003, una experiencia amigable que supla no sólo la flexibilidad de administración, sino que también
        ofrezca una serie de herramientas que optimicen la búsqueda de información.</p>

    <h1 class="h1">Nuestra historia</h1>
    <p>Como estudiantes de últimos semestres de ingeniería de sistemas de la universidad de Nariño, mediante la
        asignatura con nombre Ingeniería Legal y Ética, desarrollamos una plataforma que permitiese entender a fondo las
        implicaciones que el formato que solía poseer la ley 842 no facilitaba.</p>
    <!--<div class="card">
        <img class="imgLabout" src="{{asset('images/logo2.1mejoradodark.png')}}">
        <div style="flex-direction: row; display:flex; justify-content: space-between;">
            <h2 class="ffeat">Daniel A. Tutistar</h2>
            <h2 class="ffeat">Mateo Luna O.</h2>
        </div>
        <div style="flex-direction: row; display:flex; justify-content: space-between;">
            <h2 class="ffeatc">dants@ley842.com</h2>
            <h2 class="ffeatc">m@ley842.com</h2>
        </div>
    </div> -->
    <h1 class="h1">Contactos</h1>
    <div class="row justify-content-md-center" style="margin: 45px">
        <div class="col d-flex justify-content-center">
            <div class="card">
                <div class="text-center">
                    <img class="card-img-top " src="{{asset('images/devico2.png')}}" alt="Card image cap" style="width: 60%;margin: 15px;">
                </div>
                
                <div class="card-body">
                    <h5 class="text-center card-title">Daniel A. Tutistar</h5>
                    <p class="card-text">Encargado de desarrollo back-end y front-end.</p>
                </div>
                   
            
                <ul class="list-group list-group-flush" style="background: transparent">
                    <li class="list-group-item"><span class="font-weight-bold">Email: </span>Dants@leyLector.co</li>
                    <li class="list-group-item"><span class="font-weight-bold">Telefono: </span>316707070</li>
    
                </ul>
            </div>
    
        </div>
        <div class="col d-flex justify-content-center">
            <div class="card">
                <div class="text-center">
                    <img class="card-img-top " src="{{asset('images/devico2.png')}}" alt="Card image cap" style="width: 60%;margin: 15px;">
                </div>
                
                <div class="card-body">
                    <h5 class="text-center card-title">Mateo Luna O.</h5>
                    <p class="card-text">Encargado de desarrollo back-end y front-end.</p>
                </div>                               
                <ul class="list-group list-group-flush" style="background: transparent">
                    <li class="list-group-item"><span class="font-weight-bold">Email: </span>mat@leyLector.co</li>
                    <li class="list-group-item"><span class="font-weight-bold">Telefono: </span>316707070</li>
    
                </ul>
            </div>
    
        </div>
        
    </div>
    <div class="text-center" style="margin-top: 90px">
        <img id="logoLL" src="{{asset('images/L6.png')}}" alt="Ley Lector" style="transition: 1.5s; border: 2px solid black;
        border-radius: 100%; width:30%;"/ ">
        <p class="footer font-weight-bold">Copyright 2021</p>
    </div>
</div>
</div>

@endsection
