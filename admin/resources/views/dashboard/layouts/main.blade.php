@extends('layouts.main')

<div class="app-container">
<div class="row content-container">
<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    @include('dashboard.blocks.top_menu')
</nav>
<div class="side-menu sidebar-inverse">
    @include('dashboard.blocks.left_menu')
</div>
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body padding-top">
        @yield('dashboard_content')
    </div>
</div>
</div>
<footer class="app-footer">
    <div class="wrapper">
        <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2016 Copyright.
    </div>
</footer>
<div>
