@extends('dashboard.layouts.main')

@section('title', 'Edit TV Show')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Edit asset</div>
                </div>
            </div>
            <div class="card-body">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{ Form::open(array('url' => '/admin/dashboard/assets/' . $asset->id . '/edit')) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Title</div>
                        {{ Form::text('title', $asset->title, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Original title</div>
                        {{ Form::text('original_title', $asset->original_title, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Plot</div>
                        {{ Form::textarea('plot', $asset->plot, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Description</div>
                        {{ Form::textarea('description', $asset->description, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Body</div>
                        {{ Form::textarea('body', $asset->body, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Start date</div>
                        {{ Form::date('start_date', $start_date, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">End date</div>
                        {{ Form::date('end_date', $end_date, ['class' => 'form-control']) }}
                    </div>
                    <div class="">
                        <div class="sub-title">Preview</div>
                        {{ Form::select('image_id', $previews_list, $selected_preview, ['name'=>'image_id']) }}
                    </div>
                    <div class="">
                        <div class="sub-title">Slider</div>
                        {{ Form::select('slider_id', $slider_list, $selected_slider, ['name'=>'slider_id']) }}
                    </div>
                    <div class="">
                        <div class="sub-title">Tags</div>
                        {{ Form::select('tags', $tags_list, $selected_tags, ['multiple'=>'multiple', 'name'=>'tags[]']) }}
                    </div>
                    <div class="">
                        <div class="sub-title">Genres</div>
                        {{ Form::select('genres', $genres_list, $selected_genres, ['multiple'=>'multiple', 'name'=>'genres[]']) }}
                    </div>
                    <div class="login-button text-center">
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop