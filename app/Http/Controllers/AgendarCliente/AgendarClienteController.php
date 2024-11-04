<?php

namespace App\Http\Controllers\AgendarCliente;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
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
            'nomedacliente' => 'required|string|max:255',
            'procedimento' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'horario' => 'required|date_format:H:i',
        ]);

        Agendamento::create([
            'nome_cliente' => $request->nomedacliente,
            'procedimento' => $request->procedimento,
            'valor' => $request->valor,
            'data' => $request->data,
            'horario' => $request->horario,
        ]);

        return redirect()->route('consultaragenda.index')->with('success', 'Agendamento realizado com sucesso!');
    }
}

