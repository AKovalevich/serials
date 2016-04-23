@extends('dashboard.layouts.main')

@section('title', 'Admin | Dashboard')

@section('dashboard_content')
<div class="page-title">
    <span class="title">Images list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">Images</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/images/create">Add image</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Preview</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Preview</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($images as $image)
                        <tr>
                            <td>{{ $image->title }}</td>
                            <td>{{ $image->type }}</td>
                            <td><img class="image image-preview" src="{{ $image->path }}"/></td>
                            <td>
                                <a href="/admin/dashboard/images/{{ $image->id }}/edit">Edit</a>
                                <a href="/admin/dashboard/images/{{ $image->id }}/delete">Delete</a>
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