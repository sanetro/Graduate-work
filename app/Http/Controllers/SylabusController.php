<?php

namespace App\Http\Controllers;

use App\Models\Sylabus_initialized;
use App\Models\Sylabus_suplementary;
use Illuminate\Http\Request;

class SylabusController extends Controller
{
    public function read(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');

        // if user exitst in DB go to userPanel with collection: email, role, department
        if (session()->get('user')) 
        {
            $suplementary = Sylabus_suplementary::find($r->id);
            
            return view("edit-sylabus", [
                'email' => session()->get('user')['email'],
                'role' => session()->get('user')['role'],
                'department' => session()->get('user')['department'],
                'sylabus' => Sylabus_initialized::find($r->id),
                'sylabusSuplementary' => Sylabus_suplementary::find($r->id),
                'code' => $r->code,
                'id' => $r->id,
            ]);
        } else {
            return route('welcome');
        }
    }

    public function change(Request $r) {
        // Sprawdź, czy użytkownik jest zalogowany
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        // Pobierz dane z formularza
        $other_way_of_teaching = $r->input('other_way_of_teaching');
        $form_of_assessment = $r->input('form_of_assessment');
        $participation_of_ects_for_number_of_hours_lecturer = $r->input('participation_of_ects_for_number_of_hours_lecturer');
        $participation_of_ects_for_number_of_hours_online = $r->input('participation_of_ects_for_number_of_hours_online');
        $participation_of_ects_for_number_of_hours_own_work = $r->input('participation_of_ects_for_number_of_hours_own_work');
        $description_of_the_prequesities = $r->input('description_of_the_prequesities');
        $language_of_lessons = $r->input('language_of_lessons');
        $list_of_primary_literature_to_the_subject = $r->input('list_of_primary_literature_to_the_subject');
        $list_of_suplementary_literature_to_the_subject = $r->input('list_of_suplementary_literature_to_the_subject');
        $lecturers_competence_to_teach_the_subject = $r->input('lecturers_competence_to_teach_the_subject');
        $directional_effects_id = $r->input('directional_effects_id');
        $subject_effects_id = $r->input('subject_effects_id');
    
        // Pobierz istniejący obiekt Sylabus_suplementary z bazy danych
        $sylabusSupplementary = Sylabus_suplementary::find($r->id);
    
        // Ustaw pola obiektu Sylabus_suplementary nowymi wartościami
        $sylabusSupplementary->other_way_of_teaching = $other_way_of_teaching;
        $sylabusSupplementary->form_of_assessment = $form_of_assessment;
        $sylabusSupplementary->participation_of_ects_for_number_of_hours_lecturer = $participation_of_ects_for_number_of_hours_lecturer;
        $sylabusSupplementary->participation_of_ects_for_number_of_hours_online = $participation_of_ects_for_number_of_hours_online;
        $sylabusSupplementary->participation_of_ects_for_number_of_hours_own_work = $participation_of_ects_for_number_of_hours_own_work;
        $sylabusSupplementary->description_of_the_prequesities = $description_of_the_prequesities;
        $sylabusSupplementary->language_of_lessons = $language_of_lessons;
        $sylabusSupplementary->list_of_primary_literature_to_the_subject = $list_of_primary_literature_to_the_subject;
        $sylabusSupplementary->list_of_suplementary_literature_to_the_subject = $list_of_suplementary_literature_to_the_subject;
        $sylabusSupplementary->lecturers_competence_to_teach_the_subject = $lecturers_competence_to_teach_the_subject;
        $sylabusSupplementary->directional_effects_id = $directional_effects_id;
        $sylabusSupplementary->subject_effects_id = $subject_effects_id;
    
        // Zapisz obiekt Sylabus_suplementary w bazie danych
        $sylabusSupplementary->save();
        session()->flash('isUpdated', true);

        // Przekieruj użytkownika do widoku edycji sylabusa
        return redirect()->route('read', ['id' => $r->id, 'code' => $r->code]);
    }
    
    
}
