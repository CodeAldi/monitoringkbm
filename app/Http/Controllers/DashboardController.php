<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() : View {
        return view('dashboard.home',[
            'title' => 'Dashboard'
        ]);
    }
}
