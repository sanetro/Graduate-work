<!DOCTYPE html>
<html lang="pl">
 <head>
    <style type="text/css">
        @font-face {
            font-family: 'Cormorant Garamond', serif;
        }
		*{
			padding: 5px;
		}
   	    body{
            background: white;
			font-size: 12px;
		}
		#tytul{
			text-transform: uppercase;
		}
		table {
		  border-collapse: collapse;
		  width: 100%;
		  margin-bottom: 20px;
		}
		td{
			border: 0.0125rem solid black;
			padding: 3px;
		}
		main{
			width: 95%;
			margin: auto;
		}
		.layout_tr{
			text-align: center;
            font-weight: bold;
		}
		.no_border_here { border-right-color: white; }
        .no_border_onLeft { border-left-color: white; }
        .no_border_onRight { border-right-color: white; }
        .no_border_onTop { border-top-color: white; }
        .no_border_onBottom { border-bottom-color: white;  }
        .no_border_onRightLeft { border-right-color: white; border-left-color: white;}
        .focusFont {letter-spacing: 5px;}
        .focusFontinRow {font-family: normal;}
		.li-wyk {border-bottom:1px solid black; display: block; }
		.li-wyk:last-child { border-bottom: 0px solid black;}
		@media print {
			.hide-elements {
				display: none;
			}
		}

   </style>
 </head>


<body>
	<div class="hide-elements">
		<button onclick="window.print()">Drukuj stronę</button>
		<button onclick="window.history.go(-1)">Wróć do menu</button>
	</div>
	
	
	<main>




	<p class = "layout_tr"> Sylabus przedmiotu </p>




<!-- ============================================================================================================================ -->
											<!--  Przedmiot   -->
<!-- ============================================================================================================================ -->		
	<b> Przedmiot:</b><br>

	<table>
        <div class = "focusFont"><i>{{$s_initialized->name_subject}}</i></div>
		<tbody>			
			<tr>
                <td class = "no_border_onLeft">Wymiar ECTS:</td>
				<td class = "no_border_onRight"><i>{{$s_initialized->ects_summary}}</i></td>
			</tr>
            <tr>
                <td class = "no_border_onLeft">Status</td>
				<td class = "no_border_onRight"><i>{{$s_initialized->status_subject}}</i></td>
            </tr>
			<tr>
                <td class = "no_border_onLeft">Forma zaliczenia końcowego</td>
				<td class = "no_border_onRight"><i>{{$s_suplementary->form_of_assessment}}</i></td>				
			</tr>
			<tr>
				<td class = "no_border_onLeft">Wymagania wstępne:</td>
				<td class = "no_border_onRight"><i>{{$s_suplementary->description_of_the_prequesities}}</i></td>
			</tr>
		</tbody>
	</table>

    
<!-- ============================================================================================================================ -->
											<!--  Kierunek   -->
<!-- ============================================================================================================================ -->

    <b>Kierunek studiów:</b><br>

	<table>
        <div class = "focusFont"><i> {{$s_initialized->direction_name}} </i></div>		
		<tbody>
			<tr>
                <td class = "no_border_onLeft">Profil studiów</td>
				<td class = "no_border_onRight"><i>{{$s_initialized->study_profile}}</i></td>				
			</tr>
            <tr>
                <td class = "no_border_onLeft">Kod formy studiów oraz poziomu studiów</td>
				<td class = "no_border_onRight"><i>{{substr($s_initialized->type_study, 0, 1)}}{{$s_initialized->degree}}</i></td>                        
            </tr>
            <tr>
                <td class = "no_border_onLeft">Semestr studiów</td>
				<td class = "no_border_onRight"><i>{{$s_initialized->semester}}</i></td>
            </tr>
			<tr>
                <td class = "no_border_onLeft">Język wykładowy</td>           
                <td class = "no_border_onRight"><i>{{$s_suplementary->language_of_lessons}}</i></td>      
            </tr>            		
		</tbody>
	</table>


<!-- ============================================================================================================================ -->
											<!--  Prowadzący przedmiot   -->
