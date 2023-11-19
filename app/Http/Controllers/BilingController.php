<?php

namespace App\Http\Controllers;

use App\Models\details_transaksi;
use App\Models\history_transaksi;
use App\Models\saldo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BilingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biling = saldo::with('user')->get();
        return view('dashboard.biling',['data' => ['title' => 'biling', 'data_biling' => $biling]]);
    }

    public function isiSaldo(Request $request) {
        if (Str::startsWith($request['no_hp'], '0')) {
            $request['no_hp'] = Str::replaceFirst('0', '62', $request['no_hp']);
        } else {
            dd($request['no_hp']);
        }
        $saldo = saldo::where('nomer_hp',$request['no_hp'])->get()[0];
        if(!$saldo) {
            return;
        }
        $total_saldo = intval($request['nominal']) + intval($saldo['saldo']);
        $biling = saldo::where('nomer_hp',$request['no_hp'])->update([
            'saldo' => $total_saldo,
        ]);
        $history = details_transaksi::create([
            'name' => 'Top Up',
            'nominal' => $request['nominal'],
            'status' => 'Succsess'
        ]);
        $history = details_transaksi::latest()->take(1)->get(['id']);
        $detail = history_transaksi::create([
            'id_saldo' => $saldo['id'],
            'id_transaksi' => $history[0]['id']
        ]);
        return redirect('/dashboard/biling');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
