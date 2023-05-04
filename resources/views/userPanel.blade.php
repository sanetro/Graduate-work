<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    </head>
    <body class="antialiased">
        
            
                
            <div class="panel-top">
                <div class="left-nav">
                    <ol>
                        <a href="{{route('userPanel')}}"><li>Panel główny</li></a>
                        <a href="{{route('userPanel')}}"><li>Sylabus</li></a>
                    </ol>
                </div>
                <div class="right-nav">
                    

                    <a href="{{route('logout')}}">
                        <button class="custom-button-account" style="width: fit-content">
                            {{ $email }}
                        </button>
                    </a>
                    <a href="{{route('logout')}}">
                        <button class="custom-button-account">
                            Wyloguj
                        </button>
                    </a>

                </div>
            </div>

            <div class="layout-panel-start">

                <div class="sub-layout-panel-start">

                    
                    <div class="panel-action">
                        
                                
                                                
                    </div>

                    <div class="panel-list">
                        <p id="list-of-subjects" class="header-of-container">Lista przedmiotów</p>
                        {{ $subject }}
                    </div>

                </div>           


                <div class="panel-box">
                    <p class="header-of-container">Panel Zarządzania</p>
                        
                        <ol class="action-list-type">
                            <li><a href="{{ route('welcome'); }}">Wyświetl moje przedmioty</a></li>                        
                            <li><a href="{{ route('welcome'); }}">Wszystkie przedmioty</a></li>
                            <li><a href="{{ route('welcome'); }}">Szukaj przedmiotu lub frazy</a><br></li>
                            <li><a href="{{ route('welcome'); }}">Opcja zarządzająca 1</a></li>                        
                            <li><a href="{{ route('welcome'); }}">Opcja zarządzająca 2</a></li>
                            <li><a href="{{ route('welcome'); }}">Opcja zarządzająca 3</a><br></li>
                            <li><a href="{{ route('welcome'); }}">Opcja zarządzająca 4</a></li>                        
                            <li><a href="{{ route('welcome'); }}">Opcja zarządzająca 5</a></li>
                            <li><a href="{{ route('welcome'); }}">Opcja zarządzająca 6</a><br></li>
                        </ol>
                    
                </div>  
                
                
            </div>
        
    </body>
</html>
