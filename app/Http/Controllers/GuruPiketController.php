<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Http\Request;

class GuruPiketController extends Controller
{
    public function Home() {
        return view('dashboard.GuruPiket.home',[
            'title' => 'Dashboard'
        ]);
    }
    public function menjadiGmapel() {
        $user = User::find(Auth()->user()->id);
        $user->role = UserRole::GuruMapel;
        $user->save();
        return redirect()->route('dashboard');
    }
}
