@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header"> 
@csrf
<h1>Add Product</h1>
</div>
    <div class="card-body">
<form action="insert-product" method="POST" enctype = "multipart/form-data">
@csrf    
<div class="raw">
    <div class="col-md-12 mb-3">
    <select class="form-select" name = "dep_id">
  <option value="">select a category</option>
  @foreach($department as $item)
  <option value="{{$item->department_id}}">{{$item->name}}</option>
  @endforeach
</select>
    </div>
<div class="col-md-6 mb-3">
    <label for="">Name</label>
    <input type="text" class="form-controll" name = "name">
</div>
<div class="col-md-6-mb-3">
    <label for="">Original Price</label>
    <input type="number" class="form-controll" name = "original_price">
</div>
<div class="col-md-6-mb-3">
    <label for="">selling_price</label>
    <input type="number" class="form-controll" name = "selling_price">
</div>
<div class="col-md-6-mb-3">
    <label for="">quantity</label>
    <input type="number" class="form-controll" name = "quantity">
</div>
<div class="col-md-12 mb-3">
<label for="">Discription</label>
<textarea name="disc" rows="3" class="form-controll"></textarea>
    </div>
<div class="col-md-12 mb-3">
<label for="">Specification</label>
<textarea name="Specification" rows="3" class="form-controll"></textarea>
    </div>
    <div class="col-md-6-mb-3">
    <label for="">status</label>
    <input type="checkbox"  name = "status">
</div>
<div class="col-md-6-mb-3">
    <label for="">trending</label>
    <input type="checkbox" name = "trending">
</div>
<div class="col-md-12 mb-3">
<label for="">Keywords</label>
<textarea name="keys" rows="3" class="form-controll"></textarea>
    </div>
    <div class="col-md-12">
    <input type="file" name = "image" class="form-controll" >
</div>
<div class="col-md-12">
    <button type="submit" class="btmb btn-primary" >Submit</button>
</div>
    </div>
</form>
@csrf   
</div>
</div>
@endsection