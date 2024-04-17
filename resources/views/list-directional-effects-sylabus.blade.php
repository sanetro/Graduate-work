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
               <h2 id="list-of-subjects-p" style="margin-top: 20px">Lista powiązanych efektów kierunkowych <i>{{ $code }}</i></h2>
               </div>
                     
              <table class="subject-list-table" style="width: 70%; margin: 24px auto">
                  <thead>
                      <tr>
                          <td>Symbol</td>
                          <td>Nazwa / Opis</td>
                          <td>Poziom uogólny opisu</td>
                          <td>II poziom opisu</td>
                          <td>Rodzaj efektu</td>
                          <td>Kod dyscypliny</td>
                          <td>Rozlącz</td>
                      </tr>
                  </thead>
                  <tbody>
                    
                    @forelse ($directional_linked_to_subject_effect as $c)
                    <tr>
                        <td>{{ strlen($c->directional_effect_code) > 20 ? substr($c->directional_effect_code, 0, 20) . '...' : $c->directional_effect_code }}</td>
                        <td>{{ $c->direction_name }}</td>
                        <td>{{ strlen($c->universal_effect_code) > 20 ? substr($c->universal_effect_code, 0, 20) . '...' : $c->universal_effect_code }}</td>
                        <td>{{ strlen($c->second_universal_effect_code) > 20 ? substr($c->second_universal_effect_code, 0, 20) . '...' : $c->second_universal_effect_code }}</td>
                        <td>{{ strlen($c->type_of_effect) > 20 ? substr($c->type_of_effect, 0, 20) . '...' : $c->type_of_effect }}</td>
                        <td>{{ strlen($c->link_effect_to_discipline) > 20 ? substr($c->link_effect_to_discipline, 0, 20) . '...' : $c->link_effect_to_discipline }}</td>
                        <td>
                            <a href="{{ route('unspanDirectionalEffect', ['directional_effect_id' => $c->id, 'subject_effect_id' => $subject_effect_id]) }}">
                                <img src="{{ asset('images/delete.png') }}" class="link-open-in-new-page" alt="Połącz przedmiot">
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="alert" style="text-align: center; height: 40px">Brak danych. Dodaj efekt przedmiotu.</td>
                    </tr>
                @endforelse
                
                  </tbody> 
              </table>
              <h2 id="list-of-subjects-p" style="margin-top: 20px">Lista wszystkich efektów kierunkowych <i>{{ $code }}</i></h2>

              <table class="subject-list-table" style="width: 70%; margin: 24px auto">
                <thead>
                    <tr>
                        <td>Symbol</td>
                        <td>Nazwa / Opis</td>
                        <td>Poziom uogólny opisu</td>
                        <td>II poziom opisu</td>
                        <td>Rodzaj efektu</td>
                        <td>Kod dyscypliny</td>
                        <td>Połącz</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($effects as $c)
                        <tr>
                          <td>{{ strlen($c->directional_effect_code) > 20 ? substr($c->directional_effect_code, 0, 20) . '...' : $c->directional_effect_code }}</td>
                          <td>{{ $c->direction_name }}</td>
                          <td>{{ strlen($c->universal_effect_code) > 20 ? substr($c->universal_effect_code, 0, 20) . '...' : $c->universal_effect_code }}</td>
                          <td>{{ strlen($c->second_universal_effect_code) > 20 ? substr($c->second_universal_effect_code, 0, 20) . '...' : $c->second_universal_effect_code }}</td>
                          <td>{{ strlen($c->type_of_effect) > 20 ? substr($c->type_of_effect, 0, 20) . '...' : $c->type_of_effect }}</td>
                          <td>{{ strlen($c->link_effect_to_discipline) > 20 ? substr($c->link_effect_to_discipline, 0, 20) . '...' : $c->link_effect_to_discipline }}</td>
                          <td>
                            @if (!in_array($c->id, $directionalEffectsIds->toArray()))
                                <a href="{{route('spanDirectionalEffect', ['directional_effect_id' => $c->id, 'subject_effect_id' => $subject_effect_id])}}">
                                    <img src={{ asset('images/link.png') }} class="link-open-in-new-page" alt="Scal przedmiot">
                                </a>
                            @endif
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
