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
                  
              <div style="margin:5% auto; width: 900px;">
              <h2>Zmodyfikuj efekt przedmiotu</h2>
              <br>

              <form class="edit-form" method="post" action="{{ route('updateEffect', ['id' => $id, 'code' => $code]) }}">
                  @csrf 
                  <table>
                      <tr>
                          <td><label for="symbol">Symbol:</label></td>
                          <td style="width: 80%"><input type="text" name="symbol" id="symbol" class="form-input-fill" required maxlength="100" value="{{$effect->symbol}}"></td>
                      </tr>
                      <tr>
                        <td><label for="category_effects_id">Kategorie efektu:</label></td>
                        <td>
                            <select class="custom-input-edit" name="category_effects_id" style="background: white">
                                <option value="1" @if($effect->category_effects_id == "wiedza") selected @endif>Wiedza</option>
                                <option value="2" @if($effect->category_effects_id == "umiejetnosci") selected @endif>Umiejętności</option>
                                <option value="3" @if($effect->category_effects_id == "kompetencje spoleczne") selected @endif>Kompetencje społeczne</option>
                            </select>
                        </td>
                      </tr>
                      <tr>
                          <td><label for="description">Opis:</label></td>
                          <td><textarea name="description" id="description"  rows="4" maxlength="2000" required>{{$effect->description}}</textarea></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="custom-button-account" style="width: 100%" type="submit" value="Zatwierdź zmiany"></td>
                      </tr>
                  </table>
              </form>
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
