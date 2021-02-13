@extends('Layouts.master-templete')
@section('titulo')
Ley 842 de 2003
@endsection
@section('estilos')
<style>

</style>

@endsection
@section('contenido')
<div class="jumbotron no-rborder shadow-std slideDownLg">
        <div class="titulo-header font-weight-bold text-center">
            <h1 class="h2">El Congreso de Colombia</h1>
            <h1 class="h2">DECRETA:<h1>
        </div>
        @foreach ($titulos as $titulo)
        <div class="titulo-header font-weight-bold text-center">
            <h1 class="h3">TITULO {{$titulo['contenido']->numero}}.</h1>
            <h1 class="h3">{{$titulo['contenido']->nombre}}<h1>
        </div>
        @foreach ($titulo['capitulos'] as $capitulo)
        <div class="capitulo-header font-weight-bold text-center">
            <h2 class="h4">{{($capitulo['contenido']->numero)? 'CAPITULO '.$capitulo['contenido']->numero.'.' : '' }}</h2>
            <h2 class="h4">{{$capitulo['contenido']->nombre}}</h2>
        </div>        
            @foreach ($capitulo['articulos'] as $articulo)
            <div class="articulo-content">
                <p><span class="font-weight-bold">{{/*($articulo->paragrafo)? 'PARAGRAFO':'ARTÍCULO'*/ 'ARTÍCULO'}} {{$articulo->numero}}. {{$articulo->nombre}}</span> {{$articulo->contenido}}</p>
            </div>            
            @endforeach
        @endforeach  
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
