@extends('layouts.main')
@section('title')
Routes
@endsection
@section('page-title')
@endsection
@section('content')
<style>
    /* .new-active {
                                                    background-color: cyan !important;
                                                } */
    .modal-xxl {
        --bs-modal-width: 1500px;
    }
</style>
<!--begin::Row-->
<div class="row gx-5 gx-xl-10">
    <!--begin::Col-->
    <div class="col-xxl-2 col-sm-12 mb-5 mb-xl-10 ms-n7">
        <!--begin::Chart widget 8-->
        <div class="card card-flush h-xl-100">
            <!--begin::Body-->
            <div class="card-body border-top pt-6">
                <div class="row mb-5">
                    <div class="col-sm-6">
                        <h3 class="mt-3 ms-n3">
                            <i class="fs-fluid bi bi-geo-alt"></i>
                            <span class="ms-1">Routes</span>
                        </h3>
                    </div>
                    <div class="col-sm-6 text-center">
                        <button class="btn btn-icon btn-sm btn-secondary"><i class="bi bi-arrow-clockwise"></i></button>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                        <input class="form-check-input me-3" type="checkbox">
                        <label class="form-check-label">
                            <div class="fw-semibold text-gray-800">SHOW ONLY PENDING</div>
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                        <input class="form-check-input me-3" type="checkbox">
                        <label class="form-check-label">
                            <div class="fw-semibold text-gray-800">SHOW ONLY MY ROUTE</div>
                        </label>
                    </div>
                </div>
                <div class="row mb-3">
                    <input type="text" class="form-control form-control-solid" placeholder="Route Name Or ID">
                </div>
                <hr>
                <div class="row mb-3 scroll-y">
                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                        <div id="route_buttons" style="max-height: 500px; overflow-y: scroll; margin-bottom: 15px; border-bottom: 1px solid lightgray;">
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Chart widget 8-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-10 mb-5 mb-xl-10 ms-n7" id="orderdetailsection" style="display: none">
        <input type="hidden" class="route_id">
        <!--begin::Chart widget 8-->
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header pt-4 pb-2">
                <!--begin::Title-->
                <h3 class="card-title align-items-start d-flex ms-lg-3 mb-3 mt-5">
                    <span class="card-label fw-bold text-dark text-uppercase h4">Route </span>
                    <p>
                        <small><span id="card-title-info"></span></small>
                    </p>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <ul class="nav">
                        <li class="nav-item ms-lg-3 mb-3">
                            <!-- <span class="text-sm text-uppercase col-6">route Optimize</span><select class="form-select form-select-solid col-6" data-control="select2"><option selected>All Stops</option></select> -->
                            <div class="d-flex flex-stack flex-wrap gap-4">
                                <!--begin::Route Optimize-->
                                <div class="d-flex align-items-center fw-bold">
                                    <!--begin::Label-->
                                    <div class="fs-7 me-2 w-100">Route Optimize</div>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <select class="form-select form-select-solid col-6" data-control="select2">
                                        <option selected value="one_stops">One Stops</option>
                                        <option value="all_stops">All Stops</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Route Optimize-->
                            </div>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3 me-5">
                            <div class="form-check form-check-custom form-check-solid ms-1 mt-4 form-check-sm col-auto">
                                <input class="form-check-input me-3" checked type="checkbox"><label class="form-check-label">
                                    <div class="fw-semibold text-gray-800">Auto Refresh</div>
                                </label>
                            </div>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <a id="btn_unban" class="btn btn-theme-color">Optimize</a>
                        </li>
                        <li class="nav-item ms-lg-3 mb-3">
                            <a id="btn_ban" class="btn btn-warning">Clear</a>
                        </li>
                        <li data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="nav-item ms-lg-3 mb-3">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Route Optimize
                                </button>
                                <ul class="dropdown-menu" style="width: 158px;">
                                    <li><a class="dropdown-item" href="javascript:void(0)"><button class="btn btn-danger w-100" onclick="deleteRegion()"><i class="fa fa-close mx-2"></i>Delete</button></a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#stop_model"><button class="btn btn-primary w-100"><i class="fa fa-plus text-white mx-2"></i>STOP</button></a></li>
                                    <li><a class="dropdown-item" onclick="finish_route()"><button class="btn btn-success w-100"><i class="fa fa-check text-white mx-2"></i>Complete</button></a>
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#driver_model"><button class="btn btn-icon btn-gray w-100"><i class="fas fa-exchange-alt text-white mx-2"></i>Reassign</button></a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"><button class="btn btn-icon btn-gray-light w-100"><i class="fa fa-lock text-white mx-2"></i> Unlock</button> </a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"><button class="btn btn-icon btn-outline btn-outline-warning w-100"><i class="fa fa-comments mx-2"></i> Send SMS</button> </a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#start_model"><button class="btn btn-outline btn-icon btn-outline-primary w-100 btn-active-light-primary">START</button></a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"><button class="btn btn-icon btn-outline btn-outline-primary w-100"> &nbsp;
                                                Refresh ETA</button> </a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"><button class="btn btn-icon btn-outline btn-outline-gray w-100"> &nbsp; Reset
                                                Prom ETA</button> </a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"><button class="btn btn-icon btn-outline btn-outline-secondary w-100"> &nbsp;
                                                Bulk Assign</button> </a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body border-top pt-6">
                <!--begin::Tab content-->
                <div class="row d-flex align-items-center">
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade active show" id="all" role="tabpanel">
                            <div class="row">
                                <ul class="nav">
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-secondary"><i class="bi bi-text-paragraph fs-4 me-2 text-black"></i> All (0)</a>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3 ms-2 w-400px">
                                        <a class="btn btn-secondary col-sm-12 mb-1">ACCOUNTING CALCULATION (0)</a>
                                        <a class="btn btn-secondary col-sm-12 mb-1">Open (0)</a>
                                        <a class="btn btn-secondary col-12 mb-1">WAITING FOR THE DRIVER (0)</a>
                                        <a class="btn btn-secondary col-12 mb-1">DRIVER DECLINED (0)</a>
                                    </li>
                                    <li class="ms-lg-3 mb-3 w-225px">
                                        <a class="btn btn-secondary col-sm-12 mb-1">DRIVER ASSIGNED (0)</a>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3 ms-2 w-225px">
                                        <a class="btn btn-secondary col-sm-12 mb-1">ROUTE STARTED (0)</a>
                                        <a class="btn btn-secondary col-sm-12 mb-1">ROUTE ON TIME (0)</a>
                                        <a class="btn btn-secondary col-sm-12 mb-1">ROUTE LATE (0)</a>
                                        <a class="btn btn-secondary col-sm-12 mb-1">NEED HELP (0)</a>
                                    </li>
                                    <li class="ms-lg-3 mb-3">
                                        <a class="btn btn-secondary col-sm-12 mb-1">DRIVER FINISHED (0)</a>
                                    </li>
                                    <li class="ms-lg-3 mb-3">
                                        <a class="btn btn-secondary col-sm-12 mb-1">QAQC CHECKED (0)</a>
                                    </li>
                                    <li class="ms-lg-3 mb-3">
                                        <a class="btn btn-secondary col-sm-12 mb-1">ACCOUTING CHECKED (0)</a>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="col-sm-4 fs-6">
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"><i class="text-dark bi bi-clock-fill"></i>
                                        </span>
                                        <span class="text-dark"> Route starts at: <b><span class="ms-1" id="route_starts_at_span"></span></b> </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="text-dark bi bi-clock-fill"></i>
                                        </span>
                                        <span class="text-dark"> Started: <b><span class="ms-1" id="route_started_span"></span></b> </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <small>Current Time: <span id="route_current_time_span"></span></label></small>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="text-dark fa fa-pen"></i> </span>
                                        <span class="text-dark"> Service Time: <b><span class="ms-1" id="route_service_time_span"></span></b> </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="text-dark fa fa-list"></i> </span>
                                        <span class="text-dark"> Total: <b><span class="ms-1" id="route_total_span"></span></b> </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="text-danger fa fa-truck"></i>
                                        </span>
                                        <span class="text-danger"> Last Stop Real ETA: <b><span class="ms-1" id="route_last_stop_real_eta_span"></span></b> </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="text-dark fa fa-truck"></i> </span>
                                        <span class="text-dark"> Actual Driving Time: <b><span class="ms-1" id="route_actual_driving_time_span">0 Hr 0 Min</span></b> </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="text-dark fa fa-truck"></i> </span>
                                        <span class="text-dark"> Approximate Driving Time: <b><span class="ms-1" id="route_approximate_driving_time_span">9 Hr 19 Min</span></b>
                                        </span>
                                    </label>
                                    <label class="col-label col-12">
                                        <span class="flex-list-details"> <i class="fa-solid fa-spinner spin-right"></i> </span>
                                        <span class="text-dark"> Progress: <b><span class="ms-1" id="route_progress_span">0% (0)</span></b> </span>
                                    </label>
                                    <label class="col-label col-12 ms-5">
                                        <span class="flex-list-details"> <i class="text-dark bi bi-list"></i> </span>
                                        <span class="text-dark"> Delivered: <b><span class="ms-1  text-success" id="route_delivered_span">0% (0)</span></b> </span>
                                    </label>
                                    <label class="col-label col-12 ms-5">
                                        <span class="flex-list-details"> <i class="text-dark bi bi-search"></i>
                                        </span>
                                        <span class="text-dark"> Delivery Attempted: <b><span class="ms-1  text-danger" id="route_delivery_attempted_span">0%
                                                    (0)</span></b></label> </span>
                                    </span>
                                    <label class="col-label col-12 ms-5">
                                        <ul class="list-style-none p-0">
                                            <li>
                                                <label class="col-label col-12">
                                                    Recipient Refused: <b><span class="ms-1  text-danger" id="route_recipient_refused_span">0% (0)</span></b>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="col-label col-12">
                                                    Not Present: <b><span class="ms-1  text-danger" id="route_not_present_span">0% (0)</span></b>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="col-label col-12">
                                                    Wrong Address: <b><span class="ms-1  text-danger" id="route_wrong_address_span">0% (0)</span></b>
                                                </label>
                                            </li>
                                        </ul>
                                    </label>
                                    <label class="col-label col-12">Dispatcher: <b><label class="ms-1  text-danger" id="route_dispatcher_span">N/A</label></b></label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-12 my-2">
                                            <button class="btn btn-sm btn-primary col-auto" onclick="drawpickuporders()">Show Pickups On Map</button>
                                            <button class="btn btn-sm btn-warning col-auto" data-bs-toggle="modal" data-bs-target="#allpickupordersmodal" onclick="showpickuporders()">All Pickup Orders</button>
                                        </div>
                                        <div class="col-md-12 my-2 map_section">
                                            <div id="route_map" class="w-100" style="height: 360px"></div>
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <button class="btn btn-sm btn-warning col-auto">Allow Bypass
                                                Geofence</button>
                                            <button class="btn btn-sm btn-danger col-auto" onclick="RequestMaskPhoto()">Request a mask photo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <h4 class="text-uppercase">Driver Information</h4>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="me-5 d-flex align-items-center">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-75px symbol-circle">
                                                    <div id="driver_profile_span"></div>
                                                </div>
                                                <!--end::Avatar-->
                                                <label class="text-uppercase ms-6"><b>Full Name</b>: <p class="mb-0" id="driver_name_span"></p> </label>
                                            </div>
                                            <label class="text-uppercase mt-6"><b>Driver ID:</b></label><br>
                                            <label class="text-uppercase"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#order_details_model" class="link-underlined view"> <i class="icmn-pointer"></i>#<span id="driver_id_span">1004</span></a></label>
                                            <br>
                                            <label class="text-uppercase mt-6"><b>E-mail Address:</b></label><br>
                                            <label><span id="driver_email_span"></span></a></label>
                                            <br>
                                            <label class="text-uppercase mt-6"><b>Phone Number:</b></label><br>
                                            <label><i class="bi bi-phone-fill"></i><span id="driver_phone_number_span"></span></a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row driver-masked-photo-div">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-15">
                                <canvas id="kt_chartjs_2" class="mh-400px"></canvas>
                            </div>
                            <div class="row mt-13">
                                <ul class="nav">
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-sm btn-secondary">NOT SENT (0)</a>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3 ms-2">
                                        <a class="btn btn-sm btn-secondary col-sm-12 mb-1">TEXT SENT (0)</a>
                                        <ul class="nav">
                                            <li class="nav-item  mb-3">
                                                <a class="btn btn-sm btn-secondary"> NOT ANSWERED</a>
                                            </li>
                                            <ul class="nav ms-1">
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">ANSWERED (0)</a><br>
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">CONFIRMED (0)</a>
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">RESCHEDULED (0)</a>
                                            </ul>
                                        </ul>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3 ms-2">
                                        <a class="btn btn-sm btn-secondary col-sm-12 mb-1">CALLED (0)</a>
                                        <ul class="nav">
                                            <li class="nav-item  mb-3">
                                                <a class="btn btn-sm btn-secondary"> NOT ANSWERED (0)</a>
                                            </li>
                                            <ul class="nav ms-1">
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">ANSWERED (0)</a><br>
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">CONFIRMED (0)</a>
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">RESCHEDULED (0)</a>
                                            </ul>
                                        </ul>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3 ms-2">
                                        <a class="btn btn-sm btn-secondary col-sm-12 mb-1">DISPATCH TO CALL</a>
                                        <ul class="nav">
                                            <li class="nav-item  mb-3">
                                                <a class="btn btn-sm btn-secondary">OPEN (0)</a>
                                            </li>
                                            <li class="nav-item  mb-3 ms-2">
                                                <a class="btn btn-sm btn-secondary">NOT ANSWERED (0)</a>
                                            </li>
                                            <ul class="nav ms-1">
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">ANSWERED (0)</a><br>
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">CONFIRMED (0)</a>
                                                <a class="btn btn-sm btn-secondary col-sm-12 mb-2">RESCHEDULED (0)</a>
                                            </ul>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="row mt-13">
                                <ul class="nav">
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-sm btn-secondary"><i class="bi bi-text-paragraph fs-4 me-2 text-black"></i>ALL (0)</a>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-sm btn-secondary"><i class="bi bi-text-paragraph fs-4 me-2 text-black"></i>OPEN (0)</a>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-sm btn-secondary"><i class="bi bi-text-paragraph fs-4 me-2 text-black"></i>APPROVED (0)</a>
                                    </li>
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-sm btn-secondary"><i class="bi bi-text-paragraph fs-4 me-2 text-black"></i>REJECTED (0)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row mt-13">
                                <ul class="nav">
                                    <li class="nav-item ms-lg-3 mb-3">
                                        <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#stop_payout_model"><i class="bi bi-cash-coin text-dark"></i>Stop Payout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="table-responsive">
                                <table style="font-family: 'Lato', sans-serif;" class="table table-light table-responsive" aria-describedby="mydesc" data-url="{{ url('api/web/getRouteOrders') }}" id="table_list" data-toggle="table" data-click-to-select="true" data-show-copy-rows="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar" data-show-export="true" data-fixed-columns="false" data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="order_sequence" data-sort-order="ASC" data-pagination-successively-size="3" data-show-columns="true" data-export-types='["csv","pdf","excel"]' data-show-print='true' data-export-options='{
                                           "fileName": "orders-<?= date('d-m-y')
                                                                ?>",
                                        "ignoreColumn": ["state","action"]
                                        }' data-query-params="queryParams">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-force-hide="true" data-checkbox="true"></th>
                                            <th scope="col" data-field="id" data-visible="false"></th>
                                            <th scope="col" data-field="action" data-sortable="true" data-events="actionEvents">Sort</th>
                                            <th scope="col" data-field="gf" data-sortable="true" data-width="10" data-width-unit="%">GF</th>
                                            <th scope="col" data-field="cur_pay" data-sortable="true" data-width="10" data-width-unit="%">Cur. Pay.</th>
                                            <th class="custom-width" scope="col" data-field="recipient_address" data-sortable="true" data-width="10" data-width-unit="%">Address</th>
                                            <th class="custom-width" scope="col" data-field="request_call_upon_arrival" data-sortable="true" data-width="10" data-width-unit="%">Request Call Upon Arrival</th>
                                            <th class="custom-width" scope="col" data-field="need_to_call" data-sortable="true" data-width="10" data-width-unit="%">Need To Call
                                            </th>
                                            <th class="custom-width" scope="col" data-field="order_id" data-sortable="true" data-width="10" data-width-unit="%">Order #</th>
                                            <th class="custom-width" scope="col" data-field="c_n_patient" data-sortable="true" data-width="10" data-width-unit="%">C.N. Patient
                                            </th>
                                            <th class="custom-width" scope="col" data-field="client" data-sortable="true" data-width="10" data-width-unit="%">C.N.
                                                Pharmacy</th>
                                            <th class="custom-width" scope="col" data-field="driver_name" data-sortable="true" data-width="10" data-width-unit="%">Driver</th>
                                            <th class="custom-width" scope="col" data-field="route_status" data-sortable="true" data-width="10" data-width-unit="%">Route Status
                                            </th>
                                            <th class="custom-width" scope="col" data-field="real_eta" data-sortable="true" data-width="10" data-width-unit="%">Real ETA
                                            </th>
                                            <th class="custom-width" scope="col" data-field="real_dt" data-sortable="true" data-width="10" data-width-unit="%">Real DT</th>
                                            <th class="custom-width" scope="col" data-field="time_to_delivery" data-sortable="true" data-width="10" data-width-unit="%">Time To
                                                Devlivery</th>
                                            <th class="custom-width" scope="col" data-field="proma_eta" data-sortable="true" data-width="10" data-width-unit="%">Prma ETA
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab content-->
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Chart widget 8-->
    <!--START:: dispatcher_model-->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="dispatcher_model">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Dispatcher</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="DispatcherUpdateForm" action="{{ route('update-route-dispatcher') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group row mb-3">
                                <input type="hidden" class="route_id" name="route_id">
                                <div class="col-lg-12">
                                    <select class="form-select form-select-solid" name="modal_dispatcher" id="modal_dispatcher" data-control="select2" data-dropdown-parent="#dispatcher_model" data-allow-clear="true">
                                        <option value="0" selected>N/A</option>
                                        @isset($dispatcher)
                                        @foreach ($dispatcher as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light dispatcher_model_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: dispatcher_model-->
    <!--START:: stop_model-->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="stop_model">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Add sTOP</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="" action="" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        {{-- <div class="row">
                            <div class="form-group row mb-3">
                                <input type="hidden" class="route_id" name="route_id">
                                <div class="col-lg-12">
                                    <select class="form-select form-select-solid" name="modal_driver" id="modal_driver" data-control="select2" data-dropdown-parent="#stop_model" data-allow-clear="true">
                                        <option value="0" selected>N/A</option>
                                        @isset($driver)
                                        @foreach ($driver as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light driver_model_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--START:: driver_model-->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="driver_model">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Driver</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="DriverUpdateForm" action="{{ route('update-route-dispatcher') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group row mb-3">
                                <input type="hidden" class="route_id" name="route_id">
                                <div class="col-lg-12">
                                    <select class="form-select form-select-solid" name="modal_driver" id="modal_driver" data-control="select2" data-dropdown-parent="#driver_model" data-allow-clear="true">
                                        <option value="0" selected>N/A</option>
                                        @isset($driver)
                                        @foreach ($driver as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light driver_model_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: driver_model-->
    <!--START:: service_time_model-->
    <div class="modal fade" tabindex="-1" data-bs-backdrop='static' id="service_time_model">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Service Time</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="ServiceTimeUpdateForm" action="{{ route('update-route-dispatcher') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group row mb-3">
                                <input type="hidden" class="route_id" name="route_id">
                                <div class="col-lg-12">
                                    <input type="text" name="modal_service_time" id="service_time_modal" class="form-control form-control-solid modal_service_time" placeholder="Service Time">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light service_time_model_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: service_time_model-->
    <!--START:: start_model-->
    <div class="modal fade" tabindex="-1" data-bs-backdrop='static' id="start_model">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">START</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="StartRouteUpdateForm" action="{{ route('update-route-dispatcher') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group row mb-3">
                                <input type="hidden" class="route_id" name="route_id">
                                <input type="hidden" name="is_route_start" value="True">
                                <div class="col-lg-12 mb-5">
                                    <input required="required" type="text" value="" name="starts_at" id="optimize_region_starts" placeholder="Starts at" class="form-control ">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="modal_service_time" id="service_time_modal" class="form-control form-control-solid modal_service_time" placeholder="Service Time (in seconds)">
                                    <small>Service Time (in seconds)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light start_route_model_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: start_model-->
    <!--START:: stop_payout_model-->
    <div class="modal fade" tabindex="-1" data-bs-backdrop='static' id="stop_payout_model">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Driver payout for stops</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="StopPayoutUpdateForm" action="{{ route('update-route-dispatcher') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group row mb-3">
                                <input type="hidden" class="route_id" name="route_id">
                                <input type="hidden" name="is_stop_payout" value="True">
                                <input type="hidden" name="order_uids" id="driverPayout_order_uids" />
                                <input type="hidden" name="total_stop" id="total_stop_payout" />
                                <div class="col-lg-12 mb-5">
                                    <div id="driverPayoutInformer" class="text-uppercase text-center"></div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="stop_payout" id="stop_payout_modal" class="form-control form-control-solid" placeholder="Payout Amount">
                                    <small>Set driver payout for selected stops</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light stop_payout_model_close" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: stop_payout_model-->

    {{-- Modal - Show All The Pickup Orders -- START --}}
    <div class="modal fade" id="allpickupordersmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xxl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-4">
                        <h5 class="w-100 modal-title" id="exampleModalLabel">All Pickup Orders</h5>
                    </div>
                    <div class="col-md-8">
                        <form id="createpickuporder" action="{{ route('routes.create-pickup-order') }}">
                            @csrf
                            <input type="hidden" name="regions_id" id="regions_id">
                            <div class="row justify-content-end">
                                <div class="col-4">
                                    <select class="form-select form-select-solid" name="client" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" required>
                                        <option value="" selected>Select Client </option>
                                        @isset($client)
                                        @foreach ($client as $row)
                                        <option value="{{ $row->id }}" data-email="{{ $row->email }}">
                                            {{-- (#{{ $row->id }}) --}}
                                            {{ $row->name }}
                                        </option>
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="date_to_deliver" class="form-control" value="{{ date('Y-m-d') }}" placeholder="Date Filled" id="kt_datepicker_1" required />
                                </div>
                                <div class="col-2">
                                    <input type="text" name="pickup_time_min" class="form-control" placeholder="Min" id="kt_datepicker_min_time" required />
                                </div>
                                <div class="col-2">
                                    <input type="text" name="pickup_time_max" class="form-control" placeholder="Max" id="kt_datepicker_max_time" required />
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <table {{-- style="font-family: 'Lato', sans-serif;" --}} class="table table-bordered table-hover" aria-describedby="mydesc" data-url="{{ url('show-pickup-orders') }}" id="all_pickup_orders_table" data-toggle="table" data-click-to-select="true" data-show-copy-rows="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar" data-show-export="false" data-fixed-columns="false" data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-pagination-successively-size="3" data-show-columns="true" data-export-types='["csv","pdf","excel"]' data-show-print='true' data-export-options='{
             "fileName": "orders-<?= date('d-m-y') ?>",
                            "ignoreColumn": ["state","action"]
                            }' data-query-params="queryParamsRecipient">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-visible="false"></th>
                                <th scope="col" data-field="action" data-sortable="true" data-events="actionEvents">UID</th>
                                <th scope="col" data-field="pickup_date" data-sortable="true">Pickup Date</th>
                                <th scope="col" data-field="pickup_time" data-sortable="true" data-width="100" data-width-unit="%">Pickup Time</th>
                                <th scope="col" data-field="eta" data-sortable="true">ETA</th>
                                <th scope="col" data-field="eta_error" data-sortable="true">ETA Error</th>
                                <th scope="col" data-field="status" data-sortable="true" data-width="10" data-width-unit="%">Order Status</th>
                                <th scope="col" data-field="route_name" data-sortable="true">Route Name</th>
                                {{-- <th scope="col" data-field="business_hours" data-sortable="true">Business Hours/th> --}}
                                <th scope="col" data-field="recipient_name" data-sortable="true" data-visible="true" data-width="10" data-width-unit="%">Recipient Name </th>
                                <th scope="col" data-field="in_system" data-sortable="true" data-visible="true">
                                    In System </th>
                                <th scope="col" data-field="recipient_address" data-sortable="true" data-visible="true" data-width="100" data-width-unit="%">Recipient Address</th>
                                <th scope="col" data-field="recipient_phone" data-sortable="true" data-visible="true">Recipient Phone</th>
                                <th scope="col" data-field="in_queue" data-sortable="true" data-visible="true">
                                    Hours In Status </th>
                                <th scope="col" data-field="items" data-sortable="true" data-visible="true"> # Of
                                    Items </th>
                                <th scope="col" data-field="time_to_deliver" data-sortable="true" data-visible="false">Time to Deliver </th>
                                <th scope="col" data-field="rx_number" data-sortable="true" data-visible="false">
                                    RX Number</th>
                                <th scope="col" data-field="fridge" data-sortable="true" data-visible="false">
                                    Fridge?</th>
                                <th scope="col" data-field="confidential" data-sortable="true" data-visible="false"> Confidential? </th>
                                <th scope="col" data-field="controlled" data-sortable="true" data-visible="false"> Controlled</th>
                                <th scope="col" data-field="hazardous" data-sortable="true" data-visible="false">
                                    Hazardous</th>
                                <th scope="col" data-field="sensitive" data-sortable="true" data-visible="false">
                                    Sensitive? </th>
                                <th scope="col" data-field="supply_regular" data-sortable="true" data-visible="false"> Supply regular </th>
                                <th scope="col" data-field="supply_plus_rx" data-sortable="true" data-visible="false"> Supply plus rx</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal - Show All The Pickup Orders -- END --}}
</div>
<!--end::Col-->
</div>
<!--end::Row-->
{{-- <div id="app">
    </div>
    @vite('resources/js/app.js') --}}
@endsection
@section('script')
<script>
    // setTimeout(() => {
    //     $('.view').each(function(index, element) {
    //         $(this).parent().parent().addClass('new-active')
    //     });
    // }, 5000);
    var map = null;
    var selected_route = "";
    $(document).ready(function() {
        initAddMap(selected_route);
        if (selected_route != "") {
            draw_users(selected_route);
        }
    });
    setTimeout(() => {
        $('.custom-width').each(function(key, val) {
            $(this).removeAttr('style');
            $(this).attr('style', 'width: 180px; min-width:180px !important');
        });
    }, 1000);
    function initAddMap(selected_route) {
        if (!L) {
            return false;
        }
    }
    var show_pickups = '';
    function drawpickuporders(params) {
        show_pickups = 1;
        $.ajax({
            type: "GET",
            url: "{{ route('region.get-orders') }}",
            data: {
                regions_id: selected_route,
                show_pickups: show_pickups,
            },
            success: function(response) {
                calldrawuser(response);
            },
            error: function(error) {
                return false;
            }
        });
        displayMaskedPhoto(selected_route);
    }
    function draw_users(selected_route) {
        $.ajax({
            type: "GET",
            url: "{{ route('region.get-orders') }}",
            data: {
                regions_id: selected_route,
            },
            success: function(response) {
                calldrawuser(response);
            },
            error: function(error) {
                return false;
            }
        });
        displayMaskedPhoto(selected_route);
    }
    function calldrawuser(response) {
        response_array = response;
        markers = response_array.markers;
        $('.map_section #route_map').remove();
        $('.map_section').append(
            '<div id="route_map" class="w-100" style="height: 360px"></div>');
        map = null;
        for (j = 0; j < markers.length; j++) {
            map = L.map('route_map', {
                fullscreenControl: {
                    pseudoFullscreen: false
                }
            }).setView([markers[j][1], markers[j][2]], 10);
            if (j == 0)
                break;
        }
        // Init Leaflet Map. For more info check the plugin's documentation: https://leafletjs.com/
        tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors  contributors, Imagery © <a href="javascript:void(0)">quickpharma</a>'
        }).addTo(map);
        map.on('zoomend', function() {
            mapZoomLoading = false;
            map.invalidateSize();
        });
        map.on('dragend', function() {
            map.invalidateSize();
        });
        for (i = 0; i < markers.length; i++) {
            var iconurl = "{{ asset('assets/icons/markericon.png') }}";
            if (markers[i]['order_status'] == "Delivered") {
                iconurl = "{{ asset('assets/icons/markericongreen.png') }}";
            }
            // }else if(markers[i]['order_status'] == "Delivery Attempted" || markers[i]['order_status'] == "Returned" || markers[i]['order_status'] == "Rejected"){
            //     iconurl = "{{ asset('assets/icons/markericondanger.png') }}";
            // }
            L.NumberedDivIcon = L.Icon.extend({
                options: {
                    iconUrl: iconurl,
                    number: '',
                    shadowUrl: null,
                    iconSize: new L.Point(25, 41),
                    iconAnchor: new L.Point(13, 41),
                    popupAnchor: new L.Point(0, -33),
                    className: 'leaflet-div-icon'
                },
                createIcon: function() {
                    var div = document.createElement('div');
                    var numdiv = document.createElement('div');
                    numdiv.setAttribute("class", "number");
                    numdiv.innerHTML = this.options['number'] || '';
                    div.appendChild(this._createImg(this.options['iconUrl']));
                    div.appendChild(numdiv);
                    this._setIconStyles(div, 'icon');
                    return div;
                },
                //you could change this to add a shadow like in the normal marker if you really wanted
                createShadow: function() {
                    return null;
                }
            });
            // are coords set
            if (markers[i][1] === '' || markers[i][2] === '') {
                continue;
            }
            markers[i].marker = L.marker([markers[i][1], markers[i][2]], {
                index: i,
                // title: markers[i][0],
                icon: new L.NumberedDivIcon({
                    number: show_pickups == 1 ? 'P' : i + 1
                }),
                contextmenu: true,
                contextmenuInheritItems: true,
                className: 'driver-icon'
            });
            markers[i].marker.bindPopup(response_array.info[i][0]);
            markers[i].marker.on('mouseover', function(ev) {
                ev.target.openPopup();
            });
            markers[i].marker.on('mouseout', function(ev) {
                ev.target.closePopup();
            });
            markers[i].marker.on('click', function(ev) {
                //changeMarkerIcon(ev, 'corral')
                return;
            });
            map.addLayer(markers[i].marker);
        }
        if (!$.trim(response.driver_info.latitude) && !$.trim(response.driver_info.longitude)) {
            $('img.leaflet-marker-icon').remove();
        } else {
            var newicon = L.icon({
                iconUrl: response.driver_info.avatar,
            });
            var drivermarker = L.marker([response.driver_info.latitude, response.driver_info
                .longitude
            ], {
                // index: 1,
                // title: markers[i][0],
                icon: newicon,
                contextmenu: true,
                contextmenuInheritItems: true,
            });
            map.addLayer(drivermarker);
            drivermarker.bindPopup(response.driver_info.info);
            drivermarker.on('mouseover', function(ev) {
                ev.target.openPopup();
            });
            drivermarker.on('mouseout', function(ev) {
                ev.target.closePopup();
            });
            drivermarker.on('click', function(ev) {
                //changeMarkerIcon(ev, 'corral')
                return;
            });
            $('img.leaflet-marker-icon').parent().append('<div class="icon-img"></div>');
            $('img.leaflet-marker-icon').appendTo('.icon-img');
        }
    }
    function displayMaskedPhoto(selected_route) {
        $.ajax({
            type: 'GET',
            url: "{{ route('show-masked-photo') }}",
            data: {
                _token: "{{ csrf_token() }}",
                regions_id: selected_route,
            },
            success: function(result) {
                if (result.status == 1) {
                    var content = '';
                    $(result.data).each(function(index) {
                        content +=
                            '<div class="col-3"><div class="card"><div class="text-capitalize text-center">' +
                            result.data[index].created_at + '</div><img src="' +
                            result.data[index].mask_photo + '" class="card-img-top" alt="...">';
                        if (result.data[index].status == 1) {
                            content +=
                                '<div class="card-footer d-flex justify-content-center p-2"><button type="button" class="btn btn-sm btn-outline btn-outline-success">Accepted</button>';
                        } else {
                            content +=
                                '<div class="card-footer d-flex justify-content-between p-2"><button type="button" class="btn btn-sm btn-success" onclick="manageMaskedPhoto(' +
                                result.data[index].id + ',' +
                                selected_route +
                                ',1)">Accept</button><button type="button" class="btn btn-sm btn-danger" onclick="manageMaskedPhoto(' +
                                result.data[index].id + ',' +
                                selected_route + ',2)">Delete</button>';
                        }
                        content += '</div></div></div>';
                    });
                    $('.driver-masked-photo-div').html(content);
                } else {
                    $('.driver-masked-photo-div').html('');
                }
                return false;
            },
            error: function(error) {
                toastr.error('Something Went Wrong..!!')
                return false;
            }
        });
        return false;
    }
    function manageMaskedPhoto(id, selected_route, status) {
        $.ajax({
            type: 'POST',
            url: "{{ route('manage-masked-photo') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                status: status,
            },
            success: function(result) {
                if (result.status == 1) {
                    toastr.success(result.message);
                    displayMaskedPhoto(selected_route);
                } else {
                    toastr.error(result.message)
                }
                return false;
            },
            error: function(error) {
                toastr.error('Something Went Wrong..!!')
                return false;
            }
        });
        return false;
    }
    $('#optimize_region_starts').flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        defaultDate: "{{ date('Y-m-d H:i') }}"
    });
</script>
<script>
    // Show pickup orders
    $("#kt_datepicker_1").flatpickr();
    $("#kt_datepicker_min_time, #kt_datepicker_max_time").flatpickr({
        noCalendar: true,
        enableTime: true,
        dateFormat: "H:i",
    });
    function showpickuporders() {
        $('#regions_id').val(selected_route);
        $('#all_pickup_orders_table').bootstrapTable('refresh');
    }
    function queryParamsRecipient(p) {
        return {
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            limit: p.limit,
            search: p.search,
            regions_id: selected_route,
        };
    }
    $("#createpickuporder").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(response) {
                toastr.options.closeButton = true;
                if (response.status == 1) {
                    toastr.success(response.message);
                    $("#createpickuporder")[0].reset();
                    $('#all_pickup_orders_table').bootstrapTable('refresh');
                    return false;
                } else {
                    toastr.error(response.message);
                    return false;
                }
            },
            error: function(error) {
                toastr.error("Something Went Wrong!!");
                return false;
            }
        });
    });
