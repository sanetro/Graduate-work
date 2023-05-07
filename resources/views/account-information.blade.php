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
                        <a href="{{route('panel')}}"><li>Panel główny</li></a>
                        <a href="{{route('panel')}}"><li>Macierz efektów kształcenia</li></a>
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
                <div class="account-box" style="margin 20px auto !important">
                    <p class="header-of-container">Informacje o końcie</p>
                    <table class="account-data-table">
                        <tr>
                            <td> identyfikator </td>
                            <td> {{ $account->id }} </td>
                        </tr>
                        <tr>
                            <td> Imie </td>
                            <td> {{ $account->name }} </td>
                        </tr>
                        <tr>
                            <td> Nazwisko </td>
                            <td> {{ $account->surname }} </td>
                        </tr>
                        <tr>
                            <td> Katedra </td>
                            <td> {{ $account->chair }} </td>
                        </tr>
                        <tr>
                            <td> Wydział </td>
                            <td> {{ $account->department }} </td>
                        </tr>
                        <tr>
                            <td> Uniwersytet </td>
                            <td> {{ $account->university }} </td>
                        </tr>
                    </table>
                </div>  
            </div>
        
    </body>
</html>
