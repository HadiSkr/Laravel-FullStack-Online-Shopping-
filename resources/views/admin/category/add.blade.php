@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header"> 
@csrf
<h1>Add category</h1>
</div>
    <div class="card-body">
<form action="insert-category" method="POST" enctype = "multipart/form-data">
@csrf    
<div class="raw">
<div class="col-md-6 mb-3">
    <label for="">Name</label>
    <input type="text" class="form-controll" name = "name">
</div>
<div class="col-md-6-mb-3">
    <label for="">type</label>
    <input type="text" class="form-controll" name = "type">
</div>
<div class="col-md-12-mb-3">
<label for="">description</label>
<textarea name="description" rows="3" class="form-controll"></textarea>
    </div>
    <div class="col-md-6-mb-3">
    <label for="">status</label>
    <input type="checkbox"  name = "status">
</div>
<div class="col-md-6-mb-3">
    <label for="">popular</label>
    <input type="checkbox" name = "popular">
</div>
<div class="col-md-12-mb-3">
<label for="">keywords</label>
<textarea name="text" rows="3" class="form-controll"></textarea>
    </div>
    <div class="col-md-12">
    <input type="file" name = "img" class="form-controll" >
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