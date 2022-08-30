<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Company - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Contact-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Basic.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/project-card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Projects-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Team-Boxed.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <header>
        <nav id="navbar" class=" autohide navbar navbar-fixed-top navbar-light navbar-expand-lg navigation-clean">
            <div class="container"><a class="navbar-brand" href="/">Company</a><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link hidenavbar" href="/#about">About</a></li>
                        <li class="nav-item"><a class="nav-link hidenavbar" href="/#contact">Contact</a></li>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                 href="/projects">Projects</a>
                                 {{-- data-bs-toggle="dropdown" --}}
                            <div class="dropdown-menu">
                                @foreach ($navProjects as $project)
                                <a class="dropdown-item nav-item nav-link"  href="{{ url('projects/'. $project["id"]) }}">{{ $project['title'] }}</a>
                                @endforeach
                                {{-- <a class="dropdown-item" href="/projects">All Projects</a> --}}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

    <section id="contact"  class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 border border-light rounded ">
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <th>Email:</th>
                                <td><a href="mailto:Company@Company.com">Company@Company.com</a>    </td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>+20 1061888476</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>CFC NEW CAIRO EGYPT</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="col-md-6"><iframe allowfullscreen="" frameborder="0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13817.370995848949!2d31.40304563716062!3d30.027023260216904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583cfd5e540799%3A0x4a397398c27f4413!2sCairo%20Festival%20City%2C%20Nasr%20City%2C%20Cairo%20Governorate%2C%20Egypt!5e0!3m2!1sen!2str!4v1649030461951!5m2!1sen!2str"
                        width="100%" height="400"></iframe></div>
            </div>
        </div>
    </section>
    <footer class="footer-basic">
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i
                    class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a
                href="#"><i class="icon ion-social-facebook"></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="/#about">About</a></li>
            <li class="list-inline-item"><a href="/#contact">Contact</a></li>
        </ul>


        <p class="copyright">Company © 2022</p>
    </footer>


</body>

</html>
