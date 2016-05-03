@extends('dashboard.layouts.main')

@section('title', 'Admin | System Dashboard')

@section('content')

<div class="side-body padding-top">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a href="#">
                <div class="card {{ $block['swap']['color'] }} summary-inline">
                    <div class="card-body">
                        <i class="icon fa fa-folder fa-4x"></i>
                        <div class="content">
                            <div class="title">{{ $block['swap']['swap_free'] }} / {{ $block['swap']['swap_total'] }}</div>
                            <div class="sub-title">Swap</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a href="#">
                <div class="card {{ $block['memory']['color'] }} summary-inline">
                    <div class="card-body">
                        <i class="icon fa fa-archive fa-4x"></i>
                        <div class="content">
                            <div class="title">{{ $block['memory']['memory_free'] }} / {{ $block['memory']['memory_total'] }}</div>
                            <div class="sub-title">Memory</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
            <a href="#">
                <div class="card {{ $block['swap']['color'] }} summary-inline">
                    <div class="card-body">
                        <i class="icon fa fa-inbox fa-4x"></i>
                        <div class="content">
                            <div class="title">{{ $block['disk']['disk_free'] }} / {{ $block['disk']['disk_total'] }}</div>
                            <div class="sub-title">Disk</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">System info</div>
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
                            @foreach($system_info as $param_name => $param_value)
                                <li class="list-group-item">
                                    <span class="badge">{{ $param_value }}</span> {{ $param_name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop