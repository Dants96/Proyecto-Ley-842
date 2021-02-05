@extends('layouts.masterAdmin-templete')
@section('titulo')
Agregar Articulo
@endsection

@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Agregar un nuevo Artículo</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}} <br/> Fecha: {{date('Y / m / d')}}</p>
        <form action="{{route('agregarArticulo')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_articulo" id="nombre_articulo"
                    placeholder="Nombre del Artículo" required value="{{ old('nombre_articulo')}}" />
               


                    <div class="margin-std">
                        <label class="lead" for="capitulo">Seleccione el Titulo al que pertenece: </label>
                        <select class="form-control " id="titulo" name="titulo" style="text-overflow: ellipsis;" required>
                            <option selected>Titulo</option>
                            @foreach ($titulos as $titulo)
                            <option value={{$titulo->id}}><p>{{$titulo->numero}}. {{$titulo->nombre}}</p></option>
                            @endforeach
                        </select>
                    </div>

                <div class="margin-std">
                    <label class="lead" for="capitulo">Seleccione el capítulo al que pertenece: </label>
                    <select class="form-control " id="capitulo" name="capitulo" style="text-overflow: ellipsis;" required>                        
                    </select>
                </div>
                <label class="lead" for="contenido">Contenido del Artículo: </label>
                <textarea class="form-control margin-std" type="text" name="contenido" id="contenido"
                     required value="{{ old('contenido')}}"></textarea>

                     <small style="margin-left: 5px; magin-bottom:5px" id="" class="form-text text-muted">
                        El número de Artículo se asigna automáticamente.
                      </small>
                

                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <button type="reset" class="btn btn-primary" id="limpiar">Limpiar</button>
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

@section('codigoExtra')
    <script>
        $("#titulo").on('change', function(){
            $.ajax({
                url: 'get/capitulos/from',
                method: 'GET',
                data:{
                    id_from:$('#titulo').val(),
                }
            }).done(function(res){
                let respuesta = JSON.parse(res);
                $('#capitulo').html("");
                for(let i=0; i<respuesta.length; i++){
                    $('#capitulo').append('<option value="'+respuesta[i].id+'">'+respuesta[i].numero+'. '+respuesta[i].nombre+'</option>');
                }
            });
        });
        $("#limpiar").on('click', function(){
            $('#capitulo').html("");
        });

        $("#pageSubmenuAdd").addClass("show");
    </script>
@endsection
