@extends('root.main')

@section('body')

    <div class="container">
        {!! Form::open(['url' => '', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input id="inputTitle" type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="textarea0">Excerpt</label>
                        <textarea id="textarea0" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="textarea1">Content</label>
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputSEOTitle">SEO Title</label>
                        <input id="inputSEOTitle" type="text" class="form-control" name="seo_title">
                    </div>
                    <div class="form-group">
                        <label for="inputSEODescription">SEO Description</label>
                        <textarea id="inputSEODescription" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputSEOKeywords">SEO Keywords</label>
                        <input id="inputSEOKeywords" type="text" class="form-control" name="seo_keywords">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="form-group">
                        <label for="inputCategory">Categories</label>
                        <select name="category" id="inputCategory" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputImg">Miniature</label>
                        <input type="file" id="inputImg" name="img" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select name="status" id="inputStatus" class="form-control">
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <optgroup label="Additional">
                                <option value="moderation">Moderation</option>
                                <option value="deleted">Deleted</option>
                                <option value="refused">Refused</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputPublishedAt">Published at</label>

                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text"
                                   id="inputPublishedAt"
                                   value="{{ (!empty($post) ? $post->published_at : date('Y-m-d H:i:s')) }}"
                                   name="published_at"
                                   class="form-control">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputTags">Tags</label>
                        <input type="text"
                               id="inputTags"
                               name="tags"
                               class="form-control">

                        <div class="well well-sm tags-list">
                            <a href="#!">tags</a>
                            <a href="#!">list</a>
                            <a href="#!">goes</a>
                            <a href="#!">here</a>
                        </div>
                    </div>

                    <hr/>
                    <div>
                        <input type="submit" value="Save" class="btn btn-block btn-success" >
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js-bottom')
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>
    <script src="/plugins/ckeditor/ckeditor.js"
            type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        //TagsInput
        $('#inputTags').tokenfield({
        });
        $('#inputTags').on('tokenfield:createtoken', function (event) {
            var existingTokens = $(this).tokenfield('getTokens');
            $.each(existingTokens, function (index, token) {
                if (token.value === event.attrs.value)
                    event.preventDefault();
            });
        });

        //DateTimePicker
        $(function () {
            $('#inputPublishedAt').datetimepicker({
                locale: 'en',
                format: 'YYYY-MM-DD HH:mm:ss'
            });
        });

        //CKEditor
        var editor = CKEDITOR.replace('textarea1',
        {
            filebrowserBrowseUrl : '/elfinder/ckeditor'
        });
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" href="/plugins/bootstrap-tokenfield/css/tokenfield-typeahead.min.css">
@stop