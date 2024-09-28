<!DOCTYPE html>

<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat" style="background-attachment: fixed">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        @if (strpos(request()->url(), 'dashboard'))
            <style>
                body {
                    background-image: url('assets/image/bg/login-pharma-bg.jpeg');
                }
            </style>
        @else
            <style>
                body {
                    background-image: url('assets/image/bg/login-bg.jpg');
                }
            </style>
        @endif
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <div class="d-flex flex-center flex-lg-start flex-column">
                    {{-- <a href="{{ url('/') }}" class="mb-7">
							<img alt="Logo" src="assets/image/logo.jpeg" />
						</a>
						<h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2> --}}
                </div>
            </div>
            <div class="d-flex flex-center w-lg-50 p-10">
                <div class="card rounded-3 w-md-550px card-login">
                    <div class="card-body p-10 p-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <a href="{{ url('/') }}" class="mb-7 "><img alt="Logo" src="{{ asset('assets/image/logo.jpeg') }}" /></a>
                                <h1 class="text-white fw-bolder mb-3 mt-4">Log in to Your account</h1>
                                {{-- <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div> --}}
                            </div>
                            {{-- <div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
								</div> --}}
                            <div class="fv-row mb-8">
                                <input id="email" type="email" class="form-control form-control bg-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input id="password" type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility"> <i class="bi bi-eye-slash fs-2"></i> <i class="bi bi-eye fs-2 d-none"></i> </span>
                                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="fv-row mb-8">
                                @if (session('error'))<span class="text-danger" role="alert"><strong>{{ session('error') }}</strong></span>@endif
                            </div>
                            <div class="fv-row mb-8">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </label>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-theme-color">
                                    <span class="indicator-label">Sign In</span>
                                </button>
                            </div>
                            {{-- <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
								<a href="../../demo1/dist/authentication/layouts/creative/sign-in.html" class="link-primary fw-semibold">Sign in</a></div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>
</html>
