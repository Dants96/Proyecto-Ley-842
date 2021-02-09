@extends('Layouts.masterAdmin-templete')
@section('titulo')
    Inicio
@endsection
@section('contenido')
<div class="jumbotron no-rborder shadow-std slideDown">
    <div class="fadeInjs">
        <h1 class="display-4">Plataforma de Administracion</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}}</p>
        <p class="lead font-weight-bold">Fecha: {{date('Y / m / d')}}</p>        
        <hr class="my-4">
        <div class="info-content">
            {{print_r($infoArr)}}

        </div>
  </div>
@endsection
