@extends('admin.layout.adminapp')
@section('title', 'Projects Menu')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container d-flex justify-content-center">
        <div class="row ">
            <div class="col">
                <form action="{{ url('/admin/projects/create') }}">
                    <input class="btn btn-dark" type="submit" value="Create a project" />
                </form>
            </div>
            <div class="col">
                <form action="{{ url('/admin/projects/select') }}">
                    <input class="btn btn-dark" type="submit" value="Edit Projects" />
                </form>
            </div>
        </div>
    </div>
@stop
