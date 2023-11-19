<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIBITUT | LOGIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{!! asset('css/form-register.css') !!}">
</head>

<body>
    {{-- <div class="toast @if (Session::has('sucses')) {{ 'active' }} @endif">
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i>
                <div class="message">
                    <span class="text text-1">
                        Succses
                    </span>
                    <span class="text text-2">{{ Session::get('sucses') }}</span>
                </div>        
        </div>
        <i class="fa-solid fa-xmark close"></i>

        <div class="progress active"></div>
    </div> --}}
    <div class="toast @if (Session::has('status')) {{ 'active error'}} @endif">
        <div class="toast-content">
            <i class="fa-solid fa-triangle-exclamation" style="font-size: 20px;color:#D80032;"></i>
                <div class="message">
                    <span class="text text-1">
                        Error
                    </span>
                    <span class="text text-2">Anda gagal login <span style="color: #D80032; font-weight:1000;">[</span> <span style="color: #aeaeae">please check email / password </span><span style="color: #D80032; font-weight:1000;">]</span></span>
                </div>        
        </div>
        <i class="fa-solid fa-xmark close"></i>

        <div class="progress active error"></div>
    </div>
    <div class="wrapper">
        <h2>Login</h2>
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-box button">
                <input type="Submit" value="Login Now">
            </div>
            <div class="text">
                <h3>Dont have an account? <a href="/login/register">Create now</a></h3>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/script-toast.js') }}"></script>
</body>

</html>
