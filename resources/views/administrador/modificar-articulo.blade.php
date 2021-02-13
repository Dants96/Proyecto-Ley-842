@extends('layouts.masterAdmin-templete')
@section('titulo')
Modificar Articulo
@endsection

@section('contenido')
<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Editar Artículo {{$infold->numero}}</h1>
        <form action="{{route('editarArticulo',['id_seccion'=>$infold->id])}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="form-control margin-std" type="text" name="nombre_articulo" id="nombre_articulo"
                    value="{{$infold->nombre}}" placeholder="Actualmente no posee encabezado" required  />

                <div class="margin-std">
                    <label class="lead" for="capitulo">Seleccione el título al que pertenece: </label>
                    <select class="form-control " id="titulo" name="titulo" style="text-overflow: ellipsis;" required>
                        <option selected value="{{$tituloq->id}}" >{{$tituloq->numero}}. {{$tituloq->nombre}}</option>
                        <option></option>
                        @foreach ($titulos as $titulo)
                        <option value="{{$titulo->id}}"><p>{{$titulo->numero}}. {{$titulo->nombre}}</p></option>
                        @endforeach
                    </select>
                </div>

                <div class="margin-std">
                    <label class="lead" for="capitulo">Seleccione el capítulo al que pertenece: </label>
                    <select class="form-control " id="capitulo" name="capitulo" style="text-overflow: ellipsis;" required>
                        <option selected value="{{$capituloq->id}}">{{$capituloq->numero}}. {{$capituloq->nombre}}</option> 
                        <option></option>
                        @foreach ($capitulos as $capitulo)
                        <option value="{{$capitulo->id}}"><p>{{$capitulo->numero}}. {{$capitulo->nombre}}</p></option>
                        @endforeach                       
                    </select>
                </div>

                <label class="lead" for="contenido">Contenido del Artículo: </label>
                <textarea class="form-control margin-std" type="text" name="contenido" id="contenido"
                     required >{{ $infold->contenido }}</textarea>                

                <div class="row-btn margin-std d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-success">Editar</button>
                    <button type="reset" class="btn btn-primary" id="limpiar">Limpiar</button>
                    <a href="#" class="btn btn-warning" target="_">Artículo Actuales</a>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

@section('codigoExtra')
    <script>
        $("#titulo").on('change', function(){
            $.ajax({
                url: 'get/capitulos/from2',
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
    </script>
@endsection