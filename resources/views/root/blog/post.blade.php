@extends('root.main')

@section('body')

    <div class="container">
        {!! Form::open() !!}
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input id="inputTitle" type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="">
                        <label for="inputCategory">Categories</label>
                        <select name="category" id="inputCategory" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr />
                    <div>
                        <input type="submit" value="Save" class="btn btn-block btn-success" >
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js-bottom')
    <script>
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
    <script src="/plugins/ckeditor/ckeditor.js"
            type="text/javascript" charset="utf-8"></script>
    <script>
        var editor = CKEDITOR.replace('textarea1',
        {
            filebrowserBrowseUrl : '/elfinder/ckeditor'
        });
    </script>
@stop