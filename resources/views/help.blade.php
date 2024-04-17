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
    <style>
        .panel-list body { font-family: Arial, sans-serif; line-height: 1.6; }
        .panel-list h2, h3 { color: #333; }
        .panel-list h3 { font-size: 30px }
        .panel-list p { margin: 10px 0; }
        .panel-list ul { margin: 10px 20px; }
        .panel-list section { margin: 50px; word-spacing: 2px; wor}
    </style>
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
                        <a href="{{ route('my-sylabuses'); }}"><li>Wyświetl moje przedmioty</li></a>
                        <a href="{{ route('find-sylabuses'); }}"><li>Szukaj przedmiotu lub frazy</li></a>
                        <a href="{{ route('help'); }}"><li class="selected-list">Pomoc oznaczeń</li></a><br>
                    </ol>                    
                </div>
                
                <div class="sub-layout-panel-start">

                    
                    <!-- <div class="panel-action"></div> --> 

                    <div class="panel-list">
                        <h2>Przewodnik Użytkownika: Zarządzanie Sylabusami</h2>

                        <section>
                            <h3>Dostęp do Sylabusów</h3>
                            <p>Aby móc przeglądać i zarządzać sylabusami w naszym systemie, musisz najpierw zostać przypisany przez administratora systemu jako <strong>koordynator</strong>. Ta rola umożliwia dostęp do funkcji i treści związanych ze sylabusami, co jest kluczowe dla efektywnego zarządzania programami nauczania.</p>
                            <h4>Jak uzyskać dostęp?</h4>
                            <ol>
                                <li><strong>Przypisanie roli koordynatora</strong>: Upewnij się, że twoje konto użytkownika zostało przypisane do roli koordynatora przez administratora systemu.</li>
                                <li><strong>Zakładka 'Moje Sylabusy'</strong>: Po zalogowaniu się do systemu, przejdź do zakładki <strong>'Moje Sylabusy'</strong>, aby zobaczyć listę sylabusów, za które jesteś odpowiedzialny.</li>
                            </ol>
                        </section>
                    
                        <section>
                            <h3>Tworzenie i Edycja Sylabusów</h3>
                            <p>Aby sylabus był kompletny i gotowy do przeglądania, wymagane jest uzupełnienie dodatkowych informacji oraz przypisanie odpowiednich treści i efektów.</p>
                            <h4>Kroki do wykonania:</h4>
                            <ol>
                                <li><strong>Suplementarne Dane Sylabusa</strong>: Wprowadź wszystkie wymagane informacje dodatkowe dla danego sylabusa, takie jak cele przedmiotu, metodologia nauczania, plan zajęć itp.</li>
                                <li><strong>Treści Przedmiotu</strong>: Zdefiniuj i wprowadź treści przedmiotu, które będą pokrywać zakres tematyczny realizowany w ramach kursu.</li>
                                <li><strong>Efekty Przedmiotu i Kierunkowe</strong>:
                                    <ul>
                                        <li><strong>Efekty Przedmiotu</strong>: Określ cele uczenia się, które studenci powinni osiągnąć po ukończeniu przedmiotu.</li>
                                        <li><strong>Efekty Kierunkowe</strong>: Połącz treści przedmiotu z ogólnymi celami kształcenia na danym kierunku studiów.</li>
                                    </ul>
                                </li>
                                <li><strong>Złączenie Treści z Efektami</strong>: Aby sylabus był kompletny, konieczne jest zintegrowanie wprowadzonych treści przedmiotu z określonymi efektami przedmiotu i kierunkowymi.</li>
                            </ol>
                        </section>

                        <section>
                            <h3>Co to są Efekty Przedmiotu, Treści Przedmiotu i Efekty Kierunkowe?</h3>
                            <ul>
                                <li><strong>Efekty Przedmiotu</strong>: Są to konkretne umiejętności, wiedza i kompetencje, które studenci powinni posiąść po ukończeniu danego kursu. Przykłady mogą obejmować zdolność do analizy krytycznej, zrozumienie kluczowych teorii w dziedzinie, umiejętność stosowania wiedzy w praktyce itp.</li>
                                <li><strong>Treści Przedmiotu</strong>: Stanowią one szczegółowy zakres kursu, określając, jakie tematy i zagadnienia będą omawiane podczas zajęć.</li>
                                <li><strong>Efekty Kierunkowe</strong>: Reprezentują ogólne cele kształcenia, które są planowane do osiągnięcia przez studentów na danym kierunku studiów. Efekty te są szersze niż efekty przedmiotu i mogą obejmować zdobycie umiejętności miękkich, takich jak praca zespołowa, komunikacja, zarządzanie projektem itp.</li>
                            </ul>
                        </section>
                    </div>

                </div>           


                  
                
                
            </div>
        
    </body>
</html>
