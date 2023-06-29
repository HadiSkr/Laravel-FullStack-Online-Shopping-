@extends('layouts.front')
@section('title')
Category
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <div class="raw" style="display: flex; flex-wrap: wrap;">
                    @foreach($category as $cate)
                    <div class="col-md-4 mb-3" style="flex-grow: 1;">
                        <a href="{{url('view-category/'.$cate->department_id )}}">
                            <div class="card">
                                <img src="{{asset('assets/uploads/category/'.$cate->img)}}" alt="Category image">
                                <div class="card-body">
                                    <h5>{{$cate->name}}</h5>
                                    <p>{{$cate->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection