@php
    use App\Models\User;
    $user = User::where('id', session('id'))->first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>{{ $page }} </title>

    @livewireStyles

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <style>
        body {
            background: #f1f2f5;
        }

        .nav_link:hover {
            color: blue !important;
            font-weight: bold;
            font-size: 18px;

        }

        .nav_link {
            color: white !important;
            font-size: 18px;
        }

        .activee {
            color: blue !important;
            font-weight: bold;
            font-size: 18px;
            background: #212529 !important;
        }

        .dropdown-item .activee {}

        .main-c {
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 6rem
        }

        .dropdown-menu li {
            position: relative;
        }

        .dropdown-menu .submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -7px;
        }

        /*  .dropend:hover .submenu {
            display: block;
             margin-top: 0;  // remove the gap so it doesn't close
            margin-right: 5;
        }

        .dropend:hover .dropdown-menu {
            display: block;
            margin-top: 0; // remove the gap so it doesn't close
        } */

        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
        }

        /* Remove roundness for all input fields */
        input, select, span {
            border-radius: 0 !important;
        }

        .custcard {
            height: 200px;
            width: 150px;

        }

        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>
</head>

<body {{-- oncontextmenu='return false' --}} class='snippet-body'>

    <!-- Page Heading -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark main-navigation">
        <div class="container-fluid">
            <a class="navbar-brand  mr-auto mr-lg-3 ml-3 ml-lg-0 @if ($pageSlug == 'accueil') {{ 'activee' }} @endif"
                href="{{ url("index") }}"><img src="{{ asset('images/djibtelogo.png') }}" alt="Accueil" height="36"
                    title="Accueil"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{-- <li class="nav-item">
                        <a class="nav-link nav_link
                           @if ($sup == 'stats') {{ 'activee' }} @endif "
                            href="/statsg">
                            Statistiques
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav_link
                           @if ($sup == 'admin') {{ 'activee' }} @endif "
                            href="/admin">
                            Users
                        </a>
                    </li> --}}
                </ul>
                <div class="d-flex">
                    <div class="nav-item dropdown dropstart">

                        <h5 class="nav-link nav_link fw-bold   dropdown-toggle" id="user" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $user->name }} </h5>

                        <ul class="dropdown-menu dropdown-menu-dark bg-dark " aria-labelledby="user">
                            <li><a class="dropdown-item" href="{{ url('logout') }}">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Page Content -->
    <!--Container Main start-->

    <div class="main-c ">
        @yield('content')
        <x-go-top />

        {{-- <x-fouter /> --}}
    </div>


    @stack('modals')

    @stack('scripts')


    <script>
        var goTopHandler = function(e) {
            $('.go-top').on('click', function(e) {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                e.preventDefault();
            });
        };

        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });


        window.addEventListener('close-modal', event => {
            $('.modal').modal('hide');
        });
    </script>

    @livewireScripts
    @yield('script')
</body>

</html>
