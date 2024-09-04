<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $this->user->createUser($data);
        return redirect('/course')->with('message', 'Usuario criado com sucesso');
    }
    public function updateUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email',
        ]);
        $this->user->updateUser($data);
        return redirect()->back()->with('message', 'Usuário atualizado com sucesso');
    }
    public function getUsers()
    {
        $users = $this->user->getUsers();
        return Inertia::render('ListUsers', ['users' => $users]);
    }

}