</script>
<script>
    $("#route_current_time_span").clock({
        dateFormat: "m/d/Y ",
        timeFormat: " h:i A",
    });
    update_routes();
    function update_routes(callback) {
        $.ajax({
            type: "GET",
            url: domain_url + '/api/web/getOptimizeRoute',
            success: function(response) {
                //info = response;
                var buttons = "";
                $.each(response.data, function(index, value) {
                    buttons = buttons +
                        "<button id='route" + value.id +
                        "' style='width: 100%; white-space: normal; margin-bottom: 10px;' class='btn select_route " +
                        value.class + " " + (selected_route.toString() === value.uid.toString() ?
                            'active' : '') + "' type='button' data-uid='" + value.id +
                        "' data-driver='" + value.driverid + "'>" +
                        value.name + "</button>" + value.renderStats;
                });
                $("#route_buttons").html(buttons);
                // SET CLICK LISTENER, must be in function as buttons only exist afterwards
                $(".select_route").click(function() {
                    $("#orderdetailsection").css('display', 'block')
                    var uid = $(this).attr("data-uid");
                    if (typeof uid == 'undefined' || !uid) {
                        return;
                    }
                    selected_route = uid;
                    getOrderDetails(selected_route);
                    draw_users(selected_route);
                    // setselectrouteclick(selected_route);
                });
                if (selected_route == '') {
                    setselectrouteclick();
                }
                if (callback) {
                    callback();
                }
            }
        });
    }
    function setselectrouteclick() {
        $(".select_route:first").click();
    }
    function getOrderDetails(selected_route) {
        $(".route_id").val(selected_route);
        $.ajax({
            type: "POST",
            url: domain_url + '/api/web/getOrderDetail',
            data: {
                id: selected_route
            },
            success: function(response) {
                var data = response.data;
                var cardtitleinfo = data.id + ": " + data.created + " (" + data.route_name + " - " + data
                    .route_name_i + ")";
                $("#card-title-info").text(cardtitleinfo)
                $("#route_starts_at_span").text(data.starts_at);
                $("#route_started_span").html((data.started != '') ? data.started :
                    "<span class='text-danger'>Not Started Yet</span>"); //
                $("#route_total_span").html('<b>100%</b> (' + data.total_order + ')');
                $("#route_service_time_span").html(data.service_time_modal);
                $(".modal_service_time").val(data.service_time);
                $("#route_last_stop_real_eta_span").text(data.starts_at);
                $("#route_dispatcher_span").html(data.dispatcher_name);
                $("#modal_dispatcher").val(data.dispatcher_id).trigger('change');
                $("#modal_driver").val(data.driver_id).trigger('change');
                $("#driver_name_span").text(data.driver.name)
                $("#driver_email_span").text(data.driver.email);
                $("#driver_phone_number_span").text(data.driver.phone);
                $("#driver_id_span").text(data.driver.id);
                $("#driver_profile_span").html(data.driver_profile);
                $("#route_actual_driving_time_span").text(data.actual_driving_time);
                $("#route_approximate_driving_time_span").text(data.approximate_driving_time);
                $('#table_list').bootstrapTable('refresh');
            }
        });
    }
    function deleteRegion() {
        Swal.fire({
            icon: 'warning',
            title: 'Are You Sure?',
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: false,
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve, reject) {
                    $.ajax({
                        url: "{{ route('region.delete') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            regions_id: selected_route,
                        },
                        cache: false,
                        success: function(response) {
                            if (response.status == 1) {
                                Swal.fire(
                                    response.message,
                                    'success'
                                )
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            } else {
                                Swal.fire(
                                    response.message,
                                    'error'
                                )
                                return false;
                            }
                        },
                        error: function(error) {
                            toastr.options.closeButton = true;
                            toastr.error("Something Went Wrong..!");
                            return false;
                        }
                    });
                });
            },
        }).then((result) => {
            if (!result.isConfirmed) {
                result.dismiss === Swal.DismissReason.cancel
            }
        })
        return false;
    }
    function RequestMaskPhoto() {
        Swal.fire({
            title: 'Are You Sure?',
            icon: 'error',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyCanceButtonText: `No`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('update-route-dispatcher') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "route_id": selected_route,
                        "is_request_mask_photo": 'Yes',
                    },
                    cache: false,
                    success: function(result) {
                        if (result.error == false) {
                            // location.reload();
                            toastr.options.closeButton = true;
                            toastr.success("Request Send Successfully");
                            getOrderDetails(selected_route);
                            update_routes();
                        }
                    }
                });
            }
        })
        return false;
    }
