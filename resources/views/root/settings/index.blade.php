@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br/>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="list-group">
                    <a class="list-group-item" href="{{ route('root-settings-website') }}">
                        Website Settings
                    </a>
                    <a class="list-group-item" href="{{ route('root-counters') }}">
                        Meta and Counters
                    </a>
                    <a class="list-group-item" href="{{ route('root-robots-txt') }}">
                        Robots.txt
                    </a>
                    <a class="list-group-item" href="{{ route('root-sitemap') }}">
                        Sitemap
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop