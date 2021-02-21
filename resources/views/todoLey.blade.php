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
    <div id="contenido-prt">
        <div class="titulo-header font-weight-bold text-center">
            <h1 class="h2">El Congreso de Colombia</h1>
            <h1 class="h2">DECRETA:<h1>
        </div>

        @foreach ($titulos as $titulo)
        @if(!$titulo['contenido']->activo)
        <s>
            @endif
            <div class="titulo-header font-weight-bold text-center">
                <h1 class="h3">TITULO {!!$titulo['contenido']->numero!!}.</h1>
                <h1 class="h3">{!!$titulo['contenido']->nombre!!}<h1>
            </div>

            @foreach ($titulo['capitulos'] as $capitulo)
            @if(!$capitulo['contenido']->activo)
            <s>
                @endif
                <div class="capitulo-header font-weight-bold text-center">
                    <h2 class="h4">
                        {!!($capitulo['contenido']->numero)? 'CAPITULO '.$capitulo['contenido']->numero.'.' : '' !!}</h2>
                    <h2 class="h4">{!!$capitulo['contenido']->nombre!!}</h2>
                </div>


                @foreach ($capitulo['articulos'] as $articulo)
                @if(!$articulo->activo)
                <s>
                    @endif
                    <div class="articulo-content">
                        <p><span class="font-weight-bold">{!!/*($articulo->paragrafo)? 'PARAGRAFO':'ARTÍCULO'*/ 'ARTÍCULO'!!}
                                {!!$articulo->numero!!}. {!!$articulo->nombre!!}</span> {!!$articulo->contenido!!}</p>
                    </div>
                    @if(!$articulo->activo)
                </s>
                @endif
                @endforeach
                @if(!$capitulo['contenido']->activo)
            </s>
            @endif
            @endforeach
            @if(!$titulo['contenido']->activo)
        </s>
        @endif
        @endforeach
    </div>
    <button class="btn btn-dark btn-print">Imprimir</button>

</div>

@endsection
@section('codigoExtra')
<script>
    $(document).ready(() => {
        $("#homeSubmenu").addClass('show');
    });

</script>
@endsection
