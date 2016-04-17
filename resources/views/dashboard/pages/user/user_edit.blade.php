@extends('dashboard.layouts.main')

@section('title', 'Edit user')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Edit: {{ $user->name }} ({{ $user->id }})</div>
                </div>
            </div>
            <div class="card-body">

                @if (!empty($message))
                    <div class="alert fresh-color alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{ Form::open(array('url' => '/admin/dashboard/users/' . $user->id . '/edit')) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Name</div>
                    {{ Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Name')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Email</div>
                    {{ Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Email')) }}
                </div>
                <div class="control">
                    <div class="sub-title">Password</div>
                    {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) }}
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