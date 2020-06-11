@if(count($errors))

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        <ul>
            <script src="{{ $cdn?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ',
                    text: 'برجاء مراجعة البيانات',
                })
            </script>

            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>

    </div>
@endif
