<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PublicController extends Controller
{
    public function getAuth(){
        return view('auth');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'id' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Attempt login using 'id' instead of 'email'
        if (Auth::attempt(['id' => $credentials['id'], 'password' => $credentials['password']], $request->filled('remember'))) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }else if(Auth::user()->role == 'guru'){
                return redirect()->intended(route('guru.dashboard'));
            }else if(Auth::user()->role == 'siswa' || Auth::user()->role == 'staff_tendik'){
                return redirect()->intended(route('siswa.dashboard'));
            }

        }
        return back()->withErrors([
            'error' => 'Email atau kata sandi yang Anda masukkan tidak sesuai.',
        ])->withInput();

        // If authentication fails, throw an error
        throw ValidationException::withMessages([
            'id' => [trans('auth.failed')], // Changed from 'username' to 'id'
        ]);
    }

    public function logout(Request $request){
        Auth::logout(); // Logs out the user

        $request->session()->invalidate(); // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/'); // Redirect to login page
    }
}
