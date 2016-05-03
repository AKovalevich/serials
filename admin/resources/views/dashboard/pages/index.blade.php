@extends('dashboard.layouts.main')

@section('title', 'Admin | Dashboard')

@section('content')

<div class="side-body padding-top">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.dashboard.system') }}">
                <div class="card summary-inline">
                    <div class="card-body">
                        <i class="icon fa fa-folder fa-4x"></i>
                        <div class="content">
                            <div class="title">System</div>
                            <div class="sub-title">info</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.dashboard.content') }}">
                <div class="card 1 summary-inline">
                    <div class="card-body">
                        <i class="icon fa fa-archive fa-4x"></i>
                        <div class="content">
                            <div class="title">Content</div>
                            <div class="sub-title">info</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <a href="{{ route('admin.dashboard.media') }}">
                <div class="card 1 summary-inline">
                    <div class="card-body">
                        <i class="icon fa fa-inbox fa-4x"></i>
                        <div class="content">
                            <div class="title">Media</div>
                            <div class="sub-title">info</div>
                        </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@stop