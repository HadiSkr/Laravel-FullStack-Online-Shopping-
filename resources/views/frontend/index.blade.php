@extends('layouts.front')
@section('title')
Welcome to Tulip
@endsection
@section('content')
@include('layouts.inc.slider')
<div class="py-5">
<div class="container">
    <div class="row">
        <h2>Featured products</h2>
    <div class="owl-carousel featured-carousel owl-theme">
    @foreach($featured_product as $product)
        <div class="item">
            <div class="card">
                <img src="{{asset('assets/uploads/products/'.$product->image)}}" alt="product image">
                <div class="card-body">
                    <h5>{{$product->name}}</h5>
                    <span calss="float-start"> {{$product->selling_price}} </span>
                    <span calss="float-end"> <s>{{$product->original_price}} </s></span>
                </div>
            </div>
        </div>
        @endforeach
</div>
        
    </div>
</div>
</div>

<div class="py-5">
<div class="container">
    <div class="row">
        <h2>Trending category</h2>
    <div class="owl-carousel featured-carousel owl-theme">
    @foreach($Trending_product as $product)
        <div class="item">
            <a href="{{url('view-category/'.$product->department_id )}}">
            <div class="card">
                <img src="{{asset('assets/uploads/category/'.$product->img)}}" alt="product image">
                <div class="card-body">
                    <h5>{{$product->name}}</h5>
                    <p>
                        {{$product->description}}
                    </p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
</div>
        
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>

@endsection