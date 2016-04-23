@extends('dashboard.layouts.main')

@section('title', 'Edit Slider')

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
                     'url' => '/admin/dashboard/sliders/' . $slider->id . '/edit',
                     'method' => 'POST'
                 ]) }}
                    {!! csrf_field() !!}
                    <div class="control">
                        <div class="sub-title">Title</div>
                        {{ Form::text('title', $slider->title, array('class' => 'form-control')) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Type</div>
                        {{ Form::select('type', $types, $slider->type, ['name'=>'type']) }}
                    </div>
                    <div class="control">
                        <div class="sub-title">Slides</div>
                        {{
                            Form::select(
                            'slides', $slides_options, $selected_slides_options,
                            ['multiple'=>'multiple', 'name'=>'slides[]'])
                        }}
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