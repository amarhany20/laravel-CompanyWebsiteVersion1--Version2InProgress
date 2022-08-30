@extends('admin.layout.adminapp')
@section('title', 'add Project')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <form action="{{ url('/admin/projects/menu') }}">
                    <input class="btn btn-dark" type="submit" value="Project Management" />
                </form>
            </div>
            <div class="col">
                <form action="{{ url('/admin/manage') }}">
                    <input class="btn btn-dark" type="submit" value="Manage Admins" />
                </form>
            </div>

        </div>
    </div>
@stop