</script>
<script>
    // Randomizer function
    function getRandom(min = 1, max = 100) {
        return Math.floor(Math.random() * (max - min) + min);
    }
    function generateRandomData(min = 1, max = 100, count = 10) {
        var arr = [];
        for (var i = 0; i < count; i++) {
            arr.push(getRandom(min, max));
        }
        return arr;
    }
    var ctx = document.getElementById('kt_chartjs_2');
    // Define colors
    var primaryColor = KTUtil.getCssVariableValue('--kt-primary');
    var dangerColor = KTUtil.getCssVariableValue('--kt-danger');
    var successColor = KTUtil.getCssVariableValue('--kt-success');
    // Define fonts
    var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');
    // Chart labels
    const labels = generateRandomData(1, 5000000000000000, 100);
    // Chart data
    const data = {
        labels: labels,
        datasets: [{
            data: generateRandomData(1, 50, 100),
        }, ]
    };
    // Chart config
    const config = {
        type: 'line',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Driver Promised ETA Error Over Time',
                },
                legend: {
                    display: false,
                }
            },
            responsive: true,
        }
    };
    // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
    var myChart = new Chart(ctx, config);
</script>
<script>
    // this is the id of the form
    $("#DispatcherUpdateForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                toastr.options.closeButton = true;
                toastr.success("Dispatcher Update Successfully");
                $(".dispatcher_model_close").click();
                //$('#dispatcher_model').modal('toggle');
                //$('.modal-backdrop').remove();
                getOrderDetails(selected_route);
                update_routes();
            }
        });
    });
    $("#DriverUpdateForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                toastr.options.closeButton = true;
                toastr.success("Driver Update Successfully");
                $(".driver_model_close").click();
                //$('#dispatcher_model').modal('toggle');
                //$('.modal-backdrop').remove();
                getOrderDetails(selected_route);
                update_routes();
            }
        });
    });
    $("#ServiceTimeUpdateForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                toastr.options.closeButton = true;
                toastr.success("Service Time Update Successfully");
                $(".service_time_model_close").click();
                //$('#dispatcher_model').modal('toggle');
                //$('.modal-backdrop').remove();
                getOrderDetails(selected_route);
                update_routes();
            }
        });
    });
    $("#StartRouteUpdateForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var form = $(this);
        var actionUrl = form.attr('action');
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data) {
                toastr.options.closeButton = true;
                toastr.success("Route START Successfully");
                $(".start_route_model_close").click();
                //$('#dispatcher_model').modal('toggle');
                //$('.modal-backdrop').remove();
                getOrderDetails(selected_route);
                update_routes();
            }
        });
    });
    $("#StopPayoutUpdateForm").submit(function(e) {
        var total_stop_payout = $('#total_stop_payout').val();
        if (total_stop_payout == 0) {
            toastr.options.closeButton = true;
            toastr.error("Selec Stop For Payout");
            return false;
        } else {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    toastr.options.closeButton = true;
                    toastr.success("Stop Payout Successfully");
                    $(".stop_payout_model_close").click();
                    //$('#dispatcher_model').modal('toggle');
                    //$('.modal-backdrop').remove();
                    getOrderDetails(selected_route);
                    update_routes();
                }
            });
        }
    });
    //	Finish route button.
    function finish_route() {
        Swal.fire({
            title: "Confirm",
            text: "Are you sure you want to force finish this route? All undelivered orders will be marked as Skipped.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-warning',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: true,
            closeOnCancel: true
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('update-route-dispatcher') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "route_id": selected_route,
                        "is_finish_route": true,
                    },
                    cache: false,
                    success: function(result) {
                        if (result.error == false) {
                            // location.reload();
                            toastr.options.closeButton = true;
                            toastr.success("Route Complate Successfully");
                            getOrderDetails(selected_route);
                            update_routes();
                        }
                    }
                });
            }
        })
        return false;
    }
