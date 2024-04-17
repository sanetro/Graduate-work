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
                  
              <div style="margin:5% auto; width:1200px">
              <h2>Pełny efekt przedmiotu</h2>
              <br>
                  <table>
                    <tr style="border-bottom: 1px;">
                          <td><label for="id"><b>Id:</b></label></td>
                          <td>{{$effects->id}}</td>
                    </tr>
                    <tr>
                        <td><label for="category_effects_id"><b>Kategoria efektu:</b></label></td>
                        <td>{{$category}}</td>
                    </tr>
                    <tr>
                          <td><label for="symbol"><b>Symbol:</b></label></td>
                          <td>{{$effects->symbol}}</td>
                    </tr>
                    <tr>
                        <td><label for="description"><b>Opis:</b></label></td>
                        <td><textarea>{{$effects->description}}</textarea></td>
                    </tr>
                  </table>
          </div>        
    </body>
    <style>
        td {
            padding: 5px;
            border-bottom: 1px solid gray;
        }
        textarea {
            min-width: 1100px;
            max-width: 1100px; 
            min-height: 200px;
            background: #e8eaf1;
        }
    </style>

<script>                    
    // Delete success message after 8s
    setTimeout(function() {
        var successMessage = document.querySelector('.success');
        var warnMessage = document.querySelector('.warn');
        if (successMessage) successMessage.style.display = 'none';
        if (warnMessage) warnMessage.style.display = 'none';                                      
    }, 8000);

  </script>
</html>
