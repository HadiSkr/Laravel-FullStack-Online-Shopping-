@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card header">
    <h4>Product page</h4>
    </div>
    <div class="card body">
       <table class="table table-border table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Selling Price</th> 
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td>{{ $item->productid}}</td>
                <td>{{ $item->departments->name}}</td>
                <td>{{ $item->disc}}</td>
                <td>{{ $item->selling_price}}</td>
                <td>{{ $item->name}}</td>
                <td>
                <img src="{{asset('assets/uploads/products/'.$item->image) }}" class = "cate-image" alt="Image Here" >
                </td>
                <td>
                <a href = "{{ url('edit-prod/'.$item->productid) }}" class="btn btn-primary btn-sm"> Edit </a>
                <a href="{{url('delete-prod/'.$item->productid) }}" class="btn btn-danger btn-sm">delete</a>
                </td>

            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
</div>
@endsection