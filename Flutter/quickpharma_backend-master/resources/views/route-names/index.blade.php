@extends('layouts.main')
@section('title')
    Routes Names
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
                <div class="card-header pt-4 pb-2">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-ticket-perforated me-2" viewBox="0 0 16 16">
                                <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
                                <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
                            </svg> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-filter me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>Routes Names</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item mb-3">
                                <a href="{{ route('map.index') }}" class="btn btn-theme-color btn-rounded"><i
                                        class="bi bi-map fs-4 me-2"></i>Draw Regions on Map</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">
                                <a data-bs-toggle="modal" data-bs-target="#addRouteName"
                                    class="btn btn-theme-color btn-rounded"><i class="bi bi-plus-lg fs-4 me-2"></i>Add Route
                                    Name</a>
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
                                <!--begin::Statistics-->
                                <div class="mb-5">
                                    <div class="table-responsive">
                                        <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive"table-striped table-responsive" aria-describedby="mydesc"
                                            data-url="{{ url('GetRouteNamesList') }}" class='table-striped' id="table_list"
                                            data-toggle="table" data-click-to-select="true" data-show-copy-rows="false"
                                            data-side-pagination="server" data-pagination="true"
                                            data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="false"
                                            data-toolbar="#toolbar" data-show-export="false" data-fixed-columns="false"
                                            data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false"
                                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                            data-pagination-successively-size="3" data-export-types='["csv","pdf","excel"]'
                                            data-show-print='false'
                                            data-export-options='{
                                            "fileName": "orders-<?= date('d-m-y')
                                            ?>",
                                            "ignoreColumn": ["state","action"]
                                            }'
                                            data-query-params="queryParams">
                                            <thead>
                                                <tr>
                                                    <th scope="col" data-field="id" data-visible="false"></th>
                                                    <th scope="col" data-field="title" data-sortable="false"
                                                        data-width="455">Title</th>
                                                    <th scope="col" data-field="label" data-sortable="false">Lables</th>
                                                    <th scope="col" data-field="operate" data-sortable="false"
                                                        data-events="actionEvents">Activity</th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!--end::Statistics-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
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
    <div class="modal fade" tabindex="-1" id="addRouteName">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title">CREATE A NEW ROUTE NAME</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('route-names.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-5">
                            <div class="d-grid">
                                <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-theme-color rounded-bottom-0 tab_btn"
                                            data-bs-toggle="tab" href="#settings_tab">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-theme-color rounded-bottom-0 tab_btn"
                                            data-bs-toggle="tab" href="#autocreation_tab">Autocreation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-theme-color rounded-bottom-0 tab_btn"
                                            data-bs-toggle="tab" href="#map_tab">Map</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-content" id="myTabContent">
                            <!--- START :: SETTING TAB --->
                            <div class="tab-pane fade show active" id="settings_tab" role="tabpanel">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Route Name</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" name="route_name"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Route Name" required>

                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Order Type</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        @isset($ordertype)
                                            <div class="row">
                                                @foreach ($ordertype as $row)
                                                    <div class="col-6">
                                                        <div
                                                            class="form-check form-check-custom form-check-solid mb-5 form-check-sm">
                                                            <input class="form-check-input me-3" name="order_type[]"
                                                                type="checkbox" value="{{ $row->id }}" id="createot{{ $row->id }}" />
                                                            <label class="form-check-label" for="createot{{ $row->id }}">
                                                                <div class="fw-semibold text-gray-800">
                                                                    {{ $row->order_type }}
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-lg-12 col-form-label">Assigned Driver</label>

                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="driver" id="driver"
                                            data-control="select2" data-dropdown-parent="#addRouteName"
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
                            </div>
                            <!--- END :: SETTING TAB --->

                            <!--- START :: Autocreation TAB --->
                            <div class="tab-pane fade" id="autocreation_tab" role="tabpanel">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Auto Create Schedule</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <table class="table repeater table-secondary">
                                            <thead class="table-light table-striped table-responsive"table-striped table-responsive">
                                                <th>Day</th>
                                                <th style="width: 13%;">Hours</th>
                                                <th style="width: 13%;">Minute</th>
                                                <th><a data-repeater-create href="javascript:void(0)"
                                                        class="btn  btn-icon btn-primary btn-sm float-end"
                                                        title="Add"><i class="bi bi-plus text-white"></i> </a></th>
                                            </thead>

                                            <tbody data-repeater-list="items">
                                                <tr data-repeater-item>
                                                    <td>
                                                        <select class="form-control form-select form-select-solid"
                                                            name="days">
                                                            <option value="All" selected>All</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Friday">Friday</option>
                                                            <option value="Saturday">Saturday</option>
                                                            <option value="Sunday">Sunday</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="hours" placeholder="hours"
                                                            value="22" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="minute" placeholder="minute"
                                                            value="00" class="form-control">

                                                    </td>
                                                    <td>
                                                        <a data-repeater-delete href="javascript:void(0)"
                                                            class="btn  btn-icon btn-danger btn-sm float-end"
                                                            title="Remove">
                                                            <i class="bi bi-trash3"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                {{-- <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Autocreation</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="autocreation">
                                            <option value="Off" selected>Off</option>
                                            <option value="On">On</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Optimal Service Time Per Stop (seconds)</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" value="360" name="optimal_service_time_per_stop"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Optimal Service Time Per Stop (seconds)" required>

                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Optimal Orders Number per Route</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" value="60" name="optimal_orders_number_per_route"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Optimal Orders Number per Route" required>

                                    </div>
                                </div>

                            </div>
                            <!--- END :: Autocreation TAB --->

                            <!--- START :: Map TAB --->
                            <div class="tab-pane fade" id="map_tab" role="tabpanel">
                                <div class="form-group row mb-3">
                                    <div class="col-md-12">
                                        <!--begin::Map-->
                                            <div id="route_map" class="w-100" style="height: 360px"></div>
                                        <!--end::Map-->
                                    </div>

                                </div>
                            </div>
                            <!--- END :: Map TAB --->

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




    <!--begin model-->
    <div class="modal fade" tabindex="-1" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title">EDIT ROUTE NAME</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('update.routenames') }}" method="post">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="modal-body">
                        <div class="mb-5">
                            <div class="d-grid">
                                <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                    <li class="nav-item">
                                        <a class="nav-link active btn btn-theme-color rounded-bottom-0 tab_btn"
                                            data-bs-toggle="tab" href="#edit_settings_tab">Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-theme-color rounded-bottom-0 tab_btn"
                                            data-bs-toggle="tab" href="#edit_autocreation_tab">Autocreation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-theme-color rounded-bottom-0 tab_btn"
                                            data-bs-toggle="tab" href="#edit_map_tab">Map</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-content" id="myTabContent">
                            <!--- START :: SETTING TAB --->
                            <div class="tab-pane fade show active" id="edit_settings_tab" role="tabpanel">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Route Name</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" name="route_name" id="route_name"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Route Name">

                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Order Type</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        @isset($ordertype)
                                            <div class="row">
                                                @foreach ($ordertype as $row)
                                                    <div class="col-6">
                                                        <div
                                                            class="form-check form-check-custom form-check-solid mb-5 form-check-sm">
                                                            <input class="form-check-input me-3 order_type"
                                                                name="order_type[]" type="checkbox"
                                                                value="{{ $row->id }}" id="ot{{ $row->id }}" />
                                                            <label class="form-check-label" for="ot{{ $row->id }}">
                                                                <div class="fw-semibold text-gray-800">
                                                                    {{ $row->order_type }}
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-lg-12 col-form-label">Assigned Driver</label>

                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="driver" id="edit_river"
                                            data-control="select2" data-dropdown-parent="#editModal"
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
                            </div>
                            <!--- END :: SETTING TAB --->

                            <!--- START :: Autocreation TAB --->
                            <div class="tab-pane fade" id="edit_autocreation_tab" role="tabpanel">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Auto Create Schedule</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <table class="table editrepeater table-secondary">
                                            <thead class="table-light table-striped table-responsive"table-striped table-responsive">
                                                <th>Day</th>
                                                <th style="width: 13%;">Hours</th>
                                                <th style="width: 13%;">Minute</th>
                                                <th><a data-repeater-create href="javascript:void(0)"
                                                        class="btn  btn-icon btn-primary btn-sm float-end"
                                                        title="Add"><i class="bi bi-plus text-white"></i> </a></th>
                                            </thead>

                                            <tbody data-repeater-list="items">
                                                <tr data-repeater-item>
                                                    <td>
                                                        <input type="hidden" name="rowid">
                                                        <select class="form-control form-select form-select-solid"
                                                            name="days">
                                                            <option value="All" selected>All</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Friday">Friday</option>
                                                            <option value="Saturday">Saturday</option>
                                                            <option value="Sunday">Sunday</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="hours" placeholder="hours"
                                                            value="22" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="minute" placeholder="minute"
                                                            value="00" class="form-control">

                                                    </td>
                                                    <td>
                                                        <a data-repeater-delete href="javascript:void(0)"
                                                            class="btn  btn-icon btn-danger btn-sm float-end"
                                                            title="Remove">
                                                            <i class="bi bi-trash3"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Autocreation</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <select class="form-select form-select-solid" name="autocreation"
                                            id="autocreation">
                                            <option value="Off" selected>Off</option>
                                            <option value="On">On</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Optimal Service Time Per Stop (seconds)</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" value="360" name="optimal_service_time_per_stop"
                                            class="form-control form-control-sm form-control-solid"
                                            id="optimal_service_time_per_stop"
                                            placeholder="Optimal Service Time Per Stop (seconds)" required>

                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label">Optimal Orders Number per Route</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" value="60" name="optimal_orders_number_per_route"
                                            class="form-control form-control-sm form-control-solid"
                                            id="optimal_orders_number_per_route"
                                            placeholder="Optimal Orders Number per Route" required>

                                    </div>
                                </div>

                            </div>
                            <!--- END :: Autocreation TAB --->

                            <!--- START :: Map TAB --->
                            <div class="tab-pane fade" id="edit_map_tab" role="tabpanel">
                                <div class="form-group row mb-3">
                                    <div class="col-md-12">
                                        <!--begin::Map-->
                                            <div id="edit_route_map" class="w-100" style="height: 360px"></div>
                                        <!--end::Map-->
                                    </div>

                                </div>
                            </div>
                            <!--- END :: Map TAB --->

                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end begin model-->
@endsection


@section('script')
    <script>
        function queryParams(p) {
            return {
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                limit: p.limit,
                search: p.search
            };
        }
        function openQrCodeWindows(e) {
            var url = e.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
            window.open(url, 'winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=350,height=400');
            return false;
        }
    </script>
    <script>
        var repeater = '';
        $(document).ready(function() {
            'use strict';
            $('table.repeater').repeater({
                initEmpty: true,
                defaultValues: {
                    'days': 'All',
                    'hours': '22',
                    'minute': '00'
                },
                show: function() {
                    $(this).slideDown();
                },
                isFirstItemUndeletable: true,
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
            repeater = $('table.editrepeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'rowid': '0',
                    'days': 'All',
                    'hours': '22',
                    'minute': '00'
                },
                show: function() {
                    $(this).slideDown();
                },
                isFirstItemUndeletable: false,
                hide: function(deleteElement) {
                    var rowID = $(this).closest('tr').find("input[type=hidden]").val();
                    if (rowID == 0) {
                        $(this).slideUp(deleteElement);
                    }
                    if (rowID > 0) {
                        Swal.fire({
                            title: 'Are You Sure Want to Delete This Record??',
                            icon: 'error',
                            showDenyButton: true,
                            confirmButtonText: 'Yes',
                            denyCanceButtonText: `No`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: "{{ route('removeautocreateschedule') }}",
                                    type: "POST",
                                    data: {
                                        '_token': "{{ csrf_token() }}",
                                        "id": rowID
                                    },
                                    cache: false,
                                    success: function(result) {
                                        if (result.error == false) {
                                            $(this).slideUp(deleteElement);
                                        }
                                    },
                                    error: function(error) {}
                                });
                            }
                        })
                    }

                }
            });


            setTimeout(function () {
                initAddMap();
                initEditMap();
            }, 600);

        });
        window.actionEvents = {
            'click .edit': function(e, value, row, index) {
                $("#edit_id").val(row.id);
                $("#route_name").val(row.route_name);
                $("#edit_river").val(row.driver_id).trigger('change');
                $("#optimal_service_time_per_stop").val(row.optimal_service_time_per_stop);
                $("#optimal_orders_number_per_route").val(row.optimal_orders_number_per_route);
                $("#driver").val(row.autocreation).trigger('change');
                var orderType = row.order_types.split(',');
                $('.order_type').prop("checked", false);
                $.each(orderType, function(index, value) {
                    $('input[name="order_type[]"][value="' + value + '"]').prop("checked", true);
                });
                var preArrayList = [];
                $.each(row.route_autocreate_schedule_days, function(index, value) {
                    var obj = {};
                    obj['rowid'] = value.id;
                    obj['days'] = value.days;
                    obj['hours'] = value.hours;
                    obj['minute'] = value.minute;
                    preArrayList.push(obj);
                });
                repeater.setList(preArrayList);
            },

        };
    </script>

<script>
    var initAddMap = function() {
        // Check if Leaflet is included
        if (!L) {
            return;
        }

        // Define Map Location
        var leaflet = L.map('route_map', {
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

    var initEditMap = function() {
        // Check if Leaflet is included
        if (!L) {
            return;
        }

        // Define Map Location
        var leaflet = L.map('edit_route_map', {
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
