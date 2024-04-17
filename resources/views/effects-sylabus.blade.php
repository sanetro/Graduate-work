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
            
              
               <div class="content-container">
               <h2 id="list-of-subjects-p" style="margin-top: 20px">Lista efektów przedmiotu <i>{{ $code }}</i>
                
                    <a href="{{ route("addEffect", ['code'=> $code, 'id' => $id]) }}">
                        <button class="custom-button-account" style="width: fit-content; float: right; font-size: 16px" >
                            Dodaj efekt przedmiotu
                        </button>
                    </a>
                </h2>
               </div>
                        
              <table class="subject-list-table" style="width: 70%; margin: 24px auto">
                  <thead>
                      <tr>
                          <td>Id</td>
                          <td>Symbol</td>
                          <td>Kategoria</td>
                          <td>Opis</td>
                          <td>Więcej</td>
                          <td>Zmień</td>
                          <td>Usuń</td>
                          <td>Złącz</td>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($effects as $c)
                          <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ strlen($c->symbol) > 20 ? substr($c->symbol, 0, 20) . '...' : $c->symbol }}</td>
                            <td>{{ strlen($c->categories->name) > 20 ? substr($c->categories->name, 0, 20) . '...' : $c->categories->name }}</td>
                            <td>{{ strlen($c->description) > 60 ? substr($c->description, 0, 60) . '...' : $c->description }}</td>
                              <td>
                                <a href="{{ route('detailedEffect', ['id' => $c->id]); }}">
                                    <img src={{ asset('images/see.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('editEffect', ['id' => $c->id, 'code' => $code, 'effects' => $effects]); }}">
                                    <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('destroyEffect', ['id' => $c->id, 'code' => $code, 'effects' => $effects]); }}">
                                    <img src={{ asset('images/delete.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('readDirectional', ['subject_effect_id' => $c->id]); }}">
                                    <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                          </tr>
                      @empty
                        <p class="alert">
                            Brak danych. Dodaj efekt przedmiotu.
                        </p>    
                      @endforelse
                  </tbody> 
              </table>
              
            
                
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
