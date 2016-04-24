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
                {{ Form::open([
                     'url' => '/admin/dashboard/images/' . $image->id . '/edit',
                     'method' => 'POST',
                     'files' => 'true'
                 ]) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Title</div>
                        {{ Form::text('title', $image->title, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Type</div>
                        {{ Form::select('type', $types, $image->type, ['name'=>'type']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Url</div>
                        <img width="200" height="130" src="{{ route($image->type . '.image', ['filename' => $image->path ]) }}"/>
                        {{ Form::file('path', ['class' => 'form-control']) }}
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