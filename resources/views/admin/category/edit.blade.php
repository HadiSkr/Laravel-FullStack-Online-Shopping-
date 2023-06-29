@extends('layouts.admin')
@section('content')
<div class="card">
<div class="card-header"> 
<h1>Edit category</h1>
</div>
    <div class="card-body">
<form action="{{ url('update-category/'.$department->department_id)}}" method="PUT" enctype = "multipart/form-data">
@csrf    
@method('PUT')
<div class="raw">
<div class="col-md-6 mb-3">
    <label for="">Name</label>
    <input type="text" value ="{{$department->name}}" class="form-controll" name = "name">
</div>
<div class="col-md-6-mb-3">
    <label for="">type</label>
    <input type="text" value ="{{$department->type}}" class="form-controll" name = "type">
</div>
<div class="col-md-12-mb-3">
<label for="">description</label>
<textarea name="description" rows="3" class="form-controll">{{$department->description}}</textarea>
    </div>
    <div class="col-md-6-mb-3">
    <label for="">status</label>
    <input type="checkbox" {{ $department-> status==1 ? "checked": ""}} name = "status">
</div>
<div class="col-md-6-mb-3">
    <label for="">popular</label>
    <input type="checkbox" {{$department->popular==1 ? "checked": ""}} name = "popular">
</div>
<div class="col-md-12-mb-3">
<label for="">keywords</label>
<textarea name="text" rows="3" class="form-controll">{{$department->keywords}}</textarea>
    </div>
    @if($department->image)
    <img src="{{asset('assets/uploads/category/'.$department->image)}}" alt="category image">

    @endif
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