@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            <div class="col-md-3">
                @include('root.partials.settings-menu')
            </div>
            <div class="col-md-9">
                <div class="well well-sm">
                    <a href="{{ route('root-settings-sitemap-generate') }}" class="btn btn-info">Generate Sitemap</a>
                </div>
                <div class="alert alert-info">
                    Sitemap generates automatically hourly if you set cron job correclty.
                </div>
                <div class="list-group">
                    <a href="{{ starts_with(Conf::get('app.url'), ['http://', 'https://']) ? '' : 'http://' }}{{ Conf::get('app.url') }}/sitemap.xml" class="list-group-item">{{ Conf::get('app.url') }}/sitemap.xml</a>
                </div>
            </div>
        </div>
    </div>
@stop