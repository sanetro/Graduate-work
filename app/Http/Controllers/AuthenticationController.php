<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sylabus_initialized;
use App\Models\UserToSylabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller {
    
    public function login(Request $r) {        
        $email = $r->input('userName');
        $password = $r->input('passwd');
        $database = $r->input('databaseName');
    
        $user = User::where('email', $email)->first();
        
        if ($user && Hash::check($password, $user->password)) {
            session()->put('user', $user);
            return redirect()->route('panel');
        } else {
            return back()->withInput();
        }    
    }
    
    public function panel() {
        // redirect unexpected guest
        if (session()->has('user') == null)
            return redirect()->route('welcome');

        // if user exitst in DB go to userPanel with collection: email, role, department
        if (session()->get('user')) 
        {
            $userId = session()->get('user')['id'];
            $userSylabusesId = UserToSylabus::where('user_id', $userId)->pluck('sylabus_id');
            $userSylabuses = Sylabus_initialized::whereIn('id', $userSylabusesId)->get();    

            return view("userPanel", [
                'email' => session()->get('user')['email'],
                'role' => session()->get('user')['role'],
                'department' => session()->get('user')['department'],
                'sylabus' => Sylabus_initialized::all(),
                'userSylabuses' => $userSylabuses
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
