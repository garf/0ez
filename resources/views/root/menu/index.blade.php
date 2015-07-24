@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="panel panel-default">
            <div class="panel-heading">New item</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'root-menu-save']) !!}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputLinkType">Title</label>
                                    <select name="link_type" id="inputLinkType" class="form-control">
                                        <option value="post">Post</option>
                                        <option value="category">Category</option>
                                        <option value="tag">Tag</option>
                                        <option value="url">URL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="urlItem">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br />
                        <input type="submit" value="Add" class="btn btn-success btn-block">
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <hr />
        <div>
            @foreach($items as $item)
                <div class="row">
                    <div class="col-md-4">
                        {{ $item->title }}
                    </div>
                    <div class="col-md-5">
                        {{ $item->url }}
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="#" class="btn btn-primary"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="btn btn-primary"><i class="fa fa-chevron-down"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                    </div>
                </div>
                <hr />
            @endforeach
        </div>
    </div>
@stop