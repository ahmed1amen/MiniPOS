@extends('adminlte::page')
@section('title', 'الأصناف')

@section('content_header')
    <h1>جميع الأصناف</h1>
@stop

@section('content')
    <div id="root">
        <div class="row ">
            <div class="col-12">
                <div class="card animated bounceInUp" style="font-family: 'Cairo', sans-serif;font-weight: 900;">
                    <div class="card-header">
                        <h3 class="card-title">الأصناف</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4 ">
                            <div class="row ">
                                <div class="row col-sm-12 justify-content-center">

                                    <div class="form-group animated bounceInLeft " style="direction: rtl;width: 609px;">

                                        <label class="form-check-label float-right" for="keyword">البحث</label>

                                        <input name="keyword" id="keyword" type="text" placeholder="ادخل كلمة دلالية"
                                               v-model="keyword" @change="livesearch"
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
                                            <th class="text-center" tabindex="0">
                                              #
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                اسم الصنف
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                السعر
                                            </th>
                                          <th class="text-center" tabindex="0" rowspan="1">
                                                التاريخ
                                            </th>
                                            <th class="text-center" tabindex="0" rowspan="1">
                                                اجراء
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="product_Body">

                                        <tr class='text-center' role='row'
                                            v-for="(searchresult, k) in searchresult" :key="k">
                                            <td v-text="searchresult.id" id='td_barcode'></td>
                                            <td v-text="searchresult.name" id='td_name'></td>
                                            <td v-text="searchresult.price" id='td_price'></td>
                                            <td v-text="searchresult.created_at" id='td_total'></td>
                                            <td>
                                                <a  v-bind:href="'/product/' + searchresult.id" target="_blank">
                                                <span class='text-center text-red'>
                                                <i style="cursor: pointer;" class="fas fa-edit text-red">
                                                    </i>
                                                </span>
                                                </a>

                                                <button  @click="deletep" class="btn"  v-bind:id="searchresult.id">
                                                    <i style="cursor: pointer;" class="fas fa-trash text-red">
                                                    </i>

                                                </button>
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
                searchresult: @json($products),
                keyword: '',

            },
            methods: {

                deletep(ele)
                {
                    let  proid = ele.currentTarget.getAttribute('id');
                    Swal.fire({
                        title: 'تأكيد',
                        text: "هل انت متأكد من حذف هذا الصنف",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'لا',
                        confirmButtonText: 'نعم'
                    }).then((result) => {
                        if (result.value) {



                            $.ajax({
                                type: "post",
                                url: "{{route('api.product.delete')}}",
                                dataType: 'json',
                                'contentType': 'application/json',

                                data:
                                    JSON.stringify({
                                        '_token':_token,
                                        'productid': parseInt(proid)
                                    }),

                            })
                                .done(data => {
                                    Swal.fire(
                                        'اشعار!',
                                        'تم الحذف بنحاح',
                                        'success'
                                    );
                                    location.reload();

                                })
                                .fail(function (data) {
                                    swal.fire("خطأ !", "مشكله في الحذف", "error");

                                });









                        }
                    })

                },
                livesearch() {


                    $.ajax({
                        type: "get",
                        url: "{{route('api.product.search')}}",
                        dataType: 'json',
                        'contentType': 'application/json',

                        data: {
                            'q': this.keyword,
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
