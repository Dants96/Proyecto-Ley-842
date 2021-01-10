@extends('layouts.masterAdmin-templete')
@section('titulo')
Agregar Capítulo 
@endsection

@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Agregar un nuevo Capítulo</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}} <br/> Fecha: {{date('Y / m / d')}}</p>
        <form action="{{route('agregarCapitulo')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_capitulo" id="nombre_capitulo"
                    placeholder="Nombre del Capítulo" required value="{{ old('nombre_capitulo')}}" />
                <input class="form-control margin-std" type="number" name="numero_capitulo" id="numero_capitulo"
                    placeholder="Numero del Capítulo" title="El numero no puede repetirse en otro titulo." required value="{{ old('numero_capitulo')}}" />
                <div class="margin-std">
                    <label class="lead" for="titulo">Seleccione el capítulo al que pertenece: </label>
                    <select class="form-control" id="titulo" name="titulo" required>
                        <option selected>Títulos</option>
                        @foreach ($titulos as $titulo)
                        <option value={{"$titulo->id"}}><p>{{$titulo->nombre}}</p></option>
                        @endforeach
                    </select>
                </div>
        
                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    <a href="{{route('noBuild')}}" class="btn btn-warning" target="_">Capítulos Actuales</a>
                </div>

            </div>
        </form>
        @if(! $errors->isEmpty() )
        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
        @endif
    </div>
</div>

@endsection