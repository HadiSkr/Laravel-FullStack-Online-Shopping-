@extends('layouts.front')
@section('title')
Checkout
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 calss="mb-0">
        <a href="{{url('/')}}"> Home</a>/
        <a href="{{url('checkout')}}"> CheckOut</a>
    </h6>
    </div>
</div>
<div class="container mt-3">
    <form action="{{url('place-order')}}" method = "POST">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-7">
             <div class="card">
                <div class="card-body">
                    <h6> Basic Details</h6>
                    <hr>
                    <div class="row checkout-form"> 
                    <div class="row">
                         <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="from-control" value = "{{ Auth::user()->name }}" name ="FirstName" placeholder= "Enter first Name">
                         </div>
                         <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="from-control"  value = "{{ Auth::user()->LastName }}" name ="LastName" placeholder= "Enter Last Name">
                         </div>
                         <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="from-control"  value = "{{ Auth::user()->email }}" name ="email" placeholder= "Enter Email">
                         </div>
                         <div class="col-md-6 mt-3">
                            <label for="">Phone</label>
                            <input type="text" class="from-control"  value = "{{ Auth::user()->phone }}" name ="phone" placeholder= "Enter Your Number">
                         </div>
                         <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" class="from-control"  value = "{{ Auth::user()->address1 }}" name ="address1" placeholder= "Enter Address 1">
                         </div>
                         <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="from-control" value = "{{ Auth::user()->address2 }}" name ="address2" placeholder= "Enter Address 2">
                         </div>
                         <div class="col-md-6 mt-3">
                            <label for="">city</label>
                            <input type="text" class="from-control"  value = "{{ Auth::user()->city }}" name ="city" placeholder= "Enter city">
                         </div>
                         <div class="col-md-6 mt-3">
                            <label for="">country</label>
                            <input type="text" class="from-control"  value = "{{ Auth::user()->country }}" name ="country" placeholder= "Enter country">
                         </div>
                    </div>
                    </div>
                </div>
             </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>

                        </tr>
                    </thead>  
                    <tbody>
                        @foreach($cartitems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->product->selling_price }}</td>

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <hr>
                    <button type = "submit"class = "btn btn-primary float-end">Place Order</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
 