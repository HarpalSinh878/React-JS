<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>Tech Support</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('include')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
    <!--begin::Theme mode setup on page load-->
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('header')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Sidebar-->
                @include('sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-4">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">

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
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                                            </svg>
                                                        </span>Tech Support</span>
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
                                                <div class="row mt-5 mb-5 d-flex align-items-center">
                                                    <div class="col-lg-1 d-flex flex-column ">
                                                        <label for="" class="form-label">Priority</label>
                                                        <select name="kt_ecommerce_products_table_length"
                                                            aria-controls="kt_ecommerce_products_table"
                                                            class="form-select form-select-sm form-select-solid">
                                                            <option value="10">All</option>
                                                            <option value="25">Low</option>
                                                            <option value="50">Medium</option>
                                                            <option value="100">High</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1 d-flex flex-column ">
                                                        <label for="" class="form-label">Status Filter</label>
                                                        <select name="kt_ecommerce_products_table_length"
                                                            aria-controls="kt_ecommerce_products_table"
                                                            class="form-select form-select-sm form-select-solid">
                                                            <option value="10">All</option>
                                                            <option value="25">Low</option>
                                                            <option value="50">Medium</option>
                                                            <option value="100">High</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 d-flex flex-column ">
                                                        <label for="" class="form-label">Open/Closed Filter</label>
                                                        <select name="kt_ecommerce_products_table_length"
                                                            aria-controls="kt_ecommerce_products_table"
                                                            class="form-select form-select-sm form-select-solid">
                                                            <option value="10">All</option>
                                                            <option value="25">Low</option>
                                                            <option value="50">Medium</option>
                                                            <option value="100">High</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-1 d-flex flex-column mt-5">
                                                        <label for="" class="form-label"></label>
                                                        <select name="kt_ecommerce_products_table_length"
                                                            aria-controls="kt_ecommerce_products_table"
                                                            class="form-select form-select-sm form-select-solid">
                                                            <option value="10">Due Date</option>
                                                            <option value="25">Low</option>
                                                            <option value="50">Medium</option>
                                                            <option value="100">High</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="card-toolbar">
                                                    <ul class="nav mb-3" id="kt_chart_widget_8_tabs" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary active fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle"
                                                                href="#all" aria-selected="false" role="tab"><i
                                                                    class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                All Status(48)</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab" tabindex="-1"><i
                                                                    class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                Pending Estimate (1)</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab"
                                                                tabindex="-1">Estimated</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab" tabindex="-1"><i
                                                                    class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                On Hold (12)</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab" tabindex="-1"><i
                                                                    class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                Ready to Start (27)</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab" tabindex="-1"><i
                                                                    class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                In Progress (1)</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab" tabindex="-1">
                                                                <i class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                In Complete(2)</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded"
                                                                data-bs-toggle="tab"
                                                                id="kt_chart_widget_8_month_toggle" href="#brooklyn"
                                                                aria-selected="true" role="tab" tabindex="-1"><i
                                                                    class="bi bi-chat-square-text-fill fs-4 me-2"></i>
                                                                Staging (1)</a>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <!--begin::Tab content-->
                                                <div class="row mt-5 d-flex align-items-center">
                                                    <div class="col-lg-6 text-left d-flex align-items-center">
                                                        <span class="fs-6 fw-semibold text-gray-400">Showing 1 to 25 of
                                                            3,000 Entries</span>

                                                    </div>
                                                    <div class="col-lg-6 text-right">

                                                        <div
                                                            class="d-flex align-items-center position-relative my-1 float-right">
                                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <input type="text"
                                                                data-kt-ecommerce-order-filter="search"
                                                                class="form-control form-control-solid w-250px ps-14 border-radius-100"
                                                                placeholder="Search">
                                                        </div>

                                                    </div>
                                                    <div class="tab-content mt-5">
                                                        <!--begin::Tab pane-->
                                                        <div class="tab-pane fade active show" id="all"
                                                            role="tabpanel">
                                                            <!--begin::Statistics-->
                                                            <div class="mb-5">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped gy-7 gs-7">
                                                                        <thead>
                                                                            <tr
                                                                                class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                                                                <th>ID</th>
                                                                                <th>Name</th>
                                                                                <th>Assignee</th>
                                                                                <th>Priority</th>
                                                                                <th>Est. Hour</th>
                                                                                <th>Real Hour</th>
                                                                                <th>Attechments</th>
                                                                                <th>Status</th>
                                                                                <th>Sub Status</th>
                                                                                <th>Due</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>Task</td>
                                                                                <td>Accountant</td>
                                                                                <td>Low</td>
                                                                                <td>N/A</td>
                                                                                <td>N/A</td>
                                                                                <td>N/A</td>
                                                                                <td>Closed</td>
                                                                                <td>N/A</td>
                                                                                <td>N/A</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="dataTables_paginate paging_simple_numbers"
                                                                    id="kt_ecommerce_products_table_paginate">
                                                                    <ul class="pagination">
                                                                        {{-- <li class="paginate_button page-item previous disabled"
                                                                            id="kt_ecommerce_products_table_previous"><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="0" tabindex="0"
                                                                                class="page-link"><i
                                                                                    class="previous"></i></a></li> --}}
                                                                        <li class="paginate_button page-item active"><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="1" tabindex="0"
                                                                                class="page-link">1</a></li>
                                                                        {{-- <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="2" tabindex="0"
                                                                                class="page-link">2</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="3" tabindex="0"
                                                                                class="page-link">3</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="4" tabindex="0"
                                                                                class="page-link">4</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="5" tabindex="0"
                                                                                class="page-link">5</a></li>
                                                                        <li class="paginate_button page-item next"
                                                                            id="kt_ecommerce_products_table_next"><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="6" tabindex="0"
                                                                                class="page-link"><i
                                                                                    class="next"></i></a></li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!--end::Statistics-->
                                                        </div>
                                                        <!--end::Tab pane-->
                                                        <!--begin::Tab pane-->
                                                        <div class="tab-pane fade" id="brooklyn" role="tabpanel">
                                                            <!--begin::Statistics-->
                                                            <div class="mb-5">
                                                                <!--begin::Statistics-->
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped gy-7 gs-7">
                                                                        <thead>
                                                                            <tr
                                                                                class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                                                                <th>ID</th>
                                                                                <th>Name</th>
                                                                                <th>Assignee</th>
                                                                                <th>Priority</th>
                                                                                <th>Est. Hour</th>
                                                                                <th>Real Hour</th>
                                                                                <th>Attechments</th>
                                                                                <th>Status</th>
                                                                                <th>Sub Status</th>
                                                                                <th>Due</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td>Task</td>
                                                                                <td>Accountant</td>
                                                                                <td>Low</td>
                                                                                <td>N/A</td>
                                                                                <td>N/A</td>
                                                                                <td>N/A</td>
                                                                                <td>Closed</td>
                                                                                <td>N/A</td>
                                                                                <td>N/A</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="dataTables_paginate paging_simple_numbers"
                                                                    id="kt_ecommerce_products_table_paginate">
                                                                    <ul class="pagination">
                                                                        <li class="paginate_button page-item previous disabled"
                                                                            id="kt_ecommerce_products_table_previous">
                                                                            <a href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="0" tabindex="0"
                                                                                class="page-link"><i
                                                                                    class="previous"></i></a></li>
                                                                        <li class="paginate_button page-item active"><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="1" tabindex="0"
                                                                                class="page-link">1</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="2" tabindex="0"
                                                                                class="page-link">2</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="3" tabindex="0"
                                                                                class="page-link">3</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="4" tabindex="0"
                                                                                class="page-link">4</a></li>
                                                                        <li class="paginate_button page-item "><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="5" tabindex="0"
                                                                                class="page-link">5</a></li>
                                                                        <li class="paginate_button page-item next"
                                                                            id="kt_ecommerce_products_table_next"><a
                                                                                href="#"
                                                                                aria-controls="kt_ecommerce_products_table"
                                                                                data-dt-idx="6" tabindex="0"
                                                                                class="page-link"><i
                                                                                    class="next"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                                <!--end::Description-->
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
                            </div>
                            <!--end::Content container-->


                            <div class="modal fade" tabindex="-1" id="kt_modal_1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Tickets</h3>

                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span class="svg-icon svg-icon-1"></span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                                </svg>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <form action="{{ route('savetickets') }}" method="post">
                                            @csrf

                                            <div class="modal-body">
                                                <div class="form-group row mb-6">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                                                            style="height: 100px"></textarea>
                                                        <label for="floatingTextarea2">Describe Your issue And What
                                                            Needs To Be Resolved Through This Ticket.</label>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-lg-2">
                                                        <label
                                                            class="col-lg-12 col-form-label text-center">Priority</label>
                                                        <select class="form-select form-select-solid" name="priority"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-dropdown-parent="#kt_modal_1">
                                                            <option></option>
                                                            <option value="Low" selected>Low</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Medium">High</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label
                                                            class="col-lg-12 col-form-label text-center">Type</label>
                                                        <select class="form-select form-select-solid" name="type"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-dropdown-parent="#kt_modal_1">
                                                            <option></option>
                                                            <option value="Feedback" selected>Feedback</option>
                                                            <option value="Problem">Problem</option>
                                                            <option value="Complaint">complaint</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label class="col-lg-12 col-form-label text-center">Assign
                                                            To</label>
                                                        <select class="form-select form-select-solid" name="assign_to"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-dropdown-parent="#kt_modal_1">
                                                            <option></option>
                                                            <option value="Demo User 1" selected>Demo User 1</option>
                                                            <option value="Demo User 2">Demo User 2</option>
                                                            <option value="Demo User 3">Demo User 3</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <label class="col-lg-12 col-form-label text-center">Managed
                                                            By</label>
                                                        <select class="form-select form-select-solid"
                                                            name="managed_by" data-control="select2"
                                                            data-placeholder="Select an option"
                                                            data-dropdown-parent="#kt_modal_1">
                                                            <option></option>
                                                            <option value="Test User 1" selected>Test User 1</option>
                                                            <option value="Test User 2">Test User 2</option>
                                                            <option value="Test User 3">Test User 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label class="col-lg-12 col-form-label text-center">Order
                                                            Id</label>
                                                        <select class="form-select form-select-solid" name="order_id"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-dropdown-parent="#kt_modal_1">
                                                            <option></option>
                                                            <option value="123">123</option>
                                                            <option value="85241">85241</option>
                                                            <option value="98745">98745</option>
                                                        </select>

                                                        <span class="text-muted">(optional)</span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>

                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->

                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->


    @include('footer')
</body>
<!--end::Body-->

</html>
