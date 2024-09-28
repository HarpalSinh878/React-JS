@extends('layouts.main')
@section('title')Users @endsection
@section('page-title')
@endsection
@section('content')

    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <!--begin::Chart widget 8-->
            <div class="card card-flush h-xl-100">
                <!--begin::Header-->
                <div class="card-header pt-4 pb-4">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-key me-2" viewBox="0 0 16 16">
                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                  </svg>
                            </span>MY ACCOUNT</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body border-top pt-6">
                    <div class="row mt-5">

                        <div class="col-lg-6">

                            <form action="{{ route('my-account.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="card-title flex-column border-bottom">
                                <h3 class="fw-bold mb-5">BASIC INFORMATION</h3>
                            </div>
                            <div class="row mb-4 mt-5">
                                   <label class="form-label">Full Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="row mb-4">
                                <label class="form-label">E-mail Address</label>
                                 <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly placeholder="E-mail Address">
                            </div>
                            <div class="row mb-4">
                                <label class="form-label">Doing Bussiness As</label>
                                 <input type="text" class="form-control" value="{{ Auth::user()->doing_business_as }}" name="doing_business_as" placeholder="Doing Bussiness As">
                            </div>

                            <div class="row mb-4">
                                <label class="form-label">Business Name</label>

                                 <div class="input-group mb-5">
                                    <input class="form-control" placeholder="Business Name" value="{{ Auth::user()->business_name }}" name="business_name" aria-label="Business Name"  type="text">
                                    <span class="input-group-text" id="basic-addon2">

                                        <i class="fa-solid fa-house"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="City">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="State">
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label">zip</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->zip }}" name="zip"  placeholder="zip">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Apt/Suite/Floor</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->apt }}" name="apt"  placeholder="Apt/Suite/Floor">
                                </div>

                            </div>
                            <div class="row mb-4">
                                <label class="form-label">Phone Number</label>
                                 <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone" placeholder="+17123456789">
                            </div>

                            <div class="row mb-4">
                                <label class="form-label">Username</label>
                                 <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly  placeholder="Username">
                            </div>


                            <div class="row mb-4">

                                <div class="row">
                                    <div class="col-2">
                                        <label class="form-label">New Password</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input " type="checkbox"  id="change-password" >
                                            <label class="form-check-label text-dark" for="flexCheckChecked">Change Password</label>
                                        </div>
                                    </div>
                                </div>
                                 <input type="password" name="password" id="password" disabled class="form-control password-input" placeholder="New Password">
                            </div>
                            <div class="row mb-4">
                                <label class="form-label">Confirm New Password</label>
                                 <input type="password" name="conform_password" class="form-control password-input" id="conform_password" disabled placeholder="Confirm New Password">
                            </div>

                            {{-- <div class="row mb-6">
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox" value="" id="flexCheckChecked" >
                                    <label class="form-check-label text-dark" for="flexCheckChecked">Enable Two-Factor Authentication </label>
                                </div>
                            </div> --}}


                            <div class="row mb-4">
                                <label class="form-label">Upload New Avatar</label>
                                <input type="file"  class="filepond" name="profile">

                            </div>

                            <div class="row mb-6">
                                <div class="col-lg-4">
                                    <button type="submit" class="btn btn-theme-color btn-rounded" id="btn-submit"><i class="bi bi-check2"></i>Save Changes</button>
                                </div>
                                <div class="col-lg-8">
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="col-lg-6">
                            <div class="card-title flex-column border-bottom">
                                <h3 class="fw-bold mb-5">BUSINESS HOURS</h3>
                            </div>
                            <div class="row mb-4 mt-5">
                                <label class="form-label">You Can Leave The Fields Blank If You Are Closed</label>

                            </div>

                            <hr>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Day Of The Week</label>
                                <!--end::Label-->

                                 <!--begin::Label-->
                                 <label class="col-lg-4 col-form-label fw-semibold fs-6">Open Time</label>
                                 <!--end::Label-->
                                 <!--begin::Label-->
                                   <label class="col-lg-4 col-form-label fw-semibold fs-6">Closed Time</label>
                                  <!--end::Label-->

                            </div>
                            <hr>

                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Monday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Tuesday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Wednesday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Thursday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Friday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply M-f</button>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Saturday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row mb-8">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Sunday</label>
                                <!--end::Label-->


                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="9:00 AM">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button class="btn btn-theme-color btn-rounded btn-sm">Apply All</button>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                    </div>

                                </div>

                            </div>



                            <div class="row mb-6">
                                <div class="col-lg-6">
                                    <div class="card-title flex-column ">
                                        <h3 class="fw-bold mb-5">Custom Confirmation</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">

                               <!--begin::Input group-->
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Fine Print On Delivery Signature/Confirmation Ticket...</label>
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="row mb-6">
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <!--begin::Options-->
                                    <div class="d-flex align-items-center mt-3">
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input class="form-check-input" name="show_driver" type="checkbox">
                                            <span class="fw-semibold ps-2 fs-6">Show Driver</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                                            <input class="form-check-input" name="show_creation" type="checkbox" value="2">
                                            <span class="fw-semibold ps-2 fs-6"> Show Creation</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Options-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>


                            </div>

                            <div class="row mb-6">
                                <div class="col-lg-4">
                                    <a href="#" class="btn btn-theme-color btn-rounded"><i class="bi bi-check2"></i>Save Changes</a>
                                </div>
                                <div class="col-lg-8">
                                </div>
                            </div>

                        </div>
                    </div>


                    <!--end::Row-->
                </div>
                <!--end::Body-->

            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->


@endsection
@section('script')
<script>
    $("#kt_datepicker_3").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
<script>
    $(document).ready(function(){
        $("#change-password").on("click", function(){
            if($(this).is(":checked")){
                $('.password-input').prop("disabled", false);
                $('.password-input').prop("required", true);
                $("#btn-submit").hide();
            }else{

                $('.password-input').prop("disabled", true);
                $('.password-input').prop("required", false);
                $("#btn-submit").show();
            }
        });
    });

    $('#conform_password').keyup(function(e) {
            //get values
            var pass = $('#password').val();
            var confpass = $(this).val();
            //check the strings
            if (pass == confpass) {
                //if both are same remove the error and allow to submit
                $("#btn-submit").show();
                allowsubmit = true;
            } else {
                //if not matching show error and not allow to submit
                toastr.error('Password not Matching');
                $("#btn-submit").hide();
                allowsubmit = false;
            }
        });
</script>
@endsection
