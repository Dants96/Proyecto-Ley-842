@extends('layouts.masterAdmin-templete')
@section('titulo')
Estadísticas  
@endsection
@section('estilos')
    <style>

        .tab-pane p{
            margin-top: 10px;
        }
    </style>
@endsection
@section('contenido')
    <div class="jumbotron shadow-std no-rborder">
        <h1 class="font-weight-bold">Estadísticas</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}}</p>
        <ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="generalStats-tab" data-toggle="tab" href="#generalStats" role="tab" aria-controls="generalStats" aria-selected="true">Estadísticas Generales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="ModificacionesStats-tab" data-toggle="tab" href="#ModificacionesStats" role="tab" aria-controls="ModificacionesStats" aria-selected="false">Modificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="plataformaStats-tab" data-toggle="tab" href="#plataformaStats" role="tab" aria-controls="plataformaStats" aria-selected="false">Plataforma</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="generalStats" role="tabpanel" aria-labelledby="generalStats-tab">
                <p>Estadísticas generales de la plataforma de lectura y la plataforma de Administración.</p>
                <ul>
                    <div class="row justify-content-center">
                        <div class="col-mb">
                            <p class="font-weight-bold">Número visitas a la plataforma de lectura: </p>
                            <p class="font-weight-bold">Número de modificaciones realizadas: </p>
                            <p class="font-weight-bold">Número de secciones editadas: </p>
                            <p class="font-weight-bold">Número de secciones agregadas: </p>
                            <p class="font-weight-bold">Número de secciones eliminadas: </p>
                        </div>
                        <div class="col-8">
                            <p>{{$estadisticas->visitas_pagina}}</p>
                            <p>{{$estadisticas->numero_modificaciones}}</p>
                            <p>{{$estadisticas->numero_adiciones}}</p>
                            <p>{{$estadisticas->numero_supreciones}}</p>
                            <p>{{$estadisticas->numero_modificaciones + $estadisticas->numero_adiciones + $estadisticas->numero_supreciones}} </p>
                        </div>
                    </div>
                    
                    
                </ul>
            </div>
            <div class="tab-pane fade" id="ModificacionesStats" role="tabpanel" aria-labelledby="ModificacionesStats-tab">graficos</div>
            <div class="tab-pane fade" id="plataformaStats" role="tabpanel" aria-labelledby="plataformaStats-tab">historico</div>
        </div>
    </div>
@endsection