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
                      <td style="width: 40%">Szczegóły</td>
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
                          <b id="title-other_way_of_teaching"></b>
                        </td>
                        <td>
                          <i id="format-other_way_of_teaching"></i>                
                        </td>
                        <td>
                          <textarea 
                          class="custom-input-edit" 
                          style="height:100px;" 
                          name="other_way_of_teaching" 
                          >{{ $sylabusSuplementary->other_way_of_teaching }}</textarea>
                        </td>
                        <td>
                          <i id="comment-other_way_of_teaching"></i>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-form_of_assessment"></b>
                        </td>
                        <td>
                          <i id="format-form_of_assessment"></i>                
                        </td>
                        <td>
                          <select class="custom-input-edit" name="form_of_assessment" style="background: white">
                            <option value="Egzamin" @if($sylabusSuplementary->form_of_assessment == "Egzamin") selected @endif>Egzamin</option>
                            <option value="Zaliczenie na ocene" @if($sylabusSuplementary->form_of_assessment == "Zaliczenie na ocene") selected @endif>Zaliczenie na ocene</option>
                            <option value="Zaliczenie bez oceny" @if($sylabusSuplementary->form_of_assessment == "Zaliczenie bez oceny") selected @endif>Zaliczenie bez oceny</option>
                          </select>
                        </td>
                        <td>
                          <i id="comment-form_of_assessment"></i>
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <b id="title-participation_of_ects_for_number_of_hours_lecturer"></b>
                        </td>
                        <td>
                          <i id="format-participation_of_ects_for_number_of_hours_lecturer"></i>                
                        </td>
                        <td>
                          <input 
                          class="custom-input-edit"
                          type="number" 
                          step="any"
                          name="participation_of_ects_for_number_of_hours_lecturer" 
                          value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer }}" 
                          >
  
                        </td>
                        <td>
                          <i id="comment-participation_of_ects_for_number_of_hours_lecturer"></i>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-participation_of_ects_for_number_of_hours_online"></b>
                        </td>
                        <td>
                          <i id="format-participation_of_ects_for_number_of_hours_online"></i>                
                        </td>
                        <td>
                          <input 
                        class="custom-input-edit" 
                        type="number" 
                        step="any"
                        name="participation_of_ects_for_number_of_hours_online" 
                        value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_online }}" 
                        >
                        </td>
                        <td>
                          <i id="comment-participation_of_ects_for_number_of_hours_online"></i>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-participation_of_ects_for_number_of_hours_own_work"></b>
                        </td>
                        <td>
                          <i id="format-participation_of_ects_for_number_of_hours_own_work"></i>                
                        </td>
                        <td>
                          <input 
                          class="custom-input-edit" 
                          type="number" 
                          name="participation_of_ects_for_number_of_hours_own_work" 
                          step="any"
                          value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_own_work }}" 
                          >
                        </td>
                        <td>
                          <i id="comment-participation_of_ects_for_number_of_hours_own_work"></i>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-description_of_the_prequesities"></b>
                        </td>
                        <td>
                          <i id="format-description_of_the_prequesities"></i>                
                        </td>
                        <td>
                          <input 
                          class="custom-input-edit" 
                          type="text" 
                          name="description_of_the_prequesities" 
                          value="{{ $sylabusSuplementary->description_of_the_prequesities }}" 
                          >
                        </td>
                        <td>
                          <i id="comment-description_of_the_prequesities"></i>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-language_of_lessons"></b>
                        </td>
                        <td>
                          <i id="format-language_of_lessons"></i>                
                        </td>
                        <td>
                          <select class="custom-input-edit" name="language_of_lessons" style="background: white">
                            <option value="Polski" @if($sylabusSuplementary->language_of_lessons == "Polski") selected @endif>Polski</option>
                            <option value="Angielski" @if($sylabusSuplementary->language_of_lessons == "Angielski") selected @endif>Angielski</option>
                          </select>
                        </td>
                        <td>
                          <i id="comment-language_of_lessons"></i>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-list_of_primary_literature_to_the_subject"></b>
                        </td>
                        <td>
                          <i id="format-list_of_primary_literature_to_the_subject"></i>                
                        </td>
                        <td>
                          <textarea 
                          class="custom-input-edit" 
                          style="height:100px;" 
                          name="list_of_primary_literature_to_the_subject" 
                          >{{ $sylabusSuplementary->list_of_primary_literature_to_the_subject }}</textarea>
                        </td>
                        <td>
                          <i id="comment-list_of_primary_literature_to_the_subject"></i>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-list_of_suplementary_literature_to_the_subject"></b>
                        </td>
                        <td>
                          <i id="format-list_of_suplementary_literature_to_the_subject"></i>                
                        </td>
                        <td>
                          <textarea 
                            class="custom-input-edit" 
                            style="height:100px;" 
                            name="list_of_suplementary_literature_to_the_subject" 
                            >{{ $sylabusSuplementary->list_of_suplementary_literature_to_the_subject }}</textarea>
                        </td>
                        <td>
                          <i id="comment-list_of_suplementary_literature_to_the_subject"></i>

                        </td>
                      </tr>

                      <tr>
                        <td>
                          <b id="title-lecturers_competence_to_teach_the_subject"></b>
                        </td>
                        <td>
                          <i id="format-lecturers_competence_to_teach_the_subject"></i>                
                        </td>
                        <td>
                          <input 
                            class="custom-input-edit" 
                            type="text" 
                            name="lecturers_competence_to_teach_the_subject" 
                            value="{{ $sylabusSuplementary->lecturers_competence_to_teach_the_subject }}">
                        </td>
                        <td>
                          <i id="comment-lecturers_competence_to_teach_the_subject"></i>

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
          'other_way_of_teaching',
          'form_of_assessment',
          'participation_of_ects_for_number_of_hours_lecturer',
          'participation_of_ects_for_number_of_hours_online',
          'participation_of_ects_for_number_of_hours_own_work',
          'description_of_the_prequesities',
          'language_of_lessons',
          'list_of_primary_literature_to_the_subject',
          'list_of_suplementary_literature_to_the_subject',
          'lecturers_competence_to_teach_the_subject',
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
        'Inne formy nauczania',
        'Forma zaliczenia',
        'Udział ECTS za liczbę godzin z wykładowcą',
        'Udział ECTS za liczbę godzin online',
        'Udział ECTS za liczbę godzin pracy własnej',
        'Opis warunków wstępnych',
        'Język wykładów',
        'Lista podstawowej literatury do przedmiotu',
        'Lista uzupełniającej literatury do przedmiotu ',
        'Kompetencje prowadzącego przedmiot ',
      ];
      
      let polish_comments = [
        'Wewnętrzny identyfikator przedmiotu',
        'Pełna, oficjalna nazwa przedmiotu',
        'Typ studiów',
        'Po zaliczeniu przedmiotu należy wybrać jaką specjalzacje moze uzyskać student',
        'Stopnie: Iżynierskie lub magisterskie',
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
        ' 	Należy opisać inne formy prowadznia zajęć, w przypadku gdy występują wpólnie ze wskazanymi w rodzaju ćwiczeń. Oprócz podania dodatkowej formy prowadzenia zajęć, należy podać liczbę godzin przeznaczonych na tę formę, np. ćwiczenia terenowe (5 godz.)',
        '',
        '',
        '',
        '',
        '',
        'Polski lub angielski',
        'Spis literatury podstawowej do przedmiotu. W przypadku przedmiotów podstawowych i kierunkowych proszę również wskazać wymagany podręcznik lub podręczniki zawierające potrzebne treści.',
        'Spis literatury uzupełniającej do przedmiotu',
        'Należy wpisać publikacje tematycznie związane z prowadzonym przedmiotem, ukończone studia podyplomowe, doświadczenie zawodowe, wykonane zbiory dokumentacji, ekspertyzy, operaty techniczne, itp. ',
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
        'tekst (200 zn.)',
        'tekst (100 zn.)',
        'liczba',
        'liczba',
        'liczba',
        'tekst (200 zn.)',
        'tekst (100 zn.)',
        'tekst (2000 zn.)',
        'tekst (2000 zn.)',
        'tekst (1000 zn.)',
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
