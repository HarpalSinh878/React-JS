@extends('layouts.main')
@section('title')
    QAQC Dashboard
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
                                    class="bi bi-filter me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span class="text-uppercase">Driver Notes</span>

                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is required <b>delivery date</b>
                                        confirmed?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is required <b>time interval</b>
                                        confirmed?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is promised <b>time interval</b>
                                        confirmed?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>geofence</b>
                                        < 0.05 mi</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is A <b>phone call</b> made before
                                        the delivery?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is A <b>phone call to pharmacy</b>
                                        made after delivery attempt?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>photo</b> of the
                                        <b>building</b> looks real?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>photo</b> of the
                                        <b>apartment</b> looks real?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>photo</b> of the
                                        <b>fridge</b> looks real?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>photo</b> of the <b>copay</b>
                                        looks real?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>photo</b> of the <b>id</b>
                                        looks real?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>signature</b> looks
                                        real?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>delivery method</b> looks
                                        correct?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>recipient name</b> looks
                                        correct?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>


                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>Delivery Attempted</b>
                                        substatus looks correct?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg-7 mt-2">
                                    <i class="bi bi-journals"></i><span class="ms-2">Is <b>special instructions</b>
                                        followed?</span>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-success btn-active-success d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-danger btn-active-danger d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-warning btn-active-warning d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                                <div class="col-lg-1">
                                    <a class="btn btn-outline btn-sm btn-outline-dark btn-active-dark d-block">0<span
                                            class="badge badge-success ms-2"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <input class="form-control" id="date_after" type="date" aria-label="Date/Time to Deliver" aria-describedby="basic-addon2">
                                    <span>Note Was Created After</span>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" id="date_before" type="date" aria-label="Date/Time to Deliver" aria-describedby="basic-addon2">
                                    <span>Note Was Created Before</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <select class="form-select form-select-solid" id="driver_filter" data-control="select2">
                                        <option value="" selected>Select Driver</option>
                                        @isset($driver)
                                            @foreach ($driver as $row)
                                                <option value="{{ $row->id }}">(#{{ $row->id }}){{ $row->name }}
                                                </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <span>By Driver</span>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-select form-select-solid" name="dispatcher"
                                        id="dispatcher_filter" data-control="select2" data-placeholder="Select an option"
                                        data-allow-clear="true">

                                    </select>
                                    <span>By Dispatcher</span>
                                </div>
                            </div>

                        </div>
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
                                            data-url="{{ url('getQaqcDashboardList') }}" class='table-striped'
                                            id="table_list" data-toggle="table" data-click-to-select="true"
                                            data-show-copy-rows="false" data-side-pagination="server"
                                            data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]"
                                            data-search="false" data-toolbar="#toolbar" data-show-export="false"
                                            data-fixed-columns="false" data-fixed-number="1" data-fixed-right-number="1"
                                            data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                            data-sort-order="desc" data-pagination-successively-size="3"
                                            data-export-types='["csv","pdf","excel"]' data-show-print='false'
                                            data-export-options='{
                                            "fileName": "orders-<?= date('d-m-y')
                                            ?>",
                                            "ignoreColumn": ["state","action"]
                                            }'
                                            data-query-params="queryParams">
                                            <thead>
                                                <tr>
                                                    <th scope="col" data-field="id" data-visible="false"></th>
                                                    <th scope="col" data-field="no" data-visible="true"></th>
                                                    <th scope="col" data-field="qaqc" data-sortable="false">QAQC</th>
                                                    <th scope="col" data-field="note_date" data-sortable="false">Note
                                                        Date</th>

                                                    <th scope="col" data-field="action" data-sortable="true"
                                                        data-events="actionEvents">Order #</th>
                                                    <th scope="col" data-events="actionEvents" data-field="order_status" data-sortable="false">
                                                        Order
                                                        Status</th>
                                                    <th scope="col" data-field="driver_name" data-sortable="false">
                                                        Driver
                                                    </th>
                                                    <th scope="col" data-field="dispatcher" data-sortable="false">
                                                        Dispatcher</th>
                                                    <th scope="col" data-field="client" data-sortable="false">Client
                                                    </th>
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

                        <!---- START :: order.modal.blade.php --->
                        @include('orders.modal')
                        <!---- END :: order.modal.blade.php ---->
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
    <div class="modal fade" tabindex="-1" id="order_status_model">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title">ORDER STATUS</h3>
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
                <form  method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="o_id" id="o_id">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Status</label>
                            <select class="form-select" name="status" id="order_status">
                                <option value="" selected>Select Status</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Delivered">Delivery Attempted</option>
                                <option value="Driver Out">Driver Out</option>
                                <option value="Investigation">Investigation</option>
                                <option value="Not Present">Not Present</option>
                                <option value="Recipient Refused">Recipient Refused</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Route Optimized">Route Optimized</option>
                                <option value="Wrong Address"> Wrong Address</option>
                            </select>
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
@endsection


