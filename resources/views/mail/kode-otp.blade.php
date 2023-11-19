<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode OTP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333333;
            text-align: center;
        }
        .otp-code {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin: 20px 0;
        }
        p {
            color: #555555;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kode OTP Anda</h2>
        <p>Berikut adalah kode OTP Anda untuk verifikasi:</p>
        <div class="otp-code">{{$data['kode_otp']}}</div>
        <p>Jangan berikan kode ini kepada siapapun. Kode ini hanya berlaku sekali dan akan kadaluarsa setelah digunakan.</p>
        <p>Jika Anda tidak mencoba masuk, silakan abaikan pesan ini.</p>
        <div class="footer">
            <p>Salam hangat,</p>
            <p>Tim Kami</p>
        </div>
    </div>
</body>
</html>