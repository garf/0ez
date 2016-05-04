@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            <div class="col-md-3">
                @include('root.partials.settings-menu')
            </div>
            <div class="col-md-9">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#links" aria-controls="links" role="tab" data-toggle="tab">Links</a></li>
                    <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="links">
                        <h2>Links
                            <small>Add links to your communities and groups in social networks</small></h2>
                        <h3>Add Link</h3>
                        <form action="{{ route('root-settings-social-links-save') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="panel panel-success">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputService">Service</label>
                                                <select name="service" id="inputService" class="form-control">
                                                    @foreach(trans('socials.services') as $service)
                                                        <option value="{{ $service['name'] }}">{{ $service['title'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="inputUrl">Link</label>

                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <input name="show_title" type="checkbox"> Show Caption
                                            </span>
                                                    <input type="text" name="url" id="inputUrl" class="form-control">
                                            <span class="input-group-btn">
                                                <input type="submit" value="Add" class="btn btn-primary" required>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            <h3>Existing links</h3>
                            <ul class="list-group">
                                @foreach($created as $index=>$service)
                                    <li class="list-group-item">
                                        <i class="fa @lang("socials.services.{$service['service']}.icon")"
                                           style="color: @lang("socials.services.{$service['service']}.color");"></i>
                                        @lang("socials.services.{$service['service']}.title")
                                        @if($service['show_title'])
                                            <i class="fa fa-tag" title="Show Caption"></i>
                                        @endif
                                        -
                                        <a href="{{ $service['url'] }}" target="_blank">{{ $service['url'] }}</a>
                                        <a href="{{ route('root-settings-social-links-delete', ['index' => $index]) }}"
                                           class="badge"
                                           onclick="return confirm('Are you sure?')"
                                           title="Delete"><i class="fa fa-times"></i></a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="comments">
                        <form action="{{ route('root-settings-social-save') }}" method="post">
                            {{ csrf_field() }}
                            <h2>Comments
                                <small>Comment widgets for posts</small></h2>
                            @include('root.partials.settings.comments-vk')
                            @include('root.partials.settings.comments-facebook')

                            <div class="text-right">
                                <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                                <input type="submit" value="SAVE" class="btn btn-success"/>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop