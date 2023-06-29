@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header"> 
@csrf
<h1>Edit Product</h1>
</div>
    <div class="card-body">
<form action="{{ url('update-product/'.$product->productid)}}" method="POST" enctype = "multipart/form-data">
@method('PUT')
@csrf   
<div class="raw">
    <div class="col-md-12 mb-3">
    <select class="form-select">
  <option value="">{{$product->departments->name}}</option>
 </select>
    </div>
<div class="col-md-6 mb-3">
    <label for="">Name</label>
    <input type="text" class="form-controll" value = "{{$product->name}}"name = "name">
</div>
<div class="col-md-6-mb-3">
    <label for="">Original Price</label>
    <input type="number" class="form-controll" value = "{{$product->original_price}}" name = "original_price">
</div>
<div class="col-md-6-mb-3">
    <label for="">selling_price</label>
    <input type="number" class="form-controll" value = "{{$product->selling_price}}" name = "selling_price">
</div>
<div class="col-md-6-mb-3">
    <label for="">quantity</label>
    <input type="number" class="form-controll" value = "{{$product->quantity}}" name = "quantity">
</div>
<div class="col-md-12 mb-3">
<label for="">Discription</label>
<textarea name="disc" rows="3" class="form-controll">{{$product->disc}}</textarea>
    </div>
<div class="col-md-12 mb-3">
<label for="">Specification</label>
<textarea name="Specification" rows="3" class="form-controll">{{$product->Specification}}</textarea>
    </div>
    <div class="col-md-6-mb-3">
    <label for="">status</label>
    <input type="checkbox"{{ $product-> status==1 ? "checked": ""}} name = "status">
</div>
<div class="col-md-6-mb-3">
    <label for="">trending</label>
    <input type="checkbox"{{ $product-> trending==1 ? "checked": ""}} name = "trending">
</div>
<div class="col-md-12 mb-3">
<label for="">Keywords</label>
<textarea name="keys" rows="3" class="form-controll">{{$product->keys}}</textarea>
    </div>
    <div class="col-md-12">
    <input type="file" name = "image" class="form-controll" >
</div>
<div class="col-md-12">
    <button type="submit" class="btmb btn-primary" >Update</button>
</div>
    </div>
</form>
@csrf   
</div>
</div>
@endsection