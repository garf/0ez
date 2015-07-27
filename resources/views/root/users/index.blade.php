@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="well well-sm">
            <a href="{{ route('root-users-new') }}" class="btn btn-success">New user</a>
        </div>
        <div>
            @foreach($users as $user)
                <div class="row {{ !$user->active ? 'text-danger' : '' }}">
                    <div class="col-lg-1">{{ $user->id }}</div>
                    <div class="col-lg-4">
                        <div>{{ $user->name }}</div>
                        <div class="text-muted">{{ $user->email }}</div>
                    </div>
                    <div class="col-lg-4">{{ $user->created_at }}</div>
                    <div class="col-lg-3 text-right">
                        <a href="{{ route('root-users-edit', ['user_id' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@stop