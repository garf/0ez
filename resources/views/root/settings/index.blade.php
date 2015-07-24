@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br/>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="list-group">
                    <a class="list-group-item" href="{{ route('root-settings-website') }}">
                        <i class="fa fa-globe"></i> Website Settings
                    </a>
                    <a class="list-group-item" href="{{ route('root-counters') }}">
                        <i class="fa fa-area-chart"></i> Meta and Counters
                    </a>
                    <a class="list-group-item" href="{{ route('root-robots-txt') }}">
                        <i class="fa fa-file-text-o"></i> Robots.txt
                    </a>
                    <a class="list-group-item" href="{{ route('root-sitemap') }}">
                        <i class="fa fa-sitemap"></i> Sitemap
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop