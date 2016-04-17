@extends('dashboard.layouts.main')

@section('title', 'Edit user')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Create user</div>
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

                {{ Form::open(array('url' => '/admin/dashboard/users/create')) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Name</div>
                    {{ $errors->first('name') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Email</div>
                    {{ $errors->first('email') }}
                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Password</div>
                    {{ $errors->first('password') }}
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) }}
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