@extends('layouts.master-templete')
@section('title')
    Nosotros
@endsection
@section('contenido')

    <div id="divimgAbout" class="jumbotron shadow-std no-rborder slideDown">
        <div class="fadeInjg">
            <center><img id="imgAbout" class="imgAboutPRE" src="{{asset('images/justice.png')}}"></center>
        <br>
        <h1>¿Quiénes somos?</h1>
        <p>Somos una iniciativa que busca facilitar la interpretación de los reglamentos que rigen el desempeño de la respectiva profesión. Nuestra intención es hacer de la lectura y consulta de la información yaciente en la Ley 842 de 2003, una experiencia amigable que supla no sólo la flexibilidad de administración, sino que también ofrezca una serie de herramientas que optimicen la búsqueda de información.</p>
        <br>
        <h1>Muestra historia</h1>
        <p>Como estudiantes de últimos semestres de ingeniería de sistemas de la universidad de Nariño, mediante la asignatura con nombre Ingeniería Legal y Ética, desarrollamos una plataforma que permitiese entender a fondo las implicaciones que el formato que solía poseer la ley 842 no facilitaba.</p>
        <div class="card">
            <img class="imgLabout" src="{{asset('images/logo2.1mejoradodark.png')}}">
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

@endsection