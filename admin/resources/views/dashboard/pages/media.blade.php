@extends('dashboard.layouts.main')

@section('title', 'Admin | Media Dashboard')

@section('content')

<div class="side-body padding-top">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">Media info</div>
                    </div>
                    <div class="pull-right card-action">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalListExample"><i class="fa fa-code"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">Value</span> Name
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop