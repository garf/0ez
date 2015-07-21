@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br />
        <br />
        @foreach($categories as $category)
            <div class="row">
                <div class="col-lg-5">
                    <div><h4>{{ $category->title }} <span class="label label-{{ $category->num == 0 ? 'danger' : 'success' }}">{{ $category->num }}</span></h4></div>
                    <div>{{ route('category', ['slug' => $category->slug]) }}</div>
                </div>
                <div class="col-lg-5">

                </div>
                <div class="col-lg-2 text-right">
                    <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i></a>

                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-trash-o"></i> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="return confirm('Are you sure?');">Delete</a></li>
                            <li><a href="#" onclick="return confirm('Are you sure? Even Posts!?');">Delete With Posts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr />
        @endforeach
    </div>
@stop