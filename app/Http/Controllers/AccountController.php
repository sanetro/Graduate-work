<?php

namespace App\Http\Controllers;


use App\Models\User;

// use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function showAccount() {
        // redirect unexpected guest
        if (session()->has('user') == null)
            return redirect()->route('welcome');
        
        $thisUser = User::find(session()->get('user')['id']);
        $role = $thisUser->roles->role_name;
        $chair = $thisUser->chairs->name;
        $department = $thisUser->chairs->departments->name;
        
        if($thisUser != null) {
            return view('account-information', [ 
            'account' => $thisUser,
            'email' => session()->get('user')['email'],
            'role' => $role,
            'chair' => $chair,
            'department' => $department
            ]
        );
        }
        return redirect()->route("panel");
    }
}   

