<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- si je supprime cette ligne plus de menu il faudra en rajouter une, éventuellement celle de l'autre
        projet ou c'est vertical à vérifier --><nav class="bg-blue shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">
               <!-- si je mets tout à 100 le logo est correct --> <img src=" {{ asset('img/a.png') }} " class= "height="150" width="150" ><a class="navbar-brand" href="{{ url('/') }}" >
                   <!-- si je delete cette ligne plus le logo laravel --> <!--{ne pas oublier de rajouter un { ('app.name', 'Laravel') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="mr-auto navbar-nav">
                        
                    </ul>
                    
                    <!-- RightSi de Of Navbar -->
                    <!-- si je rajoute flex-column tout part en colonne -->
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        
                        <!--@if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif-->
                        @else
                        <div class="dropdown me-1">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profil utilisateur <!--{ Auth::user()->name }}-->
                            </button>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('profile/fa')}}">Authentification à 2 facteurs</a>
                                <a class="dropdown-item" href="{{url('profile/edit')}}">Modifier l'identifiant</a>
                                <a class="dropdown-item" href="{{url('profile/password')}}">Modifier le mot de passe</a>
                            </div>
                        </div>
                        
                        <div class="dropdown show me-1">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tickets
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{url('tickets')}}">Liste des tickets</a>
                                <a class="dropdown-item" href="{{url('tickets/create')}}">Nouveau ticket</a>
                            </div>
                        </div>
                        <div class="dropdown me-1">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gestion des utilisateurs
                            </button>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('crud.index')}}">Utilisateurs inscrit</a>
                                <a class="dropdown-item" href="{{route('crud.create')}}">Créer un utilisateur</a>
                                <a class="dropdown-item" href="{{route('invite')}}">Inviter un utilisateur</a>
                                <!--<a class="dropdown-item" href="{{--route('search')--}}">Rechercher un utilisateur</a> -->
                            </div>
                        </div>
                        <div class="dropdown me-1">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Rôles et permissions
                            </button>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url('roles')}}">Rôle</a>
                                <a class="dropdown-item" href="{{url('permissions')}}">Permission</a>                                
                            </div>
                        </div>
                        <li>
                            <button type="button" class="btn btn-primary" aria-haspopup="true" aria-expanded="false" >
                                <a class="text-decoration-none d-inline text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </button>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!--<nav class="bg-blue sticky shadow-sm navbar navbar-expand-md navbar-light">-->
    <main class="py-4">
        @yield('content')
    </main>
   
</div>
</body>
</html>