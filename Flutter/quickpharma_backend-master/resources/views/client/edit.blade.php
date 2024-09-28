@extends('layouts.main')
@section('title')
    Edit Client
@endsection
@section('css')
    <style>
        .time_slots input[type="checkbox"]:hover~p,
        .time_slots input[type="checkbox"]:checked~p {
            color: white;
            background-color: var(--kt-theme-color);
        }
    </style>
@endsection
@section('page-title')
@endsection
@section('content')
    <div class="row gx-5 gx-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-4 pb-2">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-person me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </span>
                            <span class="text-uppercase">Edit Client</span>
                        </span>
                    </h3>
                </div>

                <div class="card-body border-top pt-6">
                    <form action="{{ route('my-account.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <h3 class="text-uppercase">Client Information</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Pharmacy NPI</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="pharmacy_npi" class="form-control"
                                                    placeholder="Pharmacy NPI">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Is PrimeRX API Enabled</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="primerx_api_enabled">
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Full Name</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="full_name"
                                                    value="{{ isset($client) ? $client->name : '' }}" class="form-control"
                                                    required placeholder="Full Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Phone Number</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="phone"
                                                    value="{{ isset($client) ? $client->phone : '' }}" class="form-control"
                                                    required placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Business Name</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="business_name"
                                                    value="{{ isset($client) ? $client->business_name : '' }}"
                                                    class="form-control" required placeholder="Business Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Doing Business as</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="doing_business_as"
                                                    value="{{ isset($client) ? $client->doing_business_as : '' }}"
                                                    class="form-control" placeholder="Doing Business as">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Status</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="status">
                                                    <option value="">Select</option>
                                                    <option value="1">Open</option>
                                                    <option value="2">Open > Sub Status</option>
                                                    <option value="3">Open > Sub Status Two</option>
                                                    <option value="7">Open > ACTIVE DRIVER</option>
                                                    <option value="9">Open > ACTIVE CLIENT</option>
                                                    <option value="6">Banned</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Timezone</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="timezone">
                                                    <option value="">Select</option>
                                                    <option value="America/New_York">Eastern Time [02/08 - 02:17 AM]
                                                    </option>
                                                    <option value="America/Chicago">Central Time [02/08 - 01:17 AM]</option>
                                                    <option value="America/Phoenix">Mountain Time (no DST) [02/08 - 00:17
                                                        AM]
                                                    </option>
                                                    <option value="America/Los_Angeles">Pacific Time [02/07 - 23:17 PM]
                                                    </option>
                                                    <option value="America/Anchorage">Alaska Time [02/07 - 22:17 PM]
                                                    </option>
                                                    <option value="America/Adak">Hawaii-Aleutian [02/07 - 21:17 PM]
                                                    </option>
                                                    <option value="Pacific/Honolulu">Hawaii-Aleutian Time (no DST) [02/07 -
                                                        21:17 PM]</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Copay Limit</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="copay_limit" class="form-control" required
                                                    placeholder="Copay Limit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Attempts Limit</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="attempts_limit" class="form-control" required
                                                    placeholder="Attempts Limit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Order Rate</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="attempts_limit" class="form-control" required
                                                    placeholder="Order Rate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Rate Type</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="rate_type" required>
                                                    <option value="">Select</option>
                                                    <option value="stop">By Stop</option>
                                                    <option value="delivery">By Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Special Instructions</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="special_instructions" class="form-control"
                                                    placeholder="Special Instructions">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Invoice Due Days</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="invoice_due_days" class="form-control"
                                                    required placeholder="Invoice Due Days">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Invoice Overdue %</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="invoice_due_days" class="form-control"
                                                    required placeholder="Invoice Overdue %">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Invoice Overdue
                                                Interval</label>
                                            <div class="col-lg-8">
                                                <select name="invoice_due_days" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="7">1 Week</option>
                                                    <option value="14">2 Weeksy</option>
                                                    <option value="28">4 Weeks</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">Order label template</label>
                                            <div class="col-lg-8">
                                                <select name="invoice_due_days" class="form-control" required>
                                                    <option value="">Select</option>
                                                    <option value="order_label_standard">3.35 x 1.125 in.</option>
                                                    <option value="order_label_4x6">4 x 6 in.</option>
                                                    <option value="order_label_4x6.9">4 x 6 3/4 in.</option>
                                                    <option value="order_label_4x6.9_rtl">4 x 6 3/4 in. RTL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label required">If Not Present, Wrong Address,
                                                or
                                                Recipient Refused, Call :</label>
                                            <div class="col-lg-8">

                                                <div id="emergency_call_input">
                                                    <div class="form-group">
                                                        <div data-repeater-list="emergency_call_input">
                                                            <div data-repeater-item>
                                                                <div class="input-group mb-2">
                                                                    <input type="text" class="form-control"
                                                                        name="emergency_call"
                                                                        placeholder="Enter Call No" />
                                                                    <a href="javascript:;" data-repeater-delete
                                                                        class="btn btn-outline btn-outline-danger"><i
                                                                            class="la la-trash-o"></i>Delete </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-5">
                                                        <a href="javascript:;" data-repeater-create
                                                            class="btn btn-light-primary">
                                                            <i class="la la-plus"></i>Add
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="send_sms_to_clients">Send SMS to
                                                Clients</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="send_sms_to_clients" id="send_sms_to_clients" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="send_voice_messages_to_clients">Send Voice
                                                Messages to Clients</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="send_voice_messages_to_clients"
                                                    id="send_voice_messages_to_clients" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="free_pharmacy_pickups">Free Pharmacy
                                                Pickups</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="free_pharmacy_pickups" id="free_pharmacy_pickups" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="webhook">Webhook</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="webhook" id="webhook">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="allow_request_delivery_time_window">Allow
                                                to
                                                Request Delivery Time window from patient?</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="allow_request_delivery_time_window"
                                                    id="allow_request_delivery_time_window">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="rx_number">RX Number</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="rx_number" id="rx_number" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="operator_initials">Operator
                                                Initials</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="operator_initials" id="operator_initials">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="md2rx_identity">Md2Rx Identity</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="md2rx_identity" id="md2rx_identity">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="md2rx_identity">Send Free SMS Mask text
                                                Messages</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="md2rx_identity" id="md2rx_identity">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="bypass_pickup_date_time">Bypass Pickup
                                                Date/Time</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="bypass_pickup_date_time" id="bypass_pickup_date_time">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="remote_order_id">Remote Order ID</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="remote_order_id" id="remote_order_id">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="free_return_to_pharmacy">Free Return to
                                                Pharmacy</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="free_return_to_pharmacy" id="free_return_to_pharmacy">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="forward_order_updates_client_email">Checked
                                                by
                                                Default - Formward All Orders Updates to Client's Email </label>
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="forward_order_updates_client_email"
                                                    id="forward_order_updates_client_email">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="date_filled">Date Filled</label>
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="date_filled" id="date_filled" checked>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="operator_initials_required">Operator
                                                Initials
                                                is required?</label>
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="operator_initials_required" id="operator_initials_required">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="dont_call_patient">Do Not Call
                                                Patients</label>
                                            <div class="form-check form-switch text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="dont_call_patient" id="dont_call_patient">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <h3 class="text-uppercase">Customize Information</h3>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Feedback Google URL</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="feedback_google_url" class="form-control"
                                                    placeholder="Feedback Google URL">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Maximum Insurance</label>
                                            <div class="col-lg-8">
                                                <input type="number" name="maximum_insurance" class="form-control"
                                                    placeholder="maximum Insurance">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-2">
                                            <label class="col-form-label" for="hide_order_rate">Hide Order Rate</label>
                                            <div class="form-check form-switch  text-center">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="hide_order_rate" id="hide_order_rate" checked>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>

                                <div class="d-flex justify-content-between my-2">
                                    <h3 class="text-uppercase mt-2">View Md2Rx Accounts Access</h3>
                                    <button type="button" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                                <h3 class="text-uppercase">Communication Settings</h3>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Enabled?</label>
                                            <div class="col-lg-10">
                                                <select name="enabled" class="form-control">
                                                    <option value="off"> Off </option>
                                                    <option value="on"> On </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Ready to Print</label>
                                            <div class="col-lg-10">

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="ready_to_print_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Free
                                                                Mask
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Today's
                                                                Date</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="ready_to_print_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Ready For Pickup</label>
                                            <div class="col-lg-10">

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="ready_for_pickup_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Free
                                                                Mask
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Today's
                                                                Date</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="ready_for_pickup_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Pickup Occured</label>
                                            <div class="col-lg-10">

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="pickup_occured_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Free
                                                                Mask
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Today's
                                                                Date</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="pickup_occured_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Ready For delivery</label>
                                            <div class="col-lg-10">

                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <input type="text" name="ready_for_delivery_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Free
                                                                Mask
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">Today's
                                                                Date</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="ready_for_delivery_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <select name="ready_for_delivery_recording" class="form-select">
                                                            <option value=""> Select a Recording..</option>
                                                            <option value="25">TEST3</option>
                                                            <option value="24">TEST1</option>
                                                            <option value="23">ELLAN</option>
                                                            <option value="22">rfefref</option>
                                                            <option value="21">eddytestfinal</option>
                                                            <option value="20">eddytest</option>
                                                            <option value="19">GHGJGJH</option>
                                                            <option value="18">ewdsf</option>
                                                            <option value="17">test123</option>
                                                            <option value="16">YTRF</option>
                                                            <option value="15">RFDDFDG</option>
                                                            <option value="14">545T</option>
                                                            <option value="13">fdsfadsfsda</option>
                                                            <option value="12">thasd</option>
                                                            <option value="11">Driver Out</option>
                                                            <option value="9">Greeting</option>
                                                            <option value="3">Erkin</option>
                                                            <option value="2">eddy</option>
                                                        </select>
                                                        <small>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recording</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="ready_for_delivery_recording_on_off"
                                                            class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Route Optimized</label>
                                            <div class="col-lg-10">

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="route_optimized_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">ETA</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="route_optimized_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Driver Out</label>
                                            <div class="col-lg-10">

                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <input type="text" name="driver_out_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">ETA</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="driver_out_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <select name="route_optimized_recording" class="form-select">
                                                            <option value="">Select a Recording...</option>
                                                            <option value="25">TEST3</option>
                                                            <option value="24">TEST1</option>
                                                            <option value="23">ELLAN</option>
                                                            <option value="22">rfefref</option>
                                                            <option value="21">eddytestfinal</option>
                                                            <option value="20">eddytest</option>
                                                            <option value="19">GHGJGJH</option>
                                                            <option value="18">ewdsf</option>
                                                            <option value="17">test123</option>
                                                            <option value="16">YTRF</option>
                                                            <option value="15">RFDDFDG</option>
                                                            <option value="14">545T</option>
                                                            <option value="13">fdsfadsfsda</option>
                                                            <option value="12">thasd</option>
                                                            <option value="11">Driver Out</option>
                                                            <option value="9">Greeting</option>
                                                            <option value="3">Erkin</option>
                                                            <option value="2">eddy</option>
                                                        </select>
                                                        <small>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recording</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="route_optimized_recording_on_off"
                                                            class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Delivered</label>
                                            <div class="col-lg-10">

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="delivered_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Signature
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Feedback
                                                                Line</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="delivered_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Next Stop</label>
                                            <div class="col-lg-10">

                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="text" name="next_stop_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Tracking
                                                                Link</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="next_stop_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Wrong Address</label>
                                            <div class="col-lg-10">

                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <input type="text" name="wrong_address_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Reschedule
                                                                Link</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="wrong_address_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <select name="ready_for_delivery_recording" class="form-select">
                                                            <option value=""> Select a Recording..</option>
                                                            <option value="25">TEST3</option>
                                                            <option value="24">TEST1</option>
                                                            <option value="23">ELLAN</option>
                                                            <option value="22">rfefref</option>
                                                            <option value="21">eddytestfinal</option>
                                                            <option value="20">eddytest</option>
                                                            <option value="19">GHGJGJH</option>
                                                            <option value="18">ewdsf</option>
                                                            <option value="17">test123</option>
                                                            <option value="16">YTRF</option>
                                                            <option value="15">RFDDFDG</option>
                                                            <option value="14">545T</option>
                                                            <option value="13">fdsfadsfsda</option>
                                                            <option value="12">thasd</option>
                                                            <option value="11">Driver Out</option>
                                                            <option value="9">Greeting</option>
                                                            <option value="3">Erkin</option>
                                                            <option value="2">eddy</option>
                                                        </select>
                                                        <small>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recording</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="ready_for_delivery_recording_on_off"
                                                            class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-2 col-form-label text-end">Recipient Not Pres..</label>
                                            <div class="col-lg-10">

                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <input type="text" name="route_optimized_message"
                                                            class="form-control" placeholder="Ready to Print">
                                                        <small> Text Message
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recipient
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Business
                                                                Name</span>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Reschedule
                                                                Link</span>
                                                            <span class="text-muted text-decoration-underline px-1">New
                                                                Line</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="route_optimized_on_off" class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-md-10">
                                                        <select name="ready_for_delivery_recording" class="form-select">
                                                            <option value=""> Select a Recording..</option>
                                                            <option value="25">TEST3</option>
                                                            <option value="24">TEST1</option>
                                                            <option value="23">ELLAN</option>
                                                            <option value="22">rfefref</option>
                                                            <option value="21">eddytestfinal</option>
                                                            <option value="20">eddytest</option>
                                                            <option value="19">GHGJGJH</option>
                                                            <option value="18">ewdsf</option>
                                                            <option value="17">test123</option>
                                                            <option value="16">YTRF</option>
                                                            <option value="15">RFDDFDG</option>
                                                            <option value="14">545T</option>
                                                            <option value="13">fdsfadsfsda</option>
                                                            <option value="12">thasd</option>
                                                            <option value="11">Driver Out</option>
                                                            <option value="9">Greeting</option>
                                                            <option value="3">Erkin</option>
                                                            <option value="2">eddy</option>
                                                        </select>
                                                        <small>
                                                            <span
                                                                class="text-muted text-decoration-underline px-1">Recording</span>
                                                        </small>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select name="ready_for_delivery_recording_on_off"
                                                            class="form-select">
                                                            <option value="off"> Off </option>
                                                            <option value="on"> On </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="col-md-12">
                                <h3 class="text-uppercase">Order Types Settings</h3>
                                <div class="row order_type_settings">
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="regular">
                                                <input type="checkbox" class="d-none" name="regular" id="regular"
                                                    checked>
                                                Regular
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="same_day">
                                                <input type="checkbox" class="d-none" name="same_day" id="same_day"
                                                    checked>
                                                Same Day
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="same_day_special_hours">
                                                <input type="checkbox" class="d-none" name="same_day_special_hours"
                                                    id="same_day_special_hours">
                                                Same Day Special Hours
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="time_window_next_day">
                                                <input type="checkbox" class="d-none" name="time_window_next_day"
                                                    id="time_window_next_day">
                                                Time Window Next Day
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="next_day_special_hours">
                                                <input type="checkbox" class="d-none" name="next_day_special_hours"
                                                    id="next_day_special_hours">
                                                Next Day Special Hours
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="time_window_next_day_withtime">
                                                <input type="checkbox" class="d-none"
                                                    name="time_window_next_day_withtime"
                                                    id="time_window_next_day_withtime">
                                                Time Window Next Day 9am-3pm,3pm-9pm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="stat">
                                                <input type="checkbox" class="d-none" name="stat" id="stat">
                                                Stat
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="facility">
                                                <input type="checkbox" class="d-none" name="facility" id="facility">
                                                Facility
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="priority">
                                                <input type="checkbox" class="d-none" name="priority" id="priority">
                                                Priority
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="back_to_pharmacy">
                                                <input type="checkbox" class="d-none" name="back_to_pharmacy"
                                                    id="back_to_pharmacy">
                                                Back To Pharmacy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="return_to_pharmacy">
                                                <input type="checkbox" class="d-none" name="return_to_pharmacy"
                                                    id="return_to_pharmacy">
                                                Return To Pharmacy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label for="pharmacy_pickup">
                                                <input type="checkbox" class="d-none" name="pharmacy_pickup"
                                                    id="pharmacy_pickup">
                                                Pharmacy Pickup
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="is_available_for_client">Is Available For
                                            Client</label>
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_available_for_client" id="is_available_for_client" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Rate Type</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="rate_type" id="">
                                                    <option value="stop">By Stop</option>
                                                    <option value="delivery">By Delivery</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="allow_time_window_deliveries">Allow
                                            Time Window Deliveries</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="allow_time_window_deliveries" id="allow_time_window_deliveries"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label" for="number_of_free_attempts">Number Of
                                                Free Attempts <br> <small class="text-muted"> only for "By Delivery" rate
                                                    type
                                                </small> </label>
                                            <div class="col-lg-8">
                                                <select class="form-control" name="number_of_free_attempts"
                                                    id="number_of_free_attempts">
                                                    <option value="1" selected="selected">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="does_order_support_fridge">Does The Order
                                            Support Fridge?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_fridge" id="does_order_support_fridge" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="extra_charges_for_fridge">Extra
                                                Charges For
                                                Fridge</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_fridge" id="extra_charges_for_fridge">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="does_order_support_coldno_fridge">Does The
                                            Order
                                            Support Cold No Fridge?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_coldno_fridge"
                                                id="does_order_support_coldno_fridge" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="extra_charges_for_coldno_fridge">Extra
                                                charge for Cold No Fridge</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_coldno_fridge"
                                                    id="extra_charges_for_coldno_fridge">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="does_order_support_confidential">Does The
                                            Order Support Confidential?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_confidential"
                                                id="does_order_support_confidential" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="extra_charges_for_confidential">Extra
                                                Charges
                                                For Confidential</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_confidential"
                                                    id="extra_charges_for_confidential">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="does_order_support_sensitive">Does The Order
                                            Support Sensitive?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_sensitive" id="does_order_support_sensitive"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="extra_charges_for_sensitive">Extra
                                                Charges
                                                For
                                                Sensitive</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_sensitive" id="extra_charges_for_sensitive">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">

                                        <label class=" col-form-label" for="does_order_support_controlled">Does The Order
                                            Support Controlled?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_controlled" id="does_order_support_controlled"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="extra_charges_for_controlled">Extra
                                                Charges
                                                For Controlled</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_controlled" id="extra_charges_for_controlled">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">

                                        <label class="col-form-label" for="does_order_support_hazardous">Does The Order
                                            Support Hazardous?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_hazardous" id="does_order_support_hazardous"
                                                checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="extra_charges_for_hazardous">Extra
                                                Charges
                                                For
                                                Hazardous</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_hazardous" id="extra_charges_for_hazardous">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="does_order_support_supply_regular">Does
                                            The
                                            Order Support Supply Regular?</label>

                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_supply_regular"
                                                id="does_order_support_supply_regular" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="extra_charges_for_supply_regular">Extra
                                                Charges For Supply Regular</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_supply_regular"
                                                    id="extra_charges_for_supply_regular">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6 d-flex justify-content-between align-items-center">
                                        <label class="col-form-label" for="does_order_support_supply_plus_rx">Does The
                                            Order
                                            Support Supply plus RX?</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="does_order_support_supply_plus_rx"
                                                id="does_order_support_supply_plus_rx" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"
                                                for="extra_charges_for_supply_plus_rx">Extra
                                                Charges For Supply plus RX</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" value="0"
                                                    name="extra_charges_for_supply_plus_rx"
                                                    id="extra_charges_for_supply_plus_rx">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Date To Deliver</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="date_to_deliver">
                                                    <option value="sameday"> = Today</option>
                                                    <option value="tomorrow"> = Tomorrow</option>
                                                    <option value="any"> >= Today</option>
                                                    <option value="not_today"> > Today</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-3">
                                            <label class="col-lg-4 col-form-label">Pickup cut-off time</label>
                                            <div class="col-lg-8">
                                                <select class="form-select" name="pickup_cutoff_time">
                                                    <option value="23:59:59" selected="selected">Off</option>
                                                    <option value="10:00:00">10:00</option>
                                                    <option value="10:15:00">10:15</option>
                                                    <option value="10:30:00">10:30</option>
                                                    <option value="10:45:00">10:45</option>
                                                    <option value="11:00:00">11:00</option>
                                                    <option value="11:15:00">11:15</option>
                                                    <option value="11:30:00">11:30</option>
                                                    <option value="11:45:00">11:45</option>
                                                    <option value="12:00:00">12:00</option>
                                                    <option value="12:15:00">12:15</option>
                                                    <option value="12:30:00">12:30</option>
                                                    <option value="12:45:00">12:45</option>
                                                    <option value="13:00:00">13:00</option>
                                                    <option value="13:15:00">13:15</option>
                                                    <option value="13:30:00">13:30</option>
                                                    <option value="13:45:00">13:45</option>
                                                    <option value="14:00:00">14:00</option>
                                                    <option value="14:15:00">14:15</option>
                                                    <option value="14:30:00">14:30</option>
                                                    <option value="14:45:00">14:45</option>
                                                    <option value="15:00:00">15:00</option>
                                                    <option value="15:15:00">15:15</option>
                                                    <option value="15:30:00">15:30</option>
                                                    <option value="15:45:00">15:45</option>
                                                    <option value="16:00:00">16:00</option>
                                                    <option value="16:15:00">16:15</option>
                                                    <option value="16:30:00">16:30</option>
                                                    <option value="16:45:00">16:45</option>
                                                    <option value="17:00:00">17:00</option>
                                                    <option value="17:15:00">17:15</option>
                                                    <option value="17:30:00">17:30</option>
                                                    <option value="17:45:00">17:45</option>
                                                    <option value="18:00:00">18:00</option>
                                                    <option value="18:15:00">18:15</option>
                                                    <option value="18:30:00">18:30</option>
                                                    <option value="18:45:00">18:45</option>
                                                    <option value="19:00:00">18:00</option>
                                                    <option value="19:15:00">19:15</option>
                                                    <option value="19:30:00">19:30</option>
                                                    <option value="19:45:00">19:45</option>
                                                    <option value="20:00:00">20:00</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 ms-auto time_slots">
                                <div class="row">
                                    <div class="col-1">
                                        <label for="9-1pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="9-1pm"
                                                value="9-1pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                9-1pm
                                            </p>
                                        </label>
                                        <label for="9-3pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="9-3pm"
                                                value="9-3pm">
                                            <p class="p-2 rounded mb-0">
                                                9-3pm
                                            </p>
                                        </label>
                                        <label for="9am-11am"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="9am-11am"
                                                value="9am-11am">
                                            <p class="p-2 rounded mb-0">
                                                9am-11am
                                            </p>
                                        </label>
                                        <label for="9am-12pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="9am-12pm"
                                                value="9am-12pm">
                                            <p class="p-2 rounded mb-0">
                                                9am-12pm
                                            </p>
                                        </label>
                                        <label for="9am-9pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="9am-9pm"
                                                value="9am-9pm">
                                            <p class="p-2 rounded mb-0">
                                                9am-9pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="10-1pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="10-1pm"
                                                value="10-1pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                10-1pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="11-2pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="11-2pm"
                                                value="11-2pm">
                                            <p class="p-2 rounded mb-0">
                                                11-2pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="12-3pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="12-3pm"
                                                value="12-3pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                12-3pm
                                            </p>
                                        </label>
                                        <label for="12-5pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="12-5pm"
                                                value="12-5pm">
                                            <p class="p-2 rounded mb-0">
                                                12-5pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="1-4pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="1-4pm"
                                                value="1-4pm">
                                            <p class="p-2 rounded mb-0">
                                                1-4pm
                                            </p>
                                        </label>
                                        <label for="1-5pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="1-5pm"
                                                value="1-5pm">
                                            <p class="p-2 rounded mb-0">
                                                1-5pm
                                            </p>
                                        </label>
                                        <label for="1-7pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="1-7pm"
                                                value="1-7pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                1-7pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="2-5pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="2-5pm"
                                                value="2-5pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                2-5pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="3-6pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="3-6pm"
                                                value="3-6pm">
                                            <p class="p-2 rounded mb-0">
                                                3-6pm
                                            </p>
                                        </label>
                                        <label for="3-9pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="3-9pm"
                                                value="3-9pm">
                                            <p class="p-2 rounded mb-0">
                                                3-9pm
                                            </p>
                                        </label>
                                        <label for="3-7pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="3-7pm"
                                                value="3-7pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                3-7pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="4-7pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="4-7pm"
                                                value="4-7pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                4-7pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="5-8pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="5-8pm"
                                                value="5-8pm">
                                            <p class="p-2 rounded mb-0">
                                                5-8pm
                                            </p>
                                        </label>
                                        <label for="5-9pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="5-9pm"
                                                value="5-9pm">
                                            <p class="p-2 rounded mb-0">
                                                5-9pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="6-9pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="6-9pm"
                                                value="6-9pm">
                                            <p class="p-2 rounded mb-0">
                                                6-9pm
                                            </p>
                                        </label>
                                        <label for="6-10pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="6-10pm"
                                                value="6-10pm">
                                            <p class="p-2 rounded mb-0">
                                                6-10pm
                                            </p>
                                        </label>
                                        <label for="6-11pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="6-11pm"
                                                value="6-11pm" checked>
                                            <p class="p-2 rounded mb-0">
                                                6-11pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="7-10pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="7-10pm"
                                                value="7-10pm">
                                            <p class="p-2 rounded mb-0">
                                                7-10pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                        <label for="8-11pm"
                                            class="border mb-3 rounded cursor-pointer w-100 text-center">
                                            <input type="checkbox" name="time_slots[]" class="d-none" id="8-11pm"
                                                value="8-11pm">
                                            <p class="p-2 rounded mb-0">
                                                8-11pm
                                            </p>
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button"
                                            class="btn btn-outline btn-outline-dark select_deselect_all"> Select/Deselect
                                            All </button>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-10 ms-auto my-3">
                                <button class="btn btn-warning" type="submit"> Update </button>
                                <button class="btn btn-dark" type="reset"> Reset </button>
                                <a href="javascript:void(0)" class="btn btn-outline btn-outline-danger"> Return </a>
                            </div>
                        </div>
                    </form>
                </div>



                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="d-flex justify-content-between align-items-center">
                                    Regions
                                    <div class="input-group gap-2 w-auto">
                                        <input type="text" class="rounded form-control" name=""
                                            id="">
                                        <button type="button" class="rounded btn btn-sm btn-info"> <i
                                                class="fa fa-arrow-down"></i> </button>
                                        <button type="button" class="rounded btn btn-sm btn-info"> <i
                                                class="fa fa-plus"></i> </button>
                                    </div>
                                </h4>
                                <hr>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <p class="d-flex justify-content-between">
                                            <span>Los Angeles Country <i class="fa fa-edit"></i> <i
                                                    class="fa fa-share"></i></span>
                                            <i class="fa fa-close text-danger fs-4"></i>
                                        </p>
                                        <div class="input-group gap-2">
                                            <input type="text" class="form-control" name="">
                                            <button type="button" class="btn btn-outline btn-outline-success"> <i
                                                    class="fa fa-check"></i> </button>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="d-flex justify-content-between">
                                            <span>Orange Country <i class="fa fa-edit"></i> <i
                                                    class="fa fa-share"></i></span>
                                            <i class="fa fa-close text-danger fs-4"></i>
                                        </p>
                                        <div class="input-group gap-2">
                                            <input type="text" class="form-control" name="">
                                            <button type="button" class="btn btn-outline btn-outline-success"> <i
                                                    class="fa fa-check"></i> </button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div id="map" class="w-100" style="height: 360px"></div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#emergency_call_input').repeater({
            initEmpty: false,
            show: function() {
                $(this).slideDown();
            },
            isFirstItemUndeletable: true,
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });

        $(function() {
            $('.order_type_settings').find('input[type=checkbox]:checked').parent().prepend(
                '<i class="fa fa-check text-success"></i>')
            $('.order_type_settings').find('input[type=checkbox]:not(:checked)').parent().prepend(
                '<i class="fa fa-close text-danger"></i>')
        })
        $('.order_type_settings input[type=checkbox]').on('change', function() {
            $(this).parent().find('i').remove();
            if ($(this).is(':checked')) {
                $(this).parent().prepend('<i class="fa fa-check text-success"></i>')
            } else {
                $(this).parent().prepend('<i class="fa fa-close text-danger"></i>')
            }
        });
        $('.select_deselect_all').on('click', function() {
            var checkBoxes = $('.time_slots input[type="checkbox"]');
            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        });
    </script>



    <script>
        $( document ).ready(function() {
            initEditClietMap();
        });
        var initEditClietMap = function() {
            // Check if Leaflet is included
            if (!L) {
                return;
            }

            // Define Map Location
            var leaflet = L.map('map', {
                center: ['33.787914', '-117.853104'],
                zoom: 100
            });

            // Init Leaflet Map. For more info check the plugin's documentation: https://leafletjs.com/
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors  contributors, Imagery © <a href="#">quickpharma</a>'
            }).addTo(leaflet);

            // Set Geocoding
            var geocodeService;
            if (typeof L.esri.Geocoding === 'undefined') {
                geocodeService = L.esri.geocodeService();
            } else {
                geocodeService = L.esri.Geocoding.geocodeService();
            }

            // Define Marker Layer
            var markerLayer = L.layerGroup().addTo(leaflet);



        }
    </script>
@endsection
