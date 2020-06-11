@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="row justify-content-center animated bounceInUp">
    <div class="col-sm-6">
        @include('Layouts.Error_Alert')
        <div class="card card-gray-dark" style="direction: rtl;">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>

            <form role="form" action="{{ (isset($product))? route('product.update') :  route('product.store')   }}" method="post">
                @csrf

        @include('Product.product_form')

                <div class="card-footer text-center">

                    <button style="font-family: 'Cairo SemiBold' ,serif; font-size: 15px" type="submit" class="btn btn-warning col-sm-3">

                       {{(isset($product))? 'حفظ': 'اضافة' }}

                 <i class="fas fa-fw {{(isset($product))?  'fa-save' :  'fa-plus-circle'}}">


                 </i> </button>


         </div>
     </form>
 </div>

</div>
</div >


@stop

@section('css')
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;600;700;900&display=swap" rel="stylesheet">
@stop


@section('js')

@stop