<!-- ============================================================================================================================ -->
	<b>Prowadzący przedmiot:</b><br>
    
	<table>
		<tbody>
			<tr>
				<td class = "no_border_onLeft">Nazwa jednostki właściwej dla koordynatora</td>
				<td class = "no_border_onRight">
                    @foreach ($users as $user)
                        Wydział {{$user->chairs->name}}
                        @break
                    @endforeach 
                </td>
			</tr>
			
			<tr>
				<td class = "no_border_onLeft">Koordynator/rzy pdrzedmiotu</td>
				<td class = "no_border_onRight">
                    @foreach ($users as $user)
                        {{$user->titles}} {{$user->name}} {{$user->surname}}
                    @endforeach
                </td>
			</tr>
		</tbody>
	</table>


<!-- ============================================================================================================================ -->
											<!--  Przedmiotowe efekty uczenia sie   -->
<!-- ============================================================================================================================ -->



	<b>Przedmiotowe efekty uczenia się</b>
	<table>
		<thead style = 'font-weight: normal !important;'>
			<tr class="layout_tr">
				<td rowspan=2 class = "no_border_onLeft"> Kod <br> składnika <br> opisu</td>
				<td rowspan=2>Opis</td>
				<td colspan=2 class = "no_border_onRight">Odniesienie do (kod)</td>				
			</tr>
			<tr class="layout_tr">
				<td>efektu <br> kierunkowego</td>
				<td class = "no_border_onRight">dyscypliny</td>
			</tr>
		</thead>
		<tbody>
		<tr> 
			<td colspan=4 style='text-align: center !important; border-right-color: white !important;' class = "no_border_onLeft" class = "no_border_onRight"> WIEDZA - zna i rozumie: </td> </tr>
			<tr>
			<tr style='text-align: center' class = "no_border_onLeft">
				@if(isset($subjectEffects_1))
					@foreach ($subjectEffects_1 as $category => $effects)
						
						@php $counter = 1 @endphp
						@foreach ($effects as $effect)
						
							<td class = "no_border_onLeft">{{ $effect->symbol }}</td>
							<td style='text-align: left'>{{ $effect->description }}</td>
							<td style='text-align: center' >
								@php
									$de = DB::table('subject_effects')
									->select('subject_effects.id as subject_effects_id', DB::raw('GROUP_CONCAT(directional_effects.directional_effect_code) as directional_effect_codes'))
									->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
									->join('directional_effects', 'subject_effects_to_directional_effects.directional_effects_id', '=', 'directional_effects.id')
									->where('subject_effects.id', $effect->id)
									->groupBy('subject_effects.id')
									->get();
								@endphp	
								@foreach($de as $d)
								{{ $d->directional_effect_codes }}
								@endforeach
							</td>
							<td style='text-align: center' class = "no_border_onRight">
								@php
									$de = DB::table('subject_effects')
									->select('subject_effects.id as subject_effects_id', DB::raw('GROUP_CONCAT(directional_effects.link_effect_to_discipline) as link_effect_to_discipline'))
									->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
									->join('directional_effects', 'subject_effects_to_directional_effects.directional_effects_id', '=', 'directional_effects.id')
									->where('subject_effects.id', $effect->id)
									->groupBy('subject_effects.id')
									->get();
								@endphp	
								@foreach($de as $d)
								{{ $d->link_effect_to_discipline }}
								@endforeach
							</td>
							</tr>
							<tr>
							
							@php $counter++ @endphp
						@endforeach
					@endforeach
				@endif

			</tr>

			<tr> 
				<td colspan=4 style='text-align: center !important; border-right-color: white !important;' class = "no_border_onLeft" class = "no_border_onRight"> UMIEJĘTNOŚCI - potrafi: </td> </tr>
				<tr>
				<tr style='text-align: center' class = "no_border_onLeft">
					@if(isset($subjectEffects_2))
						@foreach ($subjectEffects_2 as $category => $effects)
							
							@php $counter = 1 @endphp
							@foreach ($effects as $effect)
							
								<td class = "no_border_onLeft">{{ $effect->symbol }}</td>
								<td style='text-align: left'>{{ $effect->description }}</td>
								<td style='text-align: center'>
									@php
										$de = DB::table('subject_effects')
										->select('subject_effects.id as subject_effects_id', DB::raw('GROUP_CONCAT(directional_effects.directional_effect_code) as directional_effect_codes'))
										->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
										->join('directional_effects', 'subject_effects_to_directional_effects.directional_effects_id', '=', 'directional_effects.id')
										->where('subject_effects.id', $effect->id)
										->groupBy('subject_effects.id')
										->get();
									@endphp	
									@foreach($de as $d)
									{{ $d->directional_effect_codes }}
									@endforeach
								</td>
								<td style='text-align: center' class = "no_border_onRight">
									@php
										$de = DB::table('subject_effects')
										->select('subject_effects.id as subject_effects_id', DB::raw('GROUP_CONCAT(directional_effects.link_effect_to_discipline) as link_effect_to_discipline'))
										->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
										->join('directional_effects', 'subject_effects_to_directional_effects.directional_effects_id', '=', 'directional_effects.id')
										->where('subject_effects.id', $effect->id)
										->groupBy('subject_effects.id')
										->get();
									@endphp	
									@foreach($de as $d)
									{{ $d->link_effect_to_discipline }}
									@endforeach
								</td>
								</tr>
								<tr>
								
								@php $counter++ @endphp
							@endforeach
						@endforeach
					@endif
	
			</tr>
		
			<tr> 
				<td colspan=4 style='text-align: center !important; border-right-color: white !important;' class = "no_border_onLeft" class = "no_border_onRight"> KOMPETENCJE SPOŁECZNE - jest gotów do: </td> </tr>
				<tr>
				<tr style='text-align: center' class = "no_border_onLeft">
					@if(isset($subjectEffects_3))
						@foreach ($subjectEffects_3 as $category => $effects)
							
							@php $counter = 1 @endphp
							@foreach ($effects as $effect)
							
								<td class = "no_border_onLeft">{{ $effect->symbol }}</td>
								<td style='text-align: left'>{{ $effect->description }}</td>
								<td style='text-align: center'>
									@php
										$de = DB::table('subject_effects')
										->select('subject_effects.id as subject_effects_id', DB::raw('GROUP_CONCAT(directional_effects.directional_effect_code) as directional_effect_codes'))
										->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
										->join('directional_effects', 'subject_effects_to_directional_effects.directional_effects_id', '=', 'directional_effects.id')
										->where('subject_effects.id', $effect->id)
										->groupBy('subject_effects.id')
										->get();
									@endphp	
									@foreach($de as $d)
									{{ $d->directional_effect_codes }}
									@endforeach
								</td>
								<td style='text-align: center' class = "no_border_onRight">
									@php
										$de = DB::table('subject_effects')
										->select('subject_effects.id as subject_effects_id', DB::raw('GROUP_CONCAT(directional_effects.link_effect_to_discipline) as link_effect_to_discipline'))
										->join('subject_effects_to_directional_effects', 'subject_effects.id', '=', 'subject_effects_to_directional_effects.subject_effects_id')
										->join('directional_effects', 'subject_effects_to_directional_effects.directional_effects_id', '=', 'directional_effects.id')
										->where('subject_effects.id', $effect->id)
										->groupBy('subject_effects.id')
										->get();
									@endphp	
									@foreach($de as $d)
									{{ $d->link_effect_to_discipline }}
									@endforeach
								</td>
								</tr>
								<tr>
								
								@php $counter++ @endphp
							@endforeach
						@endforeach
					@endif
	
			</tr>
		
		</tbody>
	</table>
