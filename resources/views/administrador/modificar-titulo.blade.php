@extends('layouts.masterAdmin-templete')
@section('titulo')
Modoficar titulo
@endsection

@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Modificar Título {{ $infold->numero }}</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}} <br/> Fecha: {{date('Y / m / d')}}</p>
        <form action="{{route('editarTitulo',['id_seccion'=>$infold->id])}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_tit" id="nombre_tit"
                    placeholder="Nombre del Título" required value="{{ $infold->nombre }}" />
                    
                <input class="form-control margin-std" type="number" name="numero_tit" id="numero_tit"
                   title="Número asignado." required value="{{ $infold->numero }}" readonly  />
                   
                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    <a href="#" class="btn btn-warning" target="_">Titulos Actuales</a>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection
@section('codigoExtra')
<script>
$("#pageSubmenuAdd").addClass("show");    
</script>    
@endsection