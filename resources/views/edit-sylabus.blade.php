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
          
              <table class="subject-list-table">

                <form class="edit-form" action="{{ route('change', ['code' => $code, 'id' => $id]) }}" method="POST">
                  
                  <thead>
                    <tr>
                      <td>Nazwa</td>
                      <td>Atrybut</td>
                      <td>Szczegóły</td>
                      <td>Komentarz</td>
                    </tr>
                  </thead>
                  
                  <tbody>
                      @csrf
                      @method('POST')

                      @foreach ($sylabus->getFillable() as $s)
                          @if ($s == "chair_id")
                          <tr>
                            <td style="width:20%">
                              <b id="title-{{ $s }}"></b>
                            </td>
                            <td>
                              <i id="format-{{ $s }}"></i>
                            </td>
                            <td>
                              <input  
                                  class="custom-input-edit" 
                                  type="text" 
                                  name="{{ $s }}" 
                                  value="{{ $chair_name }}" 
                                  disabled>
                            </td>
                            <td>
                              <i id="comment-{{ $s }}"></i>
                            </td>
                          </tr>
                          @else
                            <tr>
                              <td style="width:20%">
                                <b id="title-{{ $s }}"></b>
                              </td>
                              <td>
                                <i id="format-{{ $s }}"></i>  
                              </td>
                              <td>
                                <input  
                                    class="custom-input-edit" 
                                    type="text" 
                                    name="{{ $s }}" 
                                    value="{{ $sylabus[$s] }}" 
                                    disabled>
                              </td>
                              <td>
                                <i id="comment-{{ $s }}"></i>
                              </td>
                            </tr>
                          @endif
                          
                      @endforeach

                      @if ($sylabusSuplementary != null)
                      <tr>
                        <td>
                          <b>Inna forma nauczania</b>
                        </td>
                        <td>
                          Niedostępny
                        </td>
                        <td>
                          <input 
                            class="custom-input-edit" 
                            type="text" 
                            name="other_way_of_teaching" 
                            value="{{ $sylabusSuplementary->other_way_of_teaching }}" 
                            required>
                        </td>
                        <td>
                          Wewnętrzny identyfikator przedmiotu
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Forma zaliczenia</b>
                        </td>
                        <td>
                          tekst (100 zn.)
                        </td>
                        <td>
                          <select class="custom-input-edit" name="form_of_assessment" style="background: white">
                            <option value="Egzamin" @if($sylabusSuplementary->form_of_assessment == "Egzamin") selected @endif>Egzamin</option>
                            <option value="Zaliczenie na ocene" @if($sylabusSuplementary->form_of_assessment == "Zaliczenie na ocene") selected @endif>Zaliczenie na ocene</option>
                            <option value="Zaliczenie bez oceny" @if($sylabusSuplementary->form_of_assessment == "Zaliczenie bez oceny") selected @endif>Zaliczenie bez oceny</option>
                          </select>
                        </td>
                        <td>
                          Kod przedmiotu w dokumentacji dotyczącej kształcenia
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <b>Udział ECTS za liczbę godzin z wykładowcą</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <input 
                          class="custom-input-edit"
                          type="number" 
                          name="participation_of_ects_for_number_of_hours_lecturer" 
                          value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer }}" 
                          required>
  
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Udział ECTS za liczbę godzin online</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <input 
                        class="custom-input-edit" 
                        type="number" 
                        name="participation_of_ects_for_number_of_hours_online" 
                        value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_online }}" 
                        required>
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Udział ECTS za liczbę godzin pracy własnej</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <input 
                          class="custom-input-edit" 
                          type="number" 
                          name="participation_of_ects_for_number_of_hours_own_work" 
                          value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_own_work }}" 
                          required>
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Opis warunków wstępnych</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <input 
                          class="custom-input-edit" 
                          type="text" 
                          name="description_of_the_prequesities" 
                          value="{{ $sylabusSuplementary->description_of_the_prequesities }}" 
                          required>
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Język wykładów</b>

                        </td>
                        <td>

                        </td>
                        <td>
                          <input 
                          class="custom-input-edit" 
                          type="text" 
                          name="language_of_lessons" 
                          value="{{ $sylabusSuplementary->language_of_lessons }}" 
                          required>
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Lista podstawowej literatury do przedmiotu</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <textarea 
                          class="custom-input-edit" 
                          style="height:100px;" 
                          name="list_of_primary_literature_to_the_subject" 
                          required>{{ $sylabusSuplementary->list_of_primary_literature_to_the_subject }}</textarea>
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Lista uzupełniającej literatury do przedmiotu</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <textarea 
                            class="custom-input-edit" 
                            style="height:100px;" 
                            name="list_of_suplementary_literature_to_the_subject" 
                            required>{{ $sylabusSuplementary->list_of_suplementary_literature_to_the_subject }}</textarea>
                        </td>
                        <td>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b>Kompetencje prowadzącego przedmiot</b>
                        </td>
                        <td>

                        </td>
                        <td>
                          <input 
                            class="custom-input-edit" 
                            type="text" 
                            name="lecturers_competence_to_teach_the_subject" 
                            value="{{ $sylabusSuplementary->lecturers_competence_to_teach_the_subject }}" 
                            required>
                        </td>
                        <td>

                        </td>
                      </tr>
                      <tr>
                        <td colspan="4">
                          <button class="custom-button-account" type="submit" style="width:100%">Zapisz zmiany</button>
                        </td>
                      </tr>
                     </tbody>
                    @endif
                      
                  </div>
                </form>
            </table>
          </div>        
    </body>

