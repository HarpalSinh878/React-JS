@extends('layouts.main')
@section('title')
    Tickets
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-ticket-perforated me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z" />
                                    <path
                                        d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z" />
                                </svg>
                            </span>Tickets</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item mb-3">
                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_1"
                                    class="btn btn-theme-color btn-rounded"><i class="bi bi-plus-lg fs-4 me-2"></i>
                                    New</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">

                                <div class="dropdown">
                                    <button class="btn btn-theme-color btn-rounded dropdown-toggle" type="button"
                                        id="SetStatusDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Set Status (<span id="set_status">0</span>)
                                    </button>
                                    <ul class="dropdown-menu" id="status_list" aria-labelledby="SetStatusDropdownButton">
                                        <li><a class="dropdown-item">Open</a></li>
                                        <li><a class="dropdown-item">Assigned</a></li>
                                        <li><a class="dropdown-item">In Progress</a></li>
                                        <li><a class="dropdown-item">Resolved</a></li>
                                        <li><a class="dropdown-item">On Hold</a></li>
                                        <li><a class="dropdown-item">Rejected</a></li>
                                    </ul>
                                </div>
                            </li>
                            {{-- <li class="nav-item ms-lg-3 mb-3">
                                <a href="#" class="btn btn-theme-color btn-rounded"><i
                                        class="bi bi-arrow-repeat fs-4 me-2"></i>
                                    See My Tickets</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">
                                <a href="#" class="btn btn-theme-color btn-rounded"><i
                                        class="bi bi-arrow-repeat fs-4 me-2"></i>
                                    See Assigned To Me</a>
                            </li>
                            <li class="nav-item ms-lg-3">
                                <a href="#" class="btn btn-theme-color btn-rounded"><i
                                        class="bi bi-arrow-repeat fs-4 me-2"></i>
                                    See All Tickets</a>
                            </li> --}}
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
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary active fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="All">All (<span id="all_text">{{ getTicketsTotal('') }}</span>)</button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="Open">Open (<span id="open_text">0</span>)</button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="Assigned">Assigned (<span id="assigned_text">0</span>)</button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="In Progress">In Progress (<span id="in_progress_text">0</span>)</button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="Ready to Resolve">Ready To Resolve (<span
                                        id="ready_to_resolve_text">0</span>)</button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="Resolved">Resolved (<span id="resolve_text">0</span>)</button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="On Hold">On Hold (<span id="on_hold_text">0</span>)</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn"
                                    value="Rejected">Rejected (<span id="rejected_text">0</span>)</button>
                            </li>
                        </ul>

                    </div>
                    <!--begin::Tab content-->
                    <div class="row d-flex align-items-center">
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade active show" id="all" role="tabpanel">
                                <!--begin::Statistics-->
                                <div class="mb-5">

                                    <div class="table-responsive">

                                        <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive"table-striped table-responsive" aria-describedby="mydesc"
                                            data-url="{{ url('GetTicketsList') }}" class='table-striped' id="table_list"
                                            data-toggle="table" data-click-to-select="true" data-show-copy-rows="true"
                                            data-side-pagination="server" data-pagination="true"
                                            data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true"
                                            data-toolbar="#toolbar" data-show-export="true" data-fixed-columns="false"
                                            data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false"
                                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                            data-pagination-successively-size="3"
                                            data-export-types='["csv","pdf","excel"]' data-show-print='true'
                                            data-export-options='{
                                           "fileName": "orders-<?= date('d-m-y')
                                            ?>",
                                            "ignoreColumn": ["state","action"]
                                            }'
                                            data-query-params="queryParams">
                                            <thead>
                                                <tr>
                                                    <th data-field="state" data-force-hide="true" data-checkbox="true">
                                                    </th>
                                                    <th scope="col" data-field="id" data-visible="false"></th>
                                                    <th scope="col" data-field="action" data-sortable="true">UID</th>
                                                    <th scope="col" data-field="description" data-sortable="false">
                                                        Description</th>
                                                    <th scope="col" data-field="priority" data-sortable="false">
                                                        Priority</th>
                                                    <th scope="col" data-field="type" data-sortable="false">Type</th>
                                                    <th scope="col" data-field="status" data-sortable="true">Status
                                                    </th>
                                                    <th scope="col" data-field="assigned_to" data-sortable="true">
                                                        Assigned To</th>
                                                    <th scope="col" data-field="order_id" data-sortable="false">Order
                                                        Id</th>
                                                    <th scope="col" data-field="submitted" data-sortable="false">
                                                        Submitted</th>
                                                    <th scope="col" data-field="submitted_by" data-sortable="false">
                                                        Submitted By</th>
                                                    <th scope="col" data-field="hours_in_status"
                                                        data-sortable="false">Hours in Status</th>
                                                    <th scope="col" data-field="hours_in_system"
                                                        data-sortable="false">Hours in System</th>
                                                    <th scope="col" data-field="last_updated" data-sortable="false">
                                                        Last Updated</th>
                                                    <th scope="col" data-field="last_updated_by"
                                                        data-sortable="false">Last Updated By</th>
                                                    <th scope="col" data-field="closed" data-sortable="false">Closed
                                                    </th>
                                                    <th scope="col" data-field="closed_by" data-sortable="true">Closed
                                                        By</th>
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
                    <div class="row border-bottom mt-5">
                        <div class="col-lg-12">
                            <div class="card-title flex-column ">
                                <h3 class="fw-bold mb-5">TICKET AGING</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5 g-xl-8" style="display: none">
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                    </div>
                    <div class="row g-5 g-xl-8" style="display: none">
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                    </div>
                    <div class="row g-5 g-xl-8" style="display: none">
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
                        </div>
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div
                                    class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
                                    <span class="svg-icon svg-icon-3 svg-icon-primary">
                                        <i class="bi bi-ticket-perforated fs-3x"></i>
                                    </span>
                                    <h3 class="card-title  flex-column">
                                        <span class="fw-bold text-dark fs-3 ms-lg-4">SYSTEM</span>
                                        {{-- <span class="text-gray-400 mt-2 fw-semibold fs-6">More than 400+ new members</span> --}}
                                    </h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body pt-4 pb-4">
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">0-24 Hrs :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">1-2 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">2-3 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">3-7 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">7-14 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex mb-4">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">14-30 Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <span class="fs-5 text-gray-800 fw-bold">30+ Days :</span>
                                            </div>
                                            <div class="text-end py-lg-0 py-2">
                                                <span class="text-gray-800 fw-bolder fs-5">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::List Widget 9-->
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
    <!---- START :: tickets.modal.blade.php --->
    @include('tickets.modal')
    <!---- END :: tickets.modal.blade.php ---->
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            getTicketsStatistics();
        });


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


        var checkedRows = [];


        $('#table_list').on('check-all.bs.table', function(e, row) {
            $("#set_status").text(row.length);
            $.each(row, function(index, value) {
                checkedRows.push({
                    id: value.id
                });
            });
        })

        $('#table_list').on('uncheck-all.bs.table', function(e, row) {
            $("#set_status").text(row.length);
            checkedRows.length = 0;
        })


        $('#table_list').on('check.bs.table', function(e, row) {
            checkedRows.push({
                id: row.id
            });
            $("#set_status").text(checkedRows.length);
        });

        $('#table_list').on('uncheck.bs.table', function(e, row) {
            $.each(checkedRows, function(index, value) {
                if (value.id === row.id) {
                    checkedRows.splice(index, 1);
                }
            });
            $("#set_status").text(checkedRows.length);
        });
        $('#status_list li a').on('click', function() {
            var status = $(this).html();
            if (checkedRows.length > 0) {
                $.ajax({
                    url: "{{ route('tickets.multistatus') }}",
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        "ids": checkedRows,
                        "status": status,
                    },
                    cache: false,
                    success: function(result) {

                        if (result.error == false) {
                            toastr.success('All Status successfully');
                            checkedRows.splice(0, checkedRows.length);
                            $("#set_status").text(checkedRows.length);
                            $('#table_list').bootstrapTable('refresh');
                            getTicketsStatistics();
                        }
                    },
                    error: function(error) {

                    }
                });
            }

        });
    </script>

    <script>
        function getTicketsStatistics() {
            $.ajax({
                url: "{{ route('tickets.statistics') }}",
                type: "GET",
                success: function(result) {

                    if (result.error == false) {

                        $("#open_text").text(result.open);

                        $("#assigned_text").text(result.Assigned);
                        $("#in_progress_text").text(result.InProgress);
                        $("#ready_to_resolve_text").text(result.ReadytoResolve);
                        $("#resolve_text").text(result.Resolved);

                        $("#on_hold_text").text(result.OnHold);
                        $("#rejected_text").text(result.Rejected);

                        $('#table_list').bootstrapTable('refresh');
                    }
                },
                error: function(error) {

                }
            });
        }
    </script>
@endsection
