@extends('home.layout.app')
@section('title', 'Home')
@section('content')
    <section>
        <div style="margin-top: 50px" class="carousel slide" data-bs-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block"
                        src="{{ asset('images/Slideshow/2.jpg') }}" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block"
                        src="{{ asset('images/Slideshow/3.jpg') }}" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block"
                        src="{{ asset('images/Slideshow/4.jpg') }}" alt="Slide Image"></div>
            </div>

            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span
                        class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a
                    class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span
                        class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            </ol>
        </div>
    </section>
    <div class="container my-4 w-25">
        <hr style="border-top: 1px solid rgb(151, 150, 150); ">
    </div>
    <section id="projects" class="projects-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Projects </h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh
                    erat, pellentesque ut laoreet vitae. </p>
            </div>
            <div class="container mb-3 horizontal-scrollable scrollmenu container-fluid">
                <div id="projects" class="row flex-row flex-nowrap">
                    {{-- pb-5 --}}

                    @foreach ($navProjects as $project)
                    <div class="col-sm-6 col-lg-4 item"><img class="img-fluid" src="{{ asset('images/'.$project->main_image_path) }}">
                        <h3 class="name">{{ $project['title'] }}</h3>
                        <p class="description">{{ $project['type'] }}</p>
                        <p class="description">{{ $project['subTitle'] }}</p>
                    </div>
                    @endforeach
                    {{-- <div class="col-sm-6 col-lg-4 item"><img class="img-fluid" src="assets/img/building.jpg">
                        <h3 class="name">Project Name</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                            aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div>
                    <div class="col-sm-6 col-lg-4 item"><img class="img-fluid" src="assets/img/building.jpg">
                        <h3 class="name">Project Name</h3>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                            aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <div class="container my-4 w-25">
        <hr style="border-top: 1px solid rgb(151, 150, 150); ">
    </div>
    <section id="about" class="pt-3">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">About Us</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh
                    erat, pellentesque ut laoreet vitae.</p>
            </div>
            <div class="row">
                <div class="col-md-6"><img class="img-fluid" src="assets/img/istockphoto-1138024382-612x612.jpg">
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.<br></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-4 w-25">
        <hr style="border-top: 1px solid rgb(151, 150, 150); ">
    </div>
    <section id="team" class="team-boxed" style="background: rgb(255,255,255);">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Team </h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh
                    erat, pellentesque ut laoreet vitae.</p>
            </div>
            <div class="row people">
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle img-fluid" src="assets/img/1.jpg">
                        <h3 class="name">Ben Johnson</h3>
                        <p class="title">Musician</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                            aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam
                            dictum feugiat tellus, a semper massa. </p>
                        <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i
                                    class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle img-fluid" src="assets/img/2.jpg">
                        <h3 class="name">Emily Clark</h3>
                        <p class="title">Artist</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                            aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam
                            dictum feugiat tellus, a semper massa. </p>
                        <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i
                                    class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box"><img class="rounded-circle img-fluid" src="assets/img/3.jpg">
                        <h3 class="name">Carl Kent</h3>
                        <p class="title">Stylist</p>
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent
                            aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id. Etiam
                            dictum feugiat tellus, a semper massa. </p>
                        <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i
                                    class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-4 w-25">
        <hr style="border-top: 1px solid rgb(151, 150, 150); ">
    </div>
@endsection
