@extends('Layouts.masterAdmin-templete')
@section('titulo')
    Inicio
@endsection
@section('contenido')
hola!!! Admin>>>>.
{{Auth::user()-> nombres}}
{{Auth::user()-> apellidos}}
@endsection
