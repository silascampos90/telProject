<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    private $usuario;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->cliente->orderBy('id', 'DESC')->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'name' => 'required',
            'cpf' => 'required',
            'local_nascimento' => 'required',
            'telefone' => 'required',
        ]);
        

        $clientes = $this->cliente;
        $clientes->name = $data['name'];
        $clientes->cpf = $data['cpf'];
        $clientes->rg = $data['rg'];
        $clientes->telefone = $data['telefone'];
        $clientes->usuario_cadastro = $data['usuario_cadastro'];
        $clientes->local_nascimento = $data['local_nascimento'];
        $clientes->data_nascimento = $data['data_nascimento'];
        $clientes->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = $this->cliente->find($id);

        return view('clientes.edit', compact('clientes'));
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
        //
        $clientes = $this->cliente->find($id);
        $clientes->name = $request->get('name');
        $clientes->cpf = $request->get('cpf');
        $clientes->rg = $request->get('rg');
        $clientes->telefone = $request->get('telefone');
        $clientes->local_nascimento = $request->get('local_nascimento');
        $clientes->data_nascimento = $request->get('data_nascimento');

        
        $clientes->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $clientes = $this->cliente->find($id);
        $clientes->delete();
        return redirect()->route('clientes.index');
    }
}
