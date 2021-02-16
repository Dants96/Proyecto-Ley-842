@extends('layouts.masterAdmin-templete')
@section('titulo')
Modificar {{$seccion}}
@endsection
@section('estilos')
<style>
    .jumbotron.shadow-std.no-rborder .lista {
        margin-top: 20px;
    }

    .jumbotron.shadow-std.no-rborder .lista .item-lista {
        background-color: #e9ecef;
    }

    .jumbotron.shadow-std.no-rborder .lista .item-lista:hover {
        transform: translate(2px);
        background-color: #fff;

    }

    .jumbotron.shadow-std.no-rborder .lista .list-group-item {
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
    
    .jumbotron.shadow-std.no-rborder .lista .item-lista.eliminar:hover{
        transform: translate(2px);
        background-color: #f8d7da;
    }

</style>
@endsection
@section('contenido')

<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Lista de {{$seccion}}s</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}}
            {{Auth::user()-> apellidos}} <br /> Fecha: {{date('Y / m / d')}}</p>

        <!--solo para capitulos y articulos--> <!--ESTO ES LA RAZON POR LA QUE ESTA MAL-->

        @switch($seccion)
            @case('Artículo')
                <div class="margin-std">
                    <label class="lead" for="capitulo">Seleccione el capítulo al que pertenece el {{$seccion}} que quiere <span class="font-weight-bold">{{($accion == 'MOD')? 'Modificar': 'Eliminar'}}</span>: </label>
                    <select class="form-control " id="padre" name="padre" style="text-overflow: ellipsis;">
                        <option selected>Capítulos</option>
                        @foreach ($secciones as $seccionOut)
                        <option value="{{$seccionOut->id}}">Título No {{$seccionOut->titulo}}, {{$seccionOut->numero}}. {{$seccionOut->nombre}}</option>
                        @endforeach
                    </select>
        
                    <div id="display-lista" class="lista" style="display: none">
                        <label id="labelCA" class="lead" for="listaCA">Seleccione el {{$seccion}} a <span class="font-weight-bold">{{($accion == 'MOD')? 'Modificar': 'Eliminar'}}</span>: </label>
                        <ul id="listaCA" class="list-group list-group-flush">
                            
                        </ul>
                    </div>
                </div>
                @break
            @case('Capítulo')
                <div class="margin-std">
                    <label class="lead" for="capitulo">Seleccione el Título al que pertenece el {{$seccion}} que quiere <span class="font-weight-bold">{{($accion == 'MOD')? 'Modificar': 'Eliminar'}}</span>: </label>
                
                    <select class="form-control " id="padre" name="padre" style="text-overflow: ellipsis;">
                        <option selected>Títulos</option>
                        @foreach ($secciones as $seccionOut)
                        <option value="{{$seccionOut->id}}"> {{$seccionOut->numero}}. {{$seccionOut->nombre}}</option>
                        @endforeach
                    </select>
        
                    <div id="display-lista" class="lista" style="display: none">
                        <label id="labelCA" class="lead" for="listaCA">Seleccione el {{$seccion}} a <span class="font-weight-bold">{{($accion == 'MOD')? 'Modificar': 'Eliminar'}}</span>: </label>
                        <ul id="listaCA" class="list-group list-group-flush">
        
                        </ul>
                    </div>
                </div>
                @break
            @case('Título')
            <label class="lead" for="capitulo">Seleccione el {{$seccion}} que quiere <span class="font-weight-bold">{{($accion == 'MOD')? 'Modificar': 'Eliminar'}}</span>: </label>
                <div class="lista">
                    <ul class="list-group list-group-flush">
                        @foreach ($secciones as $seccionOut)
                        @if ($accion == 'MOD')
                        <a href="{{ route('editarTitulo', ['id_seccion' => $seccionOut->id])}}">
                            <li class="list-group-item item-lista">{{$seccionOut->numero}}. {{$seccionOut->nombre}}</li>
                        </a>
                        @else
                        <a href="" onclick="enviarDEL(event, 'titulo', {{$seccionOut->id}}, {{$seccionOut->numero}}, '{{$seccionOut->nombre}}')">
                            <li class="list-group-item item-lista eliminar">{{$seccionOut->numero}}. {{$seccionOut->nombre}}</li>
                        </a>                
                        @endif
                        
                        @endforeach
                    </ul>
                </div>
            @break    
        @endswitch
        @if($accion == 'SUP')
        <div class="alert alert-warning" role="alert" style="margin-top: 20px">
            Una vez eliminado el <span class="text-lowercase"> {{$seccion}} </span> no se podrá Modificar o recuperar, su contenido será <span class="font-weight-bold">tachado de la ley.</span>
          </div>
        @endif
    </div>
