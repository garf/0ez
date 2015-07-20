@extends('root.main')

@section('body')

    <div class="container">
        {!! Form::open() !!}
            <div class="row">
                <div class="col s12 m12 l8">
                    <br />
                    <div class="input-field">
                        <input id="title" type="text" name="title">
                        <label for="title">Title</label>
                    </div>
                    <div class="input-field">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                    </div>
                </div>
                <div class="col s12 m12 l4">
                    <div class="">
                        <h4>Categories</h4>
                        <select name="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
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