<script>                    
      let original_id_of_inputs = [
          'code_subject',
          'name_subject',
          'type_study',
          'speciality',
          'degree',
          'semester',
          'chair_id',
          'required',
          'calculator_for_subjects_to_order',
          'status_subject',
          'ects_summary',
          'total_number_of_hours',
          'lectures_number_of_hours',
          'seminars_number_of_hours',
          'exercise_number_of_hours',
          'type_of_exercise',
          'direction_name',
          'subject_content_id',
          'number_of_hours_with_lecturer',
          'number_of_hours_of_consultation',
          'number_of_hours_participation_in_research',
          'number_of_hours_mandatory_practices_and_internships',
          'number_of_hours_participations_in_the_exam_and_credits',
          'number_of_hours_online_classes',
          'number_of_hours_own_work',
          'study_profile',
      ];

      let polish_titles = [
        'Kod przedmiotu',
        'Nazwa przedmiotu',
        'Typ studiów',
        'Specjalność',
        'Stopień',
        'Semestr',
        'ID katedry',
        'Wymagany',
        'Kalkulator dla przedmiotów do zamówienia',
        'Status przedmiotu',
        'Podsumowanie ECTS',
        'Całkowita liczba godzin',
        'Liczba godzin wykładów',
        'Liczba godzin seminarium',
        'Liczba godzin ćwiczeń',
        'Typ ćwiczenia',
        'Nazwa kierunku',
        'ID treści przedmiotu',
        'Liczba godzin z wykładowcą',
        'Liczba godzin konsultacji',
        'Liczba godzin uczestnictwa w badaniach',
        'Liczba godzin praktyk obowiązkowych i staży',
        'Liczba godzin uczestnictwa w egzaminach i zaliczeniach',
        'Liczba godzin zajęć online',
        'Liczba godzin własnej pracy',
        'Profil studiów',
      ];
      
      let polish_comments = [
        'Kod przedmiotu',
        'Nazwa przedmiotu',
        'Typ studiów',
        'Specjalność',
        'Stopień',
        'Semestr',
        'ID katedry',
        'Wymagany',
        'Kalkulator dla przedmiotów do zamówienia',
        'Status przedmiotu',
        'Podsumowanie ECTS',
        'Całkowita liczba godzin',
        'Liczba godzin wykładów',
        'Liczba godzin seminarium',
        'Liczba godzin ćwiczeń',
        'Typ ćwiczenia',
        'Nazwa kierunku',
        'ID treści przedmiotu',
        'Liczba godzin z wykładowcą',
        'Liczba godzin konsultacji',
        'Liczba godzin uczestnictwa w badaniach',
        'Liczba godzin praktyk obowiązkowych i staży',
        'Liczba godzin uczestnictwa w egzaminach i zaliczeniach',
        'Liczba godzin zajęć online',
        'Liczba godzin własnej pracy',
        'Profil studiów',
      ];

      let polish_formats = [
        'niedostępny',
        'tekst (100 zn.)',
        'tekst (250 zn.)',
        'tekst (100 zn.)',
        'tekst (250 zn.)',
        'tekst (50 zn.)',
        'tekst (250 zn.)',
        'tekst (250 zn.)',
        'tekst (250 zn.)',
        'tekst (100 zn.)',
        'liczba',
        'liczba',
        'liczba',
        'liczba',
        'liczba',
        'tekst (50 zn.)',
        'tekst (250 zn.)',
        'tekst (250 zn.)',
        'liczba',
        'liczba',
        'liczba',
        'liczba',
        'liczba',
        'liczba',
        'liczba',
        'tekst (100 zn.)',
      ];

    for (let i = 0; i < original_id_of_inputs.length; i++) {
      document.getElementById("comment-"+original_id_of_inputs[i]).textContent = polish_comments[i];
      document.getElementById("title-"+original_id_of_inputs[i]).textContent = polish_titles[i];
      document.getElementById("format-"+original_id_of_inputs[i]).textContent = polish_formats[i];
    }
     
    
    // Delete success message after 8s
    setTimeout(function() {
        var successMessage = document.querySelector('.success');
        var warnMessage = document.querySelector('.warn');
        if (successMessage) successMessage.style.display = 'none';
        if (warnMessage) warnMessage.style.display = 'none';                                      
    }, 8000);

  </script>
</html>
