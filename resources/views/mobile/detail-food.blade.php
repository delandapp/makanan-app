@section('title', 'Home')
@extends('layout.mobile')
@section('content')
<div class="toast @if (Session::has('error')) {{ 'active'}} @endif">
    <div class="toast-content">
        <i class="fa-solid fa-triangle-exclamation" style="font-size: 20px;color:#D80032;"></i>
            <div class="message">
                <span class="text text-1">
                    Error
                </span>
                <span class="text text-2">{{Session::get('error')}}</span>
            </div>        
    </div>
    <i class="fa-solid fa-xmark close"></i>

    <div class="progress active error"></div>
</div>
    <div class="content-full">
        <div class="content-details">
            <img src="{{ asset('gambar/makanan/' . $data['data_masakan']->gambar) }}" alt="" class="product">
            <div class="header-content">
                <p class="nama">{{$data['data_masakan']->nama}}</p>
                <div class="flex">
                    <p class="harga">Rp {{$data['data_masakan']->harga}}</p>
                    <div class="estimasi"><i class="fa-solid fa-clock"></i>{{$data['data_masakan']->estimasi}} Menit</div>
                    <p class="status" style="@if ($data['data_masakan']->status == 'A   ')background-color: #FF9130 @else background-color: #192655; color: white; @endif">
                    @if ($data['data_masakan']->status == 'A')
                        Tersedia
                    @else 
                        Tidak Tersedia
                    @endif</p>
                </div>
                <p class="desc">{{$data['data_masakan']->desc}}</p>
            </div>
            <div class="main-content">
                <p class="estimasi"></p>
            </div>
            <form action="" method="post">
                @csrf
                <input type="hidden" name="masakan" value="{{$data['data_masakan']->id}}">
                <button type="submit" class="add-cart" @if ($data['data_masakan']->status == 'N')  @endif>@if ($data['data_masakan']->status == 'N')<i class="fa-solid fa-ban"></i> @else Add To cart @endif</button>
            </form>
        </div>
    </div>
@endsection
