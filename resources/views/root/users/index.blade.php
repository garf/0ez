@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div>
            @foreach($users as $user)
                <div class="row">
                    <div class="col-lg-1">{{ $user->id }}</div>
                    <div class="col-lg-4">
                        <div>{{ $user->name }}</div>
                        <div class="text-muted">{{ $user->email }}</div>
                    </div>
                    <div class="col-lg-4">{{ $user->created_at }}</div>
                    <div class="col-lg-3 text-right">
                        {{--<a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>--}}
                    </div>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@stop