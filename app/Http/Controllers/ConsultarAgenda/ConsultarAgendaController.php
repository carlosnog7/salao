<?php

namespace App\Http\Controllers\ConsultarAgenda;

use App\Http\Controllers\Controller;
use App\Models\Valor;
use Illuminate\Http\Request;

class ConsultarAgendaController extends Controller
{
    public function index()
    {

        $valores = Valor::all();
        return view('admin.consultaragenda.index', compact('valores'));

    }

    public function edit($id)
    {
        $valor = Valor::findOrFail($id);
        return view('admin.consultaragenda.edit', compact('valor'));
    }

    public function update(Request $request, $id)
    {
        $valor = Valor::findOrFail($id);
        $valor->acao = $request->acao;
        $valor->valor = $request->valor;
        $valor->data = $request->data;
        $valor->descricao = $request->descricao;
        $valor->save();

        return redirect()->route('consultaragenda.index')->with('success', 'Valor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $valor = Valor::findOrFail($id);
        $valor->delete();

        return redirect()->route('consultaragenda.index')->with('success', 'Valor deletado com sucesso!');
    }
}
