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
                    <a href="{{route('matrix')}}" >
                        <button class="custom-button-account" class="custom-button-action" style="width: 250px; background: white; color: black;" >
                            Macierz efektów kształcenia
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
                        <a href="{{ route('my-sylabuses'); }}"><li class="selected-list">Wyświetl moje przedmioty</li></a>
                        <a href="{{ route('find-sylabuses'); }}"><li>Szukaj przedmiotu lub frazy</li></a>
                        <a href="{{ route('help'); }}"><li>Pomoc oznaczeń</li></a><br>
                    </ol>                    
                </div>
                
                <div class="sub-layout-panel-start">

                    
                    <!-- <div class="panel-action"></div> --> 

                    <div class="panel-list">
                        <p id="list-of-subjects-p" class="header-of-container">Moja lista przedmiotów</p>
                        
                        <table class="subject-list-table">
                            <thead>
                                <tr>
                                    <td>Kod przedmiotu</td>
                                    <td>Nazwa</td>
                                    <td>Rodzaj studiów</td>
                                    <td>Specjalizacja</td>
                                    <td>Stopień Studiów</td>
                                    <td>Semestr</td>
                                    <td>Katedra</td>
                                    <td>SZG</td>
                                    <td>TRP</td>
                                    <td>EFP</td>
                                    <td>Sylabus</td>
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
                                        <td>{{ $s->chair->name }}</td>

                                        <td>
                                            <a href="{{ route('read', ['code' => $s->code_subject, 'id' => $s->id, 'flag' => 'None']) }}">
                                                <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page" alt="Edytuj przedmiot">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('readContent', ['code' => $s->code_subject, 'id' => $s->id, 'flag' => 'None']) }}">
                                                <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page" alt="Treści przedmiotu">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('readEffect', ['code' => $s->code_subject, 'id' => $s->id, 'flag' => 'None']) }}">
                                                <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page" alt="Efekty przedmiot">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('render', ['id' => $s->id, 'subject_name' => $s->name_subject])}}">
                                                <img src={{ asset('images/see.png') }} class="link-open-in-new-page" >
                                            </a>
                                        </td>
                                    </tr>                                
                                @empty
                                    <div class="alert">
                                        Brak przedmiotów przypisanych do tego konta. Skontaktuj się z administratorem.
                                    </div>
                                @endforelse
                            </tbody> 
                        </table>
                    </div>

                </div>           


                  
                
                
            </div>
        
    </body>
</html>