</div>

@endsection


@section('codigoExtra')
<script>
    function enviarDEL(event, seccion, id, numero, nombre){
        event.preventDefault();

        if(confirm("Esta serguro que quiere eliminar el "+seccion+": " + numero + ", " + nombre + "?")){
            let formulario = document.createElement("form");
            formulario.style.display = "none";
            formulario.setAttribute("method", "post");
            formulario.setAttribute("action", "{{route('eliminar')}}");

            let inputSecc = document.createElement("input");
            inputSecc.setAttribute("type", "text");
            inputSecc.setAttribute("value", seccion);
            inputSecc.setAttribute("name", "seccion")
            
            let inputId = document.createElement("input");
            inputId.setAttribute("type", "number");
            inputId.setAttribute("value", id);
            inputId.setAttribute("name", "id")

            formulario.appendChild(inputId);
            formulario.appendChild(inputSecc);

            formulario.innerHTML += '@csrf';
            formulario.innerHTML += '@method('DELETE')';

            document.body.appendChild(formulario);
            formulario.submit();
        }
        
    }

    @if($accion == "MOD")
    $("#pageSubmenu2Mod").addClass("show");
    @else
    $("#pageSubmenu3Del").addClass("show");
    @endif

    $("#padre").on('change', function () {
        $('#display-lista').css("display", "none");
        $.ajax({
            url: "{{($seccion == 'Capítulo')? url('Administrador/get/capitulos/from'): url('Administrador/get/articulos/from')}}",
            method: 'GET',
            data: {
                id_from: $('#padre').val(),
            }
        }).done(function (res) {
            let respuesta = JSON.parse(res);
            $('#listaCA').html("");

            for (let i = 0; i < respuesta.length; i++) {
                
                @if($accion == 'MOD')
                    @if($seccion == 'Capítulo')
                    let ruta = "/Administrador/editar/capitulo/"+ respuesta[i].id;                           
                    @elseif($seccion == 'Artículo')
                    let ruta = "/Administrador/editar/articulo/"+ respuesta[i].id;
                    @endif  
                    let opcion = `${respuesta[i].numero}. ${respuesta[i].nombre}`;                  
                    $('#listaCA').append(`<a href="${ruta}"><li class="list-group-item item-lista">${opcion}</li></a>`);
                
                @elseif($accion == 'SUP' && in_array($seccion, ['Capítulo', 'Artículo']))
                    
                        let secRq = "{{($seccion == 'Capítulo')? 'capitulo' : 'articulo'}}";
                        let idRq = respuesta[i].id;
                        let numRq = respuesta[i].numero
                        let nomRq = respuesta[i].nombre;
                        let opcion = `${respuesta[i].numero}. ${respuesta[i].nombre}`; 
                
                    $('#listaCA').append(`<a href="" onClick="enviarDEL(event, '${secRq}', ${idRq}, ${numRq},'${nomRq}')" ><li class="list-group-item item-lista eliminar">${opcion}</li></a>`);
                
                @endif
            }
            if (respuesta.length) {
                $('#display-lista').slideDown();
            }
        });
    });

</script>
@endsection
