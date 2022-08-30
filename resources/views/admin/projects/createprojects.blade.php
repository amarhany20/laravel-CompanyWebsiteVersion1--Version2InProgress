@extends('admin.layout.adminapp')
@section('title', 'create a project')
@section('content')
    <div class="container">
        <h2 class="text-center">Project Management | Add</h2>
        <br>
        <form action="{{ url('/admin/projects/store') }}" enctype="multipart/form-data" method="post"
            class="form-group" style="width:70%; margin-left:15%;">
            @csrf

            {{-- MainPhoto --}}


            <div class="mb-3">
                <label class="form-group mt-3" for="formFile">Main Image</label>
                <input class="form-control" name="image" type="file" id="formFile">
                @error('image')
                    <li>
                        <div class="alert alert-danger">{{ $message }}</div>
                    </li>
                @enderror
            </div>


            <label class="form-group mt-3">Title:</label>
            <input type="text" value="{{ old('title') }}" class="form-control" placeholder="Title" name="title">
            @error('title')
                <li>
                    <div class="alert alert-danger">{{ $message }}</div>
                </li>
            @enderror

            <label class="form-group mt-3">Sub Title:</label>
            <input type="text" value="{{ old('subTitle') }}" class="form-control" placeholder="Sub Title"
                name="subTitle">
            @error('subTitle')
                <li>
                    <div class="alert alert-danger">{{ $message }}</div>
                </li>
            @enderror


            <label class="form-group mt-3">Content</label>
            <textarea class="form-control " placeholder="Content" name="content" rows="4">{{ old('content') }}</textarea>
            @error('content')
                <li>
                    <div class="alert alert-danger">{{ $message }}</div>
                </li>
            @enderror

            <label class="form-group mt-3">Type:</label>
            <input type="text" value="{{ old('type') }}" class="form-control" placeholder="Type" name="type">
            @error('type')
                <li>
                    <div class="alert alert-danger">{{ $message }}</div>
                </li>
            @enderror

            <div class="mb-3">
                <label class="form-group mt-3" for="formFile">Project Images</label>
                <input class="form-control" name="images[]" type="file" id="formFile" multiple>
                @error('images')
                    <li>
                        <div class="alert alert-danger">{{ $message }}</div>
                    </li>
                @enderror
            </div>


            {{-- <select class="form-control" name="city_name">
                <option value="bhubaneswar">Bhubaneswar</option>
                <option value="cuttack">Cuttack</option>
            </select> --}}

            {{-- <label>Email:</label>

            <input type="text" class="form-control" placeholder="Enter Email" name="email"> --}}

            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Add Project</button>
            </div>

            {{-- @if ($errors->any())
                <div mb-3>
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif --}}
        </form>
    </div>
@stop
