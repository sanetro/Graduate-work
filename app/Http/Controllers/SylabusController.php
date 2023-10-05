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
}
