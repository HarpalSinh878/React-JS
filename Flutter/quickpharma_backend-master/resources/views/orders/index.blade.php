@extends('layouts.main')
@section('title')
Orders
@endsection
@section('page-title')
@endsection
@section('content')
<div class="row gx-5 gx-xl-10">
    <div class="col-xxl-12 mb-5 mb-xl-10">
        <div class="card card-flush h-xl-100">
            <div class="card-header pt-4 pb-4">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">
                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-boxes me-2" viewBox="0 0 16 16">
                                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z">
                                </path>
                            </svg>
                        </span>Orders</span>
                </h3>
                <div class="card-toolbar">
                    <ul class="nav">
                        <!-- <li class="nav-item ms-lg-3 mb-3">
                                <a href="#" class="btn btn-success btn-rounded">
                                    <i class="bi bi-phone fs-4 me-2 text-white"></i>
                                    Callcenter Report</a>
                            </li> -->
                        <li class="nav-item ms-lg-3 mb-3">
                            <a href="#" class="btn btn-primary btn-rounded">
                                <i class="bi bi-cash fs-4 me-2 text-white"></i>
                                Copays</a>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <a href="#" class="btn btn-primary btn-rounded">
                                <i class="bi bi-telephone fs-4 me-2 text-white"></i>
                                Dial(0)</a>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <a id="btn_cancel_order" class="btn btn-danger btn-rounded">
                                <i class="bi bi-x-lg fs-4 me-2 text-white"></i>
                                Cancel Order (<span id="set_cancel_order">0</span>)</a>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <a href="#" id="print_all_order" class="btn btn-success btn-rounded">
                                <i class="bi bi-printer fs-4 me-2 text-white"></i>
                                Print (<span id="btn_print">0</span>)</a>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <a href="{{ route('orders.create') }}" class="btn btn-theme-color btn-rounded">
                                <i class="bi bi-plus-lg fs-4 me-2"></i>
                                New</a>
                        </li>
                        <li class="nav-item ms-lg-3">
                            <a href="#" class="btn btn-theme-color btn-rounded">
                                <i class="bi bi-gear-fill fs-4 me-2 "></i>
                                API</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body border-top pt-6">
                <div class="card-toolbar">
                    <ul class="nav" id="kt_chart_widget_8_tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary active fw-bold px-4 me-4 bg-secondary btn-rounded" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#all" aria-selected="false" role="tab">All</a>
                        </li>
                        <!-- <li class="nav-item" role="presentation">
                                    <button class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                     id="Copy"
                                    >Copy</button>
                            </li> -->
                        <!-- <li class="nav-item" role="presentation">
                                <button class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                     id="csv"
                                    >CSV</button>
                            </li> -->
                        <li class="nav-item" role="presentation">
                            <!-- <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded" id="print_multiple_confirmation">Print Confirmation</a> -->
                            <a target="_blank" class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded" id="print_multiple_confirmation">
                                Print Confirmation</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a target="_blank" class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded" id="print_multiple_delivery_slip">
                                Print Delivery Slip</a>
                        </li>
                    </ul>
                </div>
                <div class="row mt-5 d-flex align-items-center">
                    <div class="tab-content mt-5">
                        <div class="mb-5">
                            <button class="btn btn-theme-color mb-2 filter-btn" value="All">All({{ getOrdersTotal('') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Ready To Print">Ready to
                                Print
                                ({{ getOrdersTotal('Ready To Print') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Ready To Pickup">Ready for
                                Pickup ({{ getOrdersTotal('Ready To Pickup') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Pickup Occurred">Pickup Occurred
                                ({{ getOrdersTotal('Pickup Occurred') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Ready For Delivery">Ready for
                                Delivery ({{ getOrdersTotal('Ready For Delivery') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Route Optimized">Route
                                Optimized
                                ({{ getOrdersTotal('Route Optimized') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Driver Out">Driver Out
                                ({{ getOrdersTotal('Driver Out') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Delivered">Delivered
                                ({{ getOrdersTotal('Delivered') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Delivered Attempted">Delivered
                                Attempted ({{ getOrdersTotal('Delivered Attempted') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Returned">Returned
                                ({{ getOrdersTotal('Returned') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Rejected">Rejected
                                ({{ getOrdersTotal('Rejected') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Back To Pharmacy">Back to
                                Pharmacy ({{ getOrdersTotal('Back To Pharmacy') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Investigation">Investigation
                                ({{ getOrdersTotal('Investigation') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Other Date Delivery">Other Date
                                Delivery ({{ getOrdersTotal('Other Date Delivery') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="Ready To Optimize">Ready To
                                Optimize ({{ getOrdersTotal('Ready To Optimize') }})</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="On Its Way To Facility">On its
                                way
                                to
                                facility ({{ getOrdersTotal('On Its Way To Facility') }})</button>
                        </div>
                        <div class="tab-pane fade active show" id="all" role="tabpanel">
                            <div class="mb-5">
                                <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive table-bordered" aria-describedby="mydesc" data-url="{{ url('orderList') }}" id="table_list" data-toggle="table" data-click-to-select="true" data-show-copy-rows="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar" data-show-export="true" data-fixed-columns="false" data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-pagination-successively-size="3" data-show-columns="true" data-export-types='["csv","pdf","excel"]' data-show-print='true' data-export-options='{ "fileName": "orders-<?= date('d-m-y') ?>", "ignoreColumn":
                                        ["state","action"] }' data-query-params="queryParams">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-force-hide="true" data-checkbox="true"></th>
                                            <th scope="col" data-field="id" data-visible="false"></th>
                                            <th scope="col" data-field="action" data-visible="true" data-sortable="true" data-events="actionEvents">UID</th>
                                            <th scope="col" class="custom-width" data-field="status" data-visible="true" data-sortable="true" data-width="100" data-width-unit="px">Status</th>
                                            <th scope="col" class="custom-width" data-field="in_queue" data-visible="true" data-sortable="true">In Queue</th>
                                            <th scope="col" class="custom-width" data-field="recipient_name" data-visible="true" data-sortable="true" data-width="100" data-width-unit="px">Recipient Name </th>
                                            <th scope="col" class="custom-width" data-field="client" data-visible="true" data-sortable="true" data-width="100" data-width-unit="px">Client</th>
                                            <th scope="col" class="custom-width" data-field="in_system" data-visible="true" data-sortable="true">In System </th>
                                            <th scope="col" class="custom-width" data-field="date_to_deliver" data-visible="true" data-sortable="true">Date to Deliver</th>
                                            <th scope="col" class="custom-width" data-field="time_to_deliver" data-visible="true" data-sortable="true">Time to Deliver</th>
                                            <th scope="col" class="custom-width" data-field="last_contact_in_person" data-visible="true" data-sortable="true">Last Contact in Person</th>
                                            <th scope="col" class="custom-width" data-field="eta" data-visible="true" data-sortable="true">ETA</th>
                                            <th scope="col" class="custom-width" data-field="promised_eta" data-visible="true" data-sortable="true">Promised ETA </th>
                                            <th scope="col" class="custom-width" data-field="eta_error" data-visible="true" data-sortable="true">ETA Error</th>
                                            <th scope="col" class="custom-width" data-field="remote_id" data-visible="true" data-sortable="true">Remote ID</th>
                                            <th scope="col" class="custom-width" data-field="custom" data-visible="true" data-sortable="true">Custom</th>
                                            <th scope="col" class="custom-width" data-field="operator_initials" data-visible="true" data-sortable="true">Operator Initials</th>
                                            <th scope="col" class="custom-width" data-field="condition" data-visible="true" data-sortable="true">Condition </th>
                                            <th scope="col" class="custom-width" data-field="facility" data-visible="true" data-sortable="true">Facility </th>
                                            <th scope="col" class="custom-width" data-field="hub" data-visible="true" data-sortable="true">Hub</th>
                                            <th scope="col" class="custom-width" data-field="fridge" data-visible="false" data-sortable="true">Fridge</th>
                                            <th scope="col" class="custom-width" data-field="cold_no_fridge" data-visible="false" data-sortable="true">Cold No Fridge</th>
                                            <th scope="col" class="custom-width" data-field="confidential" data-visible="false" data-sortable="true">Confidential</th>
                                            <th scope="col" class="custom-width" data-field="scheduled" data-visible="false" data-sortable="true">Scheduled</th>
                                            <th scope="col" class="custom-width" data-field="recipient_address" data-visible="false" data-sortable="true">Recipient Address</th>
                                            <th scope="col" class="custom-width" data-field="recipient_city" data-visible="false" data-sortable="true">Recipient City</th>
                                            <th scope="col" class="custom-width" data-field="recipient_state" data-visible="false" data-sortable="true"> Recipient State</th>
                                            <th scope="col" class="custom-width" data-field="recipient_zip" data-visible="false" data-sortable="true">Recipient ZIP </th>
                                            <th scope="col" class="custom-width" data-field="recipient_apt" data-visible="false" data-sortable="true">Recipient Apt.</th>
                                            <th scope="col" class="custom-width" data-field="recipient_phone" data-visible="false" data-sortable="true">Recipient Phone</th>
                                            <th scope="col" class="custom-width" data-field="rx_number" data-visible="false" data-sortable="true">RX Number</th>
                                            <th scope="col" class="custom-width" data-field="rx_name" data-visible="false" data-sortable="true">RX Name</th>
                                            <th scope="col" class="custom-width" data-field="created" data-visible="false" data-sortable="true">Created</th>
                                            <th scope="col" class="custom-width" data-field="title" data-visible="false" data-sortable="true">Title</th>
                                            <th scope="col" class="custom-width" data-field="description" data-visible="false" data-sortable="true">Description </th>
                                            <th scope="col" class="custom-width" data-field="notes" data-visible="false" data-sortable="true">Notes</th>
                                            <th scope="col" class="custom-width" data-field="last_contacted" data-visible="false" data-sortable="true">Last Contacted </th>
                                            <th scope="col" class="custom-width" data-field="attempts" data-visible="false" data-sortable="true">Attempts</th>
                                            <th scope="col" class="custom-width" data-field="copay" data-visible="false" data-sortable="true">Copay</th>
                                            <th scope="col" class="custom-width" data-field="weight" data-visible="false" data-sortable="true">Weight</th>
                                            <th scope="col" class="custom-width" data-field="balance" data-visible="false" data-sortable="true">Balance</th>
                                            <th scope="col" class="custom-width" data-field="items" data-visible="false" data-sortable="true"># of Items </th>
                                            <th scope="col" class="custom-width" data-field="dispatcher_notes" data-visible="false" data-sortable="true">Dispatcher Notes</th>
                                            <th scope="col" class="custom-width" data-field="call_notes" data-visible="false" data-sortable="true">Call Notes </th>
                                            <th scope="col" class="custom-width" data-field="visible" data-visible="false" data-sortable="true">Visible</th>
                                            <th scope="col" class="custom-width" data-field="texted" data-visible="false" data-sortable="true">Texted</th>
                                            <th scope="col" class="custom-width" data-field="called" data-visible="false" data-sortable="true">Called</th>
                                            <th scope="col" class="custom-width" data-field="confirmed" data-visible="false" data-sortable="true">Confirmed</th>
                                            <th scope="col" class="custom-width" data-field="type" data-visible="false" data-sortable="true">Type</th>
                                            <th scope="col" class="custom-width" data-field="provider_name" data-visible="false" data-sortable="true">Provider Name </th>
                                            <th scope="col" class="custom-width" data-field="activity" data-visible="false" data-sortable="true">Activity</th>
                                            <th scope="col" class="custom-width" data-field="sub_status" data-visible="false" data-sortable="true">Sub Status </th>
                                            <th scope="col" class="custom-width" data-field="date_time_delivered" data-visible="false" data-sortable="true">Date/Time Delivered</th>
                                            <th scope="col" class="custom-width" data-field="driver" data-visible="false" data-sortable="true">Driver</th>
                                            <th scope="col" class="custom-width" data-field="driver_profile" data-visible="false" data-sortable="false">Driver Profile</th>
                                            <th scope="col" class="custom-width" data-field="contents" data-visible="false" data-sortable="false">Contents</th>
                                            <th scope="col" class="custom-width" data-field="date_filled" data-visible="false" data-sortable="true">Date Filled </th>
                                            <th scope="col" class="custom-width" data-field="fridge" data-visible="false" data-sortable="true">Fridge?</th>
                                            <th scope="col" class="custom-width" data-field="sensitive" data-visible="false" data-sortable="true">Sensitive? </th>
                                            <th scope="col" class="custom-width" data-field="is_sms" data-visible="false" data-sortable="true">Is SMS?</th>
                                            <th scope="col" class="custom-width" data-field="is_call" data-visible="false" data-sortable="true">Is Call?</th>
                                            <th scope="col" class="custom-width" data-field="sensitive" data-visible="false" data-sortable="true">Sensitive</th>
                                            <th scope="col" class="custom-width" data-field="controlled" data-visible="false" data-sortable="true">Controlled</th>
                                            <th scope="col" class="custom-width" data-field="hazardous" data-visible="false" data-sortable="true">Hazardous</th>
                                            <th scope="col" class="custom-width" data-field="wound_care_patient" data-visible="false" data-sortable="true">Wound care patient</th>
                                        </tr>
                                    </thead>
                                </table>
                                <!-- <div class="dataTables_paginate paging_simple_numbers mt-8"
                                        id="kt_ecommerce_products_table_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item active"><a href="#" aria-controls="kt_ecommerce_products_table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        </ul>
                                    </div> -->
                            </div>
                        </div>
                        <!---- START :: order.modal.blade.php --->
                        @include('orders.modal')
                        <!---- END :: order.modal.blade.php ---->
                        <!---- EDIT_ORDER_MODAL   START   --->
                        <div class="modal fade" tabindex="-1" id="edit_order_model" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-uppercase"> Edit Order <small>#<span class="order_id"></span></small> </h3>
                                        <!-- <a class="btn btn-info btn-sm check_order_btn" href="javascript:void(0);" data-order-id=""> See Order </a> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center spinner">
                                            <div class="spinner-border" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                        <form action="#" method="post" id="edit_order_form" data-order-id="" data-url="{{ route('orders.update') }}">
                                            @csrf
                                            <input type="hidden" name="order_id" id="order_id">
                                            <div class="order-content">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Save </button>
                                                <button type="reset" class="btn btn-secondary"> <i class="fa-solid fa-spinner"></i> Reset </button>
                                                <button type="button" class="btn btn-outline btn-outline-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---- EDIT_ORDER_MODAL   EDND  --->
                        <!--begin model-->
                        <div class="modal fade" tabindex="-1" id="ticket_model">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Tickets</h3>
                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                            <span class="svg-icon svg-icon-1"></span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor">
                                                </rect>
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor">
                                                </rect>
                                            </svg>
                                        </div>
                                    </div>
                                    <form action="{{ route('tickets.store') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row mb-6">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Describe Your issue And What
                                                        Needs
                                                        To Be Resolved Through
                                                        This Ticket.</label>
                                                    <span class="text-dark">Description of Issue</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                    <select class="form-select" name="priority">
                                                        <option></option>
                                                        <option value="Moderate" style="background-color: yellow;" data-color="yellow">
                                                            Moderate</option>
                                                        <option value="Low" style="background-color: rgb(168, 214, 149);" selected>Low
                                                        </option>
                                                        <option value="Normal" style="background-color: rgb(240, 173, 78);">Normal
                                                        </option>
                                                        <option value="High" style="background-color: rgb(255, 0, 0);">High
                                                        </option>
                                                        <option value="Emergency" style="background-color: rgb(204, 0, 51);">
                                                            Emergency
                                                        </option>
                                                    </select>
                                                    <span class="text-dark">Priority</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <select class="form-select" name="type">
                                                        <option></option>
                                                        <option value="feedback" selected>feedback</option>
                                                        <option value="improvement">improvement</option>
                                                        <optgroup label="complaint">
                                                            <option value="complaint,no mask">no mask</option>
                                                            <option value="complaint,driver late">driver late
                                                            </option>
                                                            <option value="complaint,unfriendy driver">
                                                                unfriendy driver
                                                            </option>
                                                            <option value="complaint,delivered to wrong place">
                                                                delivered to wrong place
                                                            </option>
                                                            <option value="complaint,other">other</option>
                                                        </optgroup>
                                                        <optgroup label="attention">
                                                            <option value="attention,address cahnged">address
                                                                cahnged
                                                            </option>
                                                            <option value="attention,patient requested new time">
                                                                patient requested new time
                                                            </option>
                                                            <option value="attention,other">other</option>
                                                        </optgroup>
                                                    </select>
                                                    <span class="text-dark">Type</span>
                                                </div>
                                                <div class="col-lg-3">
                                                    <input type="text" name="order_id" id="ticket_order_id" class="form-control form-control-lg form-control-solid" placeholder="Order Id">
                                                    <span class="text-dark">Order Id (optional)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-theme-color">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end begin model-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!---START :: Bootstrap-Table Code --->
<script>
    var filterbtn = 'All';
    $('.filter-btn').on('click', function() {
        filterbtn = $(this).val();
        $(".filter-btn").removeClass('active');
        $(this).addClass('active');
        $('#table_list').bootstrapTable('refresh');
    });
    function queryParams(p) {
        return {
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            limit: p.limit,
            search: p.search,
            status: filterbtn
        };
    }
    window.actionEvents = {
        'click .view': function(e, value, row, index) {
            var driver_info = '';
            $("#order_id").text(row.id);
            $("#ticket_order_id").val(row.id);
            $(".edit_order, #edit_order_model .check_order_btn").attr('data-order-id', row.id);
            $("#edit_order_model .order_id").html(row.id);
            $("#edit_order_form #order_id").val(row.id);
            var address = row.recipient_address + "\n" + row.recipient_city + " " + row.recipient_state + " " +
                row.recipient_zip
            $("#recipient_address").text(address);
            $("#recipient_id").parent().attr('data-recipient-id', row.recipient_id);
            $("#recipient_name").html(row.recipient_name);
            $("#order-status2").html(row.status);
            // $("#order-status2").text(row.status_text);
            $("#client_name").html(row.client_url);
            $("#recipient_phone").text(row.recipient_phone);
            $("#copay").text(row.copay);
            $("#special_instructions").text(row.special_instructions);
            $("#weight").text(row.weight);
            $("#created").text(row.created_at);
            $("#orderItems").val(row.items);
            $("#request_call_upon_arrival").text(row.request_call_upon_arrival);
            $("#order-type").text(row.order_type);
            if (row.request_call_upon_arrival == 'Yes') {
                $("#request_call_upon_arrival").css("color", "green");
            } else {
                $("#request_call_upon_arrival").css("color", "red");
            }
            $("#order-printid").attr("href", "{{ url('QRCode') }}" + '?id=' + row.id)
            $("#delivery_slip_url").attr("href", "{{ url('DeliverySlip') }}" + '?id=' + row.id)
            $("#confirmation_url").attr("href", "{{ url('Confirmation') }}" + '?id=' + row.id)
            $("#deliveryslip_and_confirmation").attr("href", "{{ url('DeliverySlipAndConfirmation') }}" +
                '?id=' + row.id)
            $("#add_driver_note_modal_order_id").val(row.id);
            $("#date_to_deliver").text(row.date_to_deliver);
            $("#add_driver_note_modal_order_id").val(row.id);
            $("#driver").val(row.driver_id).trigger('change');
            $("#new_driver_note_status").val(row.status_text).trigger('change');
            $("#current_driver").text(row.driver_name);
            $('#confirmAndNodeDeleteOrder').attr('orderid', row.id);
            row.contents = '';
            if ($.trim(row.contents) != '') {
                row.contents = row.contents;
            }
            $("#contents").val(row.contents);
            $("#note_added").val(row.note_added);
            $("#is_copay_payed").val(row.is_copay_payed).trigger('change');
            if (row.driver_id != 0) {
                var copayed = '';
                if (row.is_copay_payed == 'Yes') {
                    copayed = '<label class="mt-10 fw-bold text-success fs-2">COPAY IS PAYED</label>';
                } else {
                    copayed = '<label class="mt-10 fw-bold text-danger fs-2">COPAY IS NOT PAYED</label>';
                }
                driver_info = '<div class="row align-items-center">' +
                    '<div class="col-md-3">' +
                    '<div class="symbol symbol-100px symbol-md-75px symbol-circle">' + row.driver_profile +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-9">' +
                    '<label class="fw-bold"><i class="fa fa-pencil text-dark"></i> Note Details</label>' +
                    '<p class="m-0">' + row.contents + '</label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-6">' +
                    '<label class="mt-5 fw-bold">' + row.driver_name + '</label>' +
                    '<br><span>Driver</span>' +
                    '<br><label class="mt-1">' + row.date_to_deliver + '</label>' +
                    '<br><label class="mt-1">' + row.time_to_deliver + '</label>' +
                    '<br><label class="mt-1"> Recipient Name:</label>' +
                    '<br><label class="mt-1">' + row.client + '</label>' +
                    '<br><label class="mt-5"> Address:</label>' +
                    '<br><label class="mt-2">' + row.recipient_address + '</label>' +
                    '<br><label class="mt-5"> Route:#' + row.regions_id + '</label>' +
                    '<br><label class="mt-5"><span class="label label-success">0m</span></label>' +
                    '<br><label class="mt-5 fw-bold"> Dispatcher:</label>' +
                    '<br><label class="mt-5">' + row.dispatcher_name + '</label>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<label class="mt-20 fw-bold">' + row.status + '</label>' +
                    '<br><label class="mt-5 fw-bold">Location:</label>' +
                    '<br><button type="button" class="btn btn-primary btn-sm btn-icon"><i class="fa fa-map text-white"></i></button><button type="button" class="btn btn-secondary btn-sm btn-icon" style="margin-left: 10px;" onclick="openWindow(`https://maps.google.com/?q=41.02295600,-72.15113800&amp;ll=41.02295600,-72.15113800&amp;z=20`);"><i class="bi bi-google"></i></button>' +
                    '</div>' +
                    '</div>' +
                    "<div class='row'>" + copayed + '</div>';
            }
            $("#driver_details").html(driver_info);
            if (row.delivery_methods_type == 'nosign') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>SIGNATURE OPTIONAL</b><br>Driver will attempt face-to-face delivery. If nobody is home, driver will leave the package by the door and take a picture.</span>'
                );
            }
            if (row.delivery_methods_type == 'idrequired') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE ID & SIGNATURE REQUIRED</b><br>Prescription will be delivered to the assigned patient only. Both ID and signature are required by the recipient, and the ID must match the patient’s name. Driver will take a picture of the patient`s ID and the door upon delivery.</span>'
                );
            }
            if (row.delivery_methods_type == 'face2face') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE SIGNATURE REQUIRED</b><br>Signature is required by any person who lives with the patient. Driver will take a picture of the patient`s door.</span>'
                )
            }
            if (row.delivery_methods_type == 'inperson') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE NO SIGNATURE REQUIRED</b><br>Driver will deliver prescription to any person who lives with the patient, without capturing a signature. Driver will take a picture of the patient`s door.</span>'
                );
            }
            if (row.delivery_methods_type == 'signlink') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>ONLINE SIGNATURE</b><br>Driver will leave the prescription by the door and take a picture, only if patient signs online before the delivery. Without online signature, the delivery method will proceed as `Face-to-Face Signature Required`.</span>'
                );
            }
            if (row.delivery_methods_type == 'noask') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>NO-CONTACT DELIVERY</b><br>Driver will leave the package by the door and take a picture, without attempting face-to-face delivery.</span>'
                );
            }
            $.ajax({
                url: "{{ route('getordersdocument') }}",
                type: "GET",
                data: {
                    "id": row.id
                },
                cache: false,
                success: function(result) {
                    var html = "";
                    var row = result.length - 1;
                    var total_row = 1;
                    $.each(result, function(i) {
                        if (i == 0) {
                            html +=
                                '<div class="row mb-2"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">' +
                                '<a  data-lightbox="roadtrip" href="' +
                                result[i].document + '">' +
                                '<img class="w-100 h-350px"   src="' +
                                result[i].document + '" id="image" alt="image">' +
                                '</a>' +
                                '</div></div>';
                        } else {
                            if (total_row == 1) {
                                html += "<div class='row form-group'>";
                            }
                            html +=
                                '<div class="col-lg-2 mb-2">' +
                                '<a  data-lightbox="roadtrip" href="' +
                                result[i].document + '">' +
                                '<img class="w-100 h-100"   src="' +
                                result[i].document + '" id="image" alt="image">' +
                                '</a>' +
                                '</div>';
                            if (row == total_row) {
                                html += "</div>";
                            }
                            total_row++;
                        }
                    });
                    $("#order_document").html(html);
                },
                error: function(error) {}
            });
            setTimeout(function() {
                // window.dispatchEvent(new Event("resize"));
                initRecipientsMap(row.recipient_latitude, row.recipient_longitude, row
                    .recipient_address);
            }, 600);
        }
    };
    setTimeout(function() {
        $('.custom-width').each(function(key, val) {
            $(this).removeAttr('style');
            $(this).attr('style', 'width:180px;min-width:180px !important');
        });
    }, 1000);
    var checkedRows = [];
    var checkids = [];
    $('#table_list').on('check-all.bs.table', function(e, row) {
        $("#set_cancel_order").text(row.length);
        $("#btn_print").text(row.length);
        $.each(row, function(index, value) {
            checkedRows.push({
                id: value.id
            });
            checkids.push(value.id)
        });
        $("#print_multiple_delivery_slip").attr("href", "{{ url('DeliverySlip') }}" + '?id=' + checkids.join(
            ','));
        $("#print_multiple_confirmation").attr("href", "{{ url('Confirmation') }}" + '?id=' + checkids.join(
            ','));
        $("#print_all_order").attr("href", "{{ url('QRCode') }}" + '?id=' + checkids.join(','));
        $("#print_multiple_delivery_slip").addClass("btn-active btn-active-primary active");
        $("#print_multiple_confirmation").addClass("btn-active btn-active-primary active");
    })
    $('#table_list').on('uncheck-all.bs.table', function(e, row) {
        $("#set_cancel_order").text(row.length);
        $("#btn_print").text(row.length);
        checkedRows.length = 0;
        checkids.length = 0
        $("#print_multiple_delivery_slip").attr("href", "#")
        $("#print_multiple_confirmation").attr("href", "#");
        $("#print_all_order").attr("href", "#");
        $("#print_multiple_delivery_slip").removeClass("btn-active btn-active-primary active");
        $("#print_multiple_confirmation").removeClass("btn-active btn-active-primary active");
    })
    $('#table_list').on('check.bs.table', function(e, row) {
        checkedRows.push({
            id: row.id
        });
        checkids.push(row.id)
        $("#set_cancel_order").text(checkedRows.length);
        $("#btn_print").text(checkedRows.length);
        $("#print_multiple_delivery_slip").attr("href", "{{ url('DeliverySlip') }}" + '?id=' + checkids.join(
            ','));
        $("#print_multiple_confirmation").attr("href", "{{ url('Confirmation') }}" + '?id=' + checkids.join(
            ','));
        $("#print_all_order").attr("href", "{{ url('QRCode') }}" + '?id=' + checkids.join(','));
        $("#print_multiple_delivery_slip").addClass("btn-active btn-active-primary active");
        $("#print_multiple_confirmation").addClass("btn-active btn-active-primary active");
    });
    $('#table_list').on('uncheck.bs.table', function(e, row) {
        $.each(checkedRows, function(index, value) {
            if (value.id === row.id) {
                checkedRows.splice(index, 1);
            }
        });
        $.each(checkids, function(index, value) {
            if (value === row.id) {
                checkids.splice(index, 1);
            }
        });
        $("#set_cancel_order").text(checkedRows.length);
        $("#btn_print").text(checkids.length);
        if (checkids.length == 0) {
            $("#print_multiple_delivery_slip").attr("href", "#");
            $("#print_multiple_confirmation").attr("href", "#");
            $("#print_all_order").attr("href", "#");
            $("#print_multiple_delivery_slip").removeClass("btn-active btn-active-primary active");
            $("#print_multiple_confirmation").removeClass("btn-active btn-active-primary active");
        }
    });
    $(document).on('click', '#btn_cancel_order', function() {
        if (checkedRows.length > 0) {
            Swal.fire({
                title: 'Are You Sure Want to Reject Order?',
                icon: 'error',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyCanceButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('orders.multistatus') }}",
                        type: "POST",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            "ids": checkedRows,
                            "status": 'Rejected',
                        },
                        cache: false,
                        success: function(result) {
                            if (result.error == false) {
                                toastr.success('All Order Rejected successfully');
                                checkedRows.splice(0, checkedRows.length);
                                $("#set_cancel_order").text(checkedRows.length);
                                $('#table_list').bootstrapTable('refresh');
                            }
                        },
                        error: function(error) {}
                    });
                } else {}
            })
        }
    });
    // $('#table_list').tableExport({type:'csv'});
</script>
<!---END :: Bootstrap-Table Code --->
@endsection