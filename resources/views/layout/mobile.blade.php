<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/mobile.css')}}">
    <script src="https://kit.fontawesome.com/31cb6cb70f.js" crossorigin="anonymous"></script>
    <title>Cibitut || @yield('title')</title>
    <script src="https://kit.fontawesome.com/31cb6cb70f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="content">
        @yield('content')
        <div class="sidebar-bawah">
            <a href="/"><i class="fa-solid fa-house"></i></a>
            <a href="/biling"><i class="fa-regular fa-credit-card"></i></a>
            <a href="/keranjang"><div class="keranjang"><i class="fa-solid fa-cart-plus"></i></div></a>
            <a href=""><i class="fa-solid fa-hand-holding-heart"></i></a>
            <a href=""><i class="fa-solid fa-user"></i></a>
        </div>
    </div>
    <script src="{{ asset('js/script-toast.js') }}"></script>
</body>
</html>
