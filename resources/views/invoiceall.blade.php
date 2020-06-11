@extends('adminlte::page')
@section('title', 'الفواتير')

@section('content_header')
    <h1>جميع الفواتير</h1>
@stop

@section('content')
    <div id="root">
        <div class="row ">
            <div class="col-12">
                <div class="card animated bounceInUp" style="font-family: 'Cairo', sans-serif;font-weight: 900;">
                    <div class="card-header">
                        <h3 class="card-title">Invoice Details</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 ">
                            <div class="row ">
                                <div class="row col-sm-12 justify-content-center">

                                    <div class="form-group animated bounceInLeft " style="direction: rtl;width: 609px;">

                                        <label class="form-check-label float-right" for="cusname">البحث</label>

                                        <input name="cusname" id="cusname" type="text" placeholder="ادخل كلمة دلالية"
                                               v-model="searchq" @change="livesearch"
                                               class="form-control input-lg mw-50"
                                               style="font-family:Cairo Black,serif ;text-align: center;">

                                    </div>


                                </div>
                                <div class="col-sm-12">

                                    <table style="direction: rtl;" id="product_table"
                                           class="table table-bordered table-hover dataTable dtr-inline calculateclass"
                                           role="grid">
                                        <thead>
                                        <tr class="text-center" role="row">
                                            <th class="text-center" tabindex="0" rowspan="1"> الكود
                                            </th>
                                            <th class="text-center" tabindex="0">
                                                اسم العميل
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                الأجمالي
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                المدفوع
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                المتبقي
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                التاريخ
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                عرض
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="product_Body">

                                        <tr class='text-center' role='row'
                                            v-for="(searchresult, k) in searchresult" :key="k">
                                            <td v-text="searchresult.id" id='td_barcode'></td>
                                            <td v-text="searchresult.customername" id='td_name'></td>
                                            <td v-text="searchresult.total" id='td_price'></td>
                                            <td v-text="searchresult.paid" id='td_price'></td>
                                            <td v-text="searchresult.rest" id='td_total'></td>
                                            <td v-text="searchresult.created_at" id='td_total'></td>

                                            <td>

                                                <a  v-bind:href="'/invoice/' + searchresult.id" target="_blank">
                                                <span class='text-center text-red'>
                                                <i style="cursor: pointer;" class="fas fa-eye text-red">
                                                    </i>
                                                </span>
                                                </a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('css')

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var _token = "{{ csrf_token() }}";

        var app = new Vue({
            el: '#root',
            data: {
                searchresult: @json($invoices),
                searchq: '',

            },
            methods: {


                livesearch() {


                    $.ajax({
                        type: "get",
                        url: "{{route('invoice.search')}}",
                        dataType: 'json',
                        'contentType': 'application/json',

                        data: {
                            'q': this.searchq,
                        }

                    })
                        .done(data => {


                            this.searchresult = data.results;


                        })
                        .fail(function (data) {
                            swal.fire("Invoice !", "Make Sure From Your Data", "error");


                        });


                }

            }


        });

    </script>

@stop
