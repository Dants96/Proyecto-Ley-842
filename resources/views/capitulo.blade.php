@extends('Layouts.master-templete')
@section('titulo')
Capítulo {{$capitulo['contenido']->numero}}
@endsection

@section('contenido')
<div class="jumbotron no-rborder shadow-std slideDownLg">
    <div class="header-info">
        <p class="text-left text-uppercase"><cite>Titulo {{$tituloRef->numero}}. {{$tituloRef->nombre}}</cite></p>
        <p class="text-left text-uppercase">creado el
            <cite>{{$capitulo['contenido']->created_at->format('Y-m-d')}}</cite>, modificado por ultima vez el
            <cite>{{$capitulo['contenido']->fecha_modificacion}}</cite>.</p>
    </div>
    <div class="capitulo-header font-weight-bold text-center">
        <h1 class="h3">{{($capitulo['contenido']->numero)? 'CAPITULO '.$capitulo['contenido']->numero.'.' : '' }}</h1>
        <h1 class="h3">{{$capitulo['contenido']->nombre}}</h1>
    </div>
    @foreach ($capitulo['articulos'] as $articulo)
    <div class="articulo-content">
        <p><span class="font-weight-bold">{{/*($articulo->paragrafo)? 'PARAGRAFO':'ARTÍCULO'*/ 'ARTÍCULO'}}
                {{$articulo->numero}}. {{$articulo->nombre}}</span> {{$articulo->contenido}}</p>
    </div>
    @endforeach


</div>

@endsection

@section('codigoExtra')
<script>
    $(document).ready(() => {
        $("#homeSubmenu").addClass('show');
    });

</script>
@endsection
