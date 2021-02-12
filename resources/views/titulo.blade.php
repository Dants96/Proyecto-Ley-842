@extends('Layouts.master-templete')
@section('titulo')
    Inicio
@endsection

@section('contenido')
<div class="jumbotron no-rborder shadow-std">
    <div class="titulo-header font-weight-bold text-center">
        <h1>TITULO {{$titulo['contenido']->numero}}.</h1>
        <h1>{{$titulo['contenido']->nombre}}<h1>
    </div>
    @foreach ($titulo['capitulos'] as $capitulo)
    <div class="capitulo-header font-weight-bold text-center">
        <h2>{{($capitulo['contenido']->numero)? 'CAPITULO '.$capitulo['contenido']->numero.'.' : '' }}</h2><h2>{{$capitulo['contenido']->nombre}}</h2>
    </div>        
        @foreach ($capitulo['articulos'] as $articulo)
        <div class="articulo-content">
            <p><span class="font-weight-bold">{{/*($articulo->paragrafo)? 'PARAGRAFO':'ARTÍCULO'*/ 'ARTÍCULO'}} {{$articulo->numero}}. {{$articulo->nombre}}</span> {{$articulo->contenido}}</p>
        </div>            
        @endforeach
    @endforeach  
    <p class="text-right">Título creado el <cite>{{$titulo['contenido']->created_at->format('Y-m-d')}}</cite>, modificado por ultima vez el <cite>{{$titulo['contenido']->fecha_modificacion}}</cite>.</p>
</div>

@endsection
