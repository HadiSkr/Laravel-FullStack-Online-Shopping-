@extends('layouts.front')
@section('title')
My Orders
@endsection
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                <h4 class="text-white"> Order View 
                    <a href="{{url('orders')}}" class ="btn btn-warning float-end"> Back</a>
                </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 orderdetails">
                            <h4>Shipping Details</h4>
                            <hr>
                         <label for="">First Name</label>
                         <div class="borer ">{{$orders->FirstName}}</div>
                         <label for="">Last Name</label>
                         <div class="borer ">{{$orders->LastName}}</div>
                         <label for="">Email</label>
                         <div class="borer ">{{$orders->email}}</div>
                         <label for="">Contact Info</label>
                         <div class="borer ">{{$orders->phone}}</div>
                         <label for="">Shipping Address</label>
                         <div class="borer ">
                            {{$orders->address1}}
                            {{$orders->address2}}
                            {{$orders->city}}
                            {{$orders->country}}
                         </div>
                        </div>
            <div class="col-md-6">
            <h4>Order Details</h4>
  <hr>
            <table class = "table table-bordered"> 
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders->singleorders as $item)
                <tr>
                    <td>{{ $item->product->name}}</td>
                    <td>{{ $item->qty}}</td>
                    <td>{{ $item->price}}</td>
                    <td>
                    <img src="{{ asset('assets/uploads/products/'.$item->product->image) }}" alt="Product Image Here">                   
                    </td>         
                </tr>
                @endforeach

                </tbody>
            </table>
            <h4>Grand Total: {{ $orders->total }}</h4>
            <div class="mt-5 px-2">

            <label for="">Order Status</label>
            <form action="{{ url('update-order/'.$orders->orders_id) }}" method="POST">
                @csrf
                @method('PUT')
            <select class="form-select" name = "Order_Status">
                       <option {{$orders->status =='0'? 'selected':'' }} value="0">Pending</option>
                       <option {{$orders->status =='1'? 'selected':'' }} value="1">Completed</option>
            </select>
                  <button type="submit" class="btn btn-primary float-end mt-3"> Update </button>
        </form> 
            </div>
                </div>
                    </div>
            
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
