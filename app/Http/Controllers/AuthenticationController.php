<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthenticationController extends Controller
    {
    public function logUser(Request $r) {
        
        // Request is data object and has login, passwd, database name from form
        $userName = $r->input('userName');
        $passwd = $r->input('passwd');
        $databaseName = $r->input('databaseName');
        $user = User::all()
            ->where('email', '==', $userName)
            ->where('password', '==', $passwd)
            ->first();

        // if user exitst in DB go to userPanel
        if ( $user) 
        {
            session()->put('user', $user);
            return redirect()->route('userPanel');
        } else {
            return back()->withInput();
        }        
    }
    
    public function userPanel() {
        // if user exitst in DB go to userPanel
        if (session()->get('user')) 
        {
            return view("userPanel", [
                'userName' => session()->get('user')->get('email'),
                'role' => session()->get('user')->get('role'),
                'department' => session()->get('user')->get('department')
            ]);
        } else {
            return view('welcome');
        }        
    }
}
