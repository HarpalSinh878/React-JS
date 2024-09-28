@extends('layouts.main')
@section('title')Scanner @endsection
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-qr-code-scan me-2" viewBox="0 0 16 16">
                                    <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>
                                    <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>
                                    <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>
                                    <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>
                                    <path d="M12 9h2V8h-2v1Z"/>
                                  </svg>
                            </span>Order Editor</span>
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

                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7">
                            <label class="col-form-label fw-semibold fs-6">Barcode Numbers</label>
                            <div class="rounded d-flex flex-column">
                                <textarea class="form-control" rows="5" data-kt-autosize="true" placeholder="Barcode Numbers...."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />
                                <label class="col-form-label fw-semibold fs-6 ms-2"> Auto Submit on Scan</label>
                                {{-- <label class="form-check-label" for="flexSwitchChecked">
                                    Checked switch
                                </label> --}}
                            </div>
                        </div>
                        <div class="col-lg-8 mt-5">
                            <a href="#" class="btn btn-theme-color btn-rounded">SUBMIT</a>
                        </div>
                    </div>

                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

@endsection
