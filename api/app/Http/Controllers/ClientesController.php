<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{


    public function index(Request $request)
    {

        $cliente =  Cliente::all();

        return response()->json($cliente);
    }

    public function store(ClienteRequest $request)
    {
        $data = $request->all();
        try {
            $cliente = Cliente::create($data);
            return response()->json(['msg'=>'Cliente cadastrado com sucesso!'],200);

        }catch (\Exception $e){

            return response()->json(['error'=> $e->getMessage()]);
        }

    }

    public function show(Cliente $cliente)
    {
        return $cliente;
    }

    public function update(Request $request, Cliente $cliente )
    {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'telefone'=>'required|max:255',
            'estado'=>'required|max:255',
            'cidade'=>'required|max:255',
            'dtnascimento'=>'required|max:255'
        ]);

        $cliente->name = $request->input('name');
        $cliente->email = $request->input('email');
        $cliente->telefone = $request->input('telefone');
        $cliente->estado = $request->input('estado');
        $cliente->cidade = $request->input('cidade');
        $cliente->dtnascimento = $request->input('dtnascimento');
        $cliente->save();

        return $cliente;
    }

    public function delete(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(['success'=>true]);
    }
}
