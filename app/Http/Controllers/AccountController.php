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
        
        $info = Teacher::all();
        return $info;
    }
}   

