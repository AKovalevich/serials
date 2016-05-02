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
                        <a class="btn btn-primary" href="{{ route('episode.create') }}">Add Episode</a>
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
                            <td>{{ $episode->asstetTitle() }}</td>
                            <td>
                                <a href="{{ route('episode.edit', ['id' => $episode->id]) }}">Edit</a>
                                {{ Form::open([
                                    'url' => route('episode.delete', ['id' => $episode->id]),
                                    'method' => 'DELETE'
                                ]) }}
                                <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                {{ Form::close() }}
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