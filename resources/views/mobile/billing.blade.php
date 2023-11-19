@section('title', 'Home')
@extends('layout.mobile')
@section('content')
<div class="payment">
    <div class="navbar-atas-pay">
        <img src="{{asset('/gambar/user/'.Auth::user()->gambar)}}" alt="" class="pay">
        <div class="pay-judul">
            <p class="atas">Hello, {{Auth::user()->name}}</p>
            <h3>Welcome Back</h3>
        </div>
    </div>
    <div class="card-pay">
        <div class="content-satu">
            <i class="fa-solid fa-wallet"></i>
            <p>Isi Saldo Kamu</p>
        </div>
        <div class="content-dua">
            <i class="fa-solid fa-rupiah-sign"></i>
            <p>{{$data['data_saldo']->saldo}}</p>
        </div>
        <div class="content-tiga">
            <div class="fitur-pay">
                <i class="fa-brands fa-gg-circle"></i>
                <p>Transfer</p>
            </div>
            <div class="fitur-pay">
                <i class="fa-brands fa-gg-circle"></i>
                <p>History</p>
            </div>
        </div>
    </div>
    <div class="recent">
        <p>Recent Transaksi</p>
    </div>
</div>
@endsection