<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // user admin

    // bagian guru start
    function guruIndex() {
        return view('dashboard.admin.guru.index',[
            'title' => 'List Guru',
        ]);
    }
}
