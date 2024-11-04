<?php

namespace App\Http\Controllers\ConsultarAgenda;

use App\Http\Controllers\Controller;
use App\Models\Agendamento; 
use Illuminate\Http\Request;

class ConsultarAgendaController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('admin.consultaragenda.index', compact('agendamentos'));
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        return view('admin.consultaragenda.edit', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_cliente' => 'required|string|max:255',
            'procedimento' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'horario' => 'required|date_format:H:i',
        ]);

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->nome_cliente = $request->nome_cliente;
        $agendamento->procedimento = $request->procedimento;
        $agendamento->valor = $request->valor;
        $agendamento->data = $request->data;
        $agendamento->horario = $request->horario;
        $agendamento->save();

        return redirect()->route('consultaragenda.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('consultaragenda.index')->with('success', 'Agendamento deletado com sucesso!');
    }
}
