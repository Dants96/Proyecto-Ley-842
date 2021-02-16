@extends('layouts.masterAdmin-templete')
@section('titulo')
    {{$proceso['operacion']}} Exitosa
@endsection
@section('estilos')
<style>
  a{
    display: inline-block;
    text-decoration: none;
  }
  .underlineHover:after {
    display: block;
    left: 0;
    bottom: -10px;
    width: 0;
    height: 2px;
    background-color: #1d643b !important;
    content: "";
    transition: width 0.2s;
  }

  .underlineHover:hover {
    color: #0d0d0d;
  }

  .underlineHover:hover:after {
    width: 100%;
  }
</style>
<script>
  if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
  }
</script>
@endsection
@section('contenido')
<div class="alert alert-success shadow-std no-rborder slideDown" role="alert" style="border: none">
  <div class="fadeInjs text-center">
    <h3 class="alert-heading font-weight-bold text-capitalize">{{$proceso['operacion']}} Exitosa!</h3>
    <p>{{$proceso['msg']}}: <span class="font-weight-bold"> #{{$proceso['objeto_numero']}} {{$proceso['objeto_nombre']}} {{($proceso['operacion'] == 'edición')? 'a' : 'de'}} la base de datos correctamente.</span></p>
    <p class="text-capitalize font-weight-bold">proceso realizado por Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}}</p>
    <hr>
    @if($proceso['operacion'] == 'eliminacion')
    <p class="mb-0">El {{$proceso['objeto_tipo']}}, fue eliminado pero aun puede encontrarse en la plataforma de lectura de la <a class="underlineHover" href="{{route('inicio')}}">ley 842 de 2003</a> como 'eliminado'.</p>
    @else
    <p class="mb-0">{{($proceso['operacion'] == 'edición')? 'El '.$proceso['objeto_tipo'].' Modificado' : 'El nuevo '. $proceso['objeto_tipo']}}, ya está disponible en la plataforma de lectura de la <a class="underlineHover" href="{{route('inicio')}}">ley 842 de 2003.</a></p>
    @endif
  </div>
  </div>
    
@endsection
@section('codigoExtra')
<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
</script>   
@endsection
