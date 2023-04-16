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

        return view("userPanel", [
            'userName' => $userName,
            'passwd' => $passwd,
            'databaseName' => $databaseName
        ]);
    }
}
