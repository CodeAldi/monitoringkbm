<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruPiketController extends Controller
{
    function Home() {
        return view('dashboard.GuruPiket.home',[
            'title' => 'Dashboard'
        ]);
    }
}
