@extends('dashboard.layouts.main')

@section('title', 'Admin | Dashboard')

@section('dashboard_content')
<div class="page-title">
    <span class="title">Episodes list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">Episodes</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/episodes/create">Add episode</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Episode</th>
                        <th>Season</th>
                        <th>TV Show</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Episode</th>
                        <th>Season</th>
                        <th>TV Show</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($episodes as $episode)
                        <tr>
                            <td>{{ $episode->title }}</td>
                            <td>{{ $episode->episode_number }}</td>
                            <td>{{ $episode->season_number }}</td>
                            <td>{{ $episode->asset_id }}</td>
                            <td>
                                <a href="/admin/dashboard/episodes/{{ $episode->id }}/edit">Edit</a>
                                <a href="/admin/dashboard/episodes/{{ $episode->id }}/delete">Delete</a>
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