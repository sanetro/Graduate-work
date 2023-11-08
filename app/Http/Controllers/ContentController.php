<?php

namespace App\Http\Controllers;

use App\Models\SylabusToContent;
use Illuminate\Http\Request;



class ContentController extends Controller
{

    public function read(Request $r) {
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

    public function add(Request $r) {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    
        // if user exitst in DB go to userPanel with collection: email, role, department
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
}