@section('script')
    <script>

        $('#date_after').on('change', function () {
            $('#table_list').bootstrapTable('refresh');

        });

        $('#date_before').on('change', function () {
            $('#table_list').bootstrapTable('refresh');

        });

        $('#driver_filter').on('change', function () {
            $('#table_list').bootstrapTable('refresh');

        });


        function queryParams(p) {
            return {
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                limit: p.limit,
                search: p.search,
                date_after : $("#date_after").val(),
                date_before : $("#date_before").val(),
                driver_filter : $("#driver_filter").val()
            };
        }

        window.actionEvents = {
            'click .view': function(e, value, row, index) {
                $("#order_id").text(row.id);
                $("#ticket_order_id").val(row.id);

                initRecipientsMap(row.recipient_latitude, row.recipient_longitude, row.recipient_address);
                var address = row.recipient_address + "\n" + row.recipient_city + " " + row.recipient_state + " " +
                    row.recipient_zip
                $("#recipient_address").text(address);

                $("#recipient_name").text(row.recipient_name);
                $("#order-status2").text(row.status);
                $("#order-status2").text(row.status_text);
                $("#client_name").text(row.client);
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

                $("#contents").val(row.contents);
                $("#note_added").val(row.note_added);
                $("#is_copay_payed").val(row.is_copay_payed).trigger('change');

                if (row.delivery_methods_type == 'nosign') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>SIGNATURE OPTIONAL</b><br>Driver will attempt face-to-face delivery. If nobody is home, driver will leave the package by the door and take a picture.</span>'
                    )
                }

                if (row.delivery_methods_type == 'idrequired') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE ID & SIGNATURE REQUIRED</b><br>Prescription will be delivered to the assigned patient only. Both ID and signature are required by the recipient, and the ID must match the patient’s name. Driver will take a picture of the patient`s ID and the door upon delivery.</span>'
                    )
                }
                if (row.delivery_methods_type == 'face2face') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE SIGNATURE REQUIRED</b><br>Signature is required by any person who lives with the patient. Driver will take a picture of the patient`s door.</span>'
                    )
                }

                if (row.delivery_methods_type == 'inperson') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE NO SIGNATURE REQUIRED</b><br>Driver will deliver prescription to any person who lives with the patient, without capturing a signature. Driver will take a picture of the patient`s door.</span>'
                )
                }

                if (row.delivery_methods_type == 'signlink') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>ONLINE SIGNATURE</b><br>Driver will leave the prescription by the door and take a picture, only if patient signs online before the delivery. Without online signature, the delivery method will proceed as `Face-to-Face Signature Required`.</span>'
                        )
                }

                if (row.delivery_methods_type == 'noask') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>NO-CONTACT DELIVERY</b><br>Driver will leave the package by the door and take a picture, without attempting face-to-face delivery.</span>'
                    )
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
                                    '<img class="w-100 h-100"   src="' +
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
                    error: function(error) {

                    }
                });

                setTimeout(function() {
                    window.dispatchEvent(new Event("resize"));
                }, 500);
            },
            'click .orderstatus': function(e, value, row, index) {

                $("#o_id").val(row.id);

                $("#order_status").val(row.status_text).trigger('change');
            }
        };
    </script>
@endsection
