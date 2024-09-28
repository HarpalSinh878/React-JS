@extends('layouts.main')
@section('title')
    Order Types
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
                                    class="bi bi-person me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                            </span>Order Types</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="nav-item ms-lg-3 mb-3">
                                <a class="btn btn-theme-color btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#addModal"><i class="bi bi-plus-lg fs-4 me-2"></i>Add</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">

                    <div class="row d-flex align-items-center">
                        <div class="table-responsive">
                            <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive"table-striped table-responsive" aria-describedby="mydesc"
                                data-url="{{ url('orderTypeList') }}" class='table-striped' id="table_list"
                                data-toggle="table" data-url="" data-click-to-select="false"
                                data-side-pagination="server" data-pagination="true"
                                data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-toolbar="#toolbar"
                                data-show-columns="false" data-search-align="right" data-show-refresh="false"
                                data-fixed-columns="false" data-fixed-number="1" data-fixed-right-number="1"
                                data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                data-sort-order="desc" data-pagination-successively-size="3"
                                data-query-params="queryParams">
                                <thead>
                                    <tr>
                                        <th scope="col" data-field="action" data-sortable="false"
                                            data-events="actionEvents">Action</th>
                                        <th scope="col" data-field="id" data-visible="true" data-sortable="true">UID</th>
                                        <th scope="col" data-field="order_type" data-sortable="true">Order Type</th>
                                        <th scope="col" data-field="user_type" data-sortable="true">User Type</th>
                                        <th scope="col" data-field="isActive" data-sortable="true">Is Active</th>
                                    </tr>
                                </thead>
                            </table>

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

    <!--START:: addModel-->
    <div class="modal fade" tabindex="-1" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Add</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
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
                <form id="addForm" action="{{ route('order-type.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-12 col-form-label text-center">Order Type Label</label>
                                    <!--end::Label-->
                                    <div class="col-lg-12">
                                        <input type="text" name="order_type"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Order Type Label" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-theme-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--END:: addModel-->


    <!--START:: editModel-->
    <div class="modal fade" tabindex="-1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="addForm" action="{{ route('update.ordertype') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="modal-body">
                        <div class="form-group row mb-3">
                            <!--begin::Label-->
                            <label class="col-lg-12 col-form-label text-center">Order Type Label</label>
                            <!--end::Label-->
                            <div class="col-lg-12">
                                <input type="text" name="order_type" id="edit_order_type"
                                    class="form-control form-control-lg form-control-solid"
                                    placeholder="Order Type Label" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <!--begin::Label-->
                            <label class="col-lg-12 col-form-label text-center">Is Active</label>
                            <!--end::Label-->
                            <div class="col-lg-12 text-center form-group">
                                <div class="control-label col-form-label form-check form-check-inline mb-2">
                                    <input class="form-check-input" id="isactive" required="" name="isActive"
                                        type="radio" value="Yes">
                                    <label for="isactive" class="form-check-label text-dark">Yes</label>
                                </div>
                                <div class="control-label col-form-label form-check form-check-inline mb-2">
                                    <input class="form-check-input" id="isactive" required="" name="isActive"
                                        type="radio" value="No">
                                    <label for="isactive" class="form-check-label text-dark">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <!--begin::Label-->
                            <label class="col-lg-12 col-form-label text-center">Order Type Is Visible To</label>
                            <!--end::Label-->
                            <div class="col-lg-12">
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-close-on-select="false" data-placeholder="Select an option"
                                    data-allow-clear="true" multiple="multiple">
                                    <option></option>

                                </select>
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
    <!--END:: editModel-->
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
    </script>
    <script>
        window.actionEvents = {
            'click .edit': function(e, value, row, index) {

                $("#edit_id").val(row.id);
                $("#edit_order_type").val(row.order_type);
                $("input[name=isActive][value='" + row.isActive + "']").prop("checked", true);

            },

        };
    </script>
@endsection
