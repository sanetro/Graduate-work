<?php

namespace App\Http\Controllers;

use App\Models\SylabusToContent;
use App\Models\SubjectContent;
use Illuminate\Http\Request;



class ContentController extends Controller
{

    public function read(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $contents = SubjectContent::all();
           
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

    public function add(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $contents = SylabusToContent::all();
            return view("add-content-sylabus", [
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

    public function create(Request $r) {
                
        $data = $r->validate([
            'type_of_content' => 'required',
            'content_description' => 'required',
            'tags' => 'required',
            'difficulty_level' => 'required',
            'method_of_veryfication_for_evaluation_of_lecturer' => 'required',
            'method_of_veryfication_for_evaluation_of_exercise' => 'required',
            'method_of_veryfication_for_evaluation_of_seminars' => 'required',
        ]);

        $content = new SubjectContent($data);
        $content->save();
        return redirect()->route('readContent', ['id' => $r->id, 'code' => $r->code, 'flag'=>0]);
    }

    public function edit(Request $r) {
                
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        if (session()->get('user')) 
        {   
            $contents = SubjectContent::find($r->id);
            return view("edit-content-sylabus", [
                'email' =>              session()->get('user')['email'],
                'role' =>               session()->get('user')['role'],
                'department' =>         session()->get('user')['department'],
                'contents'=>            $contents,
                'id' =>                 $r->id,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $r) {
                
        
            $suply = SubjectContent::where('id', $r->id)
                ->update([
                    'type_of_content' =>                                     $r->input('type_of_content'),
                    'content_description' =>                                 $r->input('content_description'),
                    'tags' =>                                                $r->input('tags'),
                    'difficulty_level' =>                                    $r->input('difficulty_level'),
                    'method_of_veryfication_for_evaluation_of_lecturer' =>   $r->input('method_of_veryfication_for_evaluation_of_lecturer'),
                    'method_of_veryfication_for_evaluation_of_exercise' =>   $r->input('method_of_veryfication_for_evaluation_of_exercise'),
                    'method_of_veryfication_for_evaluation_of_seminars' =>   $r->input('method_of_veryfication_for_evaluation_of_seminars'),
                ]);
        
        
            // Transfer with successful flag
            return redirect()->route('readContent', ['id' => $r->id, 'code' => 'code', 'flag'=>0]);
        
        
    }

    
    public function destroy(Request $r)
    {
        $content = SubjectContent::find($r->id);

        if ($content) {
            $content->delete();
            return redirect()->back();
        }
    }
}
