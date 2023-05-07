<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

// use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account() {
        // redirect unexpected guest
        if (session()->has('user') == null)
            return redirect()->route('welcome');
        
        $teacher = Teacher::all()
            ->where('id', session()->get('user')['id'])
            ->first();
        
        if($teacher != null) {
            return view('account-information', [ 
            'account' => $teacher,
            'email' => session()->get('user')['email']]);
        }
        return redirect()->route("panel");
    }
}   

