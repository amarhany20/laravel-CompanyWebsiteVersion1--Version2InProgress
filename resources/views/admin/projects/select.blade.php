@extends('admin.layout.adminapp')
@section('title', 'Select Project For Edit')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <table class="table table-dark text-center ">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th class="align-middle" scope="row">{{ $project->id }}</th>
                        <td class="align-middle">{{ $project->title }}</td>
                        <td class="align-middle">{{ $project->type }}</td>
                        <td class="align-middle">
                            <form method="GET" action="{{ url('/admin/projects/edit/' . $project->id) }}">
                                <input class="btn btn-primary" type="submit" value="Edit">
                            </form>
                        </td>
                        <td class="align-middle">
                            <form action="{{ url('/admin/projects/delete/' . $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete"
                                    onclick="return confirm('Are you sure you want to delete {{ $project->title }}? It will be unrecoverable')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
