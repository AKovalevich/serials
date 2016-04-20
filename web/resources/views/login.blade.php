@extends('layouts.main')
@section('title', 'Admin login')
@section('body-class', 'login-page')
@section('content')
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">Admin</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            {{ Form::open(array('url' => 'auth/login')) }}
                                {!! csrf_field() !!}
                                <div class="control">
                                    {{ $errors->first('email') }}
                                    {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
                                </div>
                                <div class="control">
                                    {{ $errors->first('password') }}
                                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) }}
                                </div>
                                <div class="login-button text-center">
                                    {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
