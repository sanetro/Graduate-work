<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('category_effects')->insert([
            ['name' => 'wiedza'],
            ['name' => 'umiejętności'],
            ['name' => 'kompetencje społeczne'],
        ]);

        DB::table('departments')->insert([
            'name' => 'Wydział Informatyki i Elektroniki'
        ]);

        DB::table('chairs')->insert([
            'name' => 'Informatyka',
            'department_id' => 1,
        ]);

        DB::table('roles')->insert(
            ['role_name' => 'Wykładowca'],
            ['role_name' => 'Pracownik'],
        );

        DB::table('users')->insert([
            'email' => 'jkowalski@wszib.edu.pl',
            'password' => Hash::make('1'), 
            'role_id' => 1,
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'titles' => 'dr. inż.',
            'chair_id' => 1, 
        ]);

        DB::table('users')->insert([
            'email' => 'bsalata@wszib.edu.pl',
            'password' => Hash::make('bsalata'), 
            'role_id' => 1,
            'name' => 'Bartłomiej',
            'surname' => 'Salata',
            'titles' => 'inż.',
            'chair_id' => 1, 
        ]);


        // Sylabus 1 - Zwinne wytwarzanie oprogramowania
        DB::table('sylabus_initialized')->insert([
            'code_subject' => 'MB.647.P',
            'name_subject' => 'Zwinne wytwarzanie oprogramowania',
            'type_study' => 'Stacjonarne',
            'speciality' => 'Informatyka stosowana',
            'degree' => '1',
            'semester' => '5',
            'chair_id' => 1, 
            'required' => 'obligatoryjny',
            'calculator_for_subjects_to_order' => 0.0, 
            'status_subject' => 'podstawowy',
            'ects_summary' => 4, 
            'total_number_of_hours' => 5,   
            'lectures_number_of_hours' => 3, 
            'seminars_number_of_hours' => 2, 
            'exercise_number_of_hours' => 1, 
            'type_of_exercice' => 'projektowe', 
            'direction_name' => 'Informatyka',
            'subject_content_id' => 1, 
            'number_of_hours_with_lecturer' => 15.0, 
            'number_of_hours_of_consultation' => 5.0, 
            'number_of_hours_participation_in_research' => 15.0, 
            'number_of_hours_mandatory_practices_and_internships' => 30.0, 
            'number_of_hours_participations_in_the_exam_and_credits' => 1.2, 
            'number_of_hours_online_classes' => 3.0, 
            'number_of_hours_own_work' => 20.0, 
            'study_profile' => 'Ogólnoakademicki', 
        ]);

        DB::table('sylabus_suplementary')->insert([
            'other_way_of_teaching' => 'Aktywne zajęcia praktyczne',
            'form_of_assessment' => 'Projekt grupowy',
            'participation_of_ects_for_number_of_hours_lecturer' => 2.3,
            'participation_of_ects_for_number_of_hours_online' => 2.1,
            'participation_of_ects_for_number_of_hours_own_work' => 2.2,
            'description_of_the_prequesities' => 'Wymagane zaliczenie przedmiotu z egzaminu "Podstawy programowania"',
            'language_of_lessons' => 'Polski',
            'list_of_primary_literature_to_the_subject' => '1. "Zwinne metody wytwarzania oprogramowania" by Jan Kowalski, 2. "Scrum - Agile Project Management" by Anna Nowak',
            'list_of_suplementary_literature_to_the_subject' => '1. "Lean Software Development" by Adam Nowicki, 2. "Extreme Programming Explained" by Marek Wiśniewski',
            'lecturers_competence_to_teach_the_subject' => 'Wykładowcy posiadają doświadczenie w praktyce metodyki Scrum oraz wytwarzania oprogramowania w oparciu o zwinne metody.',
            'examination_of_lecturers' => 'Egzamin. Uzyskanie zaliczenia powyżej 50% uzyskanych punktów.',
            'examination_of_exercises' => 'Projekt w grupach na zaliczenie przedmiotu',
            'examination_of_seminars' => 'Postępy z pracy i ciągła progresja.',           
            'directional_effects_id' => null, 
            'subject_effects_id' => null, 
        ]);

        DB::table('user_to_sylabus')->insert(
            ['sylabus_id' => 1, 'user_id' => 1],
        );

        // Sylabus 2 - Fizyka
        DB::table('sylabus_initialized')->insert([
            'code_subject' => 'MB.647.S',
            'name_subject' => 'Fizyka',
            'type_study' => 'Stacjonarne',
            'speciality' => 'Informatyka stosowana',
            'degree' => '1',
            'semester' => '1',
            'chair_id' => 1, 
            'required' => 'obowiązkowy',
            'calculator_for_subjects_to_order' => 0.0, 
            'status_subject' => 'podstawowy',
            'ects_summary' => 1,
            'total_number_of_hours' => 5,   
            'lectures_number_of_hours' => 36, 
            'seminars_number_of_hours' => 21, 
            'exercise_number_of_hours' => 0, 
            'type_of_exercice' => 'projektowe', 
            'direction_name' => 'Informatyka',
            'subject_content_id' => 2, 
            'number_of_hours_with_lecturer' => 41.0, 
            'number_of_hours_of_consultation' => 3.0, 
            'number_of_hours_participation_in_research' => 0.0, 
            'number_of_hours_mandatory_practices_and_internships' => 0.0, 
            'number_of_hours_participations_in_the_exam_and_credits' => 2, 
            'number_of_hours_online_classes' => 0.0, 
            'number_of_hours_own_work' => 84.0, 
            'study_profile' => 'Ogólnoakademicki', 
        ]);

        DB::table('sylabus_suplementary')->insert([
            'other_way_of_teaching' => 'Aktywne zajęcia praktyczne',
            'form_of_assessment' => 'Zaliczenie na ocene',
            'participation_of_ects_for_number_of_hours_lecturer' => 1.6,
            'participation_of_ects_for_number_of_hours_online' => 0.0,
            'participation_of_ects_for_number_of_hours_own_work' => 3.4,
            'description_of_the_prequesities' => 'Znajomość matematyki i fizyki na poziomie szkoły średniej.',
            'language_of_lessons' => 'Polski',
            'list_of_primary_literature_to_the_subject' => 'Heller, Michał. "Fizyka dla ciekawych świata". Leśniak, Zofia. "Kwantowa teoria pola dla początkujących". Meissner, Krzysztof. "Ogólna teoria względności i kosmologia". Cieśl, Marek. "Chaos, fraktale i dynamika nieliniowa". Maglich, Bogdan. "Fizyka atomowa i jądrowa dla bystrzaków".',
            'list_of_suplementary_literature_to_the_subject' => 'Kowalski, Jan. "Zrozumieć kwantowość". Nowak, Anna. "Gwiazdy, galaktyki, wszechświaty: Wprowadzenie do astrofizyki".',
            'lecturers_competence_to_teach_the_subject' => 'Publikacje: 1. p1, 2. p2, 3. p3.',
            'examination_of_lecturers' => '',
            'examination_of_exercises' => 'Zaliczenie na podstawie pozytywnych ocen z kolokwiów ustnych praz poprawnie wykonanych sprawozdań z ćwiczeń. Udział oceny z zaliczenia ćwiczeń w ocenie końcowej wynosi 50%.',
            'examination_of_seminars' => '',           
            'directional_effects_id' => null, 
            'subject_effects_id' => null, 
        ]);

        DB::table('user_to_sylabus')->insert(
            ['sylabus_id' => 2, 'user_id' => 2],
        );

        // Sylabus 2 - Seminarium dyplomowe
        DB::table('sylabus_initialized')->insert([
            'code_subject' => 'MB.647.F',
            'name_subject' => 'Seminarium dyplomowe',
            'type_study' => 'Stacjonarne',
            'speciality' => 'Informatyka stosowana',
            'degree' => '1',
            'semester' => '7',
            'chair_id' => 1, 
            'required' => 'obowiązkowy',
            'calculator_for_subjects_to_order' => 1.0, 
            'status_subject' => 'kierunkowy',
            'ects_summary' => 3,
            'total_number_of_hours' => 30,   
            'lectures_number_of_hours' => 0, 
            'seminars_number_of_hours' => 30, 
            'exercise_number_of_hours' => 0, 
            'type_of_exercice' => 'audytoryjne', 
            'direction_name' => 'Informatyka',
            'subject_content_id' => 3, 
            'number_of_hours_with_lecturer' => 39.0, 
            'number_of_hours_of_consultation' => 2.0, 
            'number_of_hours_participation_in_research' => 5.0, 
            'number_of_hours_mandatory_practices_and_internships' => 0.0, 
            'number_of_hours_participations_in_the_exam_and_credits' => 2, 
            'number_of_hours_online_classes' => 0.0, 
            'number_of_hours_own_work' => 36.0, 
            'study_profile' => 'Ogólnoakademicki', 
        ]);

        DB::table('sylabus_suplementary')->insert([
            'other_way_of_teaching' => '',
            'form_of_assessment' => 'Zaliczenie na ocene',
            'participation_of_ects_for_number_of_hours_lecturer' => 1.6,
            'participation_of_ects_for_number_of_hours_online' => 0.0,
            'participation_of_ects_for_number_of_hours_own_work' => 1.4,
            'description_of_the_prequesities' => 'Ustalenie tematu pracy dyplomowej oraz osoby promotora.',
            'language_of_lessons' => 'Polski',
            'list_of_primary_literature_to_the_subject' => '',
            'list_of_suplementary_literature_to_the_subject' => 'Maćkowicz. J. 2010. Jak Dobrze Pisań. Od Myśli Do Tekstu.',
            'lecturers_competence_to_teach_the_subject' => 'Publikacje: 1. p1, 2. p2, 3. p3.',
            'examination_of_lecturers' => '',
            'examination_of_exercises' => 'Zaliczenie na podstawie pozytywnych ocen z kolokwiów ustnych praz poprawnie wykonanych sprawozdań z ćwiczeń. Udział oceny z zaliczenia ćwiczeń w ocenie końcowej wynosi 50%.',
            'examination_of_seminars' => '',           
            'directional_effects_id' => null, 
            'subject_effects_id' => null, 
        ]);

        DB::table('user_to_sylabus')->insert(
            ['sylabus_id' => 3, 'user_id' => 2],
        );

        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu informatyki, wybranych działów programowania aplikacji z szeroko pojętego opracowania systemów informatycznych.',
            'study_degree' => '1',
            'thematic_category' => 'Programowanie',
            'directional_effect_code' => 'I001', 
            'universal_effect_code' => 'P6U_W',
            'second_universal_effect_code' => 'P6S_WG',
            'type_of_effect' => 'umiejętności',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu projektowanie i implementacja baz danych z wykorzystaniem nowoczesnych systemów zarządzania.',
            'study_degree' => '2',
            'thematic_category' => 'Bazy danych',
            'directional_effect_code' => 'I002',
            'universal_effect_code' => 'P7U_W',
            'second_universal_effect_code' => 'P7S_WG',
            'type_of_effect' => 'umiejętności',
            'link_effect_to_discipline' => 'CP'
        ]);
        
        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu analiza i projektowanie systemów informatycznych z zastosowaniem metod inżynierii oprogramowania.',
            'study_degree' => '1',
            'thematic_category' => 'Inżynieria oprogramowania',
            'directional_effect_code' => 'I003',
            'universal_effect_code' => 'P8U_K',
            'second_universal_effect_code' => 'P8S_WK',
            'type_of_effect' => 'kompetencje',
            'link_effect_to_discipline' => 'CP'
        ]);
        
        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu stosowanie zaawansowanych algorytmów w różnych dziedzinach informatyki.',
            'study_degree' => '2',
            'thematic_category' => 'Algorytmika',
            'directional_effect_code' => 'I004',
            'universal_effect_code' => 'P9U_W',
            'second_universal_effect_code' => 'P9S_WG',
            'type_of_effect' => 'wiedza',
            'link_effect_to_discipline' => 'CP'
        ]);
        
        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu tworzenie i zarządzanie projektami informatycznymi w oparciu o metodyki zwinne i tradycyjne.',
            'study_degree' => '1',
            'thematic_category' => 'Zarządzanie projektami',
            'directional_effect_code' => 'I005',
            'universal_effect_code' => 'P10U_K',
            'second_universal_effect_code' => 'P10S_KG',
            'type_of_effect' => 'kompetencje',
            'link_effect_to_discipline' => 'CP'
        ]);
        
        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu programowanie aplikacji mobilnych na platformy iOS i Android.',
            'study_degree' => '2',
            'thematic_category' => 'Programowanie mobilne',
            'directional_effect_code' => 'I006',
            'universal_effect_code' => 'P11U_W',
            'second_universal_effect_code' => 'P11S_WG',
            'type_of_effect' => 'umiejętności',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu wykorzystanie chmury obliczeniowej do przechowywania i przetwarzania danych.',
            'study_degree' => '1',
            'thematic_category' => 'Cloud Computing',
            'directional_effect_code' => 'I007',
            'universal_effect_code' => 'P12U_W',
            'second_universal_effect_code' => 'P12S_WG',
            'type_of_effect' => 'wiedza',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu fizyki i matematyki na poziomie akademickim.',
            'study_degree' => '1',
            'thematic_category' => 'Fizyka',
            'directional_effect_code' => 'FIZ01',
            'universal_effect_code' => 'P12U_W',
            'second_universal_effect_code' => 'P12S_WG',
            'type_of_effect' => 'wiedza',
            'link_effect_to_discipline' => 'CP'
        ]);
        
        DB::table('directional_effects')->insert([
            'direction_name' => 'Potrafi rozwiązać skomplikowane działania z zakresu fizyki i matematyki na poziomie akademickim.',
            'study_degree' => '1',
            'thematic_category' => 'Fizyka',
            'directional_effect_code' => 'FIZ02',
            'universal_effect_code' => 'P12U_S',
            'second_universal_effect_code' => 'P12S_GG',
            'type_of_effect' => 'umiejętności',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Jest gotów do działania i myślenia w sposób abstrakcyjny.',
            'study_degree' => '1',
            'thematic_category' => 'Fizyka',
            'directional_effect_code' => 'FIZ02',
            'universal_effect_code' => 'P12U_S',
            'second_universal_effect_code' => 'P12S_KG',
            'type_of_effect' => 'kompetencje społeczne',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Jest gotów do przystąpienia i zaprezentowania pracy lub tezy na dany temat.',
            'study_degree' => '1',
            'thematic_category' => 'Seminaria',
            'directional_effect_code' => 'SEM02',
            'universal_effect_code' => 'P12U_S',
            'second_universal_effect_code' => 'P12S_KG',
            'type_of_effect' => 'kompetencje społeczne',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Potrafi przygotować zgromadzone materiały, przeprowadzić analize i zaimplementować metody we własnej pracy dyplomowej.',
            'study_degree' => '1',
            'thematic_category' => 'Seminaria',
            'directional_effect_code' => 'SEM02',
            'universal_effect_code' => 'P12U_S',
            'second_universal_effect_code' => 'P12S_GG',
            'type_of_effect' => 'umiejętności',
            'link_effect_to_discipline' => 'CP'
        ]);

        DB::table('directional_effects')->insert([
            'direction_name' => 'Zna i rozumie tematyke z zakresu swojej pracy dyplomowej.',
            'study_degree' => '1',
            'thematic_category' => 'SEM',
            'directional_effect_code' => 'SEM01',
            'universal_effect_code' => 'P12U_W',
            'second_universal_effect_code' => 'P12S_WG',
            'type_of_effect' => 'wiedza',
            'link_effect_to_discipline' => 'CP'
        ]);
    }
}
