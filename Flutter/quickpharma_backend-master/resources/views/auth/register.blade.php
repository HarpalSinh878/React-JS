<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>Register</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat"
    style="background-attachment: fixed">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('assets/image/bg/login-bg.jpg');
            }
        </style>
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
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST"
                            action="{{ URL::to('register/store') }}">
                            @csrf
                            <div class="text-center mb-11">
                                <a href="{{ url('/') }}" class="mb-7 ">
                                    <img alt="Logo" src="{{ asset('assets/image/logo.jpeg') }}" />
                                </a>
                                <h1 class="text-white fw-bolder mb-3 mt-4">Register</h1>
                                {{-- <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div> --}}
                            </div>
                            {{-- <div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
								</div> --}}
                            <div class="fv-row mb-8">
                                <input id="name" type="text"
                                    class="form-control form-control bg-transparent @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="email" autofocus
                                    placeholder="Full Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8">
                                <div class="input-group">
                                    <input id="email" type="email"
                                        class="form-control form-control bg-transparent @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus placeholder="E-mail Address">
                                    <button type="button" class="btn btn-outline btn-theme-color send_otp">Send
                                        OTP</button>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8 d-none" id="verify_otp">
                                <div class="input-group">
                                    <input id="otp" type="number"
                                        class="form-control form-control bg-transparent @error('otp') is-invalid @enderror"
                                        name="otp" value="{{ old('otp') }}" required autocomplete="otp"
                                        autofocus placeholder="Otp">
                                    <button type="button"
                                        class="btn btn-outline btn-theme-color verify_otp">Verify</button>
                                </div>
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input id="password" type="password"
                                            class="form-control bg-transparent @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password"
                                            placeholder="Password">
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility" placeholder="Password">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input id="repeat_password" type="password"
                                            class="form-control bg-transparent @error('repeat_password') is-invalid @enderror"
                                            name="repeat_password" required autocomplete="current-password"
                                            placeholder="Repeat Password">
                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility" placeholder="Repeat Password">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                        @error('repeat_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="fv-row mb-8">
                                <input id="phone" type="tel"
                                    class="form-control form-control bg-transparent @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                    autofocus placeholder="Phone Number">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8">
                                <input id="business_name" type="text"
                                    class="form-control form-control bg-transparent @error('business_name') is-invalid @enderror"
                                    name="business_name" value="{{ old('business_name') }}" required
                                    autocomplete="business_name" autofocus placeholder="Business Name">
                                @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="fv-row mb-8">
                                <input id="doing_business_as" type="text"
                                    class="form-control form-control bg-transparent @error('doing_business_as') is-invalid @enderror"
                                    name="doing_business_as" value="{{ old('doing_business_as') }}" required
                                    autocomplete="doing_business_as" autofocus placeholder="Doing business as">
                                @error('doing_business_as')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <input id="mailing_address" type="text"
                                    class="form-control form-control bg-transparent @error('mailing_address') is-invalid @enderror"
                                    name="mailing_address" value="{{ old('mailing_address') }}" required
                                    placeholder="Mailing Address">
                                @error('mailing_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <input id="city" type="text"
                                    class="form-control form-control bg-transparent @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required placeholder="City">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <input id="state" type="text"
                                    class="form-control form-control bg-transparent @error('state') is-invalid @enderror"
                                    name="state" value="{{ old('state') }}" required placeholder="State">
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <input id="zipcode" type="text"
                                    class="form-control form-control bg-transparent @error('zipcode') is-invalid @enderror"
                                    name="zipcode" value="{{ old('zipcode') }}" required placeholder="Zip Code">
                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <input id="Apt" type="text"
                                    class="form-control form-control bg-transparent @error('Apt') is-invalid @enderror"
                                    name="Apt" value="{{ old('Apt') }}" required
                                    placeholder="Apt/Suite/Floor">
                                @error('Apt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="fv-row mb-8">
                                <select id="facility"
                                    class="form-control form-control bg-transparent @error('facility') is-invalid @enderror"
                                    name="facility" value="{{ old('facility') }}" required>
                                    <option value="newyork">New York</option>
                                </select>
                                @error('facility')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if (session('error'))
                                <div class="fv-row mb-8">
                                    <span class="text-danger" role="alert">
                                        <strong>{{ session('error') }}</strong>
                                    </span>
                                </div>
                            @endif
                            <div class="d-grid">
                                <input type="submit" id="kt_sign_up_submit" class="btn btn-theme-color"
                                    value="Register">
                            </div>
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

    <script>
        $(function() {
            $('#kt_sign_up_form input:not(#name , #email, #otp) ,#kt_sign_up_submit').prop('disabled', true);
        })
        $('.send_otp').click(function() {
            $.ajax({
                url: "{{ URL::to('/register/store') }}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    send_otp: 1,
                    email: $('#email').val(),
                },
                success: function(response) {
                    if (response.status == 1) {
                        $('#verify_otp').removeClass('d-none');
                    } else {
                        alert(response.message)
                        return false;
                    }
                },
                error: function(error) {
                    alert("Something Went Wrong...")
                    return false;
                }
            });
        });
        $('.verify_otp').click(function() {
            $.ajax({
                url: "{{ URL::to('/register/store') }}",
                type: 'POST',
                data: {
                    '_token': "{{ csrf_token() }}",
                    verify_otp: 1,
                    otp: $('#otp').val(),
                },
                success: function(data) {
                    if (data.status == 1) {
                        $('#verify_otp').addClass('d-none');
                        $('.send_otp').attr('disabled', true);
                        $('#kt_sign_up_form input:not(#name , #email) ,#kt_sign_up_submit').prop(
                            'disabled', false);
                        alert(data.message)
                    } else {
                        alert(data.message)
                        return false;
                    }
                },
                error: function(error) {
                    alert("Something Went Wrong...")
                    return false;
                }
            });
        });
    </script>
</body>

</html>
