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

                <div class="panel-box">
                    <ol class="action-list-type">
                        <a href="{{ route('panel'); }}"><li>Wszystkie przedmioty</li></a>
                        <a href="{{ route('my-sylabuses'); }}"><li>Wyświetl moje przedmioty</li></a>
                        <a href="{{ route('find-sylabuses'); }}"><li class="selected-list">Szukaj przedmiotu lub frazy</li></a>
                        <a href="{{ route('welcome'); }}"><li>Pomoc oznaczeń</li></a>     
                        <a href="{{ route('welcome'); }}"><li>Opcja zarządzająca 2</li></a>
                        <a href="{{ route('welcome'); }}"><li>Opcja zarządzająca 3</li></a>
                        <a href="{{ route('welcome'); }}"><li>Opcja zarządzająca 4</li></a>                        
                        <a href="{{ route('welcome'); }}"><li>Opcja zarządzająca 5</li></a>
                        <a href="{{ route('welcome'); }}"><li>Opcja zarządzająca 6</li></a><br>
                    </ol>                    
                </div>
                
                <div class="sub-layout-panel-start">

                    
                    <!-- <div class="panel-action"></div> --> 

                    <div class="panel-list">
                        <p id="list-of-subjects-p" class="header-of-container">
                            Szukaj przedmiotu lub frazy
                            <form action="{{ route('find-sylabuses') }}" method="POST" class="searching-form">
                                @csrf
                                
                                    <p>Wybierz opcję wyszukiwania:</p>

                                    <div class="order-radio-box">
                                        <input type="radio" id="option1" name="searchOption" value="dsadadasdasdasdasd">
                                        <label for="option1">Szukaj po wszystkich kolumnach</label>
                                        <div id="container1" class="hidden-content">
                                            <button type="submit" class="custom-button-account">Szukaj</button>
                                        </div>
                                    </div>
                            
                                    <div class="order-radio-box">
                                        <input type="radio" id="option2" name="searchOption" value="single">
                                        <label for="option2">Szukaj po wybranej kolumnie:</label>

                                        <div id="container2" class="hidden-content">
                                            <select id="selectedColumn" name="selectedColumn" onclick="unlockContent()" disabled>
                                                <option value="code_subject">Kod przedmiotu</option>
                                                <option value="name_subject">Nazwa przedmiotu</option>
                                                <option value="coordinators">Koordynatorzy</option>
                                                <option value="type_study">Typ studiów</option>
                                                <option value="specialization">Specjalizacja</option>
                                                <option value="degree">Stopień studiów</option>
                                                <option value="semester">Semester</option>
                                                <!-- Dodaj więcej opcji dla innych kolumn -->
                                            </select>
                                            <button type="submit" class="custom-button-account">Szukaj</button>
                                        </div>
                                    </div>

                                    <div class="order-radio-box">
                                        <input type="radio" id="option3" name="searchOption" value="range">
                                        <label for="option3">Szukaj po wybranej kolumnie w danym przedziale:</label>
                                        <div id="container3" class="hidden-content">

                                            <select id="selectedRangeColumn" name="selectedRangeColumn" disabled>
                                                <option value="kod_przedmiotu">Kod przedmiotu</option>
                                                <option value="nazwa_przedmiotu">Nazwa przedmiotu</option>
                                                <option value="typ_studiow">Typ studiów</option>
                                                <!-- Dodaj więcej opcji dla innych kolumn -->
                                            </select>
                                            <input type="text" id="rangeStart" name="rangeStart" placeholder="Początek" disabled>
                                            <input type="text" id="rangeEnd" name="rangeEnd" placeholder="Koniec" disabled>
                                        </div>
                                    </div>
                                                                
                                
                            
                                <script>
                                    let option1 = document.getElementById('option1');
                                    let container1 = document.getElementById('container1');
                                    
                                    let option2 = document.getElementById('option2');
                                    let container2 = document.getElementById('container2');

                                    let option3 = document.getElementById('option3');
                                    let container3 = document.getElementById('container3');
                            

                                    option1.addEventListener('change', function() {
                                        if (this.checked) {
                                            container1.style.display = "block";
                                            container2.style.display = "none";
                                            container3.style.display = "none";
                                            
                                        }
                                    });
                                    
                            
                                    option2.addEventListener('change', function() {
                                        if (this.checked) {
                                            container1.style.display = "none";
                                            container2.style.display = "block";
                                            container3.style.display = "none";
                                        }
                                    });

                                    option3.addEventListener('change', function() {
                                        if (this.checked) {
                                            container1.style.display = "none";
                                            container2.style.display = "none";
                                            container3.style.display = "block";
                                        }
                                    });

                                </script>
                            </form>
                        </p>
                        
                        <table class="subject-list-table">
                            <thead>
                                <tr>
                                    <td>Kod przedmiotu</td>
                                    <td>Nazwa</td>
                                    <td>Koordynator/rzy</td>
                                    <td>Rodzaj studiów</td>
                                    <td>Specjalizacja</td>
                                    <td>Stopień Studiów</td>
                                    <td>Semestr</td>
                                    <td>SZG</td>
                                    <td>TRP</td>
                                    <td>EFP</td>
                                    <td>Sylabus</td>
                                    <td>Uwagi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($userSylabuses as $s)
                                    <tr>
                                        <td>{{ $s->code_subject }}</td>
                                        <td>{{ $s->name_subject }}</td>
                                        <td>{{ $s->type_study }}</td>
                                        <td>{{ $s->speciality }}</td>
                                        <td>{{ $s->degree }}</td>
                                        <td>{{ $s->semester }}</td>
                                        <td>{{ $s->chair_id }}</td>

                                        <td><a href="/"><img src={{ asset('images/open-on-new-page.png') }} class="link-open-in-new-page"/></a></td>
                                        <td><a href="/"><img src={{ asset('images/open-on-new-page.png') }} class="link-open-in-new-page"/></a></td>
                                        <td><a href="/"><img src={{ asset('images/open-on-new-page.png') }} class="link-open-in-new-page"/></a></td>
                                        <td>Sylabus</td>
                                        <td>Uwagi</td>
                                    </tr>                                
                                @empty
                                    <p>Rekord jest pusty</p>
                                @endforelse
                            </tbody> 
                        </table>
                    </div>

                </div>           


                  
                
                
            </div>
        
    </body>
</html>
