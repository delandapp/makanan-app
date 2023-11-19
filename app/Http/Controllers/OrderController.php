<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\masakan;
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;
use App\Models\keterangan;
use App\Models\Meja;
use App\Models\OrderDetail;
use App\Models\transaksi;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_order = Order::get();
        $data_masakan = masakan::get();
        $data_user= User::get();
        $data_meja= Meja::where('status', 'A')->get();
        $data_keterangan= keterangan::get();

        return view('dashboard.order',['data' => ['title' => 'order','data_order' => $data_order,"data_masakan" => $data_masakan,"data_user" => $data_user,"data_meja"=> $data_meja,"data_keterangan" => $data_keterangan]]);
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
    public function store(StoreorderRequest $request)
    {
        if ($request['status'] == "pending") {
            meja::findOrFail($request['meja'])->update(['status' => 'N']);
        }
        $i = 1;
        $makanandata = [];
        while($i <= $data = count(masakan::get())) {
            if ($request['masakan'.$i] != null) {
                $makanandata[] = $request['masakan'.$i];
            }
            $i++;
        }
        $date = Carbon::now()->format('Y-d-m');
        $order = order::create([
            'tanggal' => $date,
            'id_meja' => $request['meja'],
            'id_user' => $request['user'],
            'id_keterangan' => $request['keterangan'],
            'status' => $request['status']
        ]);

        $order = order::latest()->take(1)->get(['id']);
        foreach ($makanandata as $makanan) :
        $order_details = OrderDetail::create([
            'id_order' => $order[0]['id'],
            'id_masakan' => $makanan
        ]);
        endforeach;
        $dataharga = order::latest()->take(1)->with('masakan')->get();
        $masakan = $dataharga[0]->masakan;
        $harga = 0;
        foreach ($masakan as $item) :
            $harga += $item->harga;
        endforeach;
        $transaksi = transaksi::create([
            'id_user' => $request['user'],
            'id_order' => $order[0]['id'],
            'tanggal' => $date,
            'total_harga' => $harga
        ]);
        return redirect('/dashboard/order');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data_order = Order::with(['keterangan','meja','masakan','user'])->findOrFail($id);
        // dd($data_order);
        return view('dashboard.order-detail',["data" => ['title' => "order","data_order" => $data_order]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderRequest $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
