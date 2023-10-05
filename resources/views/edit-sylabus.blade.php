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
                <table class="edit-table">
                    <tr>
                        <td style="width:10%">
                            
                        </td>
                        <td style="width:30%">
                            <form class="edit-form" action="{{ route('change', ['code' => $code, 'id' => $id]) }}" method="POST">
                                <div style="height: 800px; overflow-y: scroll; width: 100%;">
                                    <div class="edit-title-box">
                                        <h1><i>{{$sylabus->name_subject}}</i> </h1>
                                    </div>
                                    @csrf
                                    @method('PUT')                                   
                                        
                                    <label for="code_subject"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="code_subject" value="{{ $sylabus->code_subject }}" disabled>
                                    Kod przedmiotu<br>

                                    <label for="name_subject"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="name_subject" value="{{ $sylabus->name_subject }}" disabled>
                                    Nazwa przedmiotu<br>
                            
                                    <label for="type_study"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="type_study" value="{{ $sylabus->type_study }}" disabled>
                                    Typ studiów<br>

                                    <label for="speciality"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="speciality" value="{{ $sylabus->speciality }}" disabled>
                                    Specjalność<br>

                                    <label for="degree"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="degree" value="{{ $sylabus->degree }}" disabled>
                                    Stopień<br>
                                    
                                    <label for="semester"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="semester" value="{{ $sylabus->semester }}" disabled>
                                    Semestr<br>
                                    
                                    <label for="chair_id"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="chair_id" value="{{ $sylabus->chair_id }}" disabled>
                                    Katedra<br>
                                    
                                    @if ($sylabusSuplementary != null)
                                        <label for="other_way_of_teaching"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                        <input class="custom-input-edit" type="text" name="other_way_of_teaching" value="{{ $sylabusSuplementary->other_way_of_teaching ? $sylabusSuplementary->other_way_of_teaching : '' }}" required>
                                        Inne sposoby nauczania<br>
                                    @endif
                                    
                                    @if ($sylabusSuplementary != null)
                                    <label for="form_of_assessment"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                    <input class="custom-input-edit" type="text" name="form_of_assessment" value="{{ $sylabusSuplementary->form_of_assessment ? $sylabusSuplementary->form_of_assessment : '' }}" required>
                                    Forma zaliczniowa<br>
                                    @endif

                                    @if ($sylabusSuplementary != null)
                                    <div style="height: 50px">
                                        <label for="participation_of_ects_for_number_of_hours_lecturer"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                        <input class="custom-input-edit" type="text" name="participation_of_ects_for_number_of_hours_lecturer" value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer ? $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer : '' }}" required>
                                        <div class="edit-input-name">Udział w ECTS za liczbę godzin prowadzącego</div> 
                                    </div>
                                    @endif

                                    @if ($sylabusSuplementary != null)
                                    <div style="height: 50px">
                                        <label for="participation_of_ects_for_number_of_hours_lecturer"><img src="{{ asset('images/question.png') }}" class="img-info-question-mark"></label>
                                        <input class="custom-input-edit" type="text" name="participation_of_ects_for_number_of_hours_lecturer" value="{{ $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer ? $sylabusSuplementary->participation_of_ects_for_number_of_hours_lecturer : '' }}" required>
                                        <div class="edit-input-name">Udział w ECTS za liczbę godzin prowadzącego</div> 
                                    </div>
                                    @endif
                                        
                                    
                                    
                                    
                                </div>
                                <button class="custom-button-account" type="submit" style="width:505px">Zapisz zmiany</button>
                                </form>
                        </td>
                        <td style="width:20%">
                            <div class="hidden-help-info">
                                <div id="content-code_subject">
                                    <h2>Code subject</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-name_subject">
                                    <h2>Name subject</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-type_study">
                                    <h2>Type Study</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-speciality">
                                    <h2>Speciality</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-degree">
                                    <h2>Degree</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-semester">
                                    <h2>Semester</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-chair_id">
                                    <h2>Chair</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-other_way_of_teaching">
                                    <h2>Other way of teaching</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-form_of_assessment">
                                    <h2>From of assessment</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <div id="content-participation_of_ects_for_number_of_hours_with_lecturer">
                                    <h2>Participation of ects for number of hours with lecturer</h2>
                                    <article>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum porro voluptates nam eaque iste itaque? Nemo eaque facere quia odio, aliquam laudantium totam reiciendis, laboriosam ea minus soluta quasi! Animi.
                                    </article>
                                </div>
                                <script>
                                    
                                    let labelFors = [
                                        "content-code_subject",
                                        "content-name_subject",
                                        "content-type_study",
                                        "content-speciality",
                                        "content-degree",
                                        "content-semester",
                                        "content-chair_id",
                                        "content-other_way_of_teaching",
                                        "content-form_of_assessment",
                                        "content-participation_of_ects_for_number_of_hours_with_lecturer"
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


                                </script>
                                
                            </div>
                        </td>
                    </tr>
                </table>
                
            </div>
            
        
    </body>
</html>
