@extends('Layouts.master-templete')
@section('titulo')
    Articulo {{$articulo->numero}}
@endsection

@section('contenido')
<div class="jumbotron no-rborder shadow-std">
    <div class="header-info">
        <p class="text-left text-uppercase"><cite>Titulo {{$tituloRef->numero}}. {{$tituloRef->nombre}}</cite></p>
        <p class="text-left text-uppercase"><cite>Capitulo {{$capituloRef->numero}}. {{$capituloRef->nombre}}</cite>.</p>
        <p class="text-left text-uppercase">creado el <cite>{{$articulo->created_at->format('Y-m-d')}}</cite>, modificado por ultima vez el <cite>{{$articulo->fecha_modificacion}}</cite>.</p>   
    </div>
        <div class="articulo-content">
            <p><span class="font-weight-bold h5">{{/*($articulo->paragrafo)? 'PARAGRAFO':'ARTÍCULO'*/ 'ARTÍCULO'}} {{$articulo->numero}}. {{$articulo->nombre}}</span> {{$articulo->contenido}}</p>
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
