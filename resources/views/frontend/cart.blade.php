@extends('layouts.front')
@section('title')
My Cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 calss="mb-0">
        <a href="{{url('/')}}"> Home</a>/
        <a href="{{url('cart')}}"> Cart</a>

    </h6>
    </div>
</div>


<div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartitems as $item)
            <div class="row">
                <div class="col-md-2 my-auto">
                <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" height="70px" width="70px" alt="Image Here">
                </div>
                <div class="col-md-2 my-auto">
                    <h6> {{$item->product->name}}</h6>
                </div>
                <div class="col-md-5 my-auto">
                    <h6>USD {{$item->product->selling_price}}</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class ="productid" value="{{ $item->productid }}">
                    @if($item->product->quantity > $item->quantity)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style = "width:130px;">
                    <button class = "input-group-text changeqtybtn decrement-btn">-</button>
                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->quantity}}">
                    <button class="input-group-text changeqtybtn increment-btn">+</button>
                </div>
                @php $total += $item->product->selling_price*$item->quantity;@endphp
                @else
                <h6>Out Of Stock</h6>
                @endif
                </div>
                <div class="col-md-2 my-auto">
                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Delete</button>
               </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
    <h6>Total Price : {{$total}}</h6>
    <a href="{{url('checkout')}}" class="btn btn-primary mt-3">Proceed to Checkout</a>
</div>
    </div>
</div>
@endsection
