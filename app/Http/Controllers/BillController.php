<?php

namespace App\Http\Controllers;

use App\bill;
use App\billitem;
use App\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{

    public function search()
    {

        $results = bill::query()->orderBy('created_at')->select(
            [
                'id',
                'customername',
                'total',
                'paid',
                'rest',
                'deliverday',
                'created_at'


            ]
        )->when(request('q'), function ($query, $role) {
            $query->where('id', 'like', '%'.request('q').'%')
                ->orWhere('customername', 'like', '%'.request('q').'%');

        })->limit(30)->get();



        return response()->json(['results' => $results]);


    }


    public function store()
    {
        $invoice = new bill();
        $invoice->customername = request()->customername;
        $invoice->total = request()->total;
        $invoice->paid = request()->paid;
        $invoice->rest = (request()->total - request()->paid);
        $invoice->rest = (request()->total - request()->paid);
        $invoice->deliverday =request()->deliverday;

        $invoice->save();

        $items = [];
        foreach (request()->billitems as $billitem) {
            $barcode = $billitem['product_no'];
            $productinfo = product::query()->find($barcode);
            array_push($items, new billitem([
                'productname' => $productinfo->name,
                'quantity' => $billitem['product_qty'],
                'price' => $productinfo->price,
                'total' => ($billitem['product_qty'] * $productinfo->price)
            ]));
        }
        $invoice->items()->saveMany($items);
        return response()->json(['invoice_id' => $invoice->id]);
    }


}
