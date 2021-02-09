@extends('Layouts.masterAdmin-templete')
@section('titulo')
    Inicio
@endsection
@section('estilos')
<link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>

@endsection
@section('contenido')
<div class="jumbotron no-rborder shadow-std slideDown">
    <div class="fadeInjs">
        <h1 class="display-4">Plataforma de Administracion</h1>
        <p class="lead text-capitalize font-weight-bold">Administrador: {{Auth::user()->id}}, {{Auth::user()-> nombres}} {{Auth::user()-> apellidos}}</p>
        <p class="lead font-weight-bold">Fecha: {{date('Y / m / d')}}</p>        
        <hr class="my-4">
        <div class="info-content">
            <table id="example" class="display" width="100%"></table>

        </div>
  </div>
@endsection
@section('codigoExtra')
<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}" defer></script>

<script>

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

    $(document).ready(function() {
        $('#example').DataTable({
            data: dataSet,
            "autoWidth": false,
            scrollY:'50vh',
            scrollCollapse: true,
            paging: false,
            columns: [
                { title: "#" },
                { title: "Tipo" },
                { title: "Fecha" },
                { title: "ID Admin" },
                { title: "Nombre Admin." },
                { title: "Cédula Admin" },
                { title: "ID Sección" },
                { title: "Nombre Sección" },
                { title: "Tipo Sección" },
            ]
        });
    });
</script>
@endsection
