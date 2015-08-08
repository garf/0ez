@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br />
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('root-sitemap-generate') }}" class="btn btn-info btn-block">Generate Sitemap</a>
            </div>
            <div class="col-md-9">
                <div class="list-group">
                    <a href="{{ Conf::get('app.url') }}/sitemap.xml" class="list-group-item">{{ Conf::get('app.url') }}/sitemap.xml</a>
                </div>
            </div>
        </div>
    </div>
@stop