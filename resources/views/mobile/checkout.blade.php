@section('title', 'Home')
@extends('layout.mobile')
@section('content')
    <form class="checkout-bayar" action="" method="POST">
        @csrf
        <div class="meja">
            <h3>Pilih Meja</h3>
            <select name="meja" id="">
                @foreach ($data['data'] as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <div class="total-payment">
            <p>Total Payment</p>
            <p>Rp.{{$data['harga']}}</p>
        </div>
        <input type="hidden" name="harga" value="{{$data['harga']}}">
        <input type="hidden" name="status" value="Pending">
        <button type="submit" class="bayar">Bayar Sekarang</button>
    </form>
@endsection