@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div>
            <div class="row">
                <div class="col-md-3">
                    @include('root.partials.settings-menu')
                </div>
                <div class="col-md-9">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="{{ $active_tab == 'simple' ? 'active' : '' }}"><a href="#simple" aria-controls="home" role="tab" data-toggle="tab">Simple</a></li>
                        <li role="presentation" class="{{ $active_tab == 'css' ? 'active' : '' }}"><a href="#css" aria-controls="profile" role="tab" data-toggle="tab">Custom CSS</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane {{ $active_tab == 'simple' ? 'active' : '' }}" id="simple">


                            <br/>
                            <form action="{{ route('root-settings-appearance-save') }}" method="POST" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <fieldset>
                                    <legend>Images</legend>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="inputLogo">Logo</label>
                                                @if(!empty($logo))
                                                    <br/><img src="/upload/{{ $logo }}" style="max-width: 100%;" alt="">
                                                @endif
                                                <input type="file" name="logo" class="" id="inputLogo"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="inputBg">Background</label>
                                                @if(!empty($bg))
                                                    <br/><img src="/upload/{{ $bg }}" style="max-width: 100%;" alt="">
                                                @endif
                                                <input type="file" name="background" class="" id="inputBg"/>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputHz">Horizontal position</label>
                                                        <select name="horizontal" class="form-control" id="inputHz">
                                                            <option value="left" {{ (Conf::get('appearance.bg.horizontal', '') == 'left') ? 'selected' : '' }}>
                                                                Left
                                                            </option>
                                                            <option value="center" {{ (Conf::get('appearance.bg.horizontal', '') == 'center') ? 'selected' : '' }}>
                                                                Center
                                                            </option>
                                                            <option value="right" {{ (Conf::get('appearance.bg.horizontal', '') == 'right') ? 'selected' : '' }}>
                                                                Right
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputVt">Vertical position</label>
                                                        <select name="vertical" class="form-control" id="inputVt">
                                                            <option value="top" {{ (Conf::get('appearance.bg.vertical', '') == 'top') ? 'selected' : '' }}>
                                                                Top
                                                            </option>
                                                            <option value="center" {{ (Conf::get('appearance.bg.vertical', '') == 'center') ? 'selected' : '' }}>
                                                                Center
                                                            </option>
                                                            <option value="bottom" {{ (Conf::get('appearance.bg.vertical', '') == 'bottom') ? 'selected' : '' }}>
                                                                Bottom
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputRp">Repeat</label>
                                                        <select name="repeat" class="form-control" id="inputRp">
                                                            <option value="repeat" {{ (Conf::get('appearance.bg.repeat', '') == 'repeat') ? 'selected' : '' }}>
                                                                Repeat
                                                            </option>
                                                            <option value="repeat-x" {{ (Conf::get('appearance.bg.repeat', '') == 'repeat-x') ? 'selected' : '' }}>
                                                                Repeat-X
                                                            </option>
                                                            <option value="repeat-y" {{ (Conf::get('appearance.bg.repeat', '') == 'repeat-y') ? 'selected' : '' }}>
                                                                Repeat-Y
                                                            </option>
                                                            <option value="no-repeat" {{ (Conf::get('appearance.bg.repeat', '') == 'no-repeat') ? 'selected' : '' }}>
                                                                No-Repeat
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputFx">Fixed</label>
                                                        <select name="is_fixed" class="form-control" id="inputFx">
                                                            <option value="" {{ (Conf::get('appearance.bg.is_fixed', '') == '') ? 'selected' : '' }}>
                                                                No
                                                            </option>
                                                            <option value="fixed" {{ (Conf::get('appearance.bg.is_fixed', '') == 'fixed') ? 'selected' : '' }}>
                                                                Yes
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>Colors</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputHeaderBg">Header Background</label>

                                                <div class="input-group" id="inputHeaderBg">
                                                    <input type="text" name="header_bg"
                                                           value="{{ Conf::get('appearance.header.bg', '#FFFFFF') }}"
                                                           class="form-control colorpicker"/>
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputMenuColor">Menu color</label>
                                                <select name="menu_color" class="form-control" id="inputMenuColor">
                                                    <option value="default" {{ (Conf::get('appearance.menu.color', '') == 'default') ? 'selected' : '' }}>
                                                        Light
                                                    </option>
                                                    <option value="inverse" {{ (Conf::get('appearance.menu.color', '') == 'inverse') ? 'selected' : '' }}>
                                                        Dark
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputFooterTopBg">Footer Top Background</label>

                                                <div class="input-group" id="inputFooterTopBg">
                                                    <input type="text" name="footer_top_bg"
                                                           value="{{ Conf::get('appearance.footer.top_bg', '#ecf0f1') }}"
                                                           class="form-control colorpicker"/>
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFooterTopText">Footer Top Text</label>

                                                <div class="input-group" id="inputFooterTopText">
                                                    <input type="text" name="footer_top_text"
                                                           value="{{ Conf::get('appearance.footer.top_text', '#2b4646') }}"
                                                           class="form-control colorpicker"/>
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inputFooterBottomBg">Footer Bottom Background</label>

                                                <div class="input-group" id="inputFooterBottomBg">
                                                    <input type="text" name="footer_bottom_bg"
                                                           value="{{ Conf::get('appearance.footer.bottom_bg', '#c7dae5') }}"
                                                           class="form-control colorpicker"/>
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFooterBottomText">Footer Bottom Text</label>

                                                <div class="input-group" id="inputFooterBottomText">
                                                    <input type="text" name="footer_bottom_text"
                                                           value="{{ Conf::get('appearance.footer.bottom_text', '#111111') }}"
                                                           class="form-control colorpicker"/>
                                                    <span class="input-group-addon"><i></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="text-right">
                                    <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                                    <input type="submit" value="SAVE" class="btn btn-success"/>
                                </div>
                            </form>

                        </div>
                        <div role="tabpanel" class="tab-pane {{ $active_tab == 'css' ? 'active' : '' }}" id="css">
                            <form action="{{ route('root-settings-css-save') }}" method="POST">
                                {!! csrf_field() !!}
                                <h3>Custom CSS</h3>
                                <div id="editorCss">{{ $theme_css }}</div>
                                <br />
                                <div class="text-right">
                                    <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                                    <input type="submit" value="SAVE" class="btn btn-success"/>
                                </div>

                                <textarea name="css" id="inputCss" class="hide">{{ $theme_css }}</textarea>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/plugins/bootstrap-file-input/css/fileinput.min.css">
    <link rel="stylesheet" href="/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
@stop

@section('js-bottom')
    <script src="/plugins/bootstrap-file-input/js/fileinput.min.js"></script>
    <script src="/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="/plugins/ace-editor/ace.js"></script>
    <script src="/t/root/js/settings/appearance.js"></script>
@stop