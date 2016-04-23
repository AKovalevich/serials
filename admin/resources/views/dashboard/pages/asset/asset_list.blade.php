@extends('dashboard.layouts.main')

@section('title', 'Admin | Dashboard')

@section('dashboard_content')
<div class="page-title">
    <span class="title">TV Show list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">TV Show</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/assets/create">Add TV Show</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Seasons</th>
                        <th>Episodes</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Seasons</th>
                        <th>Episodes</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $asset->title }}</td>
                        <td>{{ 'Count seasons' }}</td>
                        <td>{{ 'Count episodes' }}</td>
                        <td>{{ $asset->start_date }}</td>
                        <td>{{ $asset->end_date }}</td>
                        <td>
                            <a href="/admin/dashboard/assets/{{ $asset->id }}/edit">Edit</a>
                            <a href="/admin/dashboard/assets/{{ $asset->id }}/delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop