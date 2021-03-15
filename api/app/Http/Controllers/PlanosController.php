<?php

namespace App\Http\Controllers;

use App\Plano;
use Illuminate\Http\Request;

class PlanosController extends Controller
{
    public function index()
    {
        return Plano::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo'=>'required|max:255',
            'mensalidade'=>'required|numeric|between:0,999.99'
        ]);
        /*
        $plano = Plano::create([
            'tipo'=>$request->input('tipo'),
            'mensalidade'=>$request->input('mensalidade')
        ]);
        return $request->$plano;*/

        $data = $request->all();
        if($plano = Plano::create($data)){
            return response()->json(['msg'=>'Plano cadastrado com sucesso!']);
        } else {
            return response()->json(['msg'=>'Erro!Tente novamente']);
        }

    }

    public function show(Plano $plano)
    {
        return $plano;
    }

    public function update(Request $request, Plano $plano )
    {
        $request->validate([
            'tipo'=>'required|max:255',
            'mensalidade'=>'required|numeric|between:0,999.99'
        ]);
        $plano->tipo = $request->input('tipo');
        $plano->mensalidade = $request->input('mensalidade');
        $plano->save();

        return $plano;
    }

    public function delete(Plano $plano)
    {
        $plano->delete();
        return response()->json(['success'=>true]);
    }
}
