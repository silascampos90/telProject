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
    public function getLogin(){
        return view('auth.login');
    }
    public function getRegister(){
        return view('auth.register');
    }

    public function postRegister (Request $request){
        
        $data = $request->all();        

        $usuarios = $this->usuario;
        $usuarios->name = $data['name'];
        $usuarios->email = $data['email'];
        $usuarios->password = bcrypt($data['password']);
        $usuarios->save();
        return redirect()->route('login');
    }
    

    public function postLogin(Request $request){

        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('usuarios.index');
        } else {
            return redirect()->back()->with('msg',"Acesso negado com estas credenciais");
        }

        
    }
}
