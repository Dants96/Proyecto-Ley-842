@extends('layouts.masterAdmin-templete')
@section('titulo')
Estadísticas
@endsection
@section('estilos')
<style>
    .tab-pane p {
        margin-top: 10px;
    }

</style>


@endsection
@section('contenido')
<div class="jumbotron no-rborder shadow-std slideDown">
    <h1 class="font-weight-bold">Estadísticas</h1>
    <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}}
        {{Auth::user()-> apellidos}}</p>
    <p class="lead font-weight-bold">Fecha: {{date('Y / m / d')}}</p>        
    <ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="generalStats-tab" data-toggle="tab" href="#generalStats" role="tab"
                aria-controls="generalStats" aria-selected="true">Estadísticas Generales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="ModificacionesStats-tab" data-toggle="tab" href="#ModificacionesStats" role="tab"
                aria-controls="ModificacionesStats" aria-selected="false">Modificaciones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="plataformaStats-tab" data-toggle="tab" href="#plataformaStats" role="tab"
                aria-controls="plataformaStats" aria-selected="false">Plataforma</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="generalStats" role="tabpanel" aria-labelledby="generalStats-tab">
            <p>Estadísticas generales de la plataforma de lectura y la plataforma de Administración.</p>
            <ul>
                <div class="row justify-content-center">
                    <div class="col-mb">
                        <row><p class="font-weight-bold">Número visitas a la plataforma de lectura: </p></row>
                        <row><p class="font-weight-bold">Número de modificaciones realizadas: </p></row>
                        <row><p class="font-weight-bold">Número de secciones editadas: </p></row>
                        <row><p class="font-weight-bold">Número de secciones agregadas: </p></row>
                        <row><p class="font-weight-bold">Número de secciones eliminadas: </p></row>
                    </div>
                    <div class="col-8">
                        <row><p>{{$estadisticas->visitas_pagina}}</p></row>
                        <row><p>{{$estadisticas->numero_modificaciones + $estadisticas->numero_adiciones + $estadisticas->numero_supreciones}}</p></row>
                        <row><p>{{$estadisticas->numero_modificaciones}}</p></row>
                        <row><p>{{$estadisticas->numero_adiciones}}</p></row>
                        <row><p>{{$estadisticas->numero_supreciones}}</p></row>
                    </div>
                </div>


            </ul>
        </div>
        <div class="tab-pane fade" id="ModificacionesStats" role="tabpanel" aria-labelledby="ModificacionesStats-tab">
            <p>Este gráfico muestra el número de ediciones realizadas, separadas por tipo de modificación (Adición, Modificación, Eliminación),  en un lapso de 30 días.</p>
            <p>Número de modificaciones totales realizadas a la ley: <span class="font-weight-bold">{{$estadisticas->numero_modificaciones + $estadisticas->numero_adiciones + $estadisticas->numero_supreciones}}</span></p>
            <div id="chart" style="width: 99%"></div>
            <table class="table table-bordered border- text-center" style="margin-top: 20px">
                <tr>
                    <td scope="col"><p>Si requiere información detallada puede ver aquí el informe completo de modificaciones realizadas a la ley.</p></td>
                    <td scope="col" style="vertical-align:middle">
                        
                           <button id="informe-btn" class="btn btn-info">Informe</button>
                                                               
                    </td>
                </tr>
            </table>
            
        </div>
        <div class="tab-pane fade" id="plataformaStats" role="tabpanel" aria-labelledby="plataformaStats-tab">historico
        </div>
    </div>
</div>

@endsection
@section('codigoExtra')

<!-- Charting library -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<!-- Chartisan -->
<script src="{{asset('js/chartisan_chartjs.umd.js')}}"></script>

<script>
    // ir al informe
    $("#informe-btn").on("click", () =>{
        let formulario = document.createElement('form');
        let input = document.createElement('input');

        formulario.setAttribute("method", "get");
        formulario.setAttribute("action", "{{route('getInforme')}}");
        formulario.style.display = "none";


        input.setAttribute("value", "modificaciones");
        input.setAttribute("name", "source");

        formulario.appendChild(input);
        document.body.appendChild(formulario);
        formulario.submit();
    });

    // grafica con chartisan api
    let labelsCh = [
        @foreach ($datosModchart as $item)
            "{{$item['dia']}}",
        @endforeach
    ];

    let adcValues = [
        @foreach ($datosModchart as $item)
            {{$item['contADC'].','}}
        @endforeach
    ];

    let modValues = [
        @foreach ($datosModchart as $item)
            {{$item['contMOD'].','}}
        @endforeach
    ];

    let supValues = [
        @foreach ($datosModchart as $item)
            {{$item['contSUP'].','}}
        @endforeach
    ];

    const data = {
        chart: {
            label: '#de conts',
            labels: labelsCh
        },
        datasets: [{
                name: 'Adiciónes',
                values: adcValues
            },
            {
                name: 'Ediciónes',
                values: modValues
            },
            {
                name: 'Eliminaciónes',
                values: supValues
            },
        ],
    }
    const chart = new Chartisan({
        el: '#chart',
        //data:,
        //url: '/Administrador/estadisticas/chartData',
        data: data,
        hooks: new ChartisanHooks().title('Modificaciones Ultimos 30 dias').colors().borderColors().datasets([{            
            type: 'line',
            fill: false
        }, {
            type: 'line',
            fill: false
        }, {
            type: 'line',
            fill: false
        }]).legend({
            position: 'bottom'
        }).displayAxes([true, true])
        
    });

</script>

@endsection
