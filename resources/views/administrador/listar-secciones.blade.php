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

</style>
@endsection
@section('contenido')

<div class="jumbotron shadow-std no-rborder slideDown">
    <div class="fadeInjs">
        <h1 class="font-weight-bold">Lista de {{$seccion}}s</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}}
            {{Auth::user()-> apellidos}} <br /> Fecha: {{date('Y / m / d')}}</p>

        <!--solo para capitulos y articulos-->
        @if(in_array($seccion, ['Capítulo', 'Artículo']))
        <div class="margin-std">
            <label class="lead" for="capitulo">Seleccione el {{($seccion == 'Capítulo')? 'título':'capítulo'}} al que
                pertenecen los {{$seccion}}s: </label>
            <select class="form-control " id="padre" name="padre" style="text-overflow: ellipsis;">
                <option selected>{{($seccion == 'Capítulo')? 'Títulos':'Capítulos'}}</option>
                @foreach ($secciones as $seccionOut)
                <option value="{{$seccionOut->id}}">{{($seccion == 'Artículo')? 'Título: #'.$seccionOut->titulo: ''}}, {{$seccionOut->numero}}. {{$seccionOut->nombre}}</option>
                @endforeach
            </select>

            <div id="display-lista" class="lista" style="display: none">
                <label id="labelCA" class="lead" for="listaCA">Seleccione el {{$seccion}} a editar: </label>
                <ul id="listaCA" class="list-group list-group-flush">

                </ul>
            </div>
        </div>

        <!--solo para titulos-->
        @else
        <div class="lista">
            <ul class="list-group list-group-flush">
                @foreach ($secciones as $seccionOut)
                <a href="{{route('editarTitulo', ['id_seccion' => $seccionOut->id])}}">
                    <li class="list-group-item item-lista">{{$seccionOut->numero}}. {{$seccionOut->nombre}}</li>
                </a>
                @endforeach
            </ul>
        </div>
        @endif



    </div>
</div>

@endsection


@section('codigoExtra')
<script>
    $("#padre").on('change', function () {
        $('#display-lista').css("display", "none");
        $.ajax({
            url: "{{($seccion == 'Capítulo')? 'get/capitulos/from':'get/articulos/from'}}",
            method: 'GET',
            data: {
                id_from: $('#padre').val(),
            }
        }).done(function (res) {
            let respuesta = JSON.parse(res);
            $('#listaCA').html("");

            for (let i = 0; i < respuesta.length; i++) {
                @if($seccion == 'Capítulo')
                let ruta = "/Administrador/editar/capitulo/"+ respuesta[i].id;                           
                @elseif($seccion == 'Artículo')
                let ruta = "/Administrador/editar/articulo/"+ respuesta[i].id;
                @endif  
                let opcion = `${respuesta[i].numero}. ${respuesta[i].nombre}`;                  
                $('#listaCA').append(`<a href="${ruta}"><li class="list-group-item item-lista">${opcion}</li></a>`);
            }
            if (respuesta.length) {
                $('#display-lista').slideDown();
            }
        });
    });

</script>
@endsection
