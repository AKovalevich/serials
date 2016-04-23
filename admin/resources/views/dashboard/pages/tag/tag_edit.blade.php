@extends('dashboard.layouts.main')

@section('title', 'Edit tag')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Create tag</div>
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
                {{ Form::open(array('url' => '/admin/dashboard/tags/' . $tag->id . '/edit')) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Name</div>
                        {{ Form::text('name', $tag->name, array('class' => 'form-control')) }}
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