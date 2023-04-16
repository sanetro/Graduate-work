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
        <div class="page">
            <div class="main-card"> <!-- TODO -->
                <div class="main-card-picture">
                </div>
                <div class="main-card-form">
                    <p style = "font-size: 220%; margin: 20px">Sylabus</p>
                    <p>
                        {{ $userName }}
                    </p>
                    <p>
                        {{ $passwd }}
                    </p>
                    <p>
                        {{ $databaseName }}
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
