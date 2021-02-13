@extends('Layouts.master-templete')
@section('titulo')
{{$seccion}}
@endsection

@section('estilos')
<style>
    .jumbotron.shadow-std.no-rborder .lista {
        margin-top: 20px;
    }

    .jumbotron.shadow-std.no-rborder .lista .item-lista {
        background-color: #e9ecef;
    }

    .jumbotron.shadow-std.no-rborder .lista .item-lista:hover {
        transform: translate(2px);
        background-color: #fff;

    }

    .jumbotron.shadow-std.no-rborder .lista .list-group-item {
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .lista .header,
    .lista {
        margin-bottom: 20px
    }

    .lista .list-group.list-group-flush {
        margin-bottom: 20px;
    }

    .lista h3 {
        margin-top: 30px;
    }


</style>
@endsection

@section('contenido')
<div class="jumbotron no-rborder shadow-std {{($seccion == 'Títulos')? 'slideDown':'slideDownLg'}}">
    <h1 class="h1 font-weight-bold">Lista de {{$seccion}}</h1>
    <p>Seleccione el <span class="text-lowercase">{{substr($seccion, 0, -1)}}</span> que desea consultar para desplegar
        toda su información, también puede leer la <a class="underlineHover" href="#">ley completa aquí.</a></p>

    @switch($seccion)
    @case('Títulos')
    <div id="display-lista" class="lista">
        <ul id="listaCA" class="list-group list-group-flush">
            @foreach ($source as $item)
            <a href="{{route('getLeyTitulo', ['idSc' => $item->id])}}">
                <li class="list-group-item item-lista">{{$item->numero}}. {{$item->nombre}}</li>
            </a>
            @endforeach
        </ul>
    </div>
    @break
    @case('Capítulos')
    @foreach ($source as $titulo)
    <div id="display-lista" class="lista" style="padding-bottom: 20px; padding-top: 20px">
        <h2 class="header lead font-weight-bold text-center">TITULO NO {{$titulo['numero']}}.
            {{substr($titulo['nombre'], 0, -1)}}</h2>
        <ul id="listaCA" class="list-group list-group-flush">
            @foreach ($titulo['capitulos'] as $capitulo)
            <a href="{{route('getLeyCapitulo', ['idSc' => $capitulo->id])}}">
                <li class="list-group-item item-lista">{{$capitulo->numero}}. {{$capitulo->nombre}}</li>
            </a>
            @endforeach
        </ul>
    </div>
    @endforeach
    @break

    @case('Artículos')
    @foreach ($source as $titulo)
    <div id="display-lista" class="lista" style="padding-bottom: 20px; padding-top: 20px">
        <h2 class="header lead font-weight-bold text-center">TITULO NO {{$titulo['numero']}}.
            {{substr($titulo['nombre'], 0, -1)}}</h2>
        @foreach ($titulo['capitulos'] as $capitulo)
        <h3 class="header lead font-weight-bold">
            <li>CAPITULO NO {{$capitulo['numero']}}. {{substr($capitulo['nombre'], 0, -1)}}: </li>
        </h3>
        <ul id="listaCA" class="list-group list-group-flush">
            @foreach ($capitulo['articulos'] as $articulo)
            <a href="{{route('getLeyArticulo', ['idSc' => $articulo->id])}}">
                <li class="list-group-item item-lista">{{$articulo->numero}}. {{$articulo->nombre}}</li>
            </a>
            @endforeach
        </ul>
        @endforeach
    </div>
    @endforeach
    @break
    @endswitch


</div>

@endsection

@section('codigoExtra')
<script>
    $(document).ready(() => {
        $("#homeSubmenu").addClass('show');
    });

</script>
@endsection
