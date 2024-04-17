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
              @endif
            
              
               <div class="content-container">
               <h2 id="list-of-subjects-p" style="margin-top: 20px">Lista wszystkich treści do <i>{{ $code }}</i>
                
                    <a href="{{ route("addContent", ['code'=> $code, 'id' => $id]) }}">
                        <button class="custom-button-account" style="width: fit-content; float: right; font-size: 16px" >
                            Stwórz i dodaj nową treść przedmiotu
                        </button>
                    </a>
                </h2>
               </div>
                        
              <table class="subject-list-table" style="width: 70%; margin: 24px auto">
                  <thead>
                      <tr>
                          <td>id</td>
                          <td>Typ treści</td>
                          <td>Opis</td>
                          <td>Symbole</td>
                          <td>Poziom trudności</td>
                          <td>Więcej</td>
                          <td>Zmień</td>
                          <td>Usuń</td>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($contents as $c)
                          <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ strlen($c->type_of_content) > 20 ? substr($c->type_of_content, 0, 20) . '...' : $c->type_of_content }}</td>
                            <td>{{ strlen($c->content_description) > 60 ? substr($c->content_description, 0, 60) . '...' : $c->content_description }}</td>
                            <td>{{ strlen($c->tags) > 20 ? substr($c->tags, 0, 20) . '...' : $c->tags }}</td>
                            <td>{{ strlen($c->difficulty_level) > 10 ? substr($c->difficulty_level, 0, 10) . '...' : $c->difficulty_level }}</td>
                              <td>
                                <a href="{{ route('detailedContent', ['id' => $c->id]); }}">
                                    <img src={{ asset('images/see.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('editContent', ['id' => $c->id, 'code' => $code, 'contents' => $contents]); }}">
                                    <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('destroyContent', ['id' => $c->id]); }}">
                                    <img src={{ asset('images/delete.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                          </tr>                         
                      @empty
                        <p class="alert">
                            Brak danych. Dodaj treść przedmiotu.
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
