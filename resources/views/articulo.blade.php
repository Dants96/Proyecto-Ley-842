@extends('Layouts.master-templete')
@section('titulo')
Articulo {{$articulo->numero}}
@endsection

@section('contenido')
<div class="jumbotron no-rborder shadow-std slideDown">
    <div id="contenido-prt">
    <div class="header-info">
        @if ($tagVist)
        <p class="text-left text-uppercase"><cite>Vistas Acumuladas: {{$articulo->vistas}}.</cite></p>
        @endif
        <p class="text-left text-uppercase"><cite>Titulo {{$tituloRef->numero}}. {{$tituloRef->nombre}}</cite></p>
        <p class="text-left text-uppercase"><cite>Capitulo {{$capituloRef->numero}}. {{$capituloRef->nombre}}</cite>.
        </p>
        <p class="text-left text-uppercase">creado el <cite>{{$articulo->created_at->format('Y-m-d')}}</cite>,
            modificado por ultima vez el <cite>{{$articulo->fecha_modificacion}}</cite>.</p>
    </div>
    <div class="articulo-content">
        <p><span class="font-weight-bold h5">{{/*($articulo->paragrafo)? 'PARAGRAFO':'ARTÍCULO'*/ 'ARTÍCULO'}}
                {{$articulo->numero}}. {{$articulo->nombre}}</span> {{$articulo->contenido}}</p>
    </div>
    </div>
    <button class="btn btn-dark btn-print">Imprimir</button>
</div>

@endsection

@section('codigoExtra')
<script>
    @if (!$tagVist)
    $(document).ready(() => {
        $("#homeSubmenu").addClass('show');
    });
    @else
    $(document).ready(() => {
        $("#pageSubmenu").addClass('show');
    });
    @endif

</script>
@endsection