<!-- ============================================================================================================================ -->
											<!--  Treści nauczania   -->
<!-- ============================================================================================================================ -->


	<b >Treści nauczania:</b>

	<table>		
		<tbody>

			<tr>
				<td colspan=4 class = "no_border_onRightLeft" > <b>Wykłady</b> </td>
				<td class = "no_border_onRightLeft" > <b></b> </td>
				
				<td class = "no_border_onRight" style='text-align:right!important;padding-right:5px;width:9%;'> {{$s_initialized->lectures_number_of_hours}} godz.</td>
			</tr>
			<tr>
				<td rowspan= class = "no_border_onLeft" style="border-left: 1px solid white "> Tematyka zajęć </td>			
				<td colspan=5 class="no_border_onRight"> 
					@php $counter = 1 @endphp
					@if(isset($subjectContents['Wykłady']))
						@foreach ($subjectContents['Wykłady'] as $content)
							<span class="li-wyk">{{ $counter }}. {{ $content->content_description }}</span>
							@php $counter++ @endphp
						@endforeach
					@endif
				</td>
			</tr>
			
			
			<tr>
				<td  colspan=1 class = "no_border_onLeft"> Sposoby weryfikacji oraz zasady i <br> kryteria oceny </td>
				<td colspan=3 class = "no_border_onRight">
					@if ($s_suplementary->examination_of_lecturers)
						<i> {{$s_suplementary->examination_of_lecturers}} </i>
					@endif	
				</td>
				
			</tr>


			<tr>
				<td colspan=5 class = "no_border_onRightLeft" ><b>Ćwiczenia</b></td>				
				<td class = "no_border_onRight" style='text-align:right!important;padding-right:5px;'> {{$s_initialized->exercise_number_of_hours}} godz.</td>
			</tr>

			<tr>
				<td rowspan=1 style='width:20%;' class = "no_border_onLeft"> Tematyka zajęć </td>
				<td colspan=5 class="no_border_onRight"> 
					@php $counter = 1 @endphp
					@if(isset($subjectContents['Ćwiczenia']))
						@foreach ($subjectContents['Ćwiczenia'] as $content)
							<span class="li-wyk">{{ $counter }}. {{ $content->content_description }}</span>
							@php $counter++ @endphp
						@endforeach
					@endif
				</td>
						
			</tr>
			
			
			<tr>
				<td  colspan=1 class = "no_border_onLeft"> Sposoby weryfikacji oraz zasady i <br> kryteria oceny  </td>
				<td colspan=3 class = "no_border_onRight"> 
					@if ($s_suplementary->examination_of_exercises)
						<i> {{$s_suplementary->examination_of_exercises}} </i>
					@endif
				</td>	
				<td class = "no_border_onRightLeft" > <b></b> </td>			
			</tr>
			




			<tr>
				<td colspan=4 class = "no_border_onRightLeft" > <b>Seminarium</b> </td>
				<td class = "no_border_onRightLeft" > <b></b> </td>
				<td class = "no_border_onRight" style='text-align:right!important;padding-right:5px;'> {{$s_initialized->seminars_number_of_hours}}  godz.</td>
				
			</tr>
			<tr>
				<td rowspan=1 style='width:20%;' class = "no_border_onLeft"> Tematyka zajęć </td>
				<td colspan=5 class="no_border_onRight"> 
					@php $counter = 1 @endphp
					@if(isset($subjectContents['Seminaria']))
						@foreach ($subjectContents['Seminaria'] as $content)
							<span class="li-wyk">{{ $counter }}. {{ $content->content_description }}</span>
							@php $counter++ @endphp
						@endforeach
					@endif
				</td>

							
			</tr>
			<tr>
				
							
											
			
			
			<tr>
				<td  colspan=1  class = "no_border_onLeft"> Sposoby weryfikacji oraz zasady i <br> kryteria oceny  </td>
				<td colspan=4 class = "no_border_onRight"> 
					@if ($s_suplementary->examination_of_seminars)
						<i> {{$s_suplementary->examination_of_seminars}} </i>
					@endif
				</td>
				<td class = "no_border_onRightLeft" > <b></b> </td>				
			</tr>
		</tbody>
	</table>


