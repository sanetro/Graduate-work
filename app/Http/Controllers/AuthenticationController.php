<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AuthenticationController extends Controller
    {
    public function login(Request $r) {        
        // Request is data object and has login, passwd, database name from form
        $email = $r->input('userName');
        $passwd = $r->input('passwd');
        $database = $r->input('databaseName');
        $user = User::all()
            ->where('email', '==', $email)
            ->where('password', '==', $passwd)
            ->first();
        
        // if user exitst in DB go to userPanel
        if ($user) {
            session()->put('user', $user);
            return redirect()->route('userPanel');
        } else {
            return back()->withInput();
        }        
    }
    
    public function userPanel() {
        // redirect unexpected guest
        if (session()->has('user') == null)
            return redirect()->route('welcome');

        // if user exitst in DB go to userPanel
        if (session()->get('user')) 
        {
            return view("userPanel", [
                'email' => session()->get('user')['email'],
                'role' => session()->get('user')['role'],
                'department' => session()->get('user')['department']
            ]);
        } else {
            return route('welcome');
        }        
    }

    public function logout() {
        session()->flush();
        return redirect()->route('welcome');
    }
}