</script>
<script>
    function queryParams(p) {
        return {
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            limit: p.limit,
            search: p.search,
            regions_id: selected_route
        };
    }
    window.actionEvents = {}
</script>
<script>
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
        $('#driverPayoutInformer').html("Total stops to update: " + checkids.length);
        $('#driverPayout_order_uids').val(checkids.join(','));
        $('#total_stop_payout').val(checkids.length);
    })
    $('#table_list').on('uncheck-all.bs.table', function(e, row) {
        checkedRows.length = 0;
        checkids.length = 0
        $('#driverPayoutInformer').html("Total stops to update: " + checkids.length);
        $('#driverPayout_order_uids').val(checkids.join(','));
        $('#total_stop_payout').val(checkids.length);
    })
    $('#table_list').on('check.bs.table', function(e, row) {
        checkedRows.push({
            id: row.id
        });
        checkids.push(row.id)
        $('#driverPayoutInformer').html("Total stops to update: " + checkids.length);
        $('#driverPayout_order_uids').val(checkids.join(','));
        $('#total_stop_payout').val(checkids.length);
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
        $('#driverPayoutInformer').html("Total stops to update: " + checkids.length);
        $('#driverPayout_order_uids').val(checkids.join(','));
        $('#total_stop_payout').val(checkids.length);
    });
</script>
@endsection