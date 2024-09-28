@extends('layouts.main')
@section('title')
Scan
@endsection
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-upc-scan me-2" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z">
                                </path>
                            </svg>
                        </span>Scan</span>
                    {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav">

                        <li class="nav-item ms-lg-3">
                            <a href="#" class="btn btn-theme-color btn-rounded">Quick
                                Create "Return To Pharmacy"</a>
                        </li>
                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body border-top pt-6">
                <div class="card-toolbar">
                    <ul class="nav mb-3" id="kt_chart_widget_8_tabs" role="tablist">
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-gray btn-active active fw-bold px-4 me-4 bg-secondary btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#all" aria-selected="false" role="tab">Search Info</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-gray fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Print Labels</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-primary fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Get Hub Name</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-primary fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Get Route Name</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-primary fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">See Activity</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-warning fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Validate Queue</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-success fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Scan by Filter</a>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-success fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Return Labels</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn btn-sm btn-outline btn-outline-gray fw-bold px-4 me-4 btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#brooklyn" aria-selected="true" role="tab" tabindex="-1">Print Stops</a>
                        </li>
                    </ul>
                </div>
                <div class="row mt-5 d-flex align-items-center border-top">
                    <ul class="nav mt-5" id="order_status_list">
                        <li class="nav-item mb-3"> <button value="Ready to Print" class="btn btn-outline btn-outline-dark btn-sm btn-rounded btn_status">Set Status To “Ready To Print”</button> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Ready for Pickup" class="btn btn-outline btn-outline-brinjal btn-sm btn-rounded btn_status">Set Status To “Ready To Pickup”</a> </li>
                        @if (Auth::user()->userType == 0 || Auth::user()->userType == 2)
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Ready For Delivery" class="btn btn-outline btn-outline-primary btn-sm btn-rounded btn_status">Set Status To “Ready For Delivery”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Pickup Occurred" class="btn btn-outline btn-outline-primary btn-sm btn-rounded btn_status">Set Status To “Pickup Occurred”</a> </li>
                        @endif
                        @if (Auth::user()->userType == 0 || Auth::user()->userType == 2)
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Route Optimized" class="btn btn-outline btn-outline-info btn-sm btn-rounded btn_status">Set Status To “Route Optimized”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Driver Out" class="btn btn-outline btn-outline-success btn-sm btn-rounded btn_status">Set Status To “Driver Out”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Delivery Attempted" class="btn btn-outline btn-outline-danger btn-sm btn-rounded btn_status">Set Status To “Delivery Attempted”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Returned" class="btn btn-outline btn-outline-maroon btn-sm btn-rounded btn_status">Set Status To “Returned”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Rejected" class="btn btn-outline btn-outline-danger btn-sm btn-rounded btn_status">Set Status To “Rejected”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Investigation" class="btn btn-outline btn-outline-warning btn-sm btn-rounded btn_status">Set Status To “Investigation”</a> </li>
                        @endif
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Back to Pharmacy" class="btn btn-outline btn-outline-brinjal btn-sm btn-rounded btn_status">Set Status To “Back To Pharmacy”</a> </li>
                        @if (Auth::user()->userType == 0 || Auth::user()->userType == 2)
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Other Date Delivery" class="btn btn-outline btn-outline-brinjal btn-sm  btn-rounded btn_status">Set Status To “Other Date Delivery”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Ready To Optimize" class="btn btn-outline btn-outline-brinjal  btn-rounded btn-sm btn_status">Set Status To “Ready To Optimize ”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="On Its Way To Facility" class="btn btn-outline btn-outline-brinjal  btn-rounded btn-sm btn_status">Set Status To “On Its Way To Facility”</a> </li>
                        <li class="nav-item ms-lg-3 mb-3"> <button value="Number Of Items" class="btn btn-outline btn-outline-brinjal btn-sm  btn-rounded btn_status">Set Number Of Items</a> </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <select class="form-select form-select-sm btn-rounded " aria-label="Select example">
                                <option>Set Type To:</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </li>
                        @endif
                    </ul>
                </div>
                {{-- <div class="row border-bottom mt-5">
                        <div class="col-lg-12">
                            <div class="card-title flex-column ">
                                <h3 class="fw-bold mb-5">Barcode Numbers</h3>
                            </div>
                        </div>
                    </div> --}}

                <form action="{{ route('SaveStatus') }}" id="barcode" method="POST">
                    @csrf

                    <input type="hidden" value="Ready To Print" id="status" name="status">
                    <!--begin::Tab content-->
                    <div class="row mt-5 d-flex align-items-center border-top">
                        <div class="col-lg-12 mt-5">
                            <div class="card-title flex-column">
                                <h3 class="fw-bold mb-5">Barcode Numbers</h3>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="rounded d-flex flex-column">
                                <textarea class="form-control" name="orderid" rows="5" data-kt-autosize="true" placeholder="Barcode Numbers...." id="skill_input"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-5">
                            <div class="card-title flex-column">
                                <h3 class="fw-bold mb-5">Scan Notes</h3>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="rounded d-flex flex-column">
                                <textarea class="form-control" data-kt-autosize="true" placeholder="Notes For Scanning..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-7 mt-5">
                            <div class="card-title flex-column">
                                <h3 class="fw-bold mb-5">Auto Submit On Scan</h3>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="0" id="flexSwitchChecked" checked />
                                {{-- <label class="form-check-label" for="flexSwitchChecked">
                                    Checked switch
                                </label> --}}
                            </div>
                        </div>
                        <div class="col-lg-8 mt-5"> <button type="submit" id="btnSubmit" class="btn btn-theme-color btn-rounded">SUBMIT</a> </div>
                    </div>
                </form>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Chart widget 8-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<audio id="success_audio">
    <source src="{{ asset('assets/media/beep-sound.mp3') }}" type="audio/mp3">
</audio>
@endsection

@section('script')
@if (Session::has('success') || Session::has('error'))
<script>
    var audio = new Audio('{{ asset("assets/media/beep-sound.mp3") }}');
    audio.play();
</script>
@endif
<script>
    $(function() {
        var textField = document.getElementById('skill_input');

        if (textField) {
            textField.addEventListener('keydown', function(mozEvent) {
                var event = window.event || mozEvent;
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            });
        }
    });

    // $("#skill_input").keydown(function() {
    //     if($("#flexSwitchChecked").is(':checked') == true){
    //         $("#barcode").submit();
    //     }
    // })

    $(document).ready(function() {
        $('#skill_input').on('input blur', function(e, customData) {

            if ($("#flexSwitchChecked").is(':checked') == true) {

                if ($("#skill_input").val() != '') {
                    $("#barcode").submit();
                }

            }
        });

    });

    $('#flexSwitchChecked').change(function() {
        if ($(this).is(':checked') == true) {
            $("#skill_input").keydown(function() {

                if ($("#skill_input") != '') {
                    $("#barcode").submit();
                }
            })
            $('#btnSubmit').hide();
        } else {
            $('#btnSubmit').show();
        }

    })

    $(document).ready(function() {
        $(".btn_status").click(function() {
            $(".btn_status").removeClass('active');
            $(this).addClass('active');
            $("#status").val($(this).val());
        });
    });
</script>
@endsection