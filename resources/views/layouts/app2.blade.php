<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
   
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('posts.index')}}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('posts.create')}}">Create</a>
                            </li>  
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('posts.controlPanel')}}">Control Panel</a>
                            </li>        
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        @auth
            <div class="row app2-row">
                <div class="col-lg-2">
                    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Sidebar</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{route('posts.index')}}" class="nav-link" >
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                            Home
                            </a>
                        </li>
                        <li>
                            <a href="{{route('posts.controlPanel')}}" class="nav-link text-white" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                            Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{route('posts.create')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                            Create Post
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cates.create')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                            Create Category
                            </a>
                        </li>
                        </ul>
                        <hr>
                        <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=740&t=st=1681074317~exp=1681074917~hmac=623eabb12f3d86f4321fae172d8aab1f7fdb915b0849ed3d6679f246ea34ff4d" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{auth()->user()->name}}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>


                            

                            


                        </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 p-3">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        @endauth
        @guest
            <main>
                @yield('content')
            </main>
        @endguest
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
