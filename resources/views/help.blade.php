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
                    <a href="{{route('panel')}}">
                        <button class="custom-button-account" style="width: fit-content">
                            Panel główny
                        </button>
                    </a>
                    <a href="{{route('panel')}}" >
                        <button class="custom-button-account" class="custom-button-action" style="width: 250px; background: white; color: black;" >
                            Macierz efektów kształcenia
                        </button>
                    </a>
                    <a href="{{route('panel')}}" >
                        <button class="custom-button-account" class="custom-button-action" style="width: 250px; background: white; color: black;" >
                           Wszystkie przedmioty
                        </button>
                    </a>
                </div>
                <div class="right-nav">
                    

                    <a href="{{route('account')}}">
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

                <div class="panel-box">
                    <ol class="action-list-type">
                        <a href="{{ route('panel'); }}"><li>Wszystkie przedmioty</li></a>
                        <a href="{{ route('my-sylabuses'); }}"><li>Wyświetl moje przedmioty</li></a>
                        <a href="{{ route('find-sylabuses'); }}"><li>Szukaj przedmiotu lub frazy</li></a>
                        <a href="{{ route('help'); }}"><li class="selected-list">Pomoc oznaczeń</li></a><br>
                    </ol>                    
                </div>
                
                <div class="sub-layout-panel-start">

                    
                    <!-- <div class="panel-action"></div> --> 

                    <div class="panel-list">
                        <p id="list-of-subjects-p" class="header-of-container">Moja lista przedmiotów</p>
                        
                        
                    </div>

                </div>           


                  
                
                
            </div>
        
    </body>
</html>
