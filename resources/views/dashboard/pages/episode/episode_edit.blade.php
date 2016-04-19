@extends('dashboard.layouts.main')

@section('title', 'Edit episode')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Edit episode</div>
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
                {{ Form::open(array('url' => '/admin/dashboard/episodes/' . $episode->id . '/edit')) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Season number</div>
                        {{ Form::number('season_number', $episode->season_number, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Episode number</div>
                        {{ Form::number('episode_number', $episode->episode_number, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Asset ID</div>
                        {{ Form::number('asset_id', $episode->asset_id, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Title</div>
                        {{ Form::text('title', $episode->title, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Title</div>
                        {{ Form::textarea('description', $episode->description, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Image ID</div>
                        {{ Form::number('image_id', $episode->asset_id, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">File ID</div>
                        {{ Form::number('file_id', $episode->file_id, array('class' => 'form-control')) }}
                    </div>
                    <div class="login-button text-center">
                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop