<?php

namespace App\Http\Controllers;

use App\Models\Sylabus_initialized;
use App\Models\Sylabus_suplementary;
use App\Models\SylabusToContent;
use Illuminate\Http\Request;



class SylabusController extends Controller
{
    public function read(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $initialized = Sylabus_initialized::find($r->id);
            $suplementary = Sylabus_suplementary::find($r->id);
           
            return view("edit-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'sylabus' =>            $initialized,
                'sylabusSuplementary' =>$suplementary,
                'code' =>               $r->code,
                'id' =>                 $r->id,
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
}
