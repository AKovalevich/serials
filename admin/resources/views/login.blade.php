@extends('layouts.main')
@section('title', 'Admin login')
@section('body-class', 'new-login-page')
@section('content')

    {{ Html::style('css/bg-canvas.css') }}
    {{ Html::style('css/login-page.css') }}

    <div id="large-header" class="large-header">
        <canvas id="bg-canvas"></canvas>
        <div id="warp">
            WELCOME TO <span style="color: #e50914">DASHBOARD<span>
            {{ Form::open(array('url' => 'admin/login')) }}
            {!! csrf_field() !!}
            <div class="admin">
                <div class="rota">
                    <h1>ADMIN</h1>
                    {{ $errors->first('email') }}
                    {{ Form::text('email', Input::old('email'),
                        array('class' => 'form-control', 'placeholder' => 'Email', 'autocomplete' => 'off')) }}
                    {{ $errors->first('password') }}
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'off')) }}
                </div>
            </div>
            <div class="cms">
                <div class="roti">
                    <h1>CMS</h1>
                    {{ Form::submit(
                        'Login',
                         array('id' => 'valid')
                     )}}<br />
                    {{--<p><a href="#">Register</a> <a href="#">Forgot Password</a> <a href="#">Help</a></p>--}}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    {{ Html::script('js/login-page.js') }}
    {{ Html::script('js/EasePack.min.js') }}
    {{ Html::script('js/TweenLite.min.js') }}
    {{ Html::script('js/bg-canvas.js') }}

@stop
