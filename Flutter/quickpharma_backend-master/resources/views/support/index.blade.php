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
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-question-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"></path>
                                  </svg>
                            </span>Support</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">

                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">
                    <div class="card-toolbar">

                    </div>
                    <!--begin::Tab content-->
                    <div class="row g-5 mb-5 mb-lg-15">
                        <!--begin::Col-->
                        <div class="col-sm-3">
                            <!--begin::Phone-->
                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                <!--begin::Icon-->
                                <!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
                                <span class="svg-icon svg-icon-3tx svg-icon-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                      </svg>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <h1 class="text-dark fw-bold my-5">Call Us</h1>
                                <!--end::Subtitle-->
                                <!--begin::Number-->
                                <div class="text-gray-700 fw-semibold fs-2">+1 (833) 597-7538</div>
                                <div class="text-gray-700 fw-semibold fs-2">+1 (833) 597-7538</div>
                                <!--end::Number-->
                            </div>
                            <!--end::Phone-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-3">
                            <!--begin::Address-->
                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-3tx svg-icon-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-minus" viewBox="0 0 16 16">
                                        <path d="M5.5 9.5A.5.5 0 0 1 6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                      </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <h1 class="text-dark fw-bold my-5">Work Time</h1>
                                <!--end::Subtitle-->
                                <!--begin::Description-->
                                <div class="text-gray-700 fs-3 fw-semibold">From 9 AM to 6 PM</div>
                                <div class="text-gray-700 fs-3 fw-semibold">7 Days A Week</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Address-->
                        </div>
                        <!--end::Col-->
                         <!--begin::Col-->
                         <div class="col-sm-3 ">
                            <!--begin::Phone-->
                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                <!--begin::Icon-->
                                <!--SVG file not found: icons/duotune/finance/fin006.svgPhone.svg-->
                                <span class="svg-icon svg-icon-3tx svg-icon-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                      </svg>
                                </span>
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <h1 class="text-dark fw-bold my-5">Email</h1>
                                <!--end::Subtitle-->
                                <!--begin::Number-->
                                <div class="text-gray-700 fw-semibold fs-2">contact@gmail.com</div>
                                <div class="text-gray-700 fw-semibold fs-2">info@gmail.com</div>
                                <!--end::Number-->
                            </div>
                            <!--end::Phone-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-3">
                            <!--begin::Address-->
                            <div class="text-center bg-light card-rounded d-flex flex-column justify-content-center p-10 h-100">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-3tx svg-icon-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Subtitle-->
                                <h1 class="text-dark fw-bold my-5">Office Location</h1>
                                <!--end::Subtitle-->
                                <!--begin::Description-->
                                <div class="text-gray-700 fs-3 fw-semibold">Churchill-laan 16 II, 1052 CD, Amsterdam</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Address-->
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin model-->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tickets</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                        data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('savetickets') }}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group row mb-6">
                            <div class="form-floating">
                                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Describe Your issue And What
                                    Needs To Be Resolved Through This Ticket.</label>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-lg-2">
                                <label
                                    class="col-lg-12 col-form-label text-center">Priority</label>
                                <select class="form-select form-select-solid" name="priority"
                                    data-control="select2" data-placeholder="Select an option"
                                    data-dropdown-parent="#kt_modal_1">
                                    <option></option>
                                    <option value="Low" selected>Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Medium">High</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label
                                    class="col-lg-12 col-form-label text-center">Type</label>
                                <select class="form-select form-select-solid" name="type"
                                    data-control="select2" data-placeholder="Select an option"
                                    data-dropdown-parent="#kt_modal_1">
                                    <option></option>
                                    <option value="Feedback" selected>Feedback</option>
                                    <option value="Problem">Problem</option>
                                    <option value="Complaint">complaint</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-lg-12 col-form-label text-center">Assign
                                    To</label>
                                <select class="form-select form-select-solid" name="assign_to"
                                    data-control="select2" data-placeholder="Select an option"
                                    data-dropdown-parent="#kt_modal_1">
                                    <option></option>
                                    <option value="Demo User 1" selected>Demo User 1</option>
                                    <option value="Demo User 2">Demo User 2</option>
                                    <option value="Demo User 3">Demo User 3</option>
                                </select>
                            </div>

                            <div class="col-lg-3">
                                <label class="col-lg-12 col-form-label text-center">Managed
                                    By</label>
                                <select class="form-select form-select-solid"
                                    name="managed_by" data-control="select2"
                                    data-placeholder="Select an option"
                                    data-dropdown-parent="#kt_modal_1">
                                    <option></option>
                                    <option value="Test User 1" selected>Test User 1</option>
                                    <option value="Test User 2">Test User 2</option>
                                    <option value="Test User 3">Test User 3</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <label class="col-lg-12 col-form-label text-center">Order
                                    Id</label>
                                <select class="form-select form-select-solid" name="order_id"
                                    data-control="select2" data-placeholder="Select an option"
                                    data-dropdown-parent="#kt_modal_1">
                                    <option></option>
                                    <option value="123">123</option>
                                    <option value="85241">85241</option>
                                    <option value="98745">98745</option>
                                </select>

                                <span class="text-muted">(optional)</span>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end begin model-->
@endsection
