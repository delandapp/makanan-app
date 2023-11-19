<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMeja;

class mejacontroller extends Controller
{
    public function index() {
        $data_meja = Meja::get();
        return view('dashboard.meja',['data' => ['title' => 'meja','data_meja' => $data_meja]]);
    }
    public function store(StoreMeja $request)
    {
        $meja = meja::create([
            'name' => $request['name'],
            'status' => $request['status']
        ]);
        return redirect('/dashboard/meja');
    }
}
