@extends('dashboard.layouts.main')

@section('title', 'Edit image')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Edit image</div>
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
                {{ Form::open(array('url' => '/admin/dashboard/images/' . $image->id . '/edit')) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Url</div>
                        {{ Form::image($image->path, 'path', array('class' => 'form-control')) }}
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