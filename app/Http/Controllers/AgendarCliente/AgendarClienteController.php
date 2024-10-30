<?php

namespace App\Http\Controllers\AgendarCliente;

use App\Http\Controllers\Controller;
use App\Models\Valor;
use Illuminate\Http\Request;

class AgendarClienteController extends Controller
{
    public function index()
    {
        return view('admin.agendarcliente.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'acao' => 'required|string',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'descricao' => 'required|string|max:255',
        ]);

        Valor::create([
            'acao' => $request->acao,
            'valor' => $request->valor,
            'data' => $request->data,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('consultaragenda.index')->with('success', 'Valor inserido com sucesso!');
    }
}

