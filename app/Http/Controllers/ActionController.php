<?php

namespace App\Http\Controllers;

use App\Models\Sylabus_initialized;
use App\Models\User;
use App\Models\UserToSylabus;
use Illuminate\Http\Request;

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
            'lastSearchedWord' => '',
        ]);
        }
        return redirect()->route("panel");
    }

    public function searchSylabuses(Request $r) {

        $this->redirectUserIfIsNotLoggedIn();
        
        $givenWord = $r->input('searchName');

        $sylabusesByGivenWord = Sylabus_initialized::where(function ($query) use ($givenWord) {
            $query->orWhere('code_subject', 'LIKE', '%' . $givenWord . '%')
                ->orWhere('name_subject', 'LIKE', '%' . $givenWord . '%')
                ->orWhere('type_study', 'LIKE', '%' . $givenWord . '%')
                ->orWhere('speciality', 'LIKE', '%' . $givenWord . '%')
                ->orWhere('degree', 'LIKE', '%' . $givenWord . '%')
                ->orWhere('semester', 'LIKE', '%' . $givenWord . '%');
        })->get();

        
        return view('find-sylabuses', [ 
            'account' => session()->get('user')['id'],
            'email' => session()->get('user')['email'],
            'userSylabuses' => $sylabusesByGivenWord,
            'lastSearchedWord' => $givenWord,
        ]);   
    }
}   