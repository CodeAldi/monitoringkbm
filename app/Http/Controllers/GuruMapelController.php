<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class GuruMapelController extends Controller
{
    public function menjadiPiket() {
        $user = User::find(Auth()->user()->id);
        $user->role = UserRole::GuruPiket;
        $user->save();
        return redirect()->route('dashboard');
    }
}
