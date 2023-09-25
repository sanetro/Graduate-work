<?php

namespace App\Http\Controllers;

use App\Models\User;

// use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function showMySubjects() {
        // redirect unexpected guest
        if (session()->has('user') == null)
            return redirect()->route('welcome');
        
        $teacher = User::find(session()->get('user')['id']);
        
        if($teacher != null) {
            return view('account-information', [ 
            'account' => $teacher,
            'email' => session()->get('user')['email']]
        );
        }
        return redirect()->route("panel");
    }
}   

