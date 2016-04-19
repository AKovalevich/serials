@extends('dashboard.layouts.main')

@section('title', 'Add image')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Add image</div>
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
                {{ Form::open(array('url' => '/admin/dashboard/images/create')) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Url</div>
                    {{ Form::image(Input::old('path'), 'path', array('class' => 'form-control')) }}
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