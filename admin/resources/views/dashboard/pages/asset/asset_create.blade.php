@extends('dashboard.layouts.main')

@section('title', 'Create asset')

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
                {{ Form::open(array('url' => '/admin/dashboard/assets/create')) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Title</div>
                    {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Original title</div>
                    {{ Form::text('original_title', Input::old('email'), array('class' => 'form-control')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Description</div>
                    {{ Form::textarea('plot', Input::old('plot'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Plot</div>
                    {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Body</div>
                    {{ Form::textarea('body', Input::old('body'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Start date</div>
                    {{ Form::text('start_date', Input::old('start_date'), array('class' => 'form-control')) }}
                </div>
                <div class="control">
                    <div class="sub-title">End date</div>
                    {{ Form::text('end_date', Input::old('end_date'), array('class' => 'form-control')) }}
                </div>
                <div class="">
                    <div class="sub-title">Tags</div>
                    @if ($tags)
                        {{ Form::select('tags', $tags, null, array('multiple'=>'multiple', 'name'=>'tags[]')) }}
                    @else
                        <a href="/admin/dashboard/tags/create">You need to create some tags</a>
                    @endif
                </div>
                <div class="">
                    <div class="sub-title">Genres</div>
                    @if ($genres)
                        {{ Form::select('genres', $genres, null, array('multiple'=>'multiple', 'name'=>'genres[]')) }}
                    @else
                        <a href="/admin/dashboard/genres/create">You need to create some genres</a>
                    @endif

                </div>
                <div class="login-button text-center">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop