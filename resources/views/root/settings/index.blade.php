@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br/>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                @include('root.partials.settings-menu')
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9">
                <h2>Current Settings</h2>
            </div>
        </div>
    </div>
@stop