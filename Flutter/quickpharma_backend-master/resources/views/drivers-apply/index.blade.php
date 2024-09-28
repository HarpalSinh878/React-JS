@extends('layouts.main')
@section('title')
    Drivers Apply
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
                            </span>Drivers Apply</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->

                    {{-- <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item mb-3"> <a id="btn_unban" class="btn btn-theme-color btn-rounded"><i class="bi bi-slash-circle fs-4 me-2"></i> Set UnBan</a> </li>
                            <li class="nav-item ms-lg-3 mb-3"> <a id="btn_ban" class="btn btn-theme-color btn-rounded"><i class="bi bi-slash-circle fs-4 me-2"></i> Set Ban (<span id="set_ban">0</span>)</a> </li>
                            <li data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="nav-item ms-lg-3 mb-3"> <a class="btn btn-theme-color btn-rounded" data-bs-toggle="modal" data-bs-target="#addDriverModal"> <i class="bi bi-plus-lg fs-4 me-2"></i> Add Driver</a> </li>
                        </ul>
                    </div> --}}

                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">
                    {{-- <div class="row d-flex align-items-center" id="toolbar">
                        <div class="col-sm-12">
                            <button class="btn btn-theme-color mb-2 filter-btn" value="all"><i class="bi bi-files fs-4 me-2"></i> All(<span id="all">0</span>)</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="open"><i class="bi bi-archive fs-4 me-2"></i> Open(<span id="open">0</span>)</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="banned"><i class="bi bi-slash-circle fs-4 me-2"></i> Banned(<span id="banned">0</span>)</button>
                        </div>
                    </div> --}}
                    <div class="row d-flex align-items-center">
                        <div class="table-responsive">
                            <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive" aria-describedby="mydesc"
                                data-url="{{ url('drivers-apply-list') }}" class='table-striped' id="table_list" data-toggle="table"
                                data-url="" data-click-to-select="false" data-side-pagination="server"
                                data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true"
                                data-toolbar="#toolbar" data-show-columns="false" data-search-align="right"
                                data-show-refresh="false" data-fixed-columns="false" data-fixed-number="1"
                                data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true"
                                data-sort-name="id" data-sort-order="desc" data-pagination-successively-size="3"
                                data-query-params="queryParams">
                                <thead>
                                    <tr>
                                        <th data-checkbox="true"></th>
                                        <th scope="col" data-field="id" data-visible="false" data-sortable="true">ID</th>
                                        <th scope="col" data-field="uid" data-sortable="false">UID</th>
                                        {{-- <th scope="col" data-field="avatar" data-sortable="false">Avatar</th> --}}
                                        <th scope="col" data-field="created_at" data-sortable="true">Registered</th>
                                        <th scope="col" data-field="name" data-sortable="true">Name</th>
                                        <th scope="col" data-field="phone" data-sortable="true">Phone</th>
                                        <th scope="col" data-field="email" data-sortable="true">Email</th>
                                        <th scope="col" data-field="username" data-sortable="true">Username</th>
                                        {{-- <th scope="col" data-field="address" data-sortable="true">Address </th> --}}
                                        <th scope="col" data-field="status" data-sortable="false">Active Status</th>
                                        <th scope="col" data-field="operate" data-sortable="false" data-events="actionEvents">Action</th>
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // getUserStatistics();
        });
    </script>

    <script>
        var status = 'all';
        // $(document).on('click', '.filter-btn', function() {
        //     status = $(this).val();
        //     getUserStatistics();
        // });
        function queryParams(p) {
            return {
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                limit: p.limit,
                search: p.search,
                status: status
            };
        }
    </script>
    {{-- <script>
        window.actionEvents = {
            'click .edit': function(e, value, row, index) {
                $("#edit_id").val(row.id);
                $("#edit_name").val(row.name);
                $("#edit_phone").val(row.phone);
                $("#edit_address").val(row.address);
                $("#edit_email").val(row.email);
                $("#edit_username").val(row.username);
            },
            'click .resetpassword': function(e, value, row, index) {
                $("#pass_edit_id").val(row.id);
            }
        };
    </script> --}}

    <script>
        function changestatus(id,status) {
            $.ajax({
                url: "{{ route('drivers-apply.status') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "id": id,
                    "status": status,
                },
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        toastr.success(response.message);
                        // getUserStatistics();
                        $('#table_list').bootstrapTable('refresh');
                    }
                },
                error: function(error) {
                    toastr.error("Something Went Wrong..!");
                }
            });
        }
    </script>
@endsection
