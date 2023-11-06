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
            
              @if (request()->input('flag')==0)
                  <p class="success">
                      Pomyślnie zapisano zmiany
                  </p>
              @elseif (request()->input('flag')==1)
                  <p class="alert">
                      Nie odnotowano żadnych zmian
                  </p>
              @endif
              
              <a href="{{ route("addContent", ['code'=> $code, 'id' => $id]) }}">
                <button class="custom-button-account" style="width: fit-content">
                    Stwórz i dodaj treść przedmiotu
                </button>
            </a>
                
          </div>        
    </body>

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
