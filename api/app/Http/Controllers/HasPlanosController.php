<?php

namespace App\Http\Controllers;

use App\HasPlanoCliente;
use Illuminate\Http\Request;

class HasPlanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // return response()->json(['message' => __METHOD__]);
        return HasPlanoCliente::all();
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
        try {
            $HasPlanoCliente = HasPlanoCliente::create($data);
            return response()->json(['msg'=>'Plano adicionado ao cliente com sucesso!'],200);
        } catch (\Exception $e)
        {
            return response()->json(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HasPlanoCliente $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasPlanoCliente $id)
    {

        try {
            $HasPlanoCliente->plano_id = $request->input('plano_id');
            $HasPlanoCliente->cliente_id = $request->input('cliente_id');
            $HasPlanoCliente->save();
            return response()->json(['msg'=>'Plano alterado para o cliente com sucesso!'],200);

        } catch (\Exception $e)
        {
            return response()->json(['error'=> $e->getMessage()]);
        }


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

            $HasPlanoCliente->delete();
            return response()->json(['msg'=>'Plano removido para o cliente com sucesso!'],200);

        } catch (\Exception $e)
        {
            return response()->json(['error'=> $e->getMessage()]);
        }
    }
}
