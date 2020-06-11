<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        @yield('load_css')
        @yield('meta_tags')

        @if(config('adminlte.use_ico_only'))
            <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        @elseif(config('adminlte.use_full_favicon'))
            <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
            <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
            <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
            <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
            <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
            <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
            <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
            <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
            <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
            <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
            <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
            <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
            <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
            <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
            <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
        @endif
    </head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;600;700;900&display=swap" rel="stylesheet">
    <title>Receipt</title>
    <style type="text/css">
        @page
        {
            size:  auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
        html
        {
            background-color: #FFFFFF;
            margin: 0px;  /* this affects the margin on the html before sending to printer */
        }
        * {

            font-family: 'Cairo';
            font-weight: 900;
            margin: 0mm;
        }

        td,
        th,
        tr,
        table {
            border: 1px solid black;
            border-collapse: inherit;
            font-size: 10px;
            font-weight: 800
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 60px;
            max-width: 60px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
            margin: 0px;
        }

        .lefted {
            text-align: left;

        }
        .righted {
            text-align: right;

        }

        .ticket {
            width: 72mm;
            max-width: 72mm;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        @media print {
            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }

    </style>
</head>
<body>
<div class="ticket">
    <h1 class="centered" style="font-size: 22px;border: 5px solid;border-collapse: inherit; "> ستوديو إسلام</h1>
    <h5 class="centered" style="font-size: 10px;    border-bottom: 2px solid; "> موبيل : 01007213881</h5>
    <p class="centered" style="font-size: 10px;font-weight: 800; ">
        #{{$invoice->id}}
        <br>
        {{$invoice->created_at}}
        <br>
        اسم العميل : {{$invoice->customername}}
    </p>


    <table style="direction: rtl;">
        <thead>
        <tr>
            <th style="max-width: 200px; width: 200px; text-align: center;" >الصنف</th>
            <th >السعر</th>
            <th>الكميه</th>
            <th>القيمه</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($invoice->items as $item)
            <tr>
                <td style="max-width: 200px; width: 200px; text-align: center"  >{{$item->productname}}</td>
                <td class="centered">{{$item->price}}</td>
                <td class="centered">{{$item->quantity}}</td>
                <td class="centered">{{$item->total}}</td>
            </tr>
        @endforeach



        </tbody>
    </table>

    <p class="centered" style="font-size: 10px; border-top: 1px solid; font-weight: 900;">
        موعد الإستلام بعد {{ $invoice->deliverday}} ايام موافق {{ Carbon\Carbon::now()->addDay($invoice->deliverday)->toDateString()}}
        <br style="border-bottom: 1px solid">
    </p>

    <p class="centered" style="font-size: 10px; border-top: 1px solid; font-weight: 900;">


        الاجمالي: {{$invoice->total}}
        <br>
        المدفوع: {{$invoice->paid}}
        <br>
        المتبقي: {{$invoice->rest}}
        <br>


    </p>
    <p class="centered">
        شكراً علي زيارتك لنا
        <br>
    </p>
    <p class="centered" style="border-top: 0.4px solid; font-size: 11px; font-weight: 600">
        Powered By Eng.Ahmed Amen . all rights reserved©

    </p>
</div>
<button id="btnPrint" class="hidden-print">Print</button>
</body>
<script>
    @if($print==true)

    (function() {
        window.print();
    })();
        @endif

    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });
</script>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

</html>
