<?php
    // https://www.positronx.io/laravel-image-resize-upload-with-intervention-image-package/
namespace App\Http\Controllers;

use App\Models\masakan;
use App\Http\Requests\StoremasakanRequest;
use App\Http\Requests\UpdatemasakanRequest;
use App\Models\kategori_makanan;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_masakan = masakan::get();
        $data_kategori = kategori_makanan::get();
        Return view('dashboard.masakan', ['data'=>['title'=>'masakan','data_makanan' => $data_masakan,'data_kategori' => $data_kategori]]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function updatedata($id, $parameter)
    {
        if ($parameter == "active") {
            $data_masakan = masakan::findOrFail($id)->update(['status'=>'A']);
        } elseif ($parameter == "mati") {
            $data_masakan = masakan::findOrFail($id)->update(['status'=>'N']);
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremasakanRequest $request)
    {
        $namaFile = "";
        $nama = $request['nama'];
        if($request->file('gambar')) {
            $image = $request->file('gambar');
            $exstension = $request->file('gambar')->getClientOriginalExtension();
            $destinationPath = public_path('/gambar/makanan');
            $namaFile = $nama.'-'.now()->timestamp.'.'.$exstension;
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(112, 96, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'. $namaFile);
            $masakan = masakan::create([
                'nama' => $request['nama'],
                'desc' => $request['desc'],
                'harga' => $request['harga'],
                'status' => $request['status'],
                'id_kategori_makanan' => $request['kategori_makanan'],
                'estimasi' => $request['estimasi'],
                'gambar' => $namaFile
            ]);
        }
        return redirect('/dashboard/masakan');
    }

    /**
     * Display the specified resource.
     */
    public function show(masakan $masakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(masakan $masakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemasakanRequest $request, masakan $masakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(masakan $masakan)
    {
        //
    }
}
