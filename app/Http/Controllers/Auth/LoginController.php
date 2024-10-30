<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function autenticacao(Request $request)
    {
        $credenciais = $request->validate([
            'login' => ['required', 'string'],
        ], [
            'login.required' => 'Login Obrigatório',
            'login.login' => 'Login inválido',
        ]);

        $user = User::where('login', $credenciais['login'])->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors('erro', 'Login inválido');
        }
    }
}


