<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meja;
use App\Models\User;
use App\Models\order;
use App\Models\saldo;
use App\Models\masakan;
use Twilio\Rest\Client;
use App\Models\keranjang;
use App\Models\transaksi;
use App\Models\OrderDetail;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\createSaldo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\keranjangRequest;
use Illuminate\Support\Facades\Session;

class MobileController extends Controller
{
    public function bayarKeranjang(Request $request) {
        $saldo = saldo::where('id_user', Auth::user()->id)->get();
        if($saldo[0]['saldo'] <= $request['harga']){
            return;
        }
        $saldo_akhir = $saldo[0]['saldo'] - intval($request['harga']);
        saldo::where('id_user',Auth::user()->id)->update(['saldo' => $saldo_akhir]);
        if ($request['status'] == "Pending") {
            meja::findOrFail($request['meja'])->update(['status' => 'N']);
            $date = Carbon::now()->format('Y-d-m');
            $order = order::create([
            'tanggal' => $date,
            'id_meja' => $request['meja'],
            'id_user' => Auth::user()->id,
            'id_keterangan' => 1,
            'status' => 'succsess',
        ]);
        $order = order::latest()->take(1)->get(['id']);
        $makanandata = user::with('keranjang')->findOrFail(Auth::user()->id);
        foreach ($makanandata['keranjang'] as $makanan) :
            $order_details = OrderDetail::create([
                'id_order' => $order[0]['id'],
                'id_masakan' => $makanan['id']
            ]);
        endforeach;
        $transaksi = transaksi::create([
            'id_user' => Auth::user()->id,
            'id_order' => $order[0]['id'],
            'tanggal' => $date,
            'total_harga' => $request['harga']
        ]);
        keranjang::where('id_user',Auth::user()->id)->delete();
        return redirect('/');
        } else {
            return;
        }
    }

    public function viewKeranjangCheckout() {
        $data_meja = Meja::where('Status', 'A')->get();
        $data_masakan = user::with('keranjang')->findOrFail(Auth::user()->id);
        $harga = 0;
        foreach ($data_masakan['keranjang'] as $key) {
            $harga += $key['harga'];
        }
        return View('mobile.checkout',['data' => ['title' => 'checkout', 'data' => $data_meja, 'harga' => $harga]]);
    }

    public function viewSaldo()
    {
        return View('Auth.nomer');
    }

    public function SendVerify($id)
    {
        $date_expired_otp = Carbon::now()->setTimezone('Asia/Jakarta');
        $saldo = saldo::findOrFail($id);
        if ($date_expired_otp < $saldo['expired_otp'] && user::findOrFail($saldo['id_user'])->where('saldo', '=', 'Active')) :
            return redirect()->back();
        endif;
        $date_expired_otp = $date_expired_otp->addMinutes(5);
        $otp = range(1000, 9999);
        $otp = Arr::random($otp, 4)[0];
        saldo::findOrFail($id)->update(['kode_otp' => $otp, 'expired_otp' => $date_expired_otp, 'status' => 'Panding']);
        return redirect()->back();
    }

    public function viewVerify()
    {
        $saldo = saldo::where('id_user', Auth::user()->id)->get();
        if ($saldo[0]['saldo'] == 0) {
            $sid    = "ACd5375cef11db80bf19e37f29619b9f2e";
            $token  = "2b97057d791b1ba04f93cc7ee607ac6c";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:+" . $saldo[0]['nomer_hp'], // to
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => "Kode Otp Anda DI Cibitut Adalah " . $saldo[0]['kode_otp'] . " Expired Dalam 15 Menit"
                    )
                );
            $id = $saldo[0]['id'];
            saldo::where('id', $id)->update(['saldo' => 1]);
        }
        $data = $saldo[0]['id'];
        return View('Auth.verify-mobile', ['data' => $data]);
    }

    public function VerifyMobile(Request $request)
    {
        $kode = $request['kode_otp1'] . $request['kode_otp2'] . $request['kode_otp3'] . $request['kode_otp4'];
        $saldo = saldo::where('id_user', Auth::user()->id)->get()[0];
        if ($kode == $saldo['kode_otp']) {
            $date = Carbon::now()->setTimezone('Asia/Jakarta');
            if ($date < $saldo['expired_otp']) :
                saldo::findOrFail($saldo['id'])->update(['created_at' => $date, 'expired_otp' => null, 'saldo' => 0]);
                user::findOrFail($saldo['id_user'])->update(['saldo' => 'Active']);
                return redirect('/biling');
            endif;
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function createSaldo(createSaldo $Request)
    {
        if (Str::startsWith($Request['handphone'], '0')) {
            $Request['handphone'] = Str::replaceFirst('0', '62', $Request['handphone']);
        } else {
            return;
        }
        $date_expired_otp = Carbon::now();
        $date_expired_otp = $date_expired_otp->setTimezone('Asia/Jakarta')->addMinutes(5);
        $otp = range(1000, 9999);
        $otp = Arr::random($otp, 4)[0];
        $saldo = saldo::create([
            'nomer_hp' => $Request['handphone'],
            'id_user' => Auth::user()->id,
            'saldo' => 0,
            'kode_otp' => $otp,
            'expired_otp' => $date_expired_otp
        ]);

        return redirect('/biling/phone/verify');
    }


    public function viewKeranjang()
    {
        $id = Auth::user()->id;
        $data_keranjang = User::with('keranjang')->findOrFail($id);
        // dd($data_keranjang);
        return view('mobile.keranjang', ['data' => ['title' => 'Keranjang', 'data_keranjang' => $data_keranjang]]);
    }
    public function viewBiling()
    {
        $id = Auth::user()->id;
        $data_saldo = saldo::with('history')->where('id_user', $id)->firstOrFail();
        return view('mobile.billing', ['data' => ['title' => 'Billing', 'data_saldo' => $data_saldo]]);
    }

    public function product($id)
    {
        $data_masakan = masakan::findOrFail($id);
        return view('mobile.detail-food', ["data" => ['title' => 'home', 'data_masakan' => $data_masakan]]);
    }

    public function keranjang(keranjangRequest $Request)
    {
        $status = masakan::findOrFail($Request['masakan']);
        if ($status['status'] == 'N') {
            Session::flash('error', 'Maaf Makanan Tidak Tersedia');
            return redirect()->back();
        }
        $keranjang = keranjang::create([
            'id_user' => Auth::user()->id,
            'id_masakan' => $Request['masakan'],
        ]);
        return redirect('/keranjang');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function destroy($id)
    {
        keranjang::where('id_masakan', $id)->first()->delete();
        return redirect()->back();
    }
}
