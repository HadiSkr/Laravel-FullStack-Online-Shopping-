@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card header">
    <h4>Rigestered Users</h4>
    </div>
    <div class="card body">
       <table class="table table-border table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
            <tr>
                <td>{{ $item->id}}</td>
                <td>{{ $item->name}}</td>
                <td>{{ $item->email}}</td>
                

            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
</div>
@endsection