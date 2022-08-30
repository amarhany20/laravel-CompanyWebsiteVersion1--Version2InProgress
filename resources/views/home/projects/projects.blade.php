@extends('home.layout.app')
@section('title', 'Projects')
@section('content')
    <section id="projects">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-3 text-center mt-5">
                    <p class="font-weight-bold text-start"> Filter: </p>
                    <div class="form-group">
                        {{-- <a href="{{ url('/projects/?type='.$type->type) }}">{{ $type->type }}</a> --}}
                        <select name="type-filter" id="type-filter" class="form-control">
                            <option value="{{ url('/projects') }}">Type</option>
                            @foreach ($types as $type)
                                <option value="{{ url('/projects/?type=' . $type->type) }}"> {{ $type->type }}</option>
                            @endforeach

                        </select>
                        <a class="text-decoration" href="{{ url('/projects') }}">Reset</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <h1 class="text-center fw-bold ">Projects</h1>
                    <div class="row">

                        <!-- Projects Start -->
                        @forelse ($projects as $project)
                            <div class="col-lg-4 col-md-6 text-center my-3">

                                <div class="card  h-100">

                                    <img src="{{ asset('images/' . $project->main_image_path) }}"
                                        class="card-img-top img-fluid" alt="1.jpg">

                                    <div class="card-body">

                                        <div class="card-title">{{ $project['title'] }}</div>

                                        <p class="card-text">{{ $project['subTitle'] }}</p>



                                    </div>
                                    <div class="text-center align-text-bottom">
                                        <a href="{{ url('projects\/') . $project['id'] }}"
                                            class="btn w-50 btn-primary  align-text-bottom stretched-link">View Project</a>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="text-center mt-4">
                                <h1>No Projects Yet</h1>
                            </div>
                        @endforelse

                        <span>
                            <div class="">
                                {{ $projects->links() }}
                            </div>
                        </span>


                        {{-- Test --}}
                        {{-- <div class="col-lg-4 col-md-6 text-center">
                            <div class="card border-0 bg-light mb-2">
                                <div class="card-body">
                                    <img src="assets\img\1.jpg" class="img-fluid" alt="1.jpg">
                                </div>
                            <h6>Energy Food</h6>
                            <p>$39.99</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="card border-0 bg-light mb-2">
                                <div class="card-body">
                                    <img src="assets\img\3.jpg" class="img-fluid" alt="1.jpg">
                                </div>
                            <h6>Energy Food</h6>
                            <p>$39.99</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="card border-0 bg-light mb-2">
                                <div class="card-body">
                                    <img src="assets\img\2.jpg" class="img-fluid" alt="1.jpg">
                                </div>
                            <h6>Energy Food</h6>
                            <p>$39.99</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="card border-0 bg-light mb-2">
                                <div class="card-body">
                                    <img src="assets\img\1.jpg" class="img-fluid" alt="1.jpg">
                                </div>
                            <h6>Energy Food</h6>
                            <p>$39.99</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="card border-0 bg-light mb-2">
                                <div class="card-body">
                                    <img src="assets\img\3.jpg" class="img-fluid" alt="1.jpg">
                                </div>
                            <h6>Energy Food</h6>
                            <p>$39.99</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
    </section>

    <div class="container my-5 ">
        <hr>
    </div>

@endsection
