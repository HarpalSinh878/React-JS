<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{ asset('assets/image/favicon.ico') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('assets/image/bg/login-bg.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
						{{-- <a href="{{ url('/') }}" class="mb-7">
							<img alt="Logo" src="assets/image/logo.jpeg" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2> --}}
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
                <div class="d-flex flex-center w-lg-50 p-10">
					<!--begin::Card-->
					<div class="card rounded-3 w-md-550px card-login">
						<!--begin::Card body-->
						<div class="card-body p-10 p-lg-20">
							<!--begin::Form-->
							<form  class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="POST" action="{{ route('checkLogin') }}">
								@csrf
								<!--begin::Heading-->
								<div class="text-center mb-11">
                                    <a href="{{ url('/') }}" class="mb-7 ">
                                        <img alt="Logo" src="{{ asset('assets/image/logo.jpeg')}}" />
                                    </a>
									<!--begin::Title-->
									 <h1 class="text-white fw-bolder mb-3 mt-4">Log in to Your account</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									{{-- <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div> --}}
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Separator-->
								{{-- <div class="separator separator-content my-14">
									<span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
								</div> --}}
								<!--end::Separator-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="Email" name="email" id="email" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--begin::Input group-->
								<div class="fv-row mb-8" data-kt-password-meter="true">
									<!--begin::Wrapper-->
									<div class="mb-1">
										<!--begin::Input wrapper-->
										<div class="position-relative mb-3">
											<input class="form-control bg-transparent" type="password" id="password" placeholder="Password" name="password" autocomplete="off" />
											<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
										</div>
										<!--end::Input wrapper-->
										<!--begin::Meter-->
										{{-- <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
											<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
										</div> --}}
										<!--end::Meter-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Hint-->
									{{-- <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div> --}}
									<!--end::Hint-->
								</div>
								<div class="fv-row mb-8">
									@if (Session::has('error'))
										<span class="text-danger hide-error" role="alert">
											<strong class="text-danger">{{ Session::get('error') }}</strong>
										</span>
									@endif
								</div>
								<!--end::Input group=-->
								<!--end::Input group=-->
								{{-- <div class="fv-row mb-8">
									<!--begin::Repeat Password-->
									<input placeholder="Repeat Password" name="confirm-password" type="password" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Repeat Password-->
								</div> --}}
								<!--end::Input group=-->
								<!--begin::Accept-->
								<div class="fv-row mb-8">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="toc" value="1" />
										<span class="form-check-label fw-semibold text-white fw-bolder fs-base ms-1">Remember me
										{{-- <a href="#" class="ms-1 link-primary">Terms</a></span> --}}
									</label>
								</div>
								<!--end::Accept-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Sign In</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								{{-- <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
								<a href="../../demo1/dist/authentication/layouts/creative/sign-in.html" class="link-primary fw-semibold">Sign in</a></div> --}}
								<!--end::Sign up-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->

		<script>
			 setTimeout(function () {
                     $('.hide-error').fadeOut();
            }, 2000);
		</script>		
	</body>
	<!--end::Body-->
</html>
