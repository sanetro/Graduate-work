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
               <p id="list-of-subjects-p" class="header-of-container">Lista wszystkich przedmiotów</p>

                    <a href="{{ route("addContent", ['code'=> $code, 'id' => $id]) }}">
                        <button class="custom-button-account" style="width: fit-content">
                            Stwórz i dodaj treść przedmiotu
                        </button>
                    </a>
               </div>
                        
              <table class="subject-list-table">
                  <thead>
                      <tr>
                          <td>id</td>
                          <td>type_of_content</td>
                          <td>content_description</td>
                          <td>tags</td>
                          <td>difficulty_level</td>
                          <td>... wykładowcą</td>
                          <td>... ćwiczenia</td>
                          <td>... seminaria</td>
                          <td>Zmień</td>
                          <td>Usuń</td>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($contents as $c)
                          <tr>
                              <td>{{ $c->id }}</td>
                              <td>{{ $c->type_of_content }}</td>
                              <td>{{ $c->content_description }}</td>
                              <td>{{ $c->tags }}</td>
                              <td>{{ $c->difficulty_level }}</td>
                              <td>{{ $c->method_of_veryfication_for_evaluation_of_lecturer }}</td>
                              <td>{{ $c->method_of_veryfication_for_evaluation_of_exercise }}</td>
                              <td>{{ $c->method_of_veryfication_for_evaluation_of_seminars }}</td>
                              <td>
                                <a href="{{ route('editContent', ['id' => $c->id]); }}">
                                    <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                              <td>
                                <a href="{{ route('destroyContent', ['id' => $c->id]); }}">
                                    <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page">
                                </a>
                              </td>
                          </tr>                                
                      @empty
                          <p class="warnning">
                              Rekord jest pusty
                              <img src="{{ asset('images/open-on-new-page.png') }}" class="link-open-in-new-page">
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
