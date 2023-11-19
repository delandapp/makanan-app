@section('title','Home')
@extends('layout.mobile')
@section('content')
    <div class="keranjang-content">
        <div class="content-keranjang">
            @foreach ($data['data_keranjang']->keranjang as $item)
            <div class="isi-keranjang">
                <div class="bungkus">
                    <img src="{{asset('gambar/makanan/'.$item['gambar'])}}" alt="" class="keranjang">
                    <div class="detail-keranjang">
                        <p class="nama-barang">{{$item['nama']}}</p>
                        <p class="desc">{{$item['desc']}}</p>
                        <p class="harga-barang">Rp. {{$item['harga']}}</p>
                    </div>
                </div>
                <a href="/keranjang/delete/{{$item['pivot']->id_masakan}}"><i class="fa-solid fa-trash"></i></a>
            </div>
            @endforeach
        </div>
    </div>
    <a href="/keranjang/checkout"><button class="checkout">Checkout</button></a>
@endsection