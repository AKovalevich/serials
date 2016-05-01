@extends('dashboard.layouts.main')

@section('title', 'Edit video')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Edit video</div>
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
                {{ Form::open([
                     'url' => '/admin/dashboard/videos/' . $video->id . '/edit',
                     'method' => 'POST',
                     'files' => 'true'
                 ]) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Title</div>
                        {{ Form::text('title', $video->title, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Quality</div>
                        {{ Form::select('quality', $quality, null, ['name'=>'quality']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Extension</div>
                        {{ Form::text('extension', $video->extension, ['class' => 'form-control']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Video file</div>
                        @if ($file_list)

                            {{ Form::select('path', $file_list, $selected_file, ['class' => 'form-control']) }}
                        @else
                            <div>You have not available video files in Storage. Please waiting 10 minutes or upload new via NodeJS</div>
                        @endif
                    </div>
                    <div class="login-button text-center">
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop