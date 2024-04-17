<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        
            
                <div class="table-responsive">
            <div class="panel-top">
                <div class="left-nav">
                    <a href="{{route('panel')}}">
                        <button class="custom-button-account" style="width: fit-content" style=" background: white; color: black;">
                            Panel główny
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
                <div class="sub-layout-panel-start">

                    
                    @php
                        use Illuminate\Support\Facades\DB;
                    @endphp
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Przedmiot</td>
                                <td style="text-align: center">S.</td>
                                @foreach($directional_effects as $de)
                                    <td>{{$de->directional_effect_code}}</td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td style="text-align: left">{{ $subject->name_subject }}</td>
                                    <td>{{ $subject->semester }}</td>
                                    @foreach($directional_effects as $de)
                                        <td>
                                            @php
                                                $symbols = DB::table('subject_effects')
                                                            ->join('sylabus_supl_to_subject_effects', 'subject_effects.id', '=', 'sylabus_supl_to_subject_effects.subject_effects_id')
                                                            ->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
                                                            ->where('sylabus_supl_to_subject_effects.sylabus_id', $subject->id)
                                                            ->where('subject_effects_to_directional_effects.directional_effects_id', $de->id)
                                                            ->pluck('subject_effects.symbol');
                                            @endphp
                                            @foreach($symbols as $symbol)
                                                <span>{{ $symbol }}</span><br>
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        
                        
                    </table>
                    
                    
                  
                
                
            </div>
        
    </body>
</html>
