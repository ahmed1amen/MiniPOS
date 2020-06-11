@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- Cards --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">jsGrid</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="jsGrid">


            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        var clients = @json( $products);

        $("#jsGrid").jsGrid({
            width: "100%",
            filtering: true,
            sorting: true,
            editing: true,
            autoload: true,
            paging: true,
            shrinkToFit: false,
            pageSize: 30,
            pageButtonCount: 5,
            data: clients,
            loadShading: true,


            fields: [
                {name: "id", type: "number", width: 150, validate: "required", align: "center", title: "id" ,editing :false},
                {name: "name", type: "text", width: 150, validate: "required", align: "center", title: "name"},
                {name: "barcode", type: "number", width: 150, validate: "required", align: "center", title: "barcode"},
                {name: "quantity", type: "number", width: 150, validate: "required", align: "center", title: "quantity"},
                {name: "category", type: "text", width: 150, validate: "required", align: "center", title: "category"},
                {name: "dollar_price", type: "number", width: 150, validate: "required", align: "center", title: "dollar_price"},
                {name: "dinar_price", type: "number", width: 150, validate: "required", align: "center", title: "dinar_price"},
                {name: "sail_price", type: "number", width: 150, validate: "required", align: "center", title: "sail_price"},

                {type: "control", width: 100, align: "center"}
            ]

        });


        $("#btnrefresh").click(function (e) {

            e.preventDefault();
            $("#jsGrid").jsGrid("loadData").done(function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Loaded',
                })
            });


        });
    </script>


@stop
