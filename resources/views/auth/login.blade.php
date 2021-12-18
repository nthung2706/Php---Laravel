

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập hệ thống </title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="public/login/images/icons/icon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="public/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="public/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt="" style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
                    <img src="public/login/images/img-01.png" alt="IMG">
                </div>
                <form method="post" action="{{ route('login') }}  " class="signin-form">
                            @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 {{ $errors->has('email') || $errors->has('username') ? ' is-invalid' : '' }}" type="text"  name="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email or Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						@if ($errors->has('email') || $errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
											{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                                        </strong>
                                    </span>
                         @endif
					</div>

                    <div class="wrap-input100 validate-input @error('password') is-invalid @enderror" data-validate = "Password is required">
						<input class="input100"  id="password" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
						@error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
					</div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        @if (Route::has('password.request'))
                        <a class="txt2" href="{{ route('password.request') }}">
                            Password?
                        </a>
                        @endif
                    </div>
                    <div class="text-center p-t-136">
                    @if (Route::has('login'))
                        <a class="txt2"  href="{{ route('register') }}">
                            Đăng kí
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    @endif
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="public/login/vendor/bootstrap/js/popper.js"></script>
	<script src="public/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="public/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="public/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="public/login/js/main.js"></script>

</body>
</html>