@extends('layouts.main')
@section('title')
    Users
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
                            </span>User</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item mb-3">
                                <a id="btn_unban" class="btn btn-theme-color btn-rounded"><i
                                        class="bi bi-slash-circle fs-4 me-2"></i>
                                    Set UnBan</a>
                            </li>
                            <li class="nav-item ms-lg-3 mb-3">
                                <a id="btn_ban" class="btn btn-theme-color btn-rounded"><i
                                        class="bi bi-slash-circle fs-4 me-2"></i>
                                    Set Ban (<span id="set_ban">0</span>)</a>
                            </li>
                            <li data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="nav-item ms-lg-3 mb-3">
                                <a class="btn btn-theme-color btn-rounded" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">
                                    <i class="bi bi-plus-lg fs-4 me-2"></i>
                                    Add User</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body border-top pt-6">
                    <div class="row d-flex align-items-center" id="toolbar">
                        <div class="col-sm-12">
                            <button class="btn btn-theme-color mb-2 filter-btn" value="all"><i
                                    class="bi bi-files fs-4 me-2"></i> All(<span id="all">0</span>)</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="open"><i
                                    class="bi bi-archive fs-4 me-2"></i> Open(<span id="open">0</span>)</button>
                            <button class="btn btn-theme-color mb-2 filter-btn" value="banned"><i
                                    class="bi bi-slash-circle fs-4 me-2"></i> Banned(<span id="banned">0</span>)</button>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="table-responsive">
                            {{-- <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive" aria-describedby="mydesc"
                                data-url="{{ url('userList') }}" class='table-striped' id="table_list" data-toggle="table"
                                 data-click-to-select="false" data-side-pagination="server"
                                data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                data-toolbar="#toolbar" data-show-columns="false" data-search-align="right"
                                data-show-refresh="false" data-fixed-columns="false" data-fixed-number="1"
                                data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true"
                                data-sort-name="id" data-sort-order="desc" data-pagination-successively-size="3"
                                data-query-params="queryParams"> --}}

                                <table class="table-light table-striped table-responsive" aria-describedby="mydesc" class='table-striped' id="table_list"
                                data-toggle="table" data-url="{{ url('userList') }}" data-click-to-select="true"
                                data-side-pagination="server" data-pagination="true"
                                data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true" data-search-align="right" data-toolbar="#toolbar"
                                data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                                data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false"
                                data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                data-pagination-successively-size="3" data-query-params="queryParams">
                                <thead>
                                    <tr>
                                        <th data-checkbox="true"></th>
                                        <th scope="col" data-field="id" data-visible="false" data-sortable="true">ID</th>
                                        <th scope="col" data-field="uid" data-sortable="false">UID</th>
                                        <th scope="col" data-field="created_at" data-sortable="true">
                                            Registered</th>
                                        <th scope="col" data-field="name" data-sortable="true">Name</th>
                                        <th scope="col" data-field="phone" data-sortable="true">Phone</th>
                                        <th scope="col" data-field="email" data-sortable="true">Email
                                            (Username)</th>
                                        <th scope="col" data-field="address" data-sortable="true">Address
                                        </th>
                                        <th scope="col" data-field="status" data-sortable="false">Active
                                            Status</th>
                                        <th scope="col" data-field="operate" data-sortable="false"
                                            data-events="actionEvents">Action</th>
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

    <!--START:: addUserModel-->
    <div class="modal fade" tabindex="-1" id="addUserModal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="addForm" action="{{ route('user.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">Full Name</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">E-mail Address</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid" required
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">Phone</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <input type="text" name="phone"
                                            class="form-control form-control-lg form-control-solid" placeholder="Phone" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center">Address</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <textarea class="form-control" name="address" rows="2" data-kt-autosize="false" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">Password</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8" data-kt-password-meter="true">
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid "
                                                type="password" placeholder="Password" name="password" id="password"
                                                required autocomplete="off" />
                                            <!--begin::Visibility toggle-->
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>

                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                            <!--end::Visibility toggle-->
                                        </div>
                                        <!--begin::Highlight meter-->
                                        <div class="d-flex align-items-center mb-3"
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                        <!--end::Highlight meter-->

                                        <!--begin::Hint-->
                                        <div class="text-muted">
                                            <small>Use 8 or more characters with a mix of letters, numbers &
                                                symbols.</small>
                                        </div>
                                        <!--end::Hint-->
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">Conform Password</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8" data-kt-password-meter="true">
                                        <div class="position-relative mb-3">
                                            <input class="form-control form-control-lg form-control-solid" required
                                                type="password" placeholder="Conform Password" name="conform_password"
                                                id="conform_password" autocomplete="off" />
                                            <!--begin::Visibility toggle-->
                                            <span
                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>

                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                            <!--end::Visibility toggle-->
                                        </div>
                                        <!--begin::Highlight meter-->
                                        <div class="d-flex align-items-center mb-3"
                                            data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                            </div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                        <!--end::Highlight meter-->
                                        <!--begin::Hint-->
                                        <div class="text-muted">
                                            <small>Use 8 or more characters with a mix of letters, numbers &
                                                symbols.</small>
                                        </div>
                                        <!--end::Hint-->

                                        <span class="error text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                @php $actions = ['read'];  @endphp

                                <div class="table-responsive">
                                    <table id="table" class="table permission-table" aria-describedby="mydesc">
                                        <tr>
                                            <th scope="col" style="width: 300px;">Module/Permissions</th>
                                            @foreach ($actions as $row)
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <label class="checkbox">
                                                            <input
                                                                class="form-check-input custom-checkbox modal-checkbox check-head"
                                                                data-val="{{ strtolower($row) }}" type="checkbox" checked>
                                                            <span></span>{{ ucfirst($row) }}
                                                        </label>
                                                    </div>
                                                </th>
                                            @endforeach

                                        </tr>
                                        <tbody>

                                            @foreach ($system_modules as $key => $value)
                                                <tr>
                                                    <td>{{ ucwords(str_replace('_', ' ', $key)) }}</td>

                                                    @for ($i = 0; $i < count($actions); $i++)
                                                        @php $index = array_search($actions[$i], $value);  @endphp

                                                        @if ($index !== false)
                                                            <td>
                                                                <div class="form-check">
                                                                    <input name="{{ 'permissions[' . $key . '][create]' }}"
                                                                        value="on" type="hidden">
                                                                    <input name="{{ 'permissions[' . $key . '][update]' }}"
                                                                        value="on" type="hidden">
                                                                    <input name="{{ 'permissions[' . $key . '][delete]' }}"
                                                                        value="on" type="hidden">
                                                                    <input
                                                                        class="form-check-input custom-checkbox modal-checkbox {{ $value[$index] }}"
                                                                        name="{{ 'permissions[' . $key . '][' . $value[$index] . ']' }}"
                                                                        id="switch{{ $index }}" type="checkbox">

                                                                </div>
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endfor

                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
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
    <!--END:: addUserModel-->


    <!--START:: editUserModel-->

    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="addForm" action="{{ route('update.users') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">Full Name</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <input type="text" name="name" id="edit_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">E-mail Address</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <input type="email" name="email" id="edit_email"
                                            class="form-control form-control-lg form-control-solid" required
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center required">Phone</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <input type="text" name="phone" id="edit_phone"
                                            class="form-control form-control-lg form-control-solid" placeholder="Phone" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label text-center">Address</label>
                                    <!--end::Label-->
                                    <div class="col-lg-8">
                                        <textarea class="form-control" name="address"  id="edit_address" rows="2" data-kt-autosize="false" placeholder="Address"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-8">
                                @php $actions = ['read'];  @endphp

                                <div class="table-responsive">
                                    <table id="table" class="table permission-table" aria-describedby="mydesc">
                                        <tr>
                                            <th scope="col" style="width: 300px;">Module/Permissions</th>
                                            @foreach ($actions as $row)
                                                <th scope="col">
                                                    <div class="form-check">
                                                        <label class="checkbox">
                                                            <input
                                                                class="form-check-input custom-checkbox modal-checkbox check-head"
                                                                data-val="{{ strtolower($row) }}" type="checkbox">
                                                            <span></span>{{ ucfirst($row) }}
                                                        </label>
                                                    </div>
                                                </th>
                                            @endforeach

                                        </tr>
                                        <tbody>

                                            @foreach ($system_modules as $key => $value)
                                                <tr>
                                                    <td>{{ ucwords(str_replace('_', ' ', $key)) }}</td>

                                                    @for ($i = 0; $i < count($actions); $i++)
                                                        @php $index = array_search($actions[$i], $value);  @endphp

                                                        @if ($index !== false)
                                                            <td>
                                                                <div class="form-check">
                                                                    <input name="{{ 'permissions[' . $key . '][create]' }}"
                                                                        value="on" type="hidden">
                                                                    <input name="{{ 'permissions[' . $key . '][update]' }}"
                                                                        value="on" type="hidden">
                                                                    <input name="{{ 'permissions[' . $key . '][delete]' }}"
                                                                        value="on" type="hidden">
                                                                    <input
                                                                        class="form-check-input custom-checkbox modal-checkbox {{ $value[$index] }}"
                                                                        name="{{ 'permissions[' . $key . '][' . $value[$index] . ']' }}"
                                                                        id="switch{{ $index }}" type="checkbox">

                                                                </div>
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    @endfor

                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>


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

    <!--END:: editUserModel-->



    <!--START:: resetPasswordModel-->
    <div class="modal fade" tabindex="-1" id="resetPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Reset Password</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-1"></span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </div>
                    <!--end::Close-->
                </div>
                <form id="ResetPasswordForm" action="{{ route('reset-user-password') }}" method="POST"
                    autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="edit_id" id="pass_edit_id">
                        <div class="form-group row mb-3">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label text-center required">Password</label>
                            <!--end::Label-->
                            <div class="col-lg-8" data-kt-password-meter="true">
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid " type="password"
                                        placeholder="Password" name="password" id="reset_password" required
                                        autocomplete="off" />
                                    <!--begin::Visibility toggle-->
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>

                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <!--end::Visibility toggle-->
                                </div>
                                <!--begin::Highlight meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Highlight meter-->

                                <!--begin::Hint-->
                                <div class="text-muted">
                                    <small>Use 8 or more characters with a mix of letters, numbers & symbols.</small>
                                </div>
                                <!--end::Hint-->
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label text-center required">Conform Password</label>
                            <!--end::Label-->
                            <div class="col-lg-8" data-kt-password-meter="true">
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" required
                                        type="password" placeholder="Conform Password" name="conform_password"
                                        id="reset_conform_password" autocomplete="off" />
                                    <!--begin::Visibility toggle-->
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>

                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <!--end::Visibility toggle-->
                                </div>
                                <!--begin::Highlight meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Highlight meter-->
                                <!--begin::Hint-->
                                <div class="text-muted">
                                    <small>Use 8 or more characters with a mix of letters, numbers & symbols.</small>
                                </div>
                                <!--end::Hint-->

                                <span class="error-reset text-danger"></span>
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
    <!--END:: resetPasswordModel-->
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            getUserStatistics();
        });
        //on keypress
        $('#conform_password').keyup(function(e) {
            //get values
            var pass = $('#password').val();
            var confpass = $(this).val();
            //check the strings
            if (pass == confpass) {
                //if both are same remove the error and allow to submit
                $('.error').text('');
                allowsubmit = true;
            } else {
                //if not matching show error and not allow to submit
                $('.error').text('Password not Matching');
                allowsubmit = false;
            }
        });
        //jquery form submit
        $('#addForm').submit(function() {

            var pass = $('#password').val();
            var confpass = $('#conform_password').val();

            //just to make sure once again during submit
            //if both are true then only allow submit
            if (pass == confpass) {
                allowsubmit = true;
            }
            if (allowsubmit) {
                return true;
            } else {
                return false;
            }
        });




        $('#reset_conform_password').keyup(function(e) {
            //get values
            var pass = $('#reset_password').val();
            var confpass = $(this).val();
            //check the strings
            if (pass == confpass) {
                //if both are same remove the error and allow to submit
                $('.error-reset').text('');
                allowsubmit = true;
            } else {
                //if not matching show error and not allow to submit
                $('.error-reset').text('Password not Matching');
                allowsubmit = false;
            }
        });
        //jquery form submit
        $('#ResetPasswordForm').submit(function() {

            var pass = $('#reset_password').val();
            var confpass = $('#reset_conform_password').val();

            //just to make sure once again during submit
            //if both are true then only allow submit
            if (pass == confpass) {
                allowsubmit = true;
            }
            if (allowsubmit) {
                return true;
            } else {
                return false;
            }
        });
    </script>

    <script>
        var status = 'all';
        $(document).on('click', '.filter-btn', function() {
            status = $(this).val();
            getUserStatistics();
        });

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
    <script>
        window.actionEvents = {
            'click .edit': function(e, value, row, index) {

                $("#edit_id").val(row.id);
                $("#edit_name").val(row.name);
                $("#edit_phone").val(row.phone);
                $("#edit_address").val(row.address);
                $("#edit_email").val(row.email);

                if(row.permission != ''){
                    var permissions =  atob(row.permission);
                    var myArray = JSON.parse(permissions);
                    $.each(myArray, function (i, item) {
                        $.each(item, function (j, field) {
                            $("[name='permissions[" + i + "][" + j + "]']").each(function () {
                                $(this).prop("checked", true);
                            });
                        });
                    });
                }
            },
            'click .resetpassword': function(e, value, row, index) {
                $("#pass_edit_id").val(row.id);

            }
        };
    </script>

    <script>
        function disable(id) {
            $.ajax({
                url: "{{ route('user.status') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "id": id,
                    "status": 0,
                },
                cache: false,
                success: function(result) {

                    if (result.error == false) {
                        toastr.success('User Deactive successfully');
                        getUserStatistics();
                    }


                },
                error: function(error) {

                }
            });
        }

        function active(id) {
            $.ajax({
                url: "{{ route('user.status') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "id": id,
                    "status": 1,
                },
                cache: false,
                success: function(result) {

                    if (result.error == false) {

                        toastr.success('User Active successfully');
                        getUserStatistics();
                    }
                },
                error: function(error) {

                }
            });
        }
    </script>

    <script>
        function getUserStatistics() {
            $.ajax({
                url: "{{ route('user.statistics') }}",
                type: "GET",
                success: function(result) {

                    if (result.error == false) {
                        $("#all").text(result.all);
                        $("#open").text(result.open);
                        $("#banned").text(result.banned);
                        $('#table_list').bootstrapTable('refresh');
                    }
                },
                error: function(error) {

                }
            });
        }

        var checkedRows = [];


        $('#table_list').on('check-all.bs.table', function(e, row) {
            $("#set_ban").text(row.length);
            $.each(row, function(index, value) {
                checkedRows.push({
                    id: value.id
                });
            });

        })

        $('#table_list').on('uncheck-all.bs.table', function(e, row) {
            $("#set_ban").text(row.length);

            checkedRows.length = 0
        })


        $('#table_list').on('check.bs.table', function(e, row) {
            checkedRows.push({
                id: row.id
            });
            $("#set_ban").text(checkedRows.length);
        });

        $('#table_list').on('uncheck.bs.table', function(e, row) {
            $.each(checkedRows, function(index, value) {
                if (value.id === row.id) {
                    checkedRows.splice(index, 1);
                }
            });
            $("#set_ban").text(checkedRows.length);
        });

        $(document).on('click', '#btn_unban', function() {


            if (checkedRows.length > 0) {
                $.ajax({
                    url: "{{ route('user.multistatus') }}",
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        "ids": checkedRows,
                        "status": 1,
                    },
                    cache: false,
                    success: function(result) {

                        if (result.error == false) {

                            toastr.success('All User Un-Ban successfully');
                            getUserStatistics();
                            checkedRows.splice(0, checkedRows.length);
                            $("#set_ban").text(checkedRows.length);
                        }
                    },
                    error: function(error) {

                    }
                });
            }
        });

        $(document).on('click', '#btn_ban', function() {
            if (checkedRows.length > 0) {
                $.ajax({
                    url: "{{ route('user.multistatus') }}",
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        "ids": checkedRows,
                        "status": 0,
                    },
                    cache: false,
                    success: function(result) {

                        if (result.error == false) {

                            toastr.success('All User Ban successfully');
                            getUserStatistics();
                            checkedRows.splice(0, checkedRows.length);
                            $("#set_ban").text(checkedRows.length);
                        }
                    },
                    error: function(error) {

                    }
                });
            }
        });
    </script>

    <script>
        $(".check-head").change(function() {
            var value = $(this).data('val');
            this.checked ? $('.' + value).prop('checked', true) : $('.' + value).prop('checked', false);
        });
    </script>
@endsection
