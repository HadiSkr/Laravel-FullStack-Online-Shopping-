@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card header">
    <h4>Category page</h4>
    </div>
    <div class="card body">
       <table class="table table-border table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>discription</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($department as $item)
            <h4>{{$item->image}}</h4>
            <tr>
                <td>{{ $item->department_id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->description}}</td>
                <td>
                <img src="{{asset('assets/uploads/category/'.$item->img) }}" class = "cate-image" alt="Image Here" >
                </td>
                <td>
                <a href = "{{ url('edit-category/'.$item->department_id) }}" class="btn btn-primary"> Edit </a>
                <a href="{{url('delete-category/'.$item->department_id) }}" class="btn btn-danger">delete</a>
                </td>

            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
</div>
@endsection