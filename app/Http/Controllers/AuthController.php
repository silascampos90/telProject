<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $usuario;

    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {

        try {

            $data = $request->all();

            $usuarios = $this->usuario;
            $usuarios->name = $data['name'];
            $usuarios->email = $data['email'];
            $usuarios->password = bcrypt($data['password']);
            $usuarios->save();
            flash('Registrado com sucesso, faça o login!')->success()->important();
            return redirect()->route('login');
        } catch (\Exception $th) {
            flash('Registro Não realizado, tente novamente!')->error()->important();
            return redirect()->back();
        }
    }


    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            flash('Usuário Logado com sucesso!')->success()->important();
            return redirect()->route('usuarios.index');
        } else {
            flash('Credenciais Inválidas')->error()->important();
            return redirect()->back();
        }
        flash('Credenciais Inválidas')->error()->important();
        return redirect()->back();
    }
}
