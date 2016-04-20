@extends('dashboard.layouts.main')

@section('title', 'Add video')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Add video</div>
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
                {{ Form::open(array('url' => '/admin/dashboard/videos/create')) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Quality</div>
                    {{ Form::text('quality', Input::old('quality'), array('class' => 'form-control')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Extension</div>
                    {{ Form::text('extension', Input::old('extension'), array('class' => 'form-control')) }}
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