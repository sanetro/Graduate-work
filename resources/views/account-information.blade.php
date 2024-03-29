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
                        <button class="custom-button-account" class="custom-button-action" style="width: 250px;" >
                            Macierz efektów kształcenia
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
                <div class="account-box" style="margin 20px auto !important">
                    <p class="header-of-container">Informacje o koncie</p>
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
                            <td> Stanowisko </td>
                            <td> {{ $role }} </td>
                        </tr>
                        <tr>
                            <td> Katedra </td>
                            <td> {{ $chair }} </td>
                        </tr>
                        <tr>
                            <td> Wydział </td>
                            <td> {{ $department }} </td>
                        </tr>
                    </table>
                </div>  
            </div>
        
    </body>
</html>
