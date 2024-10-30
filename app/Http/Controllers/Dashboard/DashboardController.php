<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Valor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $valores = Valor::orderBy('data')->get();
        $saldoTotal = 0;

        // CALCULO SALDO TOTAL
        foreach ($valores as $valor) {
            if ($valor->acao == 'entrada') {
                $saldoTotal += $valor->valor;
            } else if ($valor->acao == 'saida') {
                $saldoTotal -= $valor->valor;
            }
        }

        $saldoClass = $saldoTotal >= 0 ? 'text-positivo' : 'text-negativo';

        return view('admin.dashboard.index', ['saldoTotal' => $saldoTotal, 'saldoClass' => $saldoClass]);
    }
}

