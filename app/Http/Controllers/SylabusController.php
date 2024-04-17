<?php

namespace App\Http\Controllers;

use App\Models\Sylabus_initialized;
use App\Models\Sylabus_suplementary;
use App\Models\SylabusToContent;
use App\Models\UserToSylabus;
use Illuminate\Http\Request;
use App\Models\DirectionalEffect;
use App\Models\SubjectEffect;
use Illuminate\Support\Facades\DB;



class SylabusController extends Controller
{
    public function read(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $initialized = Sylabus_initialized::find($r->id);
            $suplementary = Sylabus_suplementary::find($r->id);
            $mySylabusesAllowed = UserToSylabus::where('sylabus_id', $r->id)
            ->with('users') // Ładowanie powiązanych użytkowników
            ->get()
            ->pluck('users');

            

            return view("edit-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'sylabus' =>            $initialized,
                'sylabusSuplementary' =>$suplementary,
                'code' =>               $r->code,
                'id' =>                 $r->id,
                'userSylabuses' =>      $r->$mySylabusesAllowed,
                'chair_name' =>         $initialized->chair->name
            ]);
        } else {
            return redirect()->back();
        }
    }
    

    public function change(Request $r) {

        if (
            $suply = Sylabus_suplementary::where('id', $r->id)
                ->update([
                    'other_way_of_teaching' =>                               $r->input('other_way_of_teaching'),
                    'form_of_assessment' =>                                  $r->input('form_of_assessment'),
                    'participation_of_ects_for_number_of_hours_lecturer' =>  $r->input('participation_of_ects_for_number_of_hours_lecturer'),
                    'participation_of_ects_for_number_of_hours_online' =>    $r->input('participation_of_ects_for_number_of_hours_online'),
                    'participation_of_ects_for_number_of_hours_own_work' =>  $r->input('participation_of_ects_for_number_of_hours_own_work'),
                    'description_of_the_prequesities' =>                     $r->input('description_of_the_prequesities'),
                    'language_of_lessons' =>                                 $r->input('language_of_lessons'),
                    'list_of_primary_literature_to_the_subject' =>           $r->input('list_of_primary_literature_to_the_subject'),
                    'list_of_suplementary_literature_to_the_subject' =>      $r->input('list_of_suplementary_literature_to_the_subject'),
                    'lecturers_competence_to_teach_the_subject' =>           $r->input('lecturers_competence_to_teach_the_subject'),
                    'examination_of_lecturers' =>                            $r->input('examination_of_lecturers'),
                    'examination_of_exercises' =>                            $r->input('examination_of_exercises'),
                    'examination_of_seminars' =>                             $r->input('examination_of_seminars'),
            ])
        )
        
        {
            // Transfer with successful flag
            return redirect()->route('read', ['id' => $r->id, 'code' => $r->code, 'flag'=>0]);
        }
        else 
        {
            // Transfer with unsuccessful flag
            return redirect()->route('read', ['id' => $r->id, 'code' => $r->code, 'flag'=>1]);
        }

        
    }

    public function readContent(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        // if user exitst in DB go to userPanel with collection: email, role, department
        if (session()->get('user')) 
        {   
            $contents = SylabusToContent::all();
           
            return view("content-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'contents'=>            $contents,
                'code' =>               $r->code,
                'id' =>                 $r->id,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function addContent(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        // if user exitst in DB go to userPanel with collection: email, role, department
        if (session()->get('user')) 
        {   
            $contents = SylabusToContent::all();
            dd($contents);
            
            return view("add-content-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'contents'=>            $contents,
                'code' =>               $r->code,
                'id' =>                 $r->id,
                'chair_name' =>         $initialized->chair->name
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function render(Request $r) {
        $initialized = Sylabus_initialized::find($r->id);
        $suplementary = Sylabus_suplementary::find($r->id);
        $users = UserToSylabus::where('sylabus_id', $r->id)
        ->with('users') // Ładowanie powiązanych użytkowników
        ->get()
        ->pluck('users');

        $subjectContents = \DB::table('sylabus_to_subject_contents')
            ->join('subject_contents', 'sylabus_to_subject_contents.subject_contents_id', '=', 'subject_contents.id')
            ->select('subject_contents.*', 'sylabus_to_subject_contents.sylabus_id')
            ->where('sylabus_id', $r->id)
            ->orderBy('type_of_content')
            ->get()
            ->groupBy('type_of_content');

        $subjectEffects_1 = \DB::table('sylabus_supl_to_subject_effects')
            ->join('subject_effects', 'sylabus_supl_to_subject_effects.subject_effects_id', '=', 'subject_effects.id')
            ->select('subject_effects.*', 'sylabus_supl_to_subject_effects.sylabus_id')
            ->where('sylabus_id', $r->id)
            ->where('category_effects_id', 1)
            ->orderBy('category_effects_id')
            ->get()        
            ->groupBy('category_effects_id');
        $subjectEffects_2 = \DB::table('sylabus_supl_to_subject_effects')
            ->join('subject_effects', 'sylabus_supl_to_subject_effects.subject_effects_id', '=', 'subject_effects.id')
            ->select('subject_effects.*', 'sylabus_supl_to_subject_effects.sylabus_id')
            ->where('sylabus_id', $r->id)
            ->where('category_effects_id', 2)
            ->orderBy('category_effects_id')
            ->get()        
            ->groupBy('category_effects_id');
        $subjectEffects_3 = \DB::table('sylabus_supl_to_subject_effects')
            ->join('subject_effects', 'sylabus_supl_to_subject_effects.subject_effects_id', '=', 'subject_effects.id')
            ->select('subject_effects.*', 'sylabus_supl_to_subject_effects.sylabus_id')
            ->where('sylabus_id', $r->id)
            ->where('category_effects_id', 3)
            ->orderBy('category_effects_id')
            ->get()        
            ->groupBy('category_effects_id');

        return view("render2-sylabus", [
            's_initialized' =>      $initialized,
            's_suplementary' =>     $suplementary,
            'chair_name' =>         $initialized->chair->name,
            'users' =>              $users,
            'subjectContents' =>    $subjectContents,
            'subjectEffects_1' =>    $subjectEffects_1,
            'subjectEffects_2' =>    $subjectEffects_2,
            'subjectEffects_3' =>    $subjectEffects_3,
        ]);
    }


    public function matrix(Request $r) {
        $subjects = Sylabus_initialized::all();
        $directional_effects = DirectionalEffect::all();
        $subject_effects = SubjectEffect::all();

        return view('matrix', [
            'email' =>              session()->get('user')['email'],
            'role' =>               session()->get('user')['role'],
            'department' =>         session()->get('user')['department'],
            'subjects' => $subjects,
            'directional_effects' => $directional_effects,
            'subject_effects' => $subject_effects,
        ]); 
    }
}
