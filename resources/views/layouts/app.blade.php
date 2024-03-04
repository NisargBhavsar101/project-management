<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                            <!-- Left navbar links -->
                            <ul class="navbar-nav" style="margin-left:70px ;" >
                                <li class="nav-item">
                                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                </li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="{{route('employee.index')}}" class="nav-link">Employee</a>
                                </li>   
                                <li class="nav-item d-none d-sm-inline-block">
                                    <a href="" class="nav-link">Task</a>
                                </li>
                            
                        </ul>

                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
            
        </main>
    </div>
</body>

</html>