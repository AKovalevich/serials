@extends('dashboard.layouts.main')

@section('title', 'Add Slider')

@section('dashboard_content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Add slider</div>
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
                    'url' => '/admin/dashboard/sliders/create',
                    'method' => 'POST'
                ]) }}
                {!! csrf_field() !!}
                <div class="control">
                    <div class="sub-title">Title</div>
                    {{ Form::text('title', Input::old('title'), ['class' => 'form-control']) }}
                </div>
                <div class="control">
                    <div class="sub-title">Type</div>
                    {{ Form::select('type', $types, null, ['name'=>'type']) }}
                </div>

                <div class="control">
                    <div class="sub-title">Slides</div>
                    @if ($slides)
                        {{ Form::select('slides', $slides, null, ['multiple'=>'multiple', 'name'=>'slides[]']) }}
                    @else
                        <a href="/admin/dashboard/images/create">You need to create some slides</a>
                    @endif
                </div>
                <div class="login-button text-center">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop