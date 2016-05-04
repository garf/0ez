@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            <div class="col-md-3">
                @include('root.partials.settings-menu')
            </div>
            <div class="col-md-9">
                <form action="{{ route('root-settings-website-save') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="inputSiteName">Site Name</label>
                        <input type="text" value="{{ Conf::get('app.sitename') }}" name="sitename" class="form-control" id="inputSiteName">
                    </div>
                    <div class="form-group">
                        <label for="inputSiteUrl">Site URL</label>
                        <input type="text" value="{{ Conf::get('app.url') }}" name="siteurl" class="form-control" id="inputSiteUrl">
                    </div>
                    <div class="form-group">
                        <label for="inputSiteTitle">Site Title</label>
                        <input type="text" value="{{ Conf::get('seo.default.seo_title') }}" name="site_title" class="form-control" id="inputSiteTitle">
                    </div>
                    <div class="form-group">
                        <label for="inputSiteDescription">Site Description</label>
                        <textarea name="site_description" id="inputSiteDescription" class="form-control">{{ Conf::get('app.description') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="inputIndexAllow">Index Allow</label>
                                <select name="seo_index" class="form-control" id="inputIndexAllow">
                                    <option value="index, follow" {{ (Conf::get('seo.index') == 'index, follow') ? 'selected' : '' }}>index, follow</option>
                                    <option value="index, nofollow" {{ (Conf::get('seo.index') == 'index, nofollow') ? 'selected' : '' }}>index, nofollow</option>
                                    <option value="noindex, follow" {{ (Conf::get('seo.index') == 'noindex, follow') ? 'selected' : '' }}>noindex, follow</option>
                                    <option value="noindex, nofollow" {{ (Conf::get('seo.index') == 'noindex, nofollow') ? 'selected' : '' }}>noindex, nofollow</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSeoDescription">Default Meta Description</label>
                        <input type="text" value="{{ Conf::get('seo.default.seo_description') }}" name="seo_description" class="form-control" id="inputSeoDescription">
                    </div>
                    <div class="form-group">
                        <label for="inputSeoKeywords">Default Meta Keywords</label>
                        <input type="text" value="{{ Conf::get('seo.default.seo_keywords') }}" name="seo_keywords" class="form-control" id="inputSeoKeywords">
                    </div>

                    <div class="text-right">
                        <a href="{{ route('root-settings') }}" class="btn btn-default">Cancel</a>
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop