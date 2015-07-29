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
                        <input type="file" name="logo" class="" id="inputLogo" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="inputBg">Background</label>
                        <input type="file" name="background" class="" id="inputBg" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputHz">Horizontal position</label>
                                <select name="horizontal" class="form-control" id="inputHz">
                                    <option value="left" {{ (Conf::get('appearance.bg.horizontal', '') == 'left') ? 'selected' : '' }}>Left</option>
                                    <option value="center" {{ (Conf::get('appearance.bg.horizontal', '') == 'center') ? 'selected' : '' }}>Center</option>
                                    <option value="right" {{ (Conf::get('appearance.bg.horizontal', '') == 'right') ? 'selected' : '' }}>Right</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputVt">Vertical position</label>
                                <select name="vertical" class="form-control" id="inputVt">
                                    <option value="top" {{ (Conf::get('appearance.bg.vertical', '') == 'top') ? 'selected' : '' }}>Top</option>
                                    <option value="center" {{ (Conf::get('appearance.bg.vertical', '') == 'center') ? 'selected' : '' }}>Center</option>
                                    <option value="bottom" {{ (Conf::get('appearance.bg.vertical', '') == 'bottom') ? 'selected' : '' }}>Bottom</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRp">Repeat</label>
                                <select name="repeat" class="form-control" id="inputRp">
                                    <option value="repeat" {{ (Conf::get('appearance.bg.repeat', '') == 'repeat') ? 'selected' : '' }}>Repeat</option>
                                    <option value="repeat-x" {{ (Conf::get('appearance.bg.repeat', '') == 'repeat-x') ? 'selected' : '' }}>Repeat-X</option>
                                    <option value="repeat-y" {{ (Conf::get('appearance.bg.repeat', '') == 'repeat-y') ? 'selected' : '' }}>Repeat-Y</option>
                                    <option value="no-repeat" {{ (Conf::get('appearance.bg.repeat', '') == 'no-repeat') ? 'selected' : '' }}>No-Repeat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputFx">Fixed</label>
                                <select name="is_fixed" class="form-control" id="inputFx">
                                    <option value="" {{ (Conf::get('appearance.bg.is_fixed', '') == '') ? 'selected' : '' }}>No</option>
                                    <option value="fixed" {{ (Conf::get('appearance.bg.is_fixed', '') == 'fixed') ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
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
        $("#inputLogo").fileinput({
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
        $("#inputBg").fileinput({
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
            @if(!empty($bg))
                initialPreview: [
                '<img src="/upload/{{ $bg }}" alt="" style="max-width: 100%;" >'
            ]
            @endif
        });
    </script>
@stop