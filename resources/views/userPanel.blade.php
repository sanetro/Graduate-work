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
                        <a href="{{ route('panel'); }}"><li class="selected-list">Wszystkie przedmioty</li></a>
                        <a href="{{ route('my-sylabuses'); }}"><li>Wyświetl moje przedmioty</li></a>
                        <a href="{{ route('find-sylabuses'); }}"><li>Szukaj przedmiotu lub frazy</li></a>
                        <a href="{{ route('help'); }}"><li>Pomoc oznaczeń</li></a><br>
                    </ol>                    
                </div>
                
                <div class="sub-layout-panel-start">

                    
                    <!-- <div class="panel-action"></div> --> 

                    <div class="panel-list">
                        <p id="list-of-subjects-p" class="header-of-container">Lista wszystkich przedmiotów</p>
                        
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
                                    <td>Sczegóły</td>
                                    <td>Treści</td>
                                    <td>Efekty</td>
                                    <td>Sylabus</td>
                                    <td>Uwagi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sylabus as $s)
                                    <tr>
                                        <td>{{ $s->code_subject }}</td>
                                        <td>{{ $s->name_subject }}</td>
                                        <td>{{ $s->type_study }}</td>
                                        <td>{{ $s->speciality }}</td>
                                        <td>{{ $s->degree }}</td>
                                        <td>{{ $s->semester }}</td>
                                        <td>{{ $s->chair_id }}</td>

                                        <td>
                                            <a href="edit/{{$s->code_subject}}/{{$s->id}}?flag=None">
                                                <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page" alt="Edytuj przedmiot">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="content/{{$s->code_subject}}/{{$s->id}}?flag=None">
                                                <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page" alt="Treści przedmiotu">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="effect/{{$s->code_subject}}/{{$s->id}}?flag=None">
                                                <img src={{ asset('images/edit-icon.png') }} class="link-open-in-new-page" alt="Efekty przedmiot">
                                            </a>
                                        </td>
                                        <td>Sylabus</td>
                                        <td>Uwagi</td>
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

                </div>           


                  
                
                
            </div>
        
    </body>
</html>
