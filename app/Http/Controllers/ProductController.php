<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(){
            return view('Product.add');
    }


    public function delete(){


        product::query()->findOrFail(request()->productid)->delete();

        return response()->json(['results' => "done"]);

    }


    public function show(){

        return view('Product.add' ,['product'=> product::query()->findOrFail(request( )->id)]);
    }

    public function store(){
        $this->validate(request(), [
            'name'=>'required',
            'price'=>'required|numeric',
        ]);
product::create(
    ['name'=>request()->name, 'price'=>request()->price]
);
        Alert::success('تم اضافة الصنف بنجاح');
        return back()->with('as','2');
    }


    public function update()
    {

        $this->validate(request(), [
            'name'=>'required',
            'price'=>'required|numeric',
        ]);

        $product = product::query()->findOrFail(\request()->product_id);
        $product->name= \request()->name;
        $product->price= \request()->price;
        $product->save();
        Alert::success('تم التعديل بنجاح');
        return back();


    }
    public function search()
    {

        $results = product::query()->orderBy('created_at')->select(
            [
                'id',
                'name',
                'price',
                'created_at'


            ]
        )->when(request('q'), function ($query, $role) {
            $query->where('id', 'like', '%'.request('q').'%')
                ->orWhere('name', 'like', '%'.request('q').'%');

        })->limit(30)->get();


        return response()->json(['results' => $results]);


    }

}
