@extends('layouts.masterAdmin-templete')
@section('titulo')
Agregar Articulo
@endsection

@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Agregar un nuevo Artículos</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}} <br/> Fecha: {{date('Y / m / d')}}</p>
        <form action="{{route('agregarArticulo')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_articulo" id="nombre_articulo"
                    placeholder="Nombre del Artículo" required value="{{ old('nombre_articulo')}}" />
                <input class="form-control margin-std" type="number" name="numero_articulo" id="numero_articulo"
                    placeholder="Numero del Artículo" title="El numero no puede repetirse en otro titulo." required value="{{ old('numero_articulo')}}" />
                <div class="margin-std">
                    <label class="lead" for="capitulo">Seleccione el capítulo al que pertenece: </label>
                    <select class="form-control" id="capitulo" name="capitulo" required>
                        <option selected>Capitulo</option>
                        @foreach ($capitulos as $capitulo)
                        <option value={{"$capitulo->id"}}><p>{{$capitulo->nombre}}</p></option>
                        @endforeach
                    </select>
                </div>
                <label class="lead" for="contenido">Contenido del Artículo: </label>
                <textarea class="form-control margin-std" type="text" name="contenido" id="contenido"
                     required value="{{ old('contenido')}}"></textarea>
                

                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    <a href="{{route('noBuild')}}" class="btn btn-warning" target="_">Artículo Actuales</a>
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
