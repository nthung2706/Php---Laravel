<!doctype html>
<html lang="en">

<head>
    <title>{{ __('label.register') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('public/login') }}/css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url('public/login/images/bg.jpg') ;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">{{ __('label.register') }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">

                        <form method="post" action="{{ route('register') }}  " class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('label.name') }}" autofocus autocomplete="name">
                                    @error('name')
                                    <div style="color:#fff"  class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="{{ __('label.email') }}">
                                        @error('email')
                                        <div style="color:#fff"  class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('label.password') }}" autocomplete="new-password">
                                        @error('password')
                                        <div style="color:#fff"  class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('label.cf_password') }}" autocomplete="new-password">
                                        @error('password_confirmation')
                                        <div style="color:#fff" class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">{{ __('label.register') }}</button>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                        href="{{ route('login') }}">
                                        {{ __('label.Al_registered') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
