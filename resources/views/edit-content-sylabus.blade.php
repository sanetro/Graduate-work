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
              <h2>Zmodyfikuj treść przedmiotu</h2>
              <br>
              <form class="edit-form" method="post" action="{{ route('updateContent', ['id' => $id]) }}">
                  @csrf 
                  <table>
                      <tr>
                          <td><label for="type_of_content">Rodzaj treść:</label></td>
                          <td style="width: 80%"><input type="text" name="type_of_content" id="type_of_content" class="form-input-fill" required value="{{$contents->type_of_content}}"></td>
                      </tr>
                      <tr>
                          <td><label for="content_description">Opis:</label></td>
                          <td><textarea name="content_description" id="content_description"  rows="4" required>{{$contents->content_description}}</textarea></td>
                      </tr>
                      <tr>
                          <td><label for="tags">Tagi:</label></td>
                          <td><input type="text" name="tags" id="tags" class="form-input-fill" value="{{$contents->tags}}"></td>
                      </tr>
                      <tr>
                          <td><label for="difficulty_level">Poziom trudności:</label></td>
                          <td><input type="text" name="difficulty_level" id="difficulty_level" class="form-input-fill" required value="{{$contents->difficulty_level}}"></td>
                      </tr>
                      <tr>
                          <td><label for="method_of_veryfication_for_evaluation_of_lecturer">Metoda weryfikacji (wykładowca):</label></td>
                          <td><textarea name="method_of_veryfication_for_evaluation_of_lecturer" id="verification_lecturer" rows="4" required>{{$contents->method_of_veryfication_for_evaluation_of_lecturer}}</textarea></td>
                      </tr>
                      <tr>
                          <td><label for="method_of_veryfication_for_evaluation_of_exercise">Metoda weryfikacji (ćwiczenia):</label></td>
                          <td><textarea name="method_of_veryfication_for_evaluation_of_exercise" id="verification_exercise"  rows="4" required>{{$contents->method_of_veryfication_for_evaluation_of_exercise}}</textarea></td>
                      </tr>
                      <tr>
                          <td><label for="method_of_veryfication_for_evaluation_of_seminars">Metoda weryfikacji (seminaria):</label></td>
                          <td><textarea name="method_of_veryfication_for_evaluation_of_seminars" id="verification_seminars" rows="4" required>{{$contents->method_of_veryfication_for_evaluation_of_seminars}}</textarea></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="custom-button-account" style="width: 100%" type="submit" value="Dodaj"></td>
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
