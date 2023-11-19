@section('title','Home')
@extends('layout.mobile')
@section('content')
<div class="nav-atas">
    <img src="logo_web.png" alt="" class="logo">
    <div class="search">

    </div>
</div>
<div class="judul">
    <h3>Berbelanja Dengan Mudah</h3>
    <h6>Banyak diskon menantimu</h6>
</div>
<div class="nav-link">
    <a href="" class="link">Food</a>
    <a href="drink.html" class="link">Drink</a>
    <a href="snack.html" class="link">Snack</a>
</div>
<div class="content-main">
    <div class="content-container">
        @foreach ($data['data_masakan'] as $item)
        <a href="/product/{{$item['id']}}"">
            <div class="content-menu">
                <img src="{{asset('/gambar/makanan/'.$item['gambar'])}}" alt="" class="makanan">
                <h5 class="judul-menu">{{$item['nama']}}</h5>
                <h5 class="desc">{{$item['desc']}}</h5>
                <div class="footer-menu">
                    <h5 class="harga">{{$item['harga']}}</h5>
                </div>
            </div>
        </a>
        @endforeach

        
    </div>
</div>
@endsection