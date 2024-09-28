@extends('layouts.main')
@section('title')
    Map
@endsection
@section('page-title')
@endsection
@section('content')

    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-12 mb-5 mb-xl-10 map_section">
            <div id="map" class="w-100" style="height: 800px"></div>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--START:: editUserModel-->

    <div class="modal fade" tabindex="-1" id="edit_region_name">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Region Name</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="addForm" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row mb-3" id="edit_region_id_input" style="display: none;">
                                    <div class="col-lg-12">
                                        <input disabled="" name="edit_region_id" id="edit_region_id"
                                            class="form-control">
                                        <small><b style="color: red">Route #</b></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">

                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="modal_region_route_name"
                                            id="modal_region_route_name" data-control="select2"
                                            data-dropdown-parent="#edit_region_name" data-placeholder="Select Route"
                                            data-allow-clear="true">
                                            @isset($routename)
                                                @foreach ($routename as $row)
                                                    <option value="{{ $row->id }}">{{ $row->route_name }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                        <small>Route Name - <a href="{{ route('route-names.index') }}">Manage route
                                                names</a></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">

                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="modal_region_route_name_i"
                                            id="modal_region_route_name_i" data-control="select2"
                                            data-dropdown-parent="#edit_region_name" data-placeholder="Select Route"
                                            data-allow-clear="true">
                                            @for ($i = 1; $i <= 20; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <small>Route Number - BROOKLYN - <b style="color: red">1</b></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" id="edit_region_button_create"
                            onclick="createRegion()">Create</button>
                        <button type="button" class="btn btn-theme-color" id="edit_region_button_update"
                            onclick="updateRegion($('#edit_region_id').val(), false)">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--END:: editUserModel-->

    <!--START:: optimize_region_popup-->
    <div class="modal fade" tabindex="-1" id="optimize_region_popup">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Routes</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <!--begin::Label-->
                            <label class="col-lg-12 col-form-label text-center required">Are you sure you want to create
                                routes?</label>
                            <!--end::Label-->
                            <input class="form-control form-control-lg form-control-solid " type="text"
                                name="service_time" id="optimize_region_service" placeholder="Automatic calculation"
                                autocomplete="off" />
                            <small>Service Time (sec) - <b style="color: red;">Optional</b></small>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <input required="required" type="text" value="" name="starts_at"
                                id="optimize_region_starts" placeholder="Starts at" class="form-control ">
                            <p>Please specify date and time route starts</p>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                                <input class="form-check-input me-3" type="checkbox" id="sameday_delivery"
                                    name="sameday_delivery">
                                <label class="form-check-label">
                                    <div class="fw-semibold text-gray-800">Same day delivery?</div>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5" id="start_and_finish_location">
                            <div>
                                <!--begin::Label-->
                                <label class="col-lg-12 col-form-label text-left">Start At Location</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span>Hubs</span>

                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Buttons-->
                                    <div class="flex-stack gap-5 mb-3 col-12">
                                        @isset($hubs)
                                            @foreach ($hubs as $row)
                                                <button type="button" class="btn btn-theme-color mb-1"
                                                    data-kt-docs-advanced-forms="start_interactive"
                                                    data-latitude="{{ $row->location->latitude }}"
                                                    data-longitude="{{ $row->location->longitude }}">{{ $row->address }}</button>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <!--begin::Buttons-->

                                    <!--begin::Input group-->
                                    <div class="input-group mb-5">
                                        <div class="col">
                                            <input type="text" class="form-control form-control-solid mb-1"
                                                placeholder="Start Place" name="sameday_start_place_input"
                                                id="sameday_start_place_input" />
                                            <select class="form-select form-select-solid col-auto"
                                                id="sameday_start_place_select" data-control="select2"
                                                data-dropdown-parent="#optimize_region_popup"
                                                data-placeholder="Or Select Pharmacy">
                                                <option value="">Or Select Pharmacy</option>
                                                @isset($pharmacy)
                                                    @foreach ($pharmacy as $row)
                                                        <option value="{{ $row->id }}" data-address="{{ $row->address }}"
                                                            data-latitude="{{ $row->latitude }}"
                                                            data-longitude="{{ $row->longitude }}">
                                                            ({{ $row->business_name }})
                                                            {{ $row->address }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <input type="hidden" id="hub_start_lat" name="hub_start_lat" value="">
                                        <input type="hidden" id="hub_start_lng" name="hub_start_lng" value="">
                                        <input type="hidden" name="sameday_start_place" id="sameday_start_place">
                                        <a class="btn btn-danger"
                                            style="display: flex;align-items: center;justify-content: center;"
                                            onclick="removestartplace()"><span>Delete</span></a>
                                    </div>

                                </div>
                                <!--end::Input wrapper-->
                            </div>

                            <div>
                                <!--begin::Label-->
                                <label class="col-lg-12 col-form-label text-left">Finish At Location</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                        <span>Hubs</span>

                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Buttons-->
                                    <div class="flex-stack gap-5 mb-3 col-12">
                                        @isset($hubs)
                                            @foreach ($hubs as $row)
                                                <button type="button" class="btn btn-theme-color mb-1"
                                                    data-kt-docs-advanced-forms="finish_interactive"
                                                    data-latitude="{{ $row->location->latitude }}"
                                                    data-longitude="{{ $row->location->longitude }}">{{ $row->address }}</button>
                                            @endforeach
                                        @endisset
                                    </div>
                                    <!--begin::Buttons-->


                                    <!--begin::Input group-->
                                    <div class="input-group mb-5">
                                        <div class="col">
                                            <input type="text" class="form-control form-control-solid col-auto mb-1"
                                                placeholder="Finish Place" name="sameday_finish_place_input"
                                                id="sameday_finish_place_input" />
                                            <select class="form-select form-select-solid col-auto"
                                                id="sameday_finish_place_select" data-control="select2"
                                                data-dropdown-parent="#optimize_region_popup"
                                                data-placeholder="Or Select Pharmacy">
                                                @isset($pharmacy)
                                                    <option value="">Or Select Pharmacy</option>
                                                    @foreach ($pharmacy as $row)
                                                        <option value="{{ $row->id }}"
                                                            data-address="{{ $row->address }}"
                                                            data-latitude="{{ $row->latitude }}"
                                                            data-longitude="{{ $row->longitude }}">
                                                            ({{ $row->business_name }})
                                                            {{ $row->address }}</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>

                                        <a class="btn btn-danger"
                                            style="display: flex;align-items: center;justify-content: center;"
                                            onclick="removefinishplace()"><span>Delete</span></a>
                                        <input type="hidden" id="hub_finish_lat" name="hub_finish_lat" value="">
                                        <input type="hidden" id="hub_finish_lng" name="hub_finish_lng" value="">
                                        <input type="hidden" name="sameday_finish_place" id="sameday_finish_place">
                                    </div>
                                    <!--end::Input group-->

                                </div>
                                <!--end::Input wrapper-->
                            </div>
                        </div>

                        <div class="form-group row mb-5" id="driver_div" style="display: none">
                            <!--begin::Label-->
                            <label class="col-lg-12 col-form-label text-left">Driver</label>
                            <!--end::Label-->
                            <div class="col-lg-12">
                                <select class="form-select form-select-solid" name="driver" id="sameday_driver_select"
                                    data-control="select2" data-dropdown-parent="#optimize_region_popup"
                                    data-placeholder="Select Driver" data-allow-clear="true">
                                    @isset($driver)
                                        @foreach ($driver as $row)
                                            <option value="{{ $row->id }}">
                                                (#{{ $row->id }})
                                                {{ $row->name }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                                <input class="form-check-input me-3" type="checkbox" checked id="is_queued"
                                    name="is_queued">
                                <label class="form-check-label">
                                    <div class="fw-semibold text-gray-800">Is Queued</div>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12 mb-5">
                            <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                                <input class="form-check-input me-3" type="checkbox" id="is_real" name="is_real">
                                <label class="form-check-label">
                                    <div class="fw-semibold text-gray-800">Is Real</div>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        @click="createRouteFromRegion(false, 'all')">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!--END:: optimize_region_popup-->
@endsection

@section('toolbar')
    <!--begin::Engage toolbar-->
    <div class="engage-toolbar d-flex position-fixed px-5 fw-bold z-index-1 top-25 end-0 transform-90 mt-5 mt-lg-20 gap-2">
        <!--begin::Map drawer toggle-->
        <button id="map_toggle" class="btn btn-icon btn-theme-color btn-sm shadow-sm fs-6 px-4 rounded-top-0"
            title="Settings" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-dismiss="click"
            data-bs-trigger="hover">
            <span id="kt_engage_demos_label"><i class="bi bi-arrow-up"></i></span>
        </button>
        <!--end::Map drawer toggle-->
    </div>
    <!--end::Engage toolbar-->


    <!--begin::Demos drawer-->
    <div id="kt_engage_map" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="explore"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'350px', 'lg': '535px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#map_toggle" data-kt-drawer-close="#kt_engage_map_close">
        <!--begin::Card-->
        <div class="card shadow-none rounded-0 w-100">
            <!--begin::Header-->
            <div class="card-header" id="kt_engage_map_header">
                <h3 class="card-title fw-bold text-gray-700 text-uppercase">Settings</h3>

                <div class="card-toolbar">
                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary h-40px w-40px me-n6"
                        id="kt_engage_map_close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body" id="kt_engage_demos_body">
                <!--begin::Content-->
                <div id="kt_explore_scroll" class="scroll-y me-n5 pe-5" data-kt-scroll="true"
                    data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_engage_demos_body"
                    data-kt-scroll-dependencies="#kt_engage_demos_header" data-kt-scroll-offset="5px">
                    <!--begin::Wrapper-->

                    <div class="mb-20">
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="from-group row">
                                    <button class="btn btn-icon btn btn-secondary btn-sm btn-text-gray-900 col-2 ms-10"
                                        onclick="refreshMap();"><i class="bi bi-arrow-clockwise"></i></button>
                                    <div class="form-check form-check-custom form-check-solid ms-1 form-check-sm col-auto">
                                        <input class="form-check-input me-3" checked type="checkbox">
                                        <label class="form-check-label">
                                            <div class="fw-semibold text-gray-800 text-uppercase">
                                                Auto-Refresh
                                            </div>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-outline btn-sm btn-text-gray-900 ms-10 float-end"><span
                                        class="text-uppercase">refresh</span></a>
                            </div>
                        </div>

                    </div>


                    <div class="mb-10">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="text" class="form-control form-control-solid" placeholder="Filter Cient">
                            </div>

                        </div>

                    </div>


                    <div class="mb-10">
                        <div class="row">

                            <div class="col-sm-12 text-end">
                                <a class="btn btn-success  btn-sm"><i class="bi bi-gear-fill"></i><span
                                        class="text-uppercase">Regions:<span>0</span></span>,&nbsp;<span
                                        class="text-uppercase">Orders:<span>0</span></span></a>
                                <a class="btn btn-danger  btn-sm"><i class="bi bi-trash3-fill"></i><span
                                        class="text-uppercase">Regions:<span>0</span></a>
                            </div>
                        </div>

                    </div>

                    <div class="mb-20">
                        <div class="row">

                            <!--begin::Accordion-->
                            <div class="accordion" id="kt_accordion_1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                        <button class="accordion-button fs-4 fw-semibold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_tegions"
                                            aria-expanded="true" aria-controls="kt_accordion_tegions">
                                            REGIONS
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_tegions" class="accordion-collapse collapse show"
                                        aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                        <div class="accordion-body">
                                            <ul class="list-group" id="regions" style="margin-bottom: 15px;">

                                            </ul>
                                            {{-- <div id="regions" style="margin-bottom: 15px;"><i
                                                    class="fa fa-refresh fa-spin fa-fw"></i><br><br></div> --}}
                                            <div id="panel">
                                                <div id="color-palette"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="kt_accordion_1_header_2">
                                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_orders"
                                            aria-expanded="false" aria-controls="kt_accordion_orders">
                                            ORDERS
                                        </button>
                                    </h2>
                                    <div id="kt_accordion_orders" class="accordion-collapse collapse"
                                        aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                                        <div class="accordion-body">
                                            <div class="row scroll mb-5">
                                                <div class="col-md-6 mb-10">
                                                    <label
                                                        class="col-lg-12 col-form-label text-center text-uppercase">Type:</label>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Next Day Special Hours&quot;,$(this));">
                                                        <img class="main-icon"
                                                            src="{{ asset('assets/icons/next-day-special-hours.png') }}">
                                                        &nbsp; Next Day Special Hours </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Pharmacy Pickup&quot;,$(this));"> <img
                                                            class="main-icon"
                                                            src="{{ asset('assets/icons/pharmacy-pickup.png') }}"> &nbsp;
                                                        Pharmacy Pickup </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Regular&quot;,$(this));"> <img
                                                            class="main-icon"
                                                            src="{{ asset('assets/icons/regular.png') }}"> &nbsp; Regular
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Return to Pharmacy&quot;,$(this));">
                                                        <img class="main-icon"
                                                            src="{{ asset('assets/icons/return-to-pharmacy.png') }}">
                                                        &nbsp; Return to Pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;SAME DAY&quot;,$(this));"> <img
                                                            class="main-icon"
                                                            src="{{ asset('assets/icons/same-day.png') }}"> &nbsp; SAME
                                                        DAY </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Same Day Special Hours&quot;,$(this));">
                                                        <img class="main-icon"
                                                            src="{{ asset('assets/icons/same-day-special-hours.png') }}">
                                                        &nbsp; Same Day Special Hours </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Small Pickup&quot;,$(this));"> <img
                                                            class="main-icon"
                                                            src="{{ asset('assets/icons/small-pickup.png') }}"> &nbsp;
                                                        Small Pickup </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;STAT&quot;,$(this));"> <img
                                                            class="main-icon" src="{{ asset('assets/icons/stat.png') }}">
                                                        &nbsp; STAT </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Time Window Next Day&quot;,$(this));">
                                                        <img class="main-icon"
                                                            src="{{ asset('assets/icons/time-window-next-day.png') }}">
                                                        &nbsp; Time Window Next Day </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Time Window Next Day 9am-1pm. 1pm-5pm, 5pm-9pm&quot;,$(this));">
                                                        <img class="main-icon"
                                                            src="{{ asset('assets/icons/time-window-next-day.png') }}">
                                                        &nbsp; Time Window Next Day 9am-1pm. 1pm-5pm, 5pm-9pm </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Time Window Next Day 9am-3pm, 3pm-9pm&quot;,$(this));">
                                                        <img class="main-icon"
                                                            src="{{ asset('assets/icons/time-window-next-day.png') }}">
                                                        &nbsp; Time Window Next Day 9am-3pm, 3pm-9pm </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Back to Pharmacy&quot;,$(this));"> <img
                                                            class="main-icon"
                                                            src="{{ asset('assets/icons/back-to-pharmacy.png') }}"> &nbsp;
                                                        Back to Pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap cursor-pointer"
                                                        onclick="filter_type(&quot;Facility&quot;,$(this));"> <img
                                                            class="main-icon"
                                                            src="{{ asset('assets/icons/facility.png') }}"> &nbsp;
                                                        Facility </a>
                                                </div>
                                                <div class="col-md-6 mb-10">
                                                    <label
                                                        class="col-lg-12 col-form-label text-center text-uppercase">Status:</label>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu active"
                                                        id="filter_status_Ready_to_Print"
                                                        onclick="filterStatus(&quot;Ready to Print&quot;,$(this));"><i
                                                            class="text-dark fa fa-music"></i> &nbsp; Ready to Print </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_120" rel="120"
                                                        onclick="filter_sub_status(&quot;120&quot;,$(this));"><i
                                                            class="text-dark fa fa-th-large"></i> &nbsp; Schedule SMS Sent
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_121" rel="121"
                                                        onclick="filter_sub_status(&quot;121&quot;,$(this));"><i
                                                            class="text-dark fa fa-film"></i> &nbsp; Patient Schedules via
                                                        SMS </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Ready_for_Pickup"
                                                        onclick="filterStatus(&quot;Ready for Pickup&quot;,$(this));"><i
                                                            class="text-dark fa fa-star"></i> &nbsp; Ready for Pickup </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_90" rel="90"
                                                        onclick="filter_sub_status(&quot;90&quot;,$(this));"><i
                                                            class="text-dark fa fa-align-justify"></i> &nbsp; Pharmacy on
                                                        hold </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_122" rel="122"
                                                        onclick="filter_sub_status(&quot;122&quot;,$(this));"><i
                                                            class="text-dark fa fa-heart"></i> &nbsp; Schedule SMS Sent
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_123" rel="123"
                                                        onclick="filter_sub_status(&quot;123&quot;,$(this));"><i
                                                            class="text-dark fa fa-envelope"></i> &nbsp; Patient Schedules
                                                        via SMS </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Pickup_Occurred"
                                                        onclick="filterStatus(&quot;Pickup Occurred&quot;,$(this));"><i
                                                            class="text-dark fa fa-search"></i> &nbsp; Pickup Occurred </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Ready_for_Delivery"
                                                        onclick="filterStatus(&quot;Ready for Delivery&quot;,$(this));"><i
                                                            class="text-dark fa fa-bell"></i> &nbsp; Ready for Delivery
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Route_Optimized"
                                                        onclick="filterStatus(&quot;Route Optimized&quot;,$(this));"><i
                                                            class="text-dark fa fa-car"></i> &nbsp; Route Optimized </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_89" rel="89"
                                                        onclick="filter_sub_status(&quot;89&quot;,$(this));"> <i
                                                            class="text-dark fa fa-martini-glass"></i> &nbsp; Scanned to
                                                        Route </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Driver_Out"
                                                        onclick="filterStatus(&quot;Driver Out&quot;,$(this));"><i
                                                            class="text-dark fa fa-music"></i> &nbsp; Driver Out </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_86" rel="86"
                                                        onclick="filter_sub_status(&quot;86&quot;,$(this));"><i
                                                            class="text-dark fa fa-arrows-h"></i> &nbsp; Pending back to
                                                        pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_87" rel="87"
                                                        onclick="filter_sub_status(&quot;87&quot;,$(this));"><i
                                                            class="text-dark fa fa-arrow-left"></i> &nbsp; Confirmed back
                                                        to pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_92" rel="92"
                                                        onclick="filter_sub_status(&quot;92&quot;,$(this));"><i
                                                            class="text-dark fa fa-level-down"></i> &nbsp; Send to the
                                                        route </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_117" rel="117"
                                                        onclick="filter_sub_status(&quot;117&quot;,$(this));"><i
                                                            class="text-dark fa fa-jsfiddle"></i> &nbsp; Priority </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_124" rel="124"
                                                        onclick="filter_sub_status(&quot;124&quot;,$(this));"><i
                                                            class="text-dark fa fa-martini-glass"></i> &nbsp; COMPLETED
                                                        PENDING DRIVER NOTE </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Delivery_Attempted"
                                                        onclick="filterStatus(&quot;Delivery Attempted&quot;,$(this));"><i
                                                            class="text-dark fa fa-search"></i> &nbsp; Delivery Attempted
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_38" rel="38"
                                                        onclick="filter_sub_status(&quot;38&quot;,$(this));"><i
                                                            class="text-dark fa fa-check"></i> &nbsp; Pending Back to
                                                        Pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_53" rel="53"
                                                        onclick="filter_sub_status(&quot;53&quot;,$(this));"><i
                                                            class="text-dark fa fa-adjust"></i> &nbsp; Confirmed back to
                                                        pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_79" rel="79"
                                                        onclick="filter_sub_status(&quot;79&quot;,$(this));"><i
                                                            class="text-dark fa fa-level-down"></i> &nbsp; Send to the
                                                        route </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_115" rel="115"
                                                        onclick="filter_sub_status(&quot;115&quot;,$(this));"><i
                                                            class="text-dark fa fa-ticket"></i> &nbsp; Scheduled</a>

                                                    <div
                                                        style="margin-top: 10px; margin-left: 25px; margin-bottom: 20px; display: none">
                                                        <select class="form-control schedule-select" rel="115"
                                                            id="filter_substatus_115_date"
                                                            onchange="pullMarkers()"></select> </div>

                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_118" rel="118"
                                                        onclick="filter_sub_status(&quot;118&quot;,$(this));"><i
                                                            class="text-dark fa fa-envelope"></i> &nbsp; Priority </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Returned"
                                                        onclick="filterStatus(&quot;Returned&quot;,$(this));"><i
                                                            class="text-dark fa fa-arrows"></i> &nbsp; Returned </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_39" rel="39"
                                                        onclick="filter_sub_status(&quot;39&quot;,$(this));"><i
                                                            class="text-dark fa fa-envelope"></i> &nbsp; Pending Back to
                                                        Pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_54" rel="54"
                                                        onclick="filter_sub_status(&quot;54&quot;,$(this));"><i
                                                            class="text-dark fa fa-th"></i> &nbsp; Confirmed back to
                                                        pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_65" rel="65"
                                                        onclick="filter_sub_status(&quot;65&quot;,$(this));"><i
                                                            class="text-dark fa fa-github-alt"></i> &nbsp; Send to the
                                                        route </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_114" rel="114"
                                                        onclick="filter_sub_status(&quot;114&quot;,$(this));"><i
                                                            class="text-dark fa fa-ticket"></i> &nbsp; Scheduled</a>

                                                    <div
                                                        style="margin-top: 10px; margin-left: 25px; margin-bottom: 20px; display: none">
                                                        <select class="form-control schedule-select" rel="114"
                                                            id="filter_substatus_114_date"
                                                            onchange="pullMarkers()"></select> </div>

                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_116" rel="116"
                                                        onclick="filter_sub_status(&quot;116&quot;,$(this));"><i
                                                            class="text-dark fa fa-ticket"></i> &nbsp; On its way to the
                                                        pharmacy </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap py-1 filter_substatuses ms-5"
                                                        id="filter_substatus_119" rel="119"
                                                        onclick="filter_sub_status(&quot;119&quot;,$(this));"><i
                                                            class="text-dark fa fa-envelope"></i> &nbsp; Priority </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Investigation"
                                                        onclick="filterStatus(&quot;Investigation&quot;,$(this));"><i
                                                            class="text-dark fa fa-search-plus"></i> &nbsp; Investigation
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_BACK_TO_PHARMACY"
                                                        onclick="filterStatus(&quot;BACK TO PHARMACY&quot;,$(this));"><i
                                                            class="text-dark fa fa-cog"></i> &nbsp; BACK TO PHARMACY </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Other_date_delivery"
                                                        onclick="filterStatus(&quot;Other date delivery&quot;,$(this));"><i
                                                            class="text-dark fa fa-sort"></i> &nbsp; Other date delivery
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_READY_TO_OPTIMIZE"
                                                        onclick="filterStatus(&quot;READY TO OPTIMIZE&quot;,$(this));"><i
                                                            class="text-dark fa fa-joomla"></i> &nbsp; READY TO OPTIMIZE
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_On_its_way_to_facility"
                                                        onclick="filterStatus(&quot;On its way to facility&quot;,$(this));"><i
                                                            class="text-dark fa fa-star"></i> &nbsp; On its way to facility
                                                    </a>
                                                    <a class="dropdown-item border-2 border-bottom border-dark text-wrap p-1 cursor-pointer status-main-menu"
                                                        id="filter_status_Draft"
                                                        onclick="filterStatus(&quot;Draft&quot;,$(this));"><i
                                                            class="text-dark fa fa-clock"></i> &nbsp; Draft</a>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-12">

                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>

                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="9:00am-1:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block "
                                                                        for="btn-check">9-1pm</label>

                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="9:00am-3:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">9-3pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="9:00am-11:00am" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">9am-11am</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="9:00am-12:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">9am-12pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="9:00am-9:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">9am-9pm</label>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="10:00am-1:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">10-1pm</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="11:00am-2:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">11-2pm</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="12:00am-3:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">12-3pm</label>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="1:00pm-4:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">1-4pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="1:00pm-5:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">1-5pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="1:00pm-7:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">1-7pm</label>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="2:00pm-5:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">2-5pm</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="3:00pm-6:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">3-6pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="3:00pm-9:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">3-9pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="3:00pm-7:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">3-7pm</label>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="4:00pm-7:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">4-7pm</label>

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="5:00pm-8:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">5-8pm</label>

                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="5:00pm-9:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">5-9pm</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="6:00pm-9:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">6-9pm</label>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="6:00pm-11:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">6-11pm</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="7:00pm-10:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">7-10pm</label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        class="btn-check settings_time_window_deliveries"
                                                                        name="settings_time_window_deliveries[][]"
                                                                        value="8:00pm-11:00pm" autocomplete="off" />
                                                                    <label class="btn btn-theme-color btn-sm d-block"
                                                                        for="btn-check">8-11pm</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--end::Accordion-->
                        </div>

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Demos drawer-->
@endsection



