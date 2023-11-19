<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIBITUT | VERIFY</title>
    <link rel="stylesheet" href="{{asset('css/style-verify.css')}}" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="{{asset('js/verify.js')}}" defer></script>
  </head>
  <body>
    <div class="container">
      <header>
        <i class="bx bxs-check-shield"></i>
      </header>
      <h4>Enter OTP Code</h4>
      <form action="" method="POST">
        @csrf
        <div class="input-field">
          <input type="number" name="kode_otp1" />
          <input type="number" name="kode_otp2" disabled />
          <input type="number" name="kode_otp3" disabled />
          <input type="number" name="kode_otp4" disabled />
        </div>
        <button>Verify OTP</button>
        <a href="/biling/phone/verify/{{$data}}"><button style="padding: 1em 2em" href="">Send OTP Baru</button></a>
      </form>
    </div>
  </body>
</html>