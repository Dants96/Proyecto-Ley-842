@extends('Layouts.masterAdmin-templete')
@section('titulo')
Agregar titulo
@endsection

@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Agregar un nuevo Título</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}} <br/> Fecha: {{date('Y / m / d')}}</p>
        <form action="{{route('agregarTitulo')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_tit" id="nombre_tit"
                    placeholder="Nombre del Título" required value="{{ old('nombre_tit')}}" />
                <input class="form-control margin-std" type="number" name="numero_tit" id="numero_tit"
                   title="el número de Título se asignará automáticamente." required value="{{ $numero }}" readonly  />
                   <small style="margin-left: 5px" id="" class="form-text text-muted">
                    El número de Título se asigna automáticamente.
                  </small>
                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-dark">Agregar</button>
                    <button type="reset" class="btn btn-dark">Limpiar</button>
                    <a href="{{route('indexOf', ['seccion' => 'Títulos'])}}" class="btn btn-dark" target="_">Ver Títulos</a>
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
@section('codigoExtra')
<script>
$("#pageSubmenuAdd").addClass("show");    
</script>    
@endsection