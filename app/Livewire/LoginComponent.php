<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginComponent extends Component
{
    public $email, $password;
    public function render()
    {
        return view('livewire.login-component')->layout('layout.partials.login');
    }
    public function proses() {
       $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'Login gagal, silahkan cek email dan password anda',
        ])->onlyInput('email');

    }
    public function logout() {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
