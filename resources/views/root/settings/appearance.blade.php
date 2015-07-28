@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div>
            {!! Form::open(['route' => 'root-settings-appearance-save', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputLogo">Logo</label>
                        <input type="file" name="logo" class="" id="inputImg" />
                    </div>
                </div>
                <div class="col-lg-6"></div>
            </div>
            <div class="text-right">
                <input type="submit" value="Save" class="btn btn-success" >
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/plugins/bootstrap-file-input/css/fileinput.min.css">
@stop

@section('js-bottom')
    <script src="/plugins/bootstrap-file-input/js/fileinput.min.js"></script>
    <script >
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
            @if(!empty($logo))
                initialPreview: [
                '<img src="/upload/{{ $logo }}" alt="" style="max-width: 100%;" >'
            ]
            @endif
        });
    </script>
@stop