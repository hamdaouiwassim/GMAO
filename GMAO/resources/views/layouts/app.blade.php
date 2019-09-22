<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GMAO') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
</head>
<body>

<div class="wcontainer">
            <div class="wheader">
                
                <div class="searchform">
                        <h1>WIGMAO</h1>
                        
                        @if (Auth::guest())
                        <a href="{{ route('login') }}">Login</a>
                        
                        @else
                        <a class="lougout" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>
                                            
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            </form>
                        @endif
                </div>
            </div>
            @if (Auth::guest())
            @else
            <div class="wsidebar">
                
                <div class="profile">
                    <img src="{{ asset('img/user.png') }}" class="rounded">
                    <h4>{{ Auth::user()->name }}</h4>
                    <h4>Administrateur</h4>
                </div>
                <div class="menu">
                        <ul>
                            <li><a href="#"> <i class="fas fa-users"></i> Utilisateurs </a></li>
                            <li class="active"><a href="#"> <i class="fas fa-boxes"></i> Equipements </a></li>
                            <li><a href="#"> <i class="fas fa-sign-out-alt"></i> Demande Intervention </a></li>
                            <li><a href="#"> <i class="fas fa-sign-out-alt"></i> Maintenance Preventif </a></li>
                        </ul>
        
                </div>
            </div>
            @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
