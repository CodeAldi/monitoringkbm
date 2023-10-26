<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function RenderLoginPage() {
        return view('authentication.login',[
            'title'=>'Login'
        ]);
    }

    function RenderRegisterPage() {
        return view('authentication.register', [
            'title' => 'Register'
        ]);
    }
}
