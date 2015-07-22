@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div>
            {!! Form::open(['url' => $save_url, 'method' => 'post']) !!}
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" name="title" value="{{ $category->title or Input::old('title', '') }}" class="form-control" id="inputTitle">
                </div>
                @if(!empty($category))
                    <div class="well well-sm">
                        {{ route('category', ['slug' => $category->slug]) }}
                    </div>
                @endif
                <div class="form-group">
                    <label for="inputSeoTitle">SEO Title</label>
                    <input type="text" name="seo_title" value="{{ $category->seo_title or Input::old('seo_title', '') }}" class="form-control" id="inputSeoTitle">
                </div>
                <div class="form-group">
                    <label for="inputSeoDescription">SEO Description</label>
                    <textarea name="seo_description" id="inputSeoDescription" class="form-control">{{ $category->seo_description or Input::old('seo_description', '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputSeoKeywords">SEO Keywords</label>
                    <input type="text" name="seo_keywords" value="{{ $category->seo_keywords or Input::old('seo_keywords', '') }}" class="form-control" id="inputSeoKeywords">
                </div>
                <div class="text-right">
                    <a href="{{ route('root-categories') }}" class="btn">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop