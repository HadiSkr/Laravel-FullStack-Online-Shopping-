@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User Balances</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ route('balance.update') }}" method="post">
                @csrf
                @foreach($users as $user)
                    <div class="form-group">
                        <label for="balance_{{ $user->id }}">{{ $user->name }}</label>
                        <input type="number" id="balance_{{ $user->id }}" name="balance[{{ $user->id }}]" class="form-control" value="{{ $user->balance }}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update Balances</button>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection