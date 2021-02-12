@extends('Layouts.masterAdmin-templete')
@section('titulo')
    Infomrme {{$source}}
@endsection
@section('estilos')
<link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>

@endsection
@section('contenido')

<div class="jumbotron no-rborder shadow-std slideDown">
    <div class="fadeInjs">
        <h1 class="display-4">Informe {{($source == "404")? "No Encontrado": "de ".$source}}</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}}</p>
        <p class="lead font-weight-bold">Fecha: {{date('Y / m / d')}}</p>        
        <hr class="my-4">
        <div class="info-content">
            <table id="table-inf" class="display" width="100%"></table>
        </div>
  </div>
@endsection
@section('codigoExtra')

@if ($source == 'Modificaciónes' or $source == 'Vistas')    
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}" defer></script>
<script>

@switch($source)
    @case('Modificaciónes')
        
        const dataSet = [
            @foreach($infoArr as $key => $item)
            ["{{$key}}",
            "{{$item['tipoMod']}}",
            "{{$item['fechaMod']}}",
            "{{$item['idAdmin']}}",
            "{{$item['nomAdmin']}}",
            "{{$item['cedulaAdmin']}}",
            "{{$item['idSeccion']}}",
            "{{$item['nomSeccion']}}",
            "{{$item['tipoSeccion']}}",],
            @endforeach
        ];
        @break
    @case('Vistas')
        const dataSet = [
                @foreach($infoArr as $key => $item)
                ["{{$key}}",
                "{{$item['id']}}",
                "{{$item['numero']}}",
                "{{$item['nombre']}}",
                "{{$item['tipoSeccion']}}",
                "{{$item['vistas']}}",
                "{{$item['paragrafo']}}",
                "{{$item['creado']}}",
                "{{$item['modificado']}}",],
                @endforeach
        ];    
        @break
@endswitch
    

    $(document).ready(function() {
        const t = $('#table-inf').DataTable({
            dom: "Bfrtip",
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ],
            data: dataSet,
            "autoWidth": true,
            scrollY:'70vh',
            scrollCollapse: true,
            paging: false,
            @switch($source)
                @case('Modificaciónes')
                    columns: [
                        { title: "#" },
                        { title: "Tipo" },
                        { title: "Fecha" },
                        { title: "ID Admin" },
                        { title: "Nombre Admin" },
                        { title: "Cédula Admin" },
                        { title: "ID Sección" },
                        { title: "Nombre Sección" },
                        { title: "Tipo Sección" },
                    ]
                    @break
                @case('Vistas')
                    columns: [
                            { title: "#" },
                            { title: "ID" },
                            { title: "Numero" },
                            { title: "Nombre" },
                            { title: "Tipo" },
                            { title: "No Vistas"},
                            { title: "Paragrafo" },
                            { title: "Fecha Creacion" },
                            { title: "Fecha Modificacion"},
                        ]
                    @break
            @endswitch
        });
        // para reordenar numero de columna
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    });
</script>
@endif
@endsection
