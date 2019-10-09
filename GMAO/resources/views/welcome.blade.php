<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        

         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GMAO') }}</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
     
    </head>
    <body>
    <div class="wcontainer">
            <div class="wheader">
                 
                <div class="searchform">
                        <h1>WIGMAO</h1>
                        
                        @if (Route::has('login'))
                
                                @if (Auth::check())
                                    <a class="loginbtn" href="{{ url('/home') }}">Dashboard</a>
                                @else
                                    <a class="loginbtn" href="{{ url('/login') }}">Login</a>
                                    
                                @endif
           
                        @endif
                </div>

            </div>
            
                                
            <div class="wmaincontent" style="margin-left:0 !important">
                <div class="logindiv" style="padding:30px !important">
                    <p>
                    Bienvenue chez TAVGMAO , un systeme pour la gestion de maintenance assisté par l'ordinateur ( GMAO ) qui permet :
                    </p>
                    <ul class="listhome" >
                            <li> la gestion des équipements   </li>
                            <li> la gestion de la maintenance   </li>
                            <li> la gestion du personnel et le planning   </li>
                            <li> Indicateurs clés de performance   </li>
                    </ul>
                    <div style="text-align:center;margin:20px;">
                    <a href="/login" class="dashboardbtn">Acceder aux dashboard</a>
                    </div>
                    
                </div>
                    
            </div>

            
                   
                    
           
    </div>
    


    </body>
</html>
