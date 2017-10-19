<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Twitter Cards-->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@nytimesbits" />
    <meta name="twitter:creator" content="@abduiiahalt" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:title" content="Tell Me/ Abdullah ALT" />
    <meta property="og:description" content="I hate Saraha, so I made my own personalized copy of it." />
    <meta property="og:image" content="{{URL::to('image/users/bravely-default.jpg')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tell Me</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('css/layout.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('css/theme.css')}}" type="text/css">

    @yield('styles')

    <!--Scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" 
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" 
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    @yield('scripts')
    
</head>
<body>
    <head>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('home')}}">Tell Me</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if(Auth::check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item{{Route::currentRouteName() == 'user' ? ' active' : ''}}">
                            <a class="nav-link" href="{{ route('user.index', ['username' => Auth::user()->username]) }}">
                                Account 
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @else 
                    @if(Route::currentRouteName() != 'home')
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item{{Route::currentRouteName() == 'login' ? ' active' : ''}}">
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item{{Route::currentRouteName() == 'register' ? ' active' : ''}}">
                                <a class="nav-link" href="{{route('register')}}">register</a>
                            </li>
                        </ul>
                    @endif
                @endif
          </div>
        </nav>
    </head>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    
</body>
</html>
