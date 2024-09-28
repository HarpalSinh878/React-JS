<template>
    <!--begin::Col-->
    <div class="col-xxl-10 mb-5 mb-xl-10 ms-n7">
        <!--begin::Chart widget 8-->
        <div class="card card-flush h-xl-100">
            <!--begin::Header-->
            <div class="card-header pt-4 pb-2">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark text-uppercase h4">Route</span>

                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">



                    <ul class="nav">

                        <li class="nav-item ms-lg-3 mb-3">
                            <!-- <span class="text-sm text-uppercase col-6">route Optimize</span>


                            <select class="form-select form-select-solid col-6" data-control="select2">
                                <option selected>All Stops</option>
                            </select> -->
                            <div class="d-flex flex-stack flex-wrap gap-4">
                                <!--begin::Route Optimize-->
                                <div class="d-flex align-items-center fw-bold">
                                    <!--begin::Label-->
                                    <div class="fs-7 me-2 w-100">Route Optimize</div>
                                    <!--end::Label-->

                                    <!--begin::Select-->
                                    <select class="form-select form-select-solid col-6" data-control="select2">
                                        <option selected>All Stops</option>
                                    </select>
                                    <!--end::Select-->
                                </div>
                                <!--end::Route Optimize-->


                            </div>



                        </li>
                        <li class="nav-item ms-lg-3 mb-3 me-5">
                            <div class="form-check form-check-custom form-check-solid ms-1 mt-4 form-check-sm col-auto">
                                <input class="form-check-input me-3" checked type="checkbox"><label
                                    class="form-check-label">
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
                            <button class="btn btn-primary dropdown-toggle"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Route Optimize
                                </button>
                                <ul class="dropdown-menu" style="width: 158px;">
                                    <li><a class="dropdown-item" href="#">
                                        <button class="btn btn-danger w-100"><i class="bi bi-x"></i>Delete</button>
                                    </a></li>
                                    <li><a class="dropdown-item" href="#">
                                        <button class="btn btn-primary w-100"><i class="bi bi-plus"></i>Stop</button>
                                    </a></li>
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
                            <!--begin::Statistics-->
                            
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
</template>
