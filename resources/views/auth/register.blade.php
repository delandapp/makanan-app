<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIBITUT | REGISTER</title>
    <!-- ====== Fontawesome CDN Link ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <link rel="stylesheet" href="{!! asset('css/form-register.css') !!}">
</head>

<body>
    <div class="toast @if ($errors->any()) {{ 'active error'}} @endif">
        <div class="toast-content">
            <i class="fa-solid fa-triangle-exclamation" style="font-size: 20px;color:#D80032;"></i>
                <div class="message">
                    <span class="text text-1">
                        Error
                    </span>
                    <span class="text text-2">Anda gagal membuat akun</span>
                </div>        
        </div>
        <i class="fa-solid fa-xmark close"></i>

        <div class="progress active error"></div>
    </div>
    <div class="wrapper">
        <h2>Registration</h2>
        <form action="" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Create password" required>
            </div>
            <div class="input-box">
                <input type="password" name="password2" placeholder="Confirm password" required>
            </div>
            <div class="policy">
                <input type="checkbox" name="rule">
                <h3>I accept all terms & condition</h3>
            </div>
            <div class="text">
                <h3>Already have an account? <a href="/login">Login now</a></h3>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Register Now" class="button">
            </div>
        </form>
    </div>
    <script src="{{ asset('js/script-toast.js') }}"></script>
</body>

</html>
