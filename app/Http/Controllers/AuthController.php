<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\kode_otp;
use App\Models\masakan;
use Illuminate\Support\Arr;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use App\Http\Requests\studentCreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function user()
    {
        $agent = new Agent();
        $data_masakan = masakan::get();
        if ($agent->platform() == 'Windows') {
            return view('users.index',["data"=>['title'=>'home']]);
        } 
        return view('mobile.home-food',["data"=>['title'=>'home','data_masakan' => $data_masakan]]);
    }
    public function order()
    {   
        return view('users.order',["data"=>['title'=>'home']]);
    }
    public function dashboard()
    {
        return view('dashboard.home',["data"=>['title'=>'home']]);
    }
    public function table()
    {
        return view('dashboard.table',["data"=>['title'=>'table']]);
    }

    public function verify()
    {
        $data = Auth::user();
        if(Auth::user()->status == 'Panding') :
        Mail::to(''.$data['email'])->send(new kode_otp($data));
        user::findOrFail(Auth::user()->id)->update(['status' => 'Proses']);
        endif;
        return view('auth.verify',['data' => $data]);
    }

    public function send_kode($id)
    {
        $date_expired_otp = Carbon::now()->setTimezone('Asia/Jakarta');
        if ($date_expired_otp < Auth::user()->expired_otp && user::findOrFail($id)->where('status', '=', 'Active')) :
            return redirect()->back();
        endif;
        $date_expired_otp = $date_expired_otp->addMinutes(5);
        $otp = range(1000, 9999);
        $otp = Arr::random($otp, 4)[0];
        user::findOrFail($id)->update(['kode_otp' => $otp, 'expired_otp' => $date_expired_otp, 'status' => 'Panding']);
        return redirect()->back();
    }

    public function verify_kode(Request $request)
    {
        $kode = $request['kode_otp1'].$request['kode_otp2'].$request['kode_otp3'].$request['kode_otp4'];
        if ( $kode == Auth::user()->kode_otp) {
            $date = Carbon::now()->setTimezone('Asia/Jakarta');
            if ($date < Auth::user()->expired_otp) :
            $id = Auth::user()->id;
            user::findOrFail($id)->update(['email_verified_at' => $date,'status' => 'Active','expired_otp' => null]);
            return redirect('/login');
            endif;
            $agent = new Agent();
            dd($agent->platform());
            if ($agent->platform() == 'Windows') {
                return redirect()->back();
            } else {
                return redirect('/');
            }
        } 
        return redirect()->back();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function authenticating(loginRequest $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $agent = new Agent();
            // dd($agent->platform());
            if($agent->platform() != 'Windows') {
                return redirect()->intended('/');
            }
            return redirect()->intended('/dashboard');
        }

        Session::flash('status','error');
        Session::flash('message','Error Bos');
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register');
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
    public function store(studentCreate $request)   
    {
        $date_expired_otp = Carbon::now();
        $date_expired_otp = $date_expired_otp->setTimezone('Asia/Jakarta')->addMinutes(5);
        $otp = range(1000, 9999);
        $otp = Arr::random($otp, 4)[0];
        if ($request['password'] != $request['password2']) {
            Session::flash('error', 'error');
        return redirect('/login/register');
        }
        $password = Hash::make($request['password']);
        $users = user::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $password,
            'role_id' => 1,
            'status' => 'Panding',
            'jam_logout' => '-',
            'gambar' => 'default.png',
            'expired_otp' => $date_expired_otp,
            'kode_otp' => $otp,
        ]);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        Auth::attempt($credentials);
        Session::flash('sucses', 'Selamat Anda Berhasil Membuat Akun');
        return redirect('/login/verify');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
