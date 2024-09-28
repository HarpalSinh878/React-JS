@extends('layouts.main')
@section('title')Name @endsection
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-ticket-perforated me-2" viewBox="0 0 16 16">
                                    <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
                                    <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
                                  </svg>
                            </span>Tickets</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item mb-3">
                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="btn btn-theme-color btn-rounded"><i class="bi bi-plus-lg fs-4 me-2"></i>
                                    New</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">
                                <a href="#" class="btn btn-theme-color btn-rounded">
                                    Set Status (0)</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">
                                <a href="#" class="btn btn-theme-color btn-rounded"><i class="bi bi-arrow-repeat fs-4 me-2"></i>
                                    See My Tickets</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">
                                <a href="#" class="btn btn-theme-color btn-rounded"><i class="bi bi-arrow-repeat fs-4 me-2"></i>
                                    See Assigned To Me</a>
                            </li>
                            <li class="nav-item ms-lg-3">
                                <a href="#" class="btn btn-theme-color btn-rounded"><i class="bi bi-arrow-repeat fs-4 me-2"></i>
                                    See All Tickets</a>
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
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary active fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle"
                                    href="#all" aria-selected="false" role="tab">All
                                    (3517)</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle"
                                    href="#brooklyn" aria-selected="true" role="tab"
                                    tabindex="-1">Open (2)</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle"
                                    href="#brooklyn" aria-selected="true" role="tab"
                                    tabindex="-1">Assigned (10)</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab"
                                    id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                    aria-selected="true" role="tab" tabindex="-1">In
                                    Progress (2)</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab"
                                    id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                    aria-selected="true" role="tab"
                                    tabindex="-1">Ready To Resolve (0)</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab"
                                    id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                    aria-selected="true" role="tab"
                                    tabindex="-1">Resolved (3473)</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab"
                                    id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                    aria-selected="true" role="tab" tabindex="-1">On
                                    Hold (2)</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                    data-bs-toggle="tab"
                                    id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                    aria-selected="true" role="tab"
                                    tabindex="-1">Rejected (11)</a>
                            </li>
                        </ul>
                    </div>
                    <!--begin::Tab content-->
                    <div class="row d-flex align-items-center">
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade active show" id="all"
                                role="tabpanel">
                                <!--begin::Statistics-->
                                <div class="mb-5">
                                    <div class="table-responsive">
                                        <table class="table-light table-striped table-responsive"
                                        aria-describedby="mydesc"

                                        class='table-striped' id="table_list"
                                        data-toggle="table" data-url=""
                                        data-click-to-select="false"
                                        data-side-pagination="local"
                                        data-pagination="true"
                                        data-page-list="[5, 10, 20, 50, 100, 200,All]"
                                        data-search="true" data-toolbar="#toolbar"
                                        data-show-columns="false"
                                        data-show-refresh="false"
                                        data-fixed-columns="false"
                                        data-fixed-number="1"
                                        data-fixed-right-number="1"
                                        data-trim-on-search="false"
                                        data-mobile-responsive="true"
                                        data-sort-name="id" data-sort-order="desc"
                                        data-pagination-successively-size="3"


                                        data-query-params="queryParams">
                                        <thead>
                                            <tr>
                                                <th scope="col" data-field="id" data-sortable="true">UID</th>
                                                <th scope="col" data-field="description" data-sortable="false">Description</th>
                                                <th scope="col" data-field="priority" data-sortable="false">Priority</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>test</td>
                                                    <td>test</td>
                                                </tr>
                                        </tbody>
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
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-3">
                            <!--begin::List Widget 9-->
                            <div class="card card-xl-stretch mb-5 mt-5 mb-xl-8 box-shadow-custom">
                                <!--begin::Header-->
                                <div class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
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
                                <div class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
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
                                <div class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
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
                                <div class="card-header justify-content-lg-start align-items-center border-0 mt-4 min-h-50px">
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
    <!--begin model-->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tickets</h3>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="#" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group row mb-6">
                        <div class="form-floating">
                            <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Describe Your issue And What Needs To Be Resolved Through This Ticket.</label>
                            <span class="text-dark">Description of Issue</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <select class="form-select" name="priority">
                                <option></option>
                                <option value="Moderate" style="background-color: yellow;" data-color="yellow">Moderate</option>
                                <option value="Low" style="background-color: rgb(168, 214, 149);" selected>Low</option>
                                <option value="Normal" style="background-color: rgb(240, 173, 78);">Normal</option>
                                <option value="High" style="background-color: rgb(255, 0, 0);">High</option>
                                <option value="Emergency" style="background-color: rgb(204, 0, 51);">Emergency</option>
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
                                    <option value="complaint,driver late">driver late</option>
                                    <option value="complaint,unfriendy driver">unfriendy driver</option>
                                    <option value="complaint,delivered to wrong place">delivered to wrong place</option>
                                    <option value="complaint,other">other</option>
                                </optgroup>
                                <optgroup label="attention">
                                    <option value="attention,address cahnged">address cahnged</option>
                                    <option value="attention,patient requested new time">patient requested new time</option>
                                    <option value="attention,other">other</option>
                                </optgroup>
                            </select>
                            <span class="text-dark">Type</span>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Order Id">
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
@endsection