<!-- ============================================================================================================================ -->
											<!--  Literatura   -->
<!-- ============================================================================================================================ -->
		

    <b>Literatura:</b>

	<table>		
		<tbody>
			<tr>
				<td class = "no_border_onLeft">Podstawowa</td>
				<td class = "no_border_onRight"><i>{{$s_suplementary->list_of_primary_literature_to_the_subject}}</i></td>
			</tr>
			<tr>
				<td class = "no_border_onLeft">Uzupełniająca</td>
				<td class = "no_border_onRight"><i>{{$s_suplementary->list_of_suplementary_literature_to_the_subject}}</i></td>
			</tr>
		</tbody>
	</table>

<!-- ============================================================================================================================ -->
											<!--  Struktura efektów uczenia się i aktywności studenta   -->
<!-- ============================================================================================================================ -->


<table>
	<tbody>

		<!--  Struktura efektów uczenia -->	
		<b>Struktura efektów uczenia się:</b>	
		<!-- <tr>
			<td colspan="4" class = "no_border_onRightLeft">Dyscyplina - geografia społeczno-ekonomiczna i gospodarka przestrzenna</td>
			<td class = "no_border_onRightLeft">'ects_sg'], 1);  ?></td>
			<td class = "no_border_onRightLeft">ECTS*</td>
		</tr> 
		<tr>-->
		<tr>
			<td colspan="4" class = "no_border_onRightLeft">Suma lączna z każdej dyscypliny</td>
			<td class = "no_border_onRightLeft">{{$s_suplementary->participation_of_ects_for_number_of_hours_lecturer + $s_suplementary->participation_of_ects_for_number_of_hours_online + $s_suplementary->participation_of_ects_for_number_of_hours_own_work}}</td>
			<td class = "no_border_onRightLeft">ECTS*</td>
		</tr>
		<!--
		<tr>
			<td colspan="4" class = "no_border_onRightLeft">Dyscyplina - inżynieria środowiska, górnictwo i energetyka</td>
			<td class = "no_border_onRightLeft">'ects_ts'], 1);  ?></td>
			<td class = "no_border_onRightLeft">ECTS*</td>
		</tr> -->

		<!--  Struktura aktywności studenta -->
		<tr><td class = "no_border_onRightLeft"><b>Struktura aktywności studenta:</b></td></tr>
		<tr>
		<td colspan = "2" class="no_border_onRightLeft">zajęcia realizowane z bezpośrednim udziałem prowadzącego</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_with_lecturer}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft">{{$s_suplementary->participation_of_ects_for_number_of_hours_lecturer}}</td>
		<td style='border-right-color: white; border-left-color: white;'>ECTS</td>
		</tr>
		<tr>
		<td rowspan="8" class="no_border_onRightLeft" style='padding-bottom: 100px'>w tym:</td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">wykłady</td>
		<td class="no_border_onRightLeft">{{$s_initialized->lectures_number_of_hours}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">ćwiczenia</td>
		<td class="no_border_onRightLeft">{{$s_initialized->exercise_number_of_hours}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">seminaria</td>
		<td class="no_border_onRightLeft">{{$s_initialized->seminars_number_of_hours}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">konsultacje</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_of_consultation}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">udział w badaniach</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_participation_in_research}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">obowiązkowe praktyki i staże</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_mandatory_practices_and_internships}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		<td class="no_border_onRightLeft" style='border-bottom-color: white !important;'></td>
		</tr>
		<tr>
		<td class="no_border_onRightLeft">udział w egzaminie i zaliczeniach</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_participations_in_the_exam_and_credits}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft" ></td>
		<td class="no_border_onRightLeft" ></td>
		</tr>
		<tr>
		<td colspan = "2" class="no_border_onRightLeft">zajęcia realizowane z wykorzystaniem metod i technik kształcenia na odległość</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_online_classes}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft">{{$s_suplementary->participation_of_ects_for_number_of_hours_online}}</td>
		<td class="no_border_onRightLeft">ECTS</td>
		</tr>
		<tr>
		<td colspan = "2" style="width: 10px;" class="no_border_onRightLeft">praca własna</td>
		<td class="no_border_onRightLeft">{{$s_initialized->number_of_hours_own_work}}</td>
		<td class="no_border_onRightLeft">godz.</td>
		<td class="no_border_onRightLeft">{{$s_suplementary->participation_of_ects_for_number_of_hours_own_work}}</td>
		<td class="no_border_onRightLeft" >ECTS</td>
		</tr>
	</tbody>
</table>
<div style='margin-top: -10px; font-size: 9px; margin-bottom: 20px;'>
	)* - Podane z dokładnością do 0,1 ECTS, gdzie 1 ECTS = 25-30 godz. zajęć
</div>
	</main>
</body>
</html>