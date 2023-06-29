@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5">
<div class="container">
    <div class="row">
        <h2>{{$category->name}}</h2>
    @foreach($products as $product)
        <div class="col-md-3 mb-3">
            <div class="card">
                <a href="{{url('view-category/'.$category->department_id.'/'.$product->productid)}}">
                <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="product image" class="img-fluid">
                <div class="card-body">
                    <h5>{{$product->name}}</h5>
                    <span calss="float-start"> {{$product->selling_price}} </span>
                    <span calss="float-end"> <s>{{$product->original_price}} </s></span>
                </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection
