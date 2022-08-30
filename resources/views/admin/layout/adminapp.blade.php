<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Company Admin - @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    <script src="{{ mix('js/admin.js') }}" defer></script>

    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 100px;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/admin">Company Admin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse container" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="nav-link ">{{ Auth::user()->name }}</span>
                        </li>
                    </ul>
                    <ul class="navbar-nav">

                        <li class="nav-item ">
                            <a class="nav-link " href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </li>

                    </ul>

                </div>
            </nav>
        </div>



    </header>

    <main>
        @yield('content')
    </main>
    <footer style="background-color: rgba(0, 0, 0, 0.05);">
        <div class="text-center p-4 ">
            <a href="">Logout</a>
            |
            <a href="/">Home</a>
        </div>
    </footer>
</body>

</html>
