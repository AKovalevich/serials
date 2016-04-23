@extends('dashboard.layouts.main')

@section('title', 'Add episode')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Add episode</div>
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
                {{ Form::open(['url' => '/admin/dashboard/episodes/create']) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Season number</div>
                    {{ Form::number('season_number', Input::old('season_number'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Episode number</div>
                    {{ Form::number('episode_number', Input::old('episode_number'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Title</div>
                    {{ Form::text('title', Input::old('title'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Description</div>
                    {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
                </div>
                <div class="">
                    <div class="sub-title">TV Show</div>
                    @if ($assets)
                        {{ Form::select('asset_id', $assets, null, ['name'=>'asset_id']) }}
                    @else
                        <a href="/admin/dashboard/assets/create">You need to create some assets</a>
                    @endif
                </div>
                <div class="">
                    <div class="sub-title">Image ID</div>
                    @if ($images)
                        {{ Form::select('image_id', $images, null, ['name'=>'image_id']) }}
                    @else
                        <a href="/admin/dashboard/images/create">You need to add images</a>
                    @endif
                </div>
                <div class="">
                    <div class="sub-title">Video ID</div>
                    @if ($videos)
                        {{ Form::select('video_id', $videos, null, ['name'=>'video_id']) }}
                    @else
                        <a href="/admin/dashboard/videos/create">You need to add videos</a>
                    @endif

                </div>

                <div class="login-button text-center">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop