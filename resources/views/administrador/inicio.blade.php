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
        <p class="lead">Desde este apartado, podrá modificar la <strong class="font-weight-bold">Ley 842 de 2003</strong>, adicionando o cambiando información de títulos, capítulos o artículos. Además de estadísticas de uso de la plataforma de lectura y de la plataforma de administración.</p>
        <hr class="my-4">
        <p>Las opciones disponibles se presentan en el panel de navegación de lado izquierdo de la pantalla.</p>        
        </div>
  </div>
@endsection
