@extends('dashboard.layouts.main')

@section('title', 'Edit asset')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Create asset</div>
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
                        {{ Form::text('title', $asset->title, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Original title</div>
                        {{ Form::text('original_title', $asset->original_title, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Description</div>
                        {{ Form::textarea('plot', $asset->plot, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Plot</div>
                        {{ Form::textarea('description', $asset->description, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Body</div>
                        {{ Form::textarea('body', $asset->body, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Start date</div>
                        {{ Form::text('start_date', $asset->start_date, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">End date</div>
                        {{ Form::text('end_date', $asset->end_date, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Tags</div>
                        {{ Form::text('end_date', $asset->end_date, array('class' => 'form-control')) }}
                    </div>
                    <div class="">
                        <div class="sub-title">Tags</div>
                        {{ Form::select('tags', $tags_list, $selected_tags, array('multiple'=>'multiple', 'name'=>'tags[]')) }}
                    </div>
                    <div class="">
                        <div class="sub-title">Genres</div>
                        {{ Form::select('genres', $genres_list, $selected_genres, array('multiple'=>'multiple', 'name'=>'genres[]')) }}
                    </div>
                    <div class="login-button text-center">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop