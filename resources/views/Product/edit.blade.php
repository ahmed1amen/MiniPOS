@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-sm-10">
        @include('Layouts.Extra.Error_Alert')
        @include('Layouts.Extra.Success_Alert')
        <div class="card card-gray-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>
            <form role="form">

        @include('Layouts.product_form')

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-warning col-sm-3">Update <i class="fas fa-fw fa-save"></i> </button>

                </div>
            </form>
        </div>

    </div>
</div >


@stop



@section('js')
    <script> console.log('Hi!'); </script>
@stop
