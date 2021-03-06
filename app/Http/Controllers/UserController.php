<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $usuario;

    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = $this->usuario->orderBy('id', 'DESC')->paginate(10);

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $usuarios = $this->usuario;
            $usuarios->name = $data['name'];
            $usuarios->email = $data['email'];
            $usuarios->password = bcrypt($data['password']);
            $usuarios->save();
            flash('Usuário Criado com Sucesso')->success()->important();
            return redirect()->route('usuarios.index');
        } catch (\Exception $th) {
            flash('Erro ao tentar Criar Novo Usuário, Tente Novamente')->error()->important();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = $this->usuario->find($id);

        return view('usuarios.edit', compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $usuarios = $this->usuario->find($id);
            $usuarios->name = $request->get('name');
            $usuarios->email = $request->get('email');
            if (!empty($request->get('password'))) {
                $usuarios->password = bcrypt($request->get('password'));
            }
            $usuarios->save();
            flash('Usuário Atualizado com Sucesso')->success()->important();
            return redirect()->route('usuarios.index');
        } catch (\Exception $th) {
            flash('Erro ao tentar Atualizar o Usuário, Tente Novamente')->error()->important();
            return redirect()->back();
        }
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $usuarios = $this->usuario->findOrFail($id);
            $usuarios->delete();
            flash('Usuário Deletado com Sucesso')->success()->important();
            return redirect()->route('usuarios.index');
        } catch (\Throwable $th) {
            flash('Erro ao tentar Deletar o Usuário, Tente Novamente')->error()->important();
            return redirect()->back();
        }

      
    }
}
