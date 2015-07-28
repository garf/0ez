@extends('root.main')

@section('body')

    <div class="container">
        <h1>{{ $title }}</h1>

        {!! Form::open(['url' => $save_url, 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input id="inputTitle" type="text" value="{{ $post->title or Input::old('title') }}" class="form-control" name="title">
                    </div>
                    @if(!empty($post))
                        <div class="well">
                            <div>
                                <span class="text-muted">URL:</span>
                                <a href="{{ route('view', ['slug' => $post->slug]) }}" target="_blank">
                                    {{ route('view', ['slug' => $post->slug]) }}
                                </a>
                            </div>
                            <div>
                                <hr />
                                <div class="post-options">
                                    <a href="{{ route('view', ['slug' => $post->slug]) }}" target="_blank"
                                       class="brown-text">View</a>
                                    <a href="{{ route('root-post-edit', ['post_id' => $post->id]) }}"
                                       class="brown-text">Edit</a>
                                    @if($post->status == 'active')
                                        <a href="{{ route('root-post-to-draft', ['post_id' => $post->id]) }}"
                                           class="brown-text">To Draft</a>
                                    @else
                                        <a href="{{ route('root-post-to-active', ['post_id' => $post->id]) }}"
                                           class="brown-text">Publish</a>
                                    @endif
                                    @if($post->status != 'deleted')
                                        <a href="{{ route('root-post-to-deleted', ['post_id' => $post->id]) }}"
                                           class="brown-text">Delete</a>
                                    @else
                                        <a href="{{ route('root-post-to-draft', ['post_id' => $post->id]) }}"
                                           class="brown-text">Recover</a>
                                    @endif
                                    @if($post->is_pinned)
                                        <a href="{{ route('root-post-unpin', ['post_id' => $post->id]) }}"
                                           class="brown-text">Unpin</a>
                                    @else
                                        <a href="{{ route('root-post-pin', ['post_id' => $post->id]) }}"
                                           class="brown-text">Pin</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="textarea1">Content</label>
                        <textarea id="textarea1" name="content">{!! $post->content or Input::old('content')  !!} </textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputSEOTitle">SEO Title</label>
                        <input id="inputSEOTitle" type="text" value="{{ $post->seo_title or Input::old('seo_title') }}" class="form-control" name="seo_title">
                    </div>
                    <div class="form-group">
                        <label for="inputSEODescription">SEO Description</label>
                        <textarea id="inputSEODescription" name="seo_description" class="form-control">{{ $post->seo_description or Input::old('seo_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputSEOKeywords">SEO Keywords</label>
                        <input id="inputSEOKeywords" type="text" class="form-control"
                               value="{{ $post->seo_keywords or Input::old('seo_keywords') }}" name="seo_keywords">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="form-group">
                        <label for="inputCategory">Categories</label>
                        <select name="category_id" id="inputCategory" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ (!empty($post) && $post->category_id == $category->id) ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputImg">Miniature</label>
                        <input type="file" id="inputImg" name="img" class="" >
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select name="status" id="inputStatus" class="form-control">
                            <option value="draft" {{ (!empty($post) && $post->status == 'draft') ? 'selected' : '' }}>Draft</option>
                            <option value="active" {{ (!empty($post) && $post->status == 'active') ? 'selected' : '' }}>Active</option>
                            <optgroup label="Additional">
                                <option value="moderation" {{ (!empty($post) && $post->status == 'moderation') ? 'selected' : '' }}>Moderation</option>
                                <option value="deleted" {{ (!empty($post) && $post->status == 'deleted') ? 'selected' : '' }}>Deleted</option>
                                <option value="refused" {{ (!empty($post) && $post->status == 'refused') ? 'selected' : '' }}>Refused</option>
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
                               value="{{ (!empty($post) ? $post->tags->implode('tag', ', ') : Input::old('tags'))  }}"
                               class="form-control">

                        <div class="well well-sm tags-list">
                            <b>Popular Tags</b><br />
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
                    <div class="text-center">
                        <a href="{{ route('root-posts') }}" class="btn btn-default btn-block">Cancel</a>
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
    <script src="/plugins/bootstrap-file-input/js/fileinput.min.js"></script>
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

        $("#inputImg").fileinput({
            showUpload:false,
            maxFileCount: 1,
            showRemove: false,
            previewFileType:'image',
            initialPreviewCount: 1,
            autoReplace: true,
            allowedFileTypes: ['image'],
            previewTemplates: {
                image: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
                '   <img src="{data}" style="max-width: 100%;" class="" title="{caption}" alt="{caption}">\n' +
                '</div>\n',
                generic: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
                '   {content}\n' +
                '</div>\n'
            },
            @if(!empty($post) && !empty($post->img))
                initialPreview: [
                    '<img src="/upload/{{ $post->img }}" alt="" style="max-width: 100%;" >'
                ]
            @endif
        });
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.min.css">
    <link rel="stylesheet" href="/plugins/bootstrap-tokenfield/css/tokenfield-typeahead.min.css">
    <link rel="stylesheet" href="/plugins/bootstrap-file-input/css/fileinput.min.css">
@stop
