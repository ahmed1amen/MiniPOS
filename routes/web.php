<?php

use App\product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',
    function (){
        $products = product::all()->take(50);
        return view('invoice',['products'=>$products->jsonSerialize()]);});


Route::get('/invoice/all',
    function (){
        $invoices = \App\bill::all()->take(50);
        return view('invoiceall',['invoices'=>$invoices->jsonSerialize()])
            ;});

Route::get('/product/all',
    function (){
        $products = product::all()->take(50);
        return view('productall',['products'=>$products->jsonSerialize()])

            ;});




Route::get('/invoice/print/{id}',
    function ($id){

        $invoice = \App\bill::query()->with('items')->findOrFail($id);

        return view('InvoicePrint',['invoice'=>$invoice , 'print'=>true]);});

Route::get('/invoice/{id}',
    function ($id){

        $invoice = \App\bill::query()->with('items')->findOrFail($id);

        return view('InvoicePrint',['invoice'=>$invoice , 'print'=>false]);});

    Route::get('/invoice',
        function (){
            $product = product::all();
            return view('invoice',['products'=>$product->jsonSerialize()]);});


Route::get('/product', 'ProductController@index')->name('product.index');
Route::post('/product', 'ProductController@store')->name('product.store');
Route::get('/product/{id}', 'ProductController@show')->name('product.show');
Route::post('/product/update', 'ProductController@update')->name('product.update');




Route::get('/api/bill','BillController@store')->name('api.bill.store');
Route::get('/api/Products','ProductController@search')->name('api.product.search');
Route::post('/api/Product/delete','ProductController@delete')->name('api.product.delete');


Route::post('/api/bill','BillController@store')->name('invoice.store');
Route::get('/api/bill/search','BillController@search')->name('invoice.search');