@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script>
        var map = null;
        var newRegionShape = [];
        var routeNames = {};
        var mapType = "shape";

        var markers = [];
        var infoWindowContent;
        var currentstatus = ['Ready to Print'];
        var currenttype = [];
        var currenthub = [];
        var table_filter_created_from = "";
        var table_filter_created_to = "";
        var table_filter_recipient_name = "";
        var delivery_intervals = [];
        var regions = [];
        var order_table = "";
        var route_name = "";
        var region_name = "";
        var driver_markers = [];
        var filters_stuck = 0;
        var newRegionLayer = null;
        var optimizationQueue = [];
        var homeMarkers = [];
        var newRegionShape = [];
        var routeNames = {};

        $(document).ready(function() {
            map.invalidateSize();
            renderOrders();
            renderRegions();
        });

        $("#modal_region_route_name option").each(function() {
            routeNames[$(this).val()] = {
                name: $(this).text()
            };

        });


        function showCoordinates(e) {
            alert(e.latlng);
        }

        function centerMap(e) {
            map.panTo(e.latlng);
        }

        function zoomIn(e) {
            map.zoomIn();
        }

        function zoomOut(e) {
            map.zoomOut();
        }
        map = new L.Map('map', {
            center: new L.LatLng('40.730610', '-73.935242'),
            zoom: 13,
            fullscreenControl: true,
            contextmenu: true,
            contextmenuWidth: 140,
            contextmenuItems: [{
                text: 'Show coordinates',
                callback: showCoordinates
            }, {
                text: 'Center map here',
                callback: centerMap
            }, '-', {
                text: 'Zoom in',

                callback: zoomIn
            }, {
                text: 'Zoom out',
                callback: zoomOut
            }]
        });
        var osmUrl = 'https://www.google.com/maps/vt?lyrs=m@221097413,house_numbers&gl=com&x={x}&y={y}&z={z}';
        var osmAttrib =
            'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://rx2go.ai/">Quick Pharma</a>';
        var osm = L.tileLayer(osmUrl, {
            maxZoom: 21,
            attribution: osmAttrib
        }).addTo(map);
        var drawnItems = L.featureGroup().addTo(map);

        map.addControl(new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                }
            },
            draw: {
                polygon: {
                    allowIntersection: false,
                    showArea: true,
                    editable: true
                },
                rectangle: {
                    allowIntersection: false,
                    showArea: true,
                    editable: true
                },
                polyline: false,
                marker: false,
                circle: false,
                circlemarker: false
            }
        }));


        map.on(L.Draw.Event.CREATED, function(event) {
            newRegionLayer = event.layer;

            drawnItems.addLayer(newRegionLayer);
            // here you got the polygon points
            newRegionShape = newRegionLayer._latlngs;

            // here you can get it in geojson format
            var geojson = newRegionLayer.toGeoJSON();

            //saving polygon
            showRegionNameModal();
        });



        function showRegionNameModal($region_id = null) {
            // hiding
            $("#edit_region_id").val('');
            $("#edit_region_id_input").hide();
            $('#edit_region_button_update').hide();
            $('#edit_region_button_create').hide();

            if ($region_id !== null) {
                $("#edit_region_id_input").show();
                $("#edit_region_id").val($region_id);
                $('#edit_region_button_update').show();
            } else {
                $('#edit_region_button_create').show();
            }
            $("#edit_region_name").modal('show');
        }


        function createRegion() {
            if (newRegionShape[0].length < 4) {
                Swal.fire({
                    title: "Error",
                    type: 'error',
                    showConfirmButton: false,
                    text: "Coordinates not recognized!",
                    timer: 2000
                });

                return;
            }

            if (typeof $('#modal_region_route_name').val() === 'undefined' || parseInt($('#modal_region_route_name')
                    .val()) < 1) {
                Swal.fire({
                    title: "Error",
                    type: 'error',
                    showConfirmButton: false,
                    text: "Route name is not selected!",
                    timer: 2000
                });
                return;
            }

            if ((typeof $('#modal_region_route_name_i').val() === 'undefined' || parseInt($('#modal_region_route_name_i')
                    .val()) < 1)) {
                Swal.fire({
                    title: "Error",
                    type: 'error',
                    showConfirmButton: false,
                    text: "Route name iter is not selected!",
                    timer: 2000
                });

                return;
            }
            Swal.fire({
                title: "Are you sure you want to create a new region?",
                showConfirmButton: true,
                html: false,
                text: "New Region",
                showCancelButton: true,
                confirmButtonClass: 'btn-info',
                confirmButtonText: 'Yes',
                denyCanceButtonText: `No`,
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    region_name = result.isConfirm;

                    var shape_path = [];
                    for (var i = 0; i < newRegionShape[0].length; i++) {
                        var lat = newRegionShape[0][i].lat;
                        var lng = newRegionShape[0][i].lng;
                        // shape_path.push(point_lat);
                        // shape_path.push(point_lng);

                        shape_path.push({
                            lat,
                            lng
                        });
                    }
                    console.log(shape_path);
                    // saving
                    $.ajax({
                        type: "POST",
                        url: "{{ route('map.saveregions') }}",
                        data: {
                            '_token': "{{ csrf_token() }}",
                            route_name: routeNames[$('#modal_region_route_name').val()].name,
                            route_name_id: $('#modal_region_route_name').val(),
                            route_name_i: $('#modal_region_route_name_i').val(),
                            path: shape_path
                        },
                        success: function(response) {
                            if (response === "1") {
                                console.log('Polygon ' + region_name + ' created')

                                // removing from map, because it will appear from db
                                map.removeLayer(newRegionLayer)

                                setTimeout(function() {
                                    Swal.fire({
                                        title: "You have successfully created a new region!",
                                        text: "Region Created",
                                        type: 'success',
                                        showConfirmButton: false,

                                        timer: 2000
                                    });
                                }, 150)

                                // nulling variables
                                newRegionShape = [];
                                $("#edit_region_name").modal('hide');

                                // refresh the map
                                refreshMap();
                            } else {
                                setTimeout(function() {
                                    Swal.fire({
                                        title: 'Error',
                                        type: 'error',
                                        text: response,
                                        html: true,
                                        confirmButtonText: 'Okay',
                                        confirmButtonClass: 'btn-danger',
                                    });
                                }, 150)
                            }
                        }
                    });
                }

                if (result.isDenied) {
                    map.removeLayer(newRegionLayer)
                }
            })

        }

        function refreshMap() {
            // rescale
            map.invalidateSize();

            renderRegions();
            renderOrders();

            return true;
        }

        function clearLMarkers() {
            // markers
            // for (var i = 0; i < markers.length; i++) {
            //     if(typeof markers[i].marker === 'undefined'){
            //         continue;
            //     }
            //     map.removeLayer(markers[i].marker)
            // }
            markers = [];
            $('#filter_recipient_name').text('');
        }

        function isMarkerInsidePolygon(marker) {
            for (const id in regions) {
                let poly = regions[id];
                var polyPointsArray = poly.getLatLngs();
                var polyPoints = polyPointsArray[0];
                var x = marker.latlng.lat,
                    y = marker.latlng.lng;
                var inside = false;
                for (var i = 0, j = polyPoints.length - 1; i < polyPoints.length; j = i++) {
                    var xi = polyPoints[i].lat,
                        yi = polyPoints[i].lng;
                    var xj = polyPoints[j].lat,
                        yj = polyPoints[j].lng;

                    var intersect = ((yi > y) != (yj > y)) &&
                        (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
                    if (intersect) inside = !inside;
                }

                if (inside) {
                    return id;
                }
            }
            return null;
        };

        function filterStatus(type) {
            currentstatus = type;
            $('.map_section #map').remove();
            $('.map_section').append('<div id="map" class="w-100" style="height: 800px"></div>');
            map = new L.Map('map', {
                center: new L.LatLng('40.730610', '-73.935242'),
                zoom: 13,
                fullscreenControl: true,
                contextmenu: true,
                contextmenuWidth: 140,
                contextmenuItems: [{
                    text: 'Show coordinates',
                    callback: showCoordinates
                }, {
                    text: 'Center map here',
                    callback: centerMap
                }, '-', {
                    text: 'Zoom in',

                    callback: zoomIn
                }, {
                    text: 'Zoom out',
                    callback: zoomOut
                }]
            });
            var osmUrl = 'https://www.google.com/maps/vt?lyrs=m@221097413,house_numbers&gl=com&x={x}&y={y}&z={z}';
            var osmAttrib =
                'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://rx2go.ai/">Quick Pharma</a>';
            var osm = L.tileLayer(osmUrl, {
                maxZoom: 21,
                attribution: osmAttrib
            }).addTo(map);
            var drawnItems = L.featureGroup().addTo(map);

            map.addControl(new L.Control.Draw({
                edit: {
                    featureGroup: drawnItems,
                    poly: {
                        allowIntersection: false
                    }
                },
                draw: {
                    polygon: {
                        allowIntersection: false,
                        showArea: true,
                        editable: true
                    },
                    rectangle: {
                        allowIntersection: false,
                        showArea: true,
                        editable: true
                    },
                    polyline: false,
                    marker: false,
                    circle: false,
                    circlemarker: false
                }
            }));
            map.on(L.Draw.Event.CREATED, function(event) {
                newRegionLayer = event.layer;
                drawnItems.addLayer(newRegionLayer);
                // here you got the polygon points
                newRegionShape = newRegionLayer._latlngs;
                // here you can get it in geojson format
                var geojson = newRegionLayer.toGeoJSON();
                //saving polygon
                showRegionNameModal();
            });
            map.invalidateSize();
            renderOrders();
        }

        function renderOrders() {

            // are any selectors adjusted
            let dates = {};

            for (let i = 0; i < $('.schedule-select:visible').length; i++) {
                dates[$('.schedule-select:visible').eq(i).attr('rel')] = $('.schedule-select:visible').eq(i).find(
                    ':selected').val()
            }

            let payload = {
                '_token': "{{ csrf_token() }}",
                map_type: mapType,
                clientid: $('#map_filter_client').val(),
                status: currentstatus,
                sub_status: $('#map_filter_sub_status').val(),
                type: currenttype,
                hub: currenthub,
                created_from: table_filter_created_from,
                created_to: table_filter_created_to,
                recipient_name: table_filter_recipient_name,
                delivery_intervals: delivery_intervals,
                dates: dates,
                bounds: JSON.stringify({
                    a: map.getBounds().getNorthWest(),
                    b: map.getBounds().getNorthEast(),
                    c: map.getBounds().getSouthEast(),
                    d: map.getBounds().getSouthWest()
                })
            };

            $.ajax({
                type: "POST",
                url: "{{ route('order.pull_orders') }}",
                data: payload,
                success: function(response) {
                    clearLMarkers();
                    clearRegions();

                    response_array = response; //$.parseJSON(response);
                    markers = response_array.markers;

                    infoWindowContent = response_array.info;
                    // console.log(infoWindowContent);
                    //Loop through our array of markers & place each one on the map
                    for (i = 0; i < markers.length; i++) {
                        // are coords set
                        if (markers[i][1] === '' || markers[i][2] === '') {
                            continue;
                        }

                        // icon
                        let ico = markers[i][5]
                        if (ico.search('Time Window Next Day') !== -1) {
                            ico = 'time-window-next-day'
                        }
                        if (ico.search('Same Day') !== -1) {
                            ico = 'same-day'
                        }
                        if (markers[i][6] && markers[i][6] === 'Scheduled') {
                            ico = 'corral'
                        }

                        // The marker, positioned at package
                        var icon = L.icon({
                            iconUrl: "{{ asset('assets/icons') }}" + '/' + ico + '.png',
                            popupAnchor: [0, -30]
                        });

                        // in case this is a selected stop of current region
                        if (typeof markers[i].first_step !== 'undefined' && markers[i].first_step) {
                            var icon = L.icon({
                                iconUrl: "{{ asset('assets/icons/start.png') }}",
                                popupAnchor: [0, -30]
                            });
                            regions[markers[i].region_id].firstStop = i;
                        }

                        if (typeof markers[i].last_step !== 'undefined' && markers[i].last_step) {
                            var icon = L.icon({
                                iconUrl: "{{ asset('assets/icons/finish.png') }}",
                                popupAnchor: [0, -30]
                            });
                            regions[markers[i].region_id].lastStop = i;
                        }

                        markers[i].marker = L.marker([markers[i][1], markers[i][2]], {
                            index: i,
                            title: markers[i][0],
                            icon: icon,
                            baseIcon: ico,
                            contextmenu: true,
                            contextmenuInheritItems: false,
                            contextmenuItems: [{
                                    text: 'LatLng #' + markers[i][0],
                                    callback: function(object) {
                                        alert('LatLng(' + object.latlng.lat + ',' + object
                                            .latlng.lng + ')')
                                    }
                                },
                                {
                                    text: 'Set as START stop',
                                    callback: function(object) {
                                        let orderId = object.relatedTarget.options.title;
                                        let polygonId = isMarkerInsidePolygon(object)
                                        if (polygonId == null) {
                                            Swal.fire({
                                                title: 'Error',
                                                type: 'warning',
                                                text: 'Order does not belong to any region.',
                                                html: true,
                                                confirmButtonText: 'Okay',
                                                confirmButtonClass: 'btn-warning',
                                            });
                                            return;
                                        }

                                        // saving
                                        let payload = {
                                            action: 'setFirstStop',
                                            region_id: polygonId,
                                            order_id: orderId,
                                            index: object.relatedTarget.options.index
                                        }
                                        console.log(payload);
                                        spinner('show');
                                        $.ajax({
                                            type: "POST",
                                            // url: "{{ asset('assets/icons/pull_routes') }}",
                                            async: true,
                                            data: payload,
                                            success: function(response) {
                                                // processing
                                                if (typeof regions[polygonId]
                                                    .firstStop !== 'undefined' &&
                                                    regions[polygonId].firstStop !==
                                                    null) {
                                                    var i = regions[polygonId]
                                                        .firstStop;
                                                    changeMarkerIcon(i, object
                                                        .relatedTarget.options
                                                        .baseIcon)
                                                    markers[i].marker.isFirstStop =
                                                        false;
                                                }

                                                changeMarkerIcon(object
                                                    .relatedTarget.options
                                                    .index, 'start')
                                                regions[polygonId].firstStop =
                                                    object.relatedTarget.options
                                                    .index;
                                                object.relatedTarget.isFirstStop =
                                                    true;
                                                spinner('hide');
                                            }
                                        })
                                    }
                                },
                                {
                                    text: 'Set as FINISH stop',
                                    callback: function(object) {
                                        let orderId = object.relatedTarget.options.title;
                                        let polygonId = isMarkerInsidePolygon(object)
                                        if (polygonId == null) {
                                            Swal.fire({
                                                title: 'Error',
                                                type: 'warning',
                                                text: 'Order does not belong to any region.',
                                                html: true,
                                                confirmButtonText: 'Okay',
                                                confirmButtonClass: 'btn-warning',
                                            });
                                            return;
                                        }

                                        // saving
                                        let payload = {
                                            action: 'setLastStop',
                                            region_id: polygonId,
                                            order_id: orderId,
                                            index: object.relatedTarget.options.index,
                                        }


                                        $.ajax({
                                            type: "POST",
                                            url: "{{ route('pull_routes') }}",
                                            async: true,
                                            data: payload,
                                            success: function(response) {
                                                // processing
                                                if (typeof regions[polygonId]
                                                    .lastStop !== 'undefined' &&
                                                    regions[polygonId].lastStop !==
                                                    null) {
                                                    var i = regions[polygonId]
                                                        .lastStop;
                                                    changeMarkerIcon(i, object
                                                        .relatedTarget.options
                                                        .baseIcon)
                                                    markers[i].marker.isLastStop =
                                                        false;
                                                }

                                                changeMarkerIcon(object
                                                    .relatedTarget.options
                                                    .index, 'finish')
                                                regions[polygonId].lastStop = object
                                                    .relatedTarget.options.index;
                                                object.relatedTarget.isLastStop =
                                                    true;


                                            }
                                        })
                                    }
                                }
                            ]
                        });

                        markers[i].marker.bindPopup(infoWindowContent[i][0]);
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


                    //Display multiple markers on a map
                    var icon = L.icon({
                        iconUrl: "{{ asset('assets/icons/house.png') }}",
                    });
                    // for (var fi = 0; fi < facilities.length; fi++) {
                    //     homeMarkers[fi] = L.marker([facilities[fi].lat, facilities[fi].lng], {
                    //         title: 'Hub',
                    //         icon: icon,
                    //     }).addTo(map);
                    // }
                }
            });
        }

        // removing all reginos from the map
        function clearRegions($id = null) {
            if (map === null) {
                return false;
            }
            for (var key in regions) {
                if ($id !== null && parseInt($id) !== $id) {
                    continue;
                }
                // removeing label first
                map.removeLayer(regions[key].label);

                // removing layer
                map.removeLayer(regions[key]);

                delete regions[key];
            }
            return true;
        }

        // rendering/rerendereing regions
        function renderRegions() {
            // clear all
            clearRegions();

            // are any selectors adjusted
            let dates = {};

            for (let i = 0; i < $('.schedule-select:visible').length; i++) {
                dates[$('.schedule-select:visible').eq(i).attr('rel')] = $('.schedule-select:visible').eq(i).find(
                    ':selected').val()
            }
            console.log('dates', dates);
            // updating list
            getRegions();

            // drawing to the map
            $.ajax({
                type: "GET",
                url: "{{ route('map.pullregions') }}",

                success: function(response) {



                    //return false;

                    clearRegions();

                    //loop through array
                    var regionsArray = response; //$.parseJSON(response);
                    var seletedOrders = 0;
                    var seletedRegions = 0;
                    $.each(regionsArray, function(key, array) {
                        seletedRegions++;
                        var region_name = this.name;
                        var region_id = this.uid;
                        var polyCoords = this.path;
                        var polyOrders = this.orders;
                        var region_name_id = this.route_name_id;
                        var region_name_i = this.route_name_i;
                        var settigns = array.settings;
                        var points = [];
                        var color = this.color;
                        seletedOrders = seletedOrders + parseInt(polyOrders);

                        // preparing coordinats
                        if (typeof polyCoords !== 'undefined') {
                            for (var i = 0; i < polyCoords.length; i++) {
                                points.push({
                                    lat: parseFloat(polyCoords[i].lat),
                                    lng: parseFloat(polyCoords[i].lng)
                                });
                            }
                        }
                        console.log('points', points);
                        if (points.length > 0) {
                            var region = L.polygon(points, {
                                stroke: true,
                                weight: 8,
                                fillOpacity: 0.45,
                                strokeColor: color,
                                fillColor: color,
                                color: color,
                                editable: true,
                                region_id: region_id,
                                region_name: region_name,
                                region_name_id: region_name_id,
                                region_name_i: region_name_i,
                                settings: settigns
                            }).addTo(map);

                            // adding tile with number of orders
                            var icon = new L.TextIcon({
                                text: '<div style="background: ' + color +
                                    '; box-shadow: 0px 0px 2px rgba(0,0,0,0.5); font-weight: bold; color: white; padding: 5px; border-radius: 5px; width: 150px;"><b>' +
                                    region_name + '</b><br />#' + region_id + '<br />' +
                                    polyOrders + '</div>'
                            });
                            var center = region.getBounds().getCenter();
                            region.label = L.marker([center.lat, center.lng], {
                                title: polyOrders,
                                icon: icon,
                            }).addTo(map);

                            // bindings
                            region.bindPopup("<h1>" + region_name + "</h1> <br /><b>Region ID:</b> #" +
                                region_id + "<br /><b>Orders: </b>" + this.orders);
                            region.on('edit', function(ev) {
                                updateRegion(region_id, true);
                            });

                            regions[this.uid] = region;
                        }
                    })
                    // updateMassButtons(seletedOrders, seletedRegions);
                }
            });
        }

        // drawing regions to the table
        function getRegions() {
            // are any selectors adjusted
            let dates = {};

            for (let i = 0; i < $('.schedule-select:visible').length; i++) {
                dates[$('.schedule-select:visible').eq(i).attr('rel')] = $('.schedule-select:visible').eq(i).find(
                    ':selected').val()
            }

            $("#regions").html("<i class='fa fa-refresh fa-spin fa-fw'></i><br><br>");
            $.ajax({
                type: "GET",
                url: "{{ route('map.get_regions') }}",

                success: function(response) {
                    $("#regions").html(response);

                    $(".region").mouseover(function() {
                        regionid = parseInt($(this).attr("data-regionid"));

                        if (!$(this).hasClass("selected")) {
                            regions[regionid].setStyle({
                                fillColor: 'yellow',
                                strokeColor: 'yellow'
                            });
                        }
                    });
                    $(".region").mouseout(function() {
                        regionid = parseInt($(this).attr("data-regionid"));
                        if (!$(this).hasClass("selected")) {
                            color = $(this).attr("data-color");
                            regions[regionid].setStyle({
                                fillColor: color,
                                strokeColor: color
                            });
                        }
                    });
                    $(".region").click(function() {
                        regionid = parseInt($(this).attr("data-regionid"));
                        if ($(this).hasClass("selected")) {
                            $(this).removeClass("selected");
                            color = $(this).attr("data-color");
                            regions[regionid].setStyle({
                                fillColor: color,
                                strokeColor: color
                            });
                        } else {
                            regions[regionid].setStyle({
                                fillColor: 'lightgreen',
                                strokeColor: 'lightgreen'
                            });
                            $(this).addClass("selected");
                        }
                    });
                }
            });
        }


        // saving modificated region
        function updateRegion($region_id, $is_shape_only = false) {
            var coordinates = regions[$region_id]._latlngs;
            if (coordinates[0].length < 4) {
                Swal.fire({
                    title: "Error",
                    type: 'error',
                    showConfirmButton: false,
                    text: "Coordinates not recognized!",
                    timer: 2000
                });

                return;
            }

            var shape_path = [];
            for (var i = 0; i < coordinates[0].length; i++) {
                var lat = coordinates[0][i].lat;
                var lng = coordinates[0][i].lng;
                // shape_path.push(point_lat);
                // shape_path.push(point_lng);

                shape_path.push({
                    lat,
                    lng
                });
            }

            var payload = {
                '_token': "{{ csrf_token() }}",
                regionid: $region_id,
                map_type: mapType,
                path: shape_path
            };

            if (!$is_shape_only) {
                if (typeof $('#modal_region_route_name').val() === 'undefined' || parseInt($('#modal_region_route_name')
                        .val()) < 1) {
                    // in case this is only shape update
                    Swal.fire({
                        title: "Error",
                        type: 'error',
                        showConfirmButton: false,
                        text: "Route name is not selected!",
                        timer: 2000
                    });

                    return;
                }
                payload.route_name = routeNames[$('#modal_region_route_name').val()].name;
                payload.route_name_id = $('#modal_region_route_name').val();

                if (mapType !== 'shape' && (typeof $('#modal_region_route_name_i').val() === 'undefined' || parseInt($(
                        '#modal_region_route_name_i').val()) < 1)) {
                    Swal.fire({
                        title: "Error",
                        type: 'error',
                        showConfirmButton: false,
                        text: "Route name iter is not selected!",
                        timer: 2000
                    });

                    return;
                }
                payload.route_name_i = $('#modal_region_route_name_i').val();
            }

            // saving
            $.ajax({
                type: "POST",
                url: '{{ route('update.regions') }}',
                data: payload,
                success: function(response) {
                    // refreshing map
                    refreshMap();

                    if (response === "1") {
                        console.log('Polygon ' + $region_id + ' saved')

                        // nulling variables
                        $("#edit_region_name").modal('hide');
                        $('#modal_region_route_name').val('0');

                        if (!$is_shape_only) {
                            setTimeout(function() {
                                Swal.fire({
                                    title: "Region Updated",
                                    type: 'success',
                                    showConfirmButton: false,
                                    text: "You have successfully update a region #" +
                                        $region_id + "!",
                                    timer: 2000
                                });
                            }, 150)
                        }
                    } else {
                        Swal.fire({
                            title: 'Error',
                            type: 'error',
                            text: response,
                            html: true,
                            confirmButtonText: 'Okay',
                            confirmButtonClass: 'btn-danger',
                        });
                    }
                }
            });
        }

        function confirmationRegionDelete(e) {
            var url = e.currentTarget.getAttribute(
                'href'
            ); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty

            $('#form-del').attr('action', url);
            Swal.fire({
                title: 'Are you sure you want to delete this region?',
                icon: 'error',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyCanceButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $("#form-del").submit();
                } else {
                    $('#form-del').attr('action', '');
                }
            })
            return false;
        }
    </script>
    <script>
        function showOptimizeModal($region_id) {
            optimizationQueue = [];
            optimizationQueue.push($region_id)

            $("#optimize_region_popup").modal('show');
            $('#optimize_region_starts').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: "{{ date('Y-m-d H:i') }}"
            });
        }
    </script>
    <script>
        var vueApp = new Vue({
            el: '#optimize_region_popup',
            data: {
                view_mode: 1,
                is_queued: "yes",
                is_real: "yes",
                sameday_delivery: false,
                driverid: 0,
                foundStarted: 0,
                route_id: 0,
                route_name: '',
            },
            mounted() {},
            methods: {
                reset() {
                    console.log("RESET");
                },
                createRouteFromRegion($mark, $engine) {
                    optimizeRegion($mark, $engine);
                },
                toggleSamedayDelivery() {
                    if (this.sameday_delivery) {
                        try {
                            $('#sameday_driver_select').select2('destroy');
                            this.driverid = 0;
                            this.route_id = 0;
                        } catch (e) {}
                        setTimeout(() => {
                            $('#sameday_driver_select').select2()
                                .on('select2:select', (e) => {

                                    axios
                                        .post('/api/routes/getStartedRoutesByDriver/' + this.driverid)
                                        .then(response => {

                                            this.driverid = e.params.data.id;
                                            this.foundStarted = response.data.foundStarted;
                                            this.route_id = response.data.route_id;
                                            this.route_name = response.data.route_name;
                                        })
                                        .catch(error => {
                                            console.error('/api/routes/getStertedRoutesByDriver/' +
                                                this.driverid, new Date(), error);

                                        });
                                });
                        }, 101);
                    } else {
                        this.foundStarted = 0;
                        this.driverid = 0;
                        this.route_id = 0;
                    }
                }
            }
        });


        function optimizeRegion($mark, $engine) {
            let save = confirm("Are you sure you want to optimize routes (" + optimizationQueue.join(', ') + ")?");
            if (!save) {
                return;
            }
            optimize($mark, $engine);
        }

        function optimize($mark, $engine) {
            if (optimizationQueue.length < 1) {
                Swal.fire({
                    title: 'Error',
                    type: 'warning',
                    text: 'There are no orders in the route being optimized.',
                    html: true,
                    confirmButtonText: 'Okay',
                    confirmButtonClass: 'btn-warning',
                });
                return false;
            }

            var startsAt = $('#optimize_region_starts').val();
            var service_time = $('#optimize_region_service').val();
            var sameDayDriver = $('#sameday_driver_select').val();
            var sameDayCheck = $('#sameday_delivery').prop('checked');
            var sameDayFromAddress = $('#sameday_from_address').val();
            var sameDayFinishAddress = $('#sameday_finish_address').val();

            // check same day order to have driver
            if (sameDayCheck && sameDayDriver === "") {
                Swal.fire({
                    title: 'Error',
                    type: 'warning',
                    text: 'Select driver',
                    html: true,
                    confirmButtonText: 'Okay',
                    confirmButtonClass: 'btn-warning',
                });
                return false;
            }

            // hiding modal
            $("#optimize_region_popup").modal('hide');

            // are any selectors adjusted
            let dates = {};

            for (let i = 0; i < $('.schedule-select:visible').length; i++) {
                dates[$('.schedule-select:visible').eq(i).attr('rel')] = $('.schedule-select:visible').eq(i).find(
                    ':selected').val()
            }

            let payload = {
                '_token': "{{ csrf_token() }}",
                regions: optimizationQueue,
                service_time: service_time,
                attach_to_route: $('#attach_to_route').val(),
                hub_start_address: $('#sameday_start_place').val(),
                hub_start_lat: $('#hub_start_lat').val(),
                hub_start_lng: $('#hub_start_lng').val(),
                hub_finish_address: $('#sameday_finish_place').val(),
                hub_finish_lat: $('#hub_finish_lat').val(),
                hub_finish_lng: $('#hub_finish_lng').val(),
                startsAt: startsAt,
                sameday_check: sameDayCheck,
                sameday_startplace: sameDayFromAddress,
                sameday_finishplace: sameDayFinishAddress,
                sameday_driver: sameDayDriver,
                region_route_name: $('#region_route_name').val(),
                region_route_name_i: $('#region_route_name_i').val(),
                clientid: $('#map_filter_client').val(),
                status: currentstatus,
                sub_status: $('#map_filter_sub_status').val(),
                type: currenttype,
                hub: currenthub,
                created_from: table_filter_created_from,
                created_to: table_filter_created_to,
                recipient_name: table_filter_recipient_name,
                delivery_intervals: delivery_intervals,
                dates: dates,
                engine: $engine,
                is_real: $('input[name="is_real"]').is(":checked"),
                is_queued: $('input[name="is_queued"]').is(":checked"),
            };
            console.log('payload', payload);
            //  return false;

            $.ajax({
                type: "POST",
                url: '{{ route('save.optimize-route') }}',
                async: true,
                data: payload,
                success: function(response) {

                    if (response == 1) {
                        Swal.fire({
                            title: 'Routes Created',
                            type: 'success',
                            text: 'Routes (<b>' + optimizationQueue.join(', ') +
                                '</b>) has successfully been created and allocated to the optimize queue, and are now available on the <b>Routes</b> page.',
                            html: true,
                            confirmButtonText: 'Okay',
                            confirmButtonClass: 'btn-success',
                        });

                        // rebuilding map
                        refreshMap();
                        renderRegions();
                        renderOrders();
                        // clearing form
                        if ($('#samedaydeliverycheck').is(':checked')) {
                            $('#samedaydeliverycheck').trigger('click');
                        }
                        setInterval(function() {
                            location.reload();
                        }, 1000);

                    } else {
                        Swal.fire({
                            title: 'Error',
                            type: 'error',
                            // text: response,
                            text: 'There was an error optimizing your route.',
                            html: true,
                            confirmButtonText: 'Okay',
                            confirmButtonClass: 'btn-danger',
                        });
                    }
                }
            });
        }
    </script>

    <script>
        $("#sameday_delivery").change(function() {
            if (this.checked) {
                $("#start_and_finish_location").hide();
                $("#driver_div").show();
            } else {
                $("#start_and_finish_location").show();
                $("#driver_div").hide();
            }
        });

        const start_interactive = document.querySelectorAll('[data-kt-docs-advanced-forms="start_interactive"]');
        const sameday_start_place = document.querySelector('[name="sameday_start_place_input"]');
        start_interactive.forEach(option => {
            option.addEventListener('click', e => {
                e.preventDefault();
                sameday_start_place.value = e.target.innerText;
                $("#hub_start_lat").val(e.target.getAttribute("data-latitude"));
                $("#hub_start_lng").val(e.target.getAttribute("data-longitude"));
                $("#sameday_start_place").val(e.target.innerText);
            });
        });

        const finish_interactive = document.querySelectorAll('[data-kt-docs-advanced-forms="finish_interactive"]');
        const sameday_finish_place = document.querySelector('[name="sameday_finish_place_input"]');
        finish_interactive.forEach(option => {
            option.addEventListener('click', e => {
                e.preventDefault();

                sameday_finish_place.value = e.target.innerText;
                $("#hub_finish_lat").val(e.target.getAttribute("data-latitude"));
                $("#hub_finish_lng").val(e.target.getAttribute("data-longitude"));
                $("#sameday_finish_place").val(e.target.innerText);
            });
        });

        function removestartplace() {

            $("#sameday_start_place_select").val('').trigger('change');
            $("#sameday_start_place_input").val('');
            $("#hub_start_lat").val('');
            $("#hub_start_lng").val('');
            $("#sameday_start_place").val('');
        }

        function removefinishplace() {
            $("#sameday_finish_place").val('');
            $("#sameday_finish_place_select").val('').trigger('change');
            $("#sameday_finish_place_input").val('');

            $("#hub_finish_lat").val('');
            $("#hub_finish_lng").val('');
            $("#sameday_finish_place").val('');
        }


        $("#sameday_finish_place_select").change(function() {
            $("#hub_finish_lat").val($(this).find(':selected').data('latitude'));
            $("#hub_finish_lng").val($(this).find(':selected').data('longitude'));
            $("#sameday_finish_place").val($(this).find(':selected').data('address'));
        });

        $("#sameday_start_place_select").change(function() {

            $("#hub_start_lat").val($(this).find(':selected').data('latitude'));
            $("#hub_start_lng").val($(this).find(':selected').data('longitude'));
            $("#sameday_start_place").val($(this).find(':selected').data('address'));
        });

        $(".status-main-menu").on('click', function() {
            $('.status-main-menu.active').removeClass('active');
            $(this).addClass('active');
        });
    </script>



    <script>
        function filter_type(value) {
            currentType = value;
            $('.map_section #map').remove();
            $('.map_section').append('<div id="map" class="w-100" style="height: 800px"></div>');
            map = new L.Map('map', {
                center: new L.LatLng('28.5550838', '77.0844015'),
                zoom: 13,
                fullscreenControl: true,
                contextmenu: true,
                contextmenuWidth: 140,
                contextmenuItems: [{
                    text: 'Show coordinates',
                    callback: showCoordinates
                }, {
                    text: 'Center map here',
                    callback: centerMap
                }, '-', {
                    text: 'Zoom in',

                    callback: zoomIn
                }, {
                    text: 'Zoom out',
                    callback: zoomOut
                }]
            });
            var osmUrl = 'https://www.google.com/maps/vt?lyrs=m@221097413,house_numbers&gl=com&x={x}&y={y}&z={z}';
            var osmAttrib =
                'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://rx2go.ai/">Quick Pharma</a>';
            var osm = L.tileLayer(osmUrl, {
                maxZoom: 21,
                attribution: osmAttrib
            }).addTo(map);
            var drawnItems = L.featureGroup().addTo(map);

            map.addControl(new L.Control.Draw({
                edit: {
                    featureGroup: drawnItems,
                    poly: {
                        allowIntersection: false
                    }
                },
                draw: {
                    polygon: {
                        allowIntersection: false,
                        showArea: true,
                        editable: true
                    },
                    rectangle: {
                        allowIntersection: false,
                        showArea: true,
                        editable: true
                    },
                    polyline: false,
                    marker: false,
                    circle: false,
                    circlemarker: false
                }
            }));
            map.on(L.Draw.Event.CREATED, function(event) {
                newRegionLayer = event.layer;
                drawnItems.addLayer(newRegionLayer);
                // here you got the polygon points
                newRegionShape = newRegionLayer._latlngs;
                // here you can get it in geojson format
                var geojson = newRegionLayer.toGeoJSON();
                //saving polygon
                showRegionNameModal();
            });
            map.invalidateSize();
            renderOrders();
        }
    </script>
@endsection
