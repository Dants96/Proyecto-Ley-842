@extends('Layouts.master-templete')
@section('titulo')
Inicio
@endsection
@section('estilos')
<style>
    @font-face {
        font-family: "cursiva-logo";
        src: url('{{asset('/css/ValentineDay.ttf')}}')
    }

    .noselect {
        -webkit-touch-callout: none;
        /* iOS Safari */
        -webkit-user-select: none;
        /* Safari */
        -khtml-user-select: none;
        /* Konqueror HTML */
        -moz-user-select: none;
        /* Old versions of Firefox */
        -ms-user-select: none;
        /* Internet Explorer/Edge */
        user-select: none;
        /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
    }

    #banner {
        padding: 0%;
        font-family:
            color: black;
        font-family:
            border: none;
        background: rgb(0, 37, 105);
        background: -moz-linear-gradient(340deg, rgba(0, 37, 105, 1) 1%, rgba(71, 0, 163, 1) 55%);
        background: -webkit-linear-gradient(340deg, rgba(0, 37, 105, 1) 1%, rgba(71, 0, 163, 1) 55%);
        background: linear-gradient(340deg, rgba(0, 37, 105, 1) 1%, rgba(71, 0, 163, 1) 55%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#002569", endColorstr="#4700a3", GradientType=1);

    }

</style>
@endsection
@section('contenido')
<div id="banner" class="jumbotron no-rborder shadow-std">
    <img src="{{asset('images/banner2.png')}}" style="width: 100%;" />
</div>
<div class="jumbotron no-rborder shadow-std slideDown">
    <h1 class="text-center">Ley 842 de 2003</h1>
    <p class="font-weight-bold">Por la cual se modifica la reglamentación del ejercicio de la ingeniería, de sus
        profesiones afines y de sus profesiones auxiliares, se adopta el Código de Ética Profesional y se dictan otras
        disposiciones. Puedes leer la ley completa dando <a class="underlineHover" href="{{route('LeyCompleta')}}">click
            aqui</a> o navegar por el menu de indices que esta en la izquierda de tu pantalla.</p>
    <p>La información legal sobre el ejercicio de la ingeniería en todos sus ámbitos, así como las condiciones legítimas
        que implica la obtención de las certificaciones y acreditaciones, usualmente se encuentra plasmada en páginas
        web poco o nada interactivas que presentan un texto plano bastante extenso, trayendo más problemas que
        beneficios.
        La estructuración de la plataforma, por un lado, produce que el lector no logre conectarse con facilidad con la
        información que busca logrando una reducción significativa de conocimiento al respecto de la ley tratada y, por
        otro lado, no permite el análisis del tráfico de usuarios, perdiéndose así información relevante sobre qué tipo
        de persona frecuenta la página, qué información resulta más relevante y qué tan frecuente es visitado el sitio
        web, entre otros.
        Por lo anterior, es imperante buscar soluciones que resuelvan las mencionadas problemáticas de una manera
        completa. La construcción de una plataforma web puede ser una alternativa que optimice la experiencia de buscar
        información por parte del usuario y que permita la recolección de datos de uso de la web; tal plataforma debe
        estar enfocada a ser amigable con el usuario, acortando tiempos de búsqueda, facilitando índices de navegación y
        contando con un buscador propio que maneje etiquetas, todo con base en la información pertinente, clara y bien
        distribuida, para que la ley 842 de 2003 tenga mayor difusión.
        Asimismo, esta plataforma puede brindar la posibilidad de que en caso de una modificación parcial o total de la
        ley en cuestión, se pueda administrar de una manera óptima.</p>
    <a class="underlineHover" href="{{route('info')}}">
        Para más información de click aquí.</a>
</div>
<div class="jumbotron no-rborder shadow-std slideDown">

    <h1 class="text-center">Videos Informativos</h1>
    <h2>Requisitos del Ingeniero</h2>
    <div class="text-center" style="margin-top: 25px">
        <iframe style="margin-bottom: 25px" width="90%" height="400" src="https://www.youtube.com/embed/L5uI8Y5-Qq4"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
    <h2>Régimen Disciplinario de la Ingeniería</h2>
    <div class="text-center" style="margin-top: 25px">
        <iframe style="margin-bottom: 25px" width="90%" height="400" src="https://www.youtube.com/embed/_5IZR6igb6c"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
    <h2>Ley 842 de 2003 Powtoon</h2>
    <div class="text-center" style="margin-top: 25px;">
        <iframe style="margin-bottom: 25px" width="90%" height="400" src="https://www.youtube.com/embed/_5IZR6igb6c"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>

</div>

@endsection
@section('codigoExtra')
<script>
    $(document).ready(() => {
        $("#homeSubmenu").addClass('show');
    });

</script>
@endsection
