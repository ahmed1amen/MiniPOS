<div class="card-body">


    <div class="form-group" style="font-family: 'Cairo Black',serif">
        <label  class="float-right">اسم الصنف</label>
        <input type="text" class="form-control" name="name" placeholder="ادخل اسم الصنف"  value="{{(isset($product))? $product->name:'' }}"  style="font-family: 'Cairo Black',serif">
    </div>
        @if(isset($product))
    <input type="hidden"  name="product_id"  value="{{ $product->id }}">
        @endif
    <div class="form-group" style="font-family: 'Cairo Black',serif">
        <label class="float-right">السعر</label>
        <input type="text" class="form-control" name="price" placeholder="ادخل السعر" style="font-family: 'Cairo Black',serif"  value="{{(isset($product))? $product->price :''}}" >
    </div>


</div>
