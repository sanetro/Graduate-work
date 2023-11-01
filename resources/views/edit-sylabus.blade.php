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
          
                <table class="edit-table">
                  
                    <tr>
                        
                        <td style="width:50%">
                            <form class="edit-form" action="{{ route('change', ['code' => $code, 'id' => $id]) }}" method="POST">
                                <div style="height: 800px; overflow-y: scroll; width: 100%;">
                                    <div class="edit-title-box">
                                        <h1><i>{{$sylabus->name_subject}}</i> </h1>
                                    </div>

                                    @csrf
                                    @method('POST')

                                    @foreach ($sylabus->getFillable() as $s)
                                        <label for="{{ $s }}">
                                            <img 
                                                src="{{ asset('images/question.png') }}" 
                                                class="img-info-question-mark" 
                                                id="{{ $s }}-image">
                                        </label>
                                        <input  
                                                class="custom-input-edit" 
                                                type="text" 
                                                name="{{ $s }}" 
                                                value="{{ $sylabus[$s] }}" 
                                                disabled>

                                        <i id="{{ $s }}"></i><br>
                                    @endforeach

                                  @if ($sylabusSuplementary != null)
                                        
                                    
                                  <b>Inna forma nauczania</b><br>

                                    <label for="other_way_of_teaching">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="text" 
                                      name="other_way_of_teaching" 
                                      value="{{ $sylabusSuplementary->other_way_of_teaching }}" 
                                      required>


                                  <i id="other_way_of_teaching"></i><br>
                                                
                                  <b>Forma zaliczenia</b><br>
                                  <label for="form_of_assessment">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <select class="custom-input-edit" name="form_of_assessment" style="background: white">                                 ">
                                    <option value="Egzamin" @if($sylabusSuplementary->form_of_assessment == "Egzamin") selected @endif>Egzamin</option>
                                    <option value="Projekt" @if($sylabusSuplementary->form_of_assessment == "Projekt") selected @endif>Projekt</option>
                                    <option value="Udział" @if($sylabusSuplementary->form_of_assessment == "Udział") selected @endif>Udział</option>
                                  </select>

                                  <i id="form_of_assessment"></i><br>
                                  
                                  <b>Udział ECTS za liczbę godzin z wykładowcą</b><br>
                                  
                                  <label for="participation_of_ects_for_number_of_hours_lecturer">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="number" 
                                      name="participation_of_ects_for_number_of_hours_lecturer" 
                                      value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer }}" 
                                      required>

                                  <i id="participation_of_ects_for_number_of_hours_lecturer"></i><br>
                                  
                                  <b>Udział ECTS za liczbę godzin online</b><br>

                                  <label for="participation_of_ects_for_number_of_hours_online">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="number" 
                                      name="participation_of_ects_for_number_of_hours_online" 
                                      value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_online }}" 
                                      required>

                                  <i id="participation_of_ects_for_number_of_hours_online"></i><br>
                                                                          
                                  <b>Udział ECTS za liczbę godzin pracy własnej</b><br>

                                  <label for="participation_of_ects_for_number_of_hours_own_work">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="number" 
                                      name="participation_of_ects_for_number_of_hours_own_work" 
                                      value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_own_work }}" 
                                      required>

                                  <i id="participation_of_ects_for_number_of_hours_own_work"></i><br>
                                  
                                  <b>Opis warunków wstępnych</b><br>
                                                                          
                                  <label for="description_of_the_prequesities">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="text" 
                                      name="description_of_the_prequesities" 
                                      value="{{ $sylabusSuplementary->description_of_the_prequesities }}" 
                                      required>

                                  <i id="description_of_the_prequesities"></i><br>
                                                                    
                                  <b>Język wykładów</b><br>

                                  <label for="language_of_lessons">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="text" 
                                      name="language_of_lessons" 
                                      value="{{ $sylabusSuplementary->language_of_lessons }}" 
                                      required>

                                  <i id="language_of_lessons"></i><br>
                                                    
                                  <b>Lista podstawowej literatury do przedmiotu</b><br>

                                  <label for="list_of_primary_literature_to_the_subject">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <textarea 
                                    class="custom-input-edit" 
                                    style="height:100px;" 
                                    name="list_of_primary_literature_to_the_subject" 
                                    required>{{ $sylabusSuplementary->list_of_primary_literature_to_the_subject }}
                                  </textarea>


                                  <i id="list_of_primary_literature_to_the_subject"></i><br>
                                                                          
                                  <b>Lista uzupełniającej literatury do przedmiotu</b><br>

                                  <label for="list_of_suplementary_literature_to_the_subject">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <textarea 
                                      class="custom-input-edit" 
                                      style="height:100px;" 
                                      name="list_of_suplementary_literature_to_the_subject" 
                                      required>{{ $sylabusSuplementary->list_of_suplementary_literature_to_the_subject }}
                                   </textarea>

                                  <i id="list_of_suplementary_literature_to_the_subject"></i><br>
                                                                          
                                  <b>Kompetencje prowadzącego przedmiot</b><br>

                                  <label for="lecturers_competence_to_teach_the_subject">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="text" 
                                      name="lecturers_competence_to_teach_the_subject" 
                                      value="{{ $sylabusSuplementary->lecturers_competence_to_teach_the_subject }}" 
                                      required>

                                  <i id="lecturers_competence_to_teach_the_subject"></i><br>
                                                                          
                                  <label for="directional_effects_id">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="text" 
                                      name="directional_effects_id" 
                                      value="{{ $sylabusSuplementary->directional_effects_id }}" 
                                      required>

                                  <i id="directional_effects_id"></i><br>
                                                                          
                                  <label for="subject_effects_id">
                                      <img 
                                          src="{{ asset('images/question.png') }}" 
                                          class="img-info-question-mark">
                                  </label>
                                  <input 
                                      class="custom-input-edit" 
                                      type="text" 
                                      name="subject_effects_id" 
                                      value="{{ $sylabusSuplementary->subject_effects_id}}" 
                                      required>

                                  <i id="subject_effects_id"></i><br>
                                  @endif
                                    
                                </div>
                                <button class="custom-button-account" type="submit" style="width:505px">Zapisz zmiany</button>
                            </form>
                        </td>
                        <td>
                            <div class="hidden-help-info">
                                 <div id="content-code_subject">
                                    <h2>Kod przedmiotu</h2>
                                    <article>
                                      [Enter code subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-name_subject">
                                    <h2>Nazwa przedmiotu</h2>
                                    <article>
                                      [Enter subject name here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-type_study">
                                    <h2>Typ studiów</h2>
                                    <article>
                                      [Enter study type here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-speciality">
                                    <h2>Specjalność</h2>
                                    <article>
                                      [Enter speciality here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-degree">
                                    <h2>Stopień</h2>
                                    <article>
                                      [Enter degree here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-semester">
                                    <h2>Semestr</h2>
                                    <article>
                                      [Enter semester here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-chair_id">
                                    <h2>Katedra</h2>
                                    <article>
                                      [Enter chair ID here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-required">
                                    <h2>Obowiązkowy</h2>
                                    <article>
                                      [Enter whether the subject is required here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-calculator_for_subjects_to_order">
                                    <h2>Kalkulator przedmiotów do zamówienia</h2>
                                    <article>
                                      [Enter whether the subject is in the calculator for subjects to order here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-status_subject">
                                    <h2>Status przedmiotu</h2>
                                    <article>
                                      [Enter the status of the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-ects_summary">
                                    <h2>Podsumowanie ECTS</h2>
                                    <article>
                                      [Enter the ECTS summary for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-total_number_of_hours">
                                    <h2>Łączna liczba godzin</h2>
                                    <article>
                                      [Enter the total number of hours for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-lectures_number_of_hours">
                                    <h2>Liczba godzin wykładów</h2>
                                    <article>
                                      [Enter the number of lecture hours for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-seminars_number_of_hours">
                                    <h2>Liczba godzin seminariów</h2>
                                    <article>
                                      [Enter the number of seminar hours for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-exercise_number_of_hours">
                                    <h2>Liczba godzin ćwiczeń</h2>
                                    <article>
                                      [Enter the number of exercise hours for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-type_of_exercise">
                                    <h2>Typ ćwiczeń</h2>
                                    <article>
                                      [Enter the type of exercise for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-direction_name">
                                    <h2>Nazwa kierunku</h2>
                                    <article>
                                      [Enter the name of the direction for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-subject_content_id">
                                    <h2>ID treści przedmiotu</h2>
                                    <article>
                                      [Enter the ID of the subject content here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-number_of_hours_with_lecturer">
                                    <h2>Liczba godzin z wykładowcą</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-number_of_hours_of_consultation">
                                    <h2>Liczba godzin konsultacji</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-number_of_hours_participation_in_research">
                                    <h2>Liczba godzin uczestnictwa w badaniach</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-number_of_hours_mandatory_practices_and_internships">
                                    <h2>Liczba godzin w obowiązkowych praktykach i stażach</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-number_of_hours_participations_in_the_exam_and_credits">
                                    <h2>Liczba godzin na egzaminach i kryteriach</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-number_of_hours_online_classes">
                                    <h2>Liczba godzin prowdzonych zajęć online</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-number_of_hours_own_work">
                                    <h2>Liczba godzin pracy własnej</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-study_profile">
                                    <h2>Profil studiów</h2>
                                    <article>
                                      [Enter the number of hours with the lecturer for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-other_way_of_teaching">
                                    <h2>Inna forma nauczania</h2>
                                    <article>
                                      [dsadas]
                                    </article>
                                  </div>

                                  <div id="content-form_of_assessment">
                                    <h2>Forma zaliczenia</h2>
                                    <article>
                                      Prowadzący przedmiot może wybrać formę zaliczenia.
                                      Przykład: Egzamin, projekt lub udział w zajęciach.  
                                    </article>
                                  </div>

                                  <div id="content-participation_of_ects_for_number_of_hours_lecturer">
                                    <h2>Udział ECTS za liczbę godzin z wykładowcą</h2>
                                    <article>Liczba punktów przedzielana dla studenta podczas godzin z wykładowcą
                                    </article>
                                  </div>
                                  
                                  <div id="content-participation_of_ects_for_number_of_hours_online">
                                    <h2>Udział ECTS za liczbę godzin online</h2>
                                    <article>
                                      [Enter the ECTS participation for the number of hours online for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-participation_of_ects_for_number_of_hours_own_work">
                                    <h2>Udział ECTS za liczbę godzin pracy własnej</h2>
                                    <article>
                                      [Enter the ECTS participation for the number of hours of own work for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-description_of_the_prequesities">
                                    <h2>Opis warunków wstępnych</h2>
                                    <article>
                                      [Enter a description of the prerequisites for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-language_of_lessons">
                                    <h2>Język wykładów</h2>
                                    <article>
                                      [Enter the language of the lessons for the subject here]
                                    </article>
                                  </div>
                                  
                                  <div id="content-list_of_primary_literature_to_the_subject">
                                    <h2>Lista podstawowej literatury do przedmiotu</h2>
                                    <article>
                                      [Enter a list of primary literature for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-list_of_suplementary_literature_to_the_subject">
                                    <h2>Lista uzupełniającej literatury do przedmiotu</h2>
                                    <article>
                                      [Enter a list of primary literature for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-lecturers_competence_to_teach_the_subject">
                                    <h2>Kompetencje prowadzącego przedmiot</h2>
                                    <article>
                                      [Enter a list of primary literature for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-directional_effects_id">
                                    <h2>Effekty kierunkowe</h2>
                                    <article>
                                      [Enter a list of primary literature for the subject here]
                                    </article>
                                  </div>

                                  <div id="content-subject_effects_id">
                                    <h2>Effekty przedmiotu</h2>
                                    <article>
                                      [Enter a list of primary literature for the subject here]
                                    </article>
                                  </div>
                                  
                                <script>
                                    
                                    let labelFors = [
                                        'content-code_subject',
                                        'content-name_subject',
                                        'content-type_study',
                                        'content-speciality',
                                        'content-degree',
                                        'content-semester',
                                        'content-chair_id',
                                        'content-required',
                                        'content-calculator_for_subjects_to_order',
                                        'content-status_subject',
                                        'content-ects_summary',
                                        'content-total_number_of_hours',
                                        'content-lectures_number_of_hours',
                                        'content-seminars_number_of_hours',
                                        'content-exercise_number_of_hours',
                                        'content-type_of_exercise',
                                        'content-direction_name',
                                        'content-subject_content_id',
                                        'content-number_of_hours_with_lecturer',
                                        'content-number_of_hours_of_consultation',
                                        'content-number_of_hours_participation_in_research',
                                        'content-number_of_hours_mandatory_practices_and_internships',
                                        'content-number_of_hours_participations_in_the_exam_and_credits',
                                        'content-number_of_hours_online_classes',
                                        'content-number_of_hours_own_work',
                                        'content-study_profile',
                                        'content-other_way_of_teaching',
                                        'content-form_of_assessment',
                                        'content-participation_of_ects_for_number_of_hours_lecturer',
                                        'content-participation_of_ects_for_number_of_hours_online',
                                        'content-participation_of_ects_for_number_of_hours_own_work',
                                        'content-description_of_the_prequesities',
                                        'content-language_of_lessons',
                                        'content-list_of_primary_literature_to_the_subject',
                                        'content-list_of_suplementary_literature_to_the_subject',
                                        'content-lecturers_competence_to_teach_the_subject',
                                        'content-directional_effects_id',
                                        'content-subject_effects_id',
                                    ];


                                    
                                    for (let i = 0; i < labelFors.length; i++) {
                                        let id = labelFors[i];
                                        let element = document.getElementById(id);
                                        if (element) {
                                            element.style.display = "none";
                                        }
                                    }

                                    let images = document.querySelectorAll('.img-info-question-mark');

                                    images.forEach(img => {
                                        img.addEventListener('click', function() {
                                            try 
                                            {
                                                for (let i = 0; i < labelFors.length; i++) {
                                                    let id = labelFors[i];
                                                    let element = document.getElementById(id);
                                                    if (element) {
                                                        element.style.display = "none";
                                                    }
                                                }
                                                
                                                let label = img.parentNode;

                                                let forAttribute = label.getAttribute('for');

                                                if (forAttribute) {
                                                    let content = document.getElementById("content-" + forAttribute);
                                                    if (content) {
                                                        content.style.display = 'block';
                                                    } else {
                                                        throw new Error('Missing ID: content-' + forAttribute);
                                                    }
                                                } else {
                                                    throw new Error('Not include.');
                                                }

                                            } 
                                            catch (error) 
                                            {
                                                console.error('Wystąpił błąd:', error.message);
                                            }
                                        });
                                    });
                                  
                                  // Delete success message after 8s
                                  setTimeout(function() {
                                      var successMessage = document.querySelector('.success');
                                      var warnMessage = document.querySelector('.warn');
                                      if (successMessage) successMessage.style.display = 'none';
                                      if (warnMessage) warnMessage.style.display = 'none';                                      
                                  }, 8000);

                                </script>
                                
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div>
            
        
    </body>
</html>
