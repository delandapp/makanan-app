<?php

namespace App\Http\Controllers;

use App\Models\keterangan;
use App\Http\Requests\StoreketeranganRequest;
use App\Http\Requests\UpdateketeranganRequest;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_keterangan = keterangan::get();
        return View('dashboard.keterangan',["data" => ["title" => "keterangan","data_keterangan" => $data_keterangan]]);
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
    public function store(StoreketeranganRequest $request)
    {
        $keterangan = keterangan::create([
            'name' => $request['desc']
        ]);
        return redirect('/dashboard/keterangan');
    }

    /**
     * Display the specified resource.
     */
    public function show(keterangan $keterangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keterangan $keterangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateketeranganRequest $request, keterangan $keterangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keterangan $keterangan)
    {
        //
    }
}
