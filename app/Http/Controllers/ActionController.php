<?php

namespace App\Http\Controllers;

use App\Models\Sylabus_initialized;
use App\Models\User;
use App\Models\UserToSylabus;

// use Illuminate\Http\Request;

class ActionController extends Controller
{
    private function redirectUserIfIsNotLoggedIn() {
        if (session()->has('user') == null)
            return redirect()->route('welcome');
    }

    public function showMySylabuses() {

        $this->redirectUserIfIsNotLoggedIn();
        
        $userId = session()->get('user')['id'];
        $userSylabusesId = UserToSylabus::where('user_id', $userId)->pluck('sylabus_id');
        $thisUser = User::find($userId);
        $userSylabuses = Sylabus_initialized::whereIn('id', $userSylabusesId)->get();
            
        if($thisUser != null) {
            return view('my-sylabuses', [ 
            'account' => $thisUser,
            'email' => session()->get('user')['email'],
            'userSylabuses' => $userSylabuses,
        ]);
        }
        return redirect()->route("panel");
    }

    public function showFoundSylabuses() {        
        
        $this->redirectUserIfIsNotLoggedIn();

        $userId = session()->get('user')['id'];
        $userSylabusesId = UserToSylabus::where('user_id', $userId)->pluck('sylabus_id');
        $thisUser = User::find($userId);
        $userSylabuses = Sylabus_initialized::whereIn('id', $userSylabusesId)->get();
            
        if($thisUser != null) {
            return view('find-sylabuses', [ 
            'account' => $thisUser,
            'email' => session()->get('user')['email'],
            'userSylabuses' => $userSylabuses,
        ]);
        }
        return redirect()->route("panel");
    }
}   