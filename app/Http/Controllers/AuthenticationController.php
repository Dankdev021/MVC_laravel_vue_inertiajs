<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended('/course')->with('message', 'Usuário logado');
        }
        return redirect('/login')->with('error', 'login invalidio');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->back()->with('message', 'Logged out successfully');
    }
}
