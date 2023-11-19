<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\storeUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function index() {
        $data_user = User::with('role')->get();
        $data_role = Role::get();
        return view('dashboard.user',['data' => ['title' => 'user','data_user' => $data_user,'data_role'=>$data_role]]);
    }

    public function store(storeUser $request) {
        if ($request['password'] != $request['password2']) {
            Session::flash('error', 'error');
        return redirect('/dashboard/user');
        }
        $namaFile = "";
        $nama = Auth::user()->name;
        if($request->file('gambar')) {
            $image = $request->file('gambar');
            $exstension = $request->file('gambar')->getClientOriginalExtension();
            $destinationPath = public_path('/gambar/user');
            $namaFile = $nama.'-'.now()->timestamp.'.'.$exstension;
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(200, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'. $namaFile);
        }
        $password = Hash::make($request['password']);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role_id' => $request['role'],
            'status' => "-",
            'jam_logout' => "-",
            'password' => $password,
            'gambar' => $namaFile
        ]);
        return redirect('/dashboard/user');
    }
}
