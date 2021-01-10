@extends('layouts.masterAdmin_templete')
@section('titulo')
    {{$proceso->operacion}} Exitosa
@endsection
@section('contenido')

<div class="alert alert-success shadow-std no-rborder" role="alert">
    <h4 class="alert-heading">{{$proceso->operacion}} Exitosa !</h4>
    <p>{{$proceso->msg}}: <p class="font-weigth-bold">{{$proceso->objeto_nombre}} a la base de datos correctamente </p></p>
    <p class="lead text-capitalize font-weight-bold">proceso realizado por Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}}</p>
    <hr>
    <p class="mb-0">El nuevo {{$proceso->objeto_tipo}} ya está disponible en la plataforma de lectura de la ley 842 de 2003.</p>
  </div>
    
@endsection