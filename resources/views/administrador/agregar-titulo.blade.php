@extends('layouts.masterAdmin-templete')
@section('titulo')
Agregar titulo
@endsection
@section('estilos')
form .margin-std{
margin-bottom: 7px;
}
.row-btn .btn{
margin-left: 7px;
}
@endsection
@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Agregar un nuevo Título</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()-> nombres}}
            {{Auth::user()-> apellidos}}, Fecha: {{date('Y-m-d')}} </p>
        <form action="{{route('agregarTitulo')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_tit" id="nombre_tit"
                    placeholder="Nombre del Titulo" required value="{{ old('nombre_tit')}}" />
                <input class="form-control margin-std" type="number" name="numero_tit" id="numero_tit"
                    placeholder="Numero del Titulo" title="El numero no puede repetirse en otro titulo." required {{ old('numero_tit')}} />
                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    <a href="{{route('noBuild')}}" class="btn btn-warning" target="_">Titulos Actuales</a>
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
