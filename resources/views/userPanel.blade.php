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
                <ul>
                    <a href="{{route('userPanel')}}"><li>Home</li></a>
                </ul>
            </div>

            <div class="layout-panel-start">

                <div class="sub-layout-panel-start">

                    

                    <div class="panel-action">Panel Action</div>

                    <div class="panel-list">Panel List</div>

                </div>           


                <div class="panel-box">
                    <img src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" class="img-icon-profile">
                    <p>
                        {{ $userName }}
                    </p>
                    <p>
                        {{ $role }}
                    </p>
                    <p>
                        {{ $department }}
                    </p>
                    <button class="custom-button-login">Edit</button>
                    <button class="custom-button-login">Show</button>
                    <button class="custom-button-login">Add</button>
                    <button class="custom-button-login">Log out</button>
                </div>  
                
                
            </div>
        
    </body>
</html>
