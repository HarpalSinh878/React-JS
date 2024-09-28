@extends('layouts.main')
@section('title')Feedbacks @endsection
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-lock me-2" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"></path>
                                  </svg>
                            </span>Feedbacks</span>
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
                    <div class="card-toolbar">
                        <ul class="nav mb-3" id="kt_chart_widget_8_tabs" role="tablist">
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary active fw-bold px-4 me-4 btn-light-primary btn-rounded filter-btn"
                                    data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle"
                                    href="#all" aria-selected="false"
                                    role="tab">Overall</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 btn-light-danger btn-rounded filter-btn">Drivers Feedback</a>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 btn btn-light-success btn-rounded filter-btn">Dispatchers Feedback</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn btn-sm btn-color-black btn-active btn-active-primary fw-bold px-4 me-4 bg-secondary btn-rounded filter-btn">Pharmacy Feedback</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row mt-5 border-bottom">
                        <div class="col-lg-12">
                            <div class="card-title flex-column ">
                                <h3 class="fw-bold mb-5">FILTERS</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center" id="toolbar">
                        <div class="col-lg-5">
                           
                            <input class="form-control flatpickr-input mt-5" type="date" value="{{ date('Y-m-d', strtotime("-7 day")) }}" name="from_date">
                            <small>Feedback Was Created After</small>
                        </div>
                        <div class="col-lg-5">
                           
                            <input class="form-control flatpickr-input mt-5" type="date" value="{{ date('Y-m-d') }}" name="to_date">

                            <small>Feedback Was Created  Before</small>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-outline btn-outline-success  btn-active-light-success">Apply</a>
                            <small></small>
                        </div>
                    </div>

                    @php
                        $startDate = new \DateTime(date('m/d', strtotime("-7 day")));
                        $endDate = new \DateTime(date('m/d'));
                    @endphp     
                    <!--begin::Tab content-->
                    <div class="row mt-5 d-flex align-items-center">
                        <div class="tab-content mt-5">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade active show" id="all"
                                role="tabpanel">
                                <!--begin::Statistics-->
                                <div class="mb-5">
                                    <div class="table-responsive">
                                        <table class="table-light table-striped table-responsive"table-striped table-responsive" aria-describedby="mydesc" class='table-striped' id="table_list"
                                            data-toggle="table" data-click-to-select="true"
                                            data-side-pagination="server" data-pagination="true"
                                            data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar"
                                            data-show-columns="false" data-show-refresh="false" data-fixed-columns="true"
                                            data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false"
                                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                            data-pagination-successively-size="3" data-query-params="queryParams">
                                            <thead>
                                                <tr class="table-warning">
                                                    <th scope="col"  data-field="id" data-sortable="false">Title</th>

                                                    @for ($date = $startDate; $date <= $endDate; $date->modify('+1 day'))
                                                        <th scope="col" data-field="image" data-sortable="false">{{ $date->format('m/d') }}</th>
                                                    @endfor
                                                   
                                                    <th scope="col" data-field="total" data-sortable="false">Total</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $startDate2 = new \DateTime(date('m/d', strtotime("-7 day")));
                                                $endDate2 = new \DateTime(date('m/d'));
                                            @endphp
                                            <tbody>
                                                <tr class="table-danger">
                                                    <td>Overall Rating Daily</td>
                                                    @for ($date = $startDate2; $date <= $endDate2; $date->modify('+1 day'))
                                                        <td></td>
                                                    @endfor
                                                    <td>0.00</td>
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

                </div>
                <!--end::Body-->
            </div>
            <!--end::Chart widget 8-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
@endsection


@section('script')
    <script>
        $('.filter-btn').on('click', function() {
           
            $(".filter-btn").removeClass('active');
            $(this).addClass('active');
            $('#table_list').bootstrapTable('refresh');
        });
    </script>
@endsection