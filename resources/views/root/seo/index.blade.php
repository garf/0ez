@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br/>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <a class="collection-item brown-text" href="{{ route('root-counters') }}">
                            Meta and Counters
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a class="collection-item brown-text" href="">
                            Robots.txt
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a class="collection-item brown-text" href="">
                            Sitemap
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop