<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticationController extends Controller
{
    function RenderLoginPage() {
        return view('authentication.login',[
            'title'=>'Login'
        ]);
    }

    function RenderRegisterPage() {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('authentication.register', [
            'title' => 'Register',
            'jurusan' => $jurusan,
            'kelas' => $kelas,
        ]);
    }
    function RegisterStore(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'jurusan_id' => 'required|integer|min:1',
            'kelas_id' => 'required|integer|min:1',
        ]);
        $validatedData['role'] = UserRole::Siswa;
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->role = $validatedData['role'];
        $user->save();
        $siswa = new Siswa();
        $siswa->user_id = $user->id;
        $siswa->jurusan_id = $validatedData['jurusan_id'];
        $siswa->kelas_id = $validatedData['kelas_id'];
        $siswa->save();
        return redirect()->route('login')->with('success' , 'Pendaftaran Berhasil, Silahkan Login !');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
