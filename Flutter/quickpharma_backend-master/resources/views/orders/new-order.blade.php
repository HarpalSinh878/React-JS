@extends('layouts.main')
@section('title')
    New Orders
@endsection
@section('page-title')
@endsection
@section('content')
    <div class="row gx-5 gx-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-4 pb-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-boxes me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z">
                                    </path>
                                </svg>
                            </span>New Orders</span>
                        {{-- <span class="text-gray-400 mt-1 fw-semibold fs-6">Users from all channels</span> --}}
                    </h3>
                    <div class="card-toolbar">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="#" class="btn btn-theme-color btn-rounded">
                                    <i class="fas fa-light fa-file-pen fs-4"></i>
                                    Import QS1 DAT</a>
                                {{-- <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#kt_chart_widget_8_week_tab">Month</a> --}}
                            </li>
                            <li class="nav-item ms-lg-3">
                                <a href="#" class="btn btn-theme-color btn-rounded">
                                    <i class="fas fa-light fa-file-pen fs-4"></i>
                                    Import CSV</a>
                                {{-- <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#kt_chart_widget_8_month_tab">Week</a> --}}
                            </li>
                            <li class="nav-item ms-lg-3">
                                <a href="#" class="btn btn-theme-color btn-rounded">
                                    <i class="bi bi-person-plus-fill fs-4"></i>
                                    Give 50, Get 50 Free Orders</a>
                                {{-- <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#kt_chart_widget_8_month_tab">Week</a> --}}
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="card-body border-top pt-6">
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <div class="border-bottom mb-5">
                                    <div class="card-title flex-column ">
                                        <h3 class="fw-bold mb-5">HOW TO CREATE YOUR FRIST
                                            FREE
                                            ORDER?</h3>
                                    </div>
                                </div>
                                <span class="fw-bold fs-6 text-gray-800">IT IS EASY AND
                                    ABSOLITELY FREE!</span>
                                <p>Fallow these few steps All your and your package will be
                                    delivered to your customer as early as next morning.
                                    patients will receive a text massage in regards of when
                                    their packages will be arriving.</p>
                                <ol class="fw-bold fs-6 text-gray-700 text-uppercase">
                                    <li>Fill out the information below</li>
                                    <li> Click on Add/Print button</li>
                                    <li>Print the label</li>
                                    <li>Put the label on the package</li>
                                    <li>Your packages will be picked up at your convenience
                                    </li>
                                    <li>Track the delivery status and ETA on the Orders page
                                    </li>
                                </ol>
                                <p>If you have any quastion just call us
                                    <b>+1 929 343 7070</b>
                                    {{-- <b>987654210!</b> --}}
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom mb-5">
                                    <div class="card-title flex-column">
                                        <h3 class="fw-bold mb-5">ORDER INFORMACTION
                                            (OPTIONAL)</h3>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Special
                                        Instructions</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="special_instructions"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Special Instructions">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div id="kt_docs_repeater_basic">
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_basic">
                                            <div data-repeater-item>
                                                <div class="row mb-5">
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">RX
                                                        Number</label>
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <div class="input-group"> <span class="input-group-text"
                                                                id="rx_number">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-capsule" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control" name="rx_number"
                                                                required placeholder="RX Number" aria-label="Username"
                                                                aria-describedby="rx_number" />
                                                            <a href="javascript:;" data-repeater-delete id="rx_number"
                                                                class="input-group-text btn btn-danger">
                                                                <i class="la la-trash-o"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Date
                                                        Filled</label>
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <span class="svg-icon svg-icon-2x">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                        height="16" fill="currentColor"
                                                                        class="bi bi-calendar4-week" viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                                                        <path
                                                                            d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                                                    </svg>
                                                                </span>
                                                            </span>
                                                            <input type="text" name="date_filled" class="form-control"
                                                                required value="{{ date('Y-m-d') }}"
                                                                placeholder="Date Filled" aria-label="Username"
                                                                aria-describedby="basic-addon1" id="kt_datepicker_1" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-5">
                                        <a href="javascript:;" data-repeater-create
                                            class="btn btn-theme-color btn-rounded">
                                            <i class="bi bi-plus fs-4 me-2"></i>Add Rx
                                            Number
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mt-sm-8">
                            <div class="col-lg-6">
                                @if (Auth::user()->userType == 0 || Auth::user()->userType == 2)
                                    <div class="card-title flex-column border-bottom mb-5">
                                        <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="currentColor" class="bi bi-filter-left"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                            </svg> CLIENT</h3>
                                    </div>
                                    <div class="row mb-5">
                                        <select class="form-select form-select-solid" required name="client"
                                            data-control="select2" id="admin_client_dropdown"
                                            data-placeholder="Select an option" data-allow-clear="true">
                                            <option value="" selected>select Client </option>
                                            @isset($client)
                                                @foreach ($client as $row)
                                                    <option value="{{ $row->id }}" data-email="{{ $row->email }}">
                                                        (#{{ $row->id }})
                                                        {{ $row->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="client" value="{{ Auth::user()->id }}">
                                @endif
                                <div class="card-title flex-column border-bottom mb-5">
                                    <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-filter-left"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                        </svg> RECIPIENT INFORMATION</h3>
                                </div>
                                <div class="row mb-5">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">
                                        Recipient Name</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="recipient_name" required
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Recipient Name">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-light p-5 border-radius-10 mb-5">
                                    <div class="row mb-5">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Recipient
                                            Address</label>
                                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <input type="text" name="recipient_address" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                id="recipient_address" placeholder="Recipient Address">
                                            <input type="hidden" id="hidden_latitude" name="latitude">
                                            <input type="hidden" id="hidden_longitude" name="longitude">
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">City</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <input type="text" name="city" id="city" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                placeholder="City">
                                        </div>
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">ZIP</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <input type="text" name="zip" id="zip" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                placeholder="ZIP">
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">State</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <select id="state" required name="state"
                                                class="form-select form-control form-control-solid border-dark"
                                                data-hide-search="true" data-control="select2"
                                                data-placeholder="Select State">
                                                <option></option>
                                                <option value="NY">NY</option>
                                                <option value="CT">CT</option>
                                                <option value="NJ">NJ</option>
                                                <option value="CA">CA</option>
                                            </select>
                                        </div>
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Apt/Suite/Floor</label>
                                        <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                            <input type="text" name="floor" required
                                                class="form-control form-control-lg form-control-solid border-dark"
                                                placeholder="Apt/Suite/Floor">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Recipient
                                        Cell Phone</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="recipient_cell_phone" required
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Recipient Cell Phone">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div id="recipient_home_phone">
                                    <div class="form-group">
                                        <div data-repeater-list="recipient_home_phone">
                                            <div data-repeater-item>
                                                <div class="form-group row mb-5">
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Recipient
                                                        Home Phone</label>
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <div class="input-group">
                                                            <input type="text" name="recipient_home_phone"
                                                                id="recipient_home_phone_input"
                                                                class="form-control form-control-lg form-control-solid"
                                                                placeholder="Recipient Home Phone"
                                                                aria-describedby="recipient_home_phone"> <a
                                                                href="javascript:;" data-repeater-delete
                                                                class="input-group-text btn btn-danger">
                                                                <i class="la la-trash-o"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <div class="col-lg-12 text-start">
                                            <a class="btn btn-theme-color btn-rounded" data-repeater-create><i
                                                    class="bi bi-plus fs-4 me-2"></i>Add Recipient Home Phone</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-lg-12">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                                name="request_call_upon_arrival" value="No" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexRadioDefault">
                                                Request Call Upon Arrival
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-title flex-column border-bottom mb-5">
                                    <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-filter-left"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                        </svg> PACKAGE DETAILS</h3>
                                </div>
                                <div class="row mb-5">
                                    <label class="col-lg-2 mb-5 col-form-label required fw-semibold fs-6">Weight</label>
                                    <div class="col-lg-10 mb-5 fv-row fv-plugins-icon-container">
                                        {{-- <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <label class="btn btn-theme-color mb-2">
                                                        <input class="bg-transparent" type="radio"
                                                            name="package_weight" value="Small"
                                                            id="flexRadioDefault" />Small (0-3 lbs)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input " type="radio" name="package_weight"
                                                        value="Medium" id="flexRadioDefault" />
                                                    <label class="form-check-label text-dark" for="flexRadioDefault">
                                                        Medium (3-7 lbs)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input " type="radio" name="package_weight"
                                                        value="Large" id="flexRadioDefault" />
                                                    <label class="form-check-label text-dark" for="flexRadioDefault">
                                                        Large (7+ lbs)
                                                    </label>                                                </div>
                                            </div>                                        </div> --}}
                                        <div class="d-flex flex-column fv-row">
                                            <div class="d-flex flex-stack gap-5 mb-3" data-kt-buttons="true">
                                                <button type="button" class="btn btn-theme-color w-100"
                                                    data-kt-docs-advanced-forms="interactive" value="small">Small (0-3
                                                    lbs)</button>
                                                <button type="button" class="btn btn-theme-color w-100 active"
                                                    data-kt-docs-advanced-forms="interactive" value="medium">Medium (3-7
                                                    lbs)</button>
                                                <button type="button" class="btn btn-theme-color w-100"
                                                    data-kt-docs-advanced-forms="interactive" value="large">Large (7+
                                                    lbs)</button>
                                            </div>
                                            <input type="text" class="form-control form-control-solid"
                                                name="package_weight" value="medium" hidden />
                                        </div>
                                    </div>
                                    <label class="col-lg-2 mb-5 col-form-label required fw-semibold fs-6">Items</label>
                                    <div class="col-lg-4 mb-5 fv-row fv-plugins-icon-container">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.39 12.648a1.32 1.32 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1.06 1.06 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.512.512 0 0 0-.523-.516.539.539 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532 0 .312.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531 0 .313.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242l-.515 2.492zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z" />
                                                    </svg>
                                                </span>
                                            </span>
                                            <input type="number" class="form-control" placeholder="1"
                                                aria-label="Username" aria-describedby="basic-addon1" name="package_item"
                                                required>
                                        </div>
                                    </div>
                                    <label class="col-lg-2 mb-5 col-form-label required fw-semibold fs-6">Copay
                                        $</label>
                                    <div class="col-lg-4 mb-5 fv-row fv-plugins-icon-container">
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-currency-dollar"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                                    </svg>
                                                </span>
                                            </span>
                                            <input type="number" class="form-control" placeholder="1"
                                                aria-label="Username" aria-describedby="basic-addon1"
                                                name="package_copay" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 mb-2 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50" type="radio"
                                                name="package_type" value="regular" id="package_type"
                                                checked="checked" />
                                            <label class="form-check-label" for="package_type">
                                                Regular
                                            </label>
                                        </div>
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50" type="radio"
                                                name="package_type" value="Time Window Next Day" id="package_type" />
                                            <label class="form-check-label" for="package_type">
                                                Time Window Next Day
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5 fv-row fv-plugins-icon-container">
                                        <label class="form-label fs-3 fw-bold">Subtypes <i
                                                class="bi bi-chevron-down"></i></label>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox"
                                                id="store-in-fridge" name="package_subtype" type="checkbox"
                                                value="No" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked"> Fridge </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5 store-in-fridge ps-8">
                                        <div
                                            class="form-check ps-lg-5 mb-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50" name="store_in_fridge"
                                                type="radio" value="No" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked"> QuickPharma will
                                                not store the item in the fridge. </label>
                                        </div>
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50" name="store_in_fridge"
                                                type="radio" value="yes" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked"> QuickPharma will
                                                store the item in the fridge. </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox"
                                                name="subtype_confidential" value="No" type="checkbox"
                                                value="1" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Confidential
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                                name="subtype_sensitive" value="No" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Sensitive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                                name="subtype_hazardous" value="No" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Hazardous
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                                name="subtype_controlled" value="No" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Controlled
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-5">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                                name="subtype_woundcare" value="No" id="flexCheckChecked" />
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Wound care patient
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group mb-5"> <label
                                                class="col-lg-12 col-form-label fw-semibold fs-6 required">Date to
                                                Deliver</label>
                                            <input
                                                class="form-control form-control-lg form-control-solid border-dark rounded"
                                                name="date_to_deliver" min="{{ date('Y-m-d') }}" type="date"
                                                placeholder="Date to Deliver" aria-label="Date to Deliver"
                                                aria-describedby="basic-addon2" required />
                                        </div>
                                    </div>
                                    <div class="input-group mb-5">
                                        {{-- <input class="form-control" name="date_to_deliver" required type="date"
                                                        placeholder="Date/Time to Deliver" aria-label="Date/Time to Deliver"
                                                        aria-describedby="basic-addon2" id="kt_datepicker_3" />
                                                    <span class="input-group-text" id="basic-addon2">
                                                        <i class="bi bi-calendar-event"></i>
                                                    </span> --}}
                                        <label class="col-lg-12 col-form-label fw-semibold fs-6 required">Time
                                            To
                                            Deliver</label>
                                        <input class="form-control form-control-lg form-control-solid border-dark rounded"
                                            name="time_to_deliver" type="time" placeholder="Time to Deliver"
                                            aria-label="Time to Deliver" aria-describedby="basic-addon2" required />
                                    </div>
                                    <div id="timewindow_div" style="display: none"> <label
                                            class="col-lg-12 col-form-label fw-semibold fs-6">Time Window Next Day
                                        </label>
                                        <div class="d-flex flex-column fv-row">
                                            <div class="flex-stack mb-3" data-kt-buttons="true">
                                                <button type="button" class="btn btn-theme-color btn-sm "
                                                    data-kt-docs-advanced-forms="timewindow"
                                                    value="9:00am-1:00pm">9:00am-1:00pm</button>
                                                <button type="button" class="btn btn-theme-color btn-sm  active"
                                                    data-kt-docs-advanced-forms="timewindow"
                                                    value="1:00pm-5:00pm">1:00pm-5:00pm</button>
                                                <button type="button" class="btn btn-theme-color btn-sm"
                                                    data-kt-docs-advanced-forms="timewindow"
                                                    value="5:00pm-9:00pm">5:00pm-9:00pm</button>
                                            </div>
                                            <input type="text" class="form-control form-control-solid"
                                                name="time_window_deliveries" hidden />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mt-sm-8">
                            <div class="col-lg-12 border-bottom">
                                <div class="card-title flex-column ">
                                    <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-filter-left"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                        </svg> ORDER INSURANCE(OPTINAL)</h3>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <div
                                    class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                    <input class="form-check-input border-radius-50" type="checkbox"
                                        name="include_insurance" value="No" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">Include insurance</label>
                                </div>
                            </div>
                            <div class="include-insurance mt-5">
                                <div class="row">
                                    <label class="col-lg-2 mb-5 col-form-label required fw-semibold fs-6">Order
                                        Total Price</label>
                                    <div class="col-lg-4 mb-5 fv-row fv-plugins-icon-container">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-currency-dollar"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                                    </svg>
                                                </span>
                                            </span>
                                            <input type="number" class="form-control" value="0"
                                                aria-label="Username" name="order_total_price" id="order_total_price"
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <label class="col-lg-2 mb-5 col-form-label required fw-semibold fs-6">Insurance
                                        $</label>
                                    <div class="col-lg-4 mb-5 fv-row fv-plugins-icon-container">
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-currency-dollar"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </span>
                                            <input type="number" class="form-control" value="0.00" disabled
                                                aria-label="Username" name="insurance" id="insurance"
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6 mt-sm-8">
                                <div class="card-title flex-column border-bottom">
                                    <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-filter-left"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                        </svg> DOCUMNETS TO SIGN BY RECIPIENT (OPTIONAL)
                                    </h3>
                                </div>
                                <div class="col-lg-12 input-group mb-5 mt-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50"
                                            name="[document_to_sign_by_recipient[]" type="checkbox" value="AOB"
                                            id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">AOB</div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="checkbox"
                                            name="[document_to_sign_by_recipient[]" value="HIPAA" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">HIPAA</div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="checkbox"
                                            name="[document_to_sign_by_recipient[]" value="Medical Lein"
                                            id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">Medical Lein
                                            </div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="checkbox"
                                            name="[document_to_sign_by_recipient[]" value="Paid copay Prove"
                                            id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">Paid copay Prove
                                            </div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="checkbox"
                                            name="[document_to_sign_by_recipient[]" value="Notice of Privacy Practices"
                                            id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">Notice of
                                                Privacy Practices</div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="checkbox"
                                            name="[document_to_sign_by_recipient[]" value="Assignment"
                                            id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">Assignment</div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                                <div class="col-lg-12 input-group">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="checkbox"
                                            name="[document_to_sign_by_recipient[]" value="LEIN" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">LEIN</div>
                                            <div class="fw-semibold text-gray-600">Bank
                                                preview</div>
                                        </div>
                                    </div>
                                    <span class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-folder2 fs-3x"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-sm-8">
                                <div class="card-title flex-column border-bottom">
                                    <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-filter-left"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                        </svg> PICKUP DATE & TIME</h3>
                                </div>
                                <div class="col-lg-12 mb-2 mt-5">
                                    <p>Please choose when we should pick up your orders, the
                                        time can not be within 1.5 hours of your closing
                                        time. Our driver will arrive during the time window
                                        that you choose.</p>
                                </div>
                                <label class="col-lg-12 col-form-label fw-semibold fs-6">Pickup Date</label>
                                <div class="col-lg-12 mb-5">
                                    <div class="input-group">
                                        <input class="form-control flatpickr-input" name="pickup_date"
                                            min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" required type="date"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-6 col-form-label fw-semibold fs-6">Pickup Time Min</label>
                                    <label class="col-lg-6 col-form-label fw-semibold fs-6">Pickup Time Max</label>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <input type="time" name="pickup_time_min" required
                                            value="{{ date('h:i') }}"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Pickup Time Min">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <input type="time" name="pickup_time_max" required
                                            value="{{ date('H:i', strtotime(date('Y-m-d H:i:s') . ' + 1 hours 30 minute')) }}"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Pickup Time Max">
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-lg-12">
                                        <div
                                            class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                            <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                                name="recipient_email_to_owner" value="No" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                @if (Auth::user()->userType == 0 || Auth::user()->userType == 2)
                                                    Send your updates to <span id="owner_email"></span>
                                                @else
                                                    Send your updates to {{ Auth::user()->email }}
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="kt_docs_repeater_recipient_email">
                                    <div class="form-group">
                                        <div data-repeater-list="kt_docs_repeater_recipient_email">
                                            <div data-repeater-item>
                                                <div class="form-group row mb-5">
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Recipient
                                                        Email</label>
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        {{-- <div class="fv-plugins-message-container invalid-feedback">
                                                        </div> --}}
                                                        <div class="input-group mb-3">
                                                            <input type="email" name="recipient_email"
                                                                class="form-control form-control-lg form-control-solid"
                                                                placeholder="Recipient E-mail"
                                                                aria-describedby="recipient_email">
                                                            <a href="javascript:;" data-repeater-delete
                                                                class="btn btn-danger input-group-text">
                                                                <i class="la la-trash-o"></i>Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <div class="col-lg-4">
                                            <a class="btn btn-theme-color btn-rounded" data-repeater-create><i
                                                    class="bi bi-plus fs-4 me-2"></i>Add
                                                New Email</a>
                                        </div>
                                        <div class="col-lg-8">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Operator Initials</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div class="input-group mb-5">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="svg-icon svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-filter-left"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </span>
                                            <input type="text" name="operator_initials" class="form-control"
                                                placeholder="Operator Initials">
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-12 mb-5 mt-sm-8">
                                <div class="card-title flex-column border-bottom">
                                    <h3 class="fw-bold mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-filter-left"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                        </svg> DELIVERY METHODS</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="radio"
                                            name="delivery_methods" value="idrequired" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">FACE-TO-FACE ID
                                                & SIGNATURE REQUIRED</div>
                                            <div class="fw-semibold text-gray-600">
                                                Prescription will be delivered to the
                                                assigned patient only. Both ID and signature
                                                are required by the recipient, and the ID
                                                must match the patient’s name. Driver will
                                                take a picture of the patient`s ID and the
                                                door upon delivery. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="radio"
                                            name="delivery_methods" value="face2face" id="flexCheckChecked" checked>
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">FACE-TO-FACE
                                                SIGNATURE REQUIRED</div>
                                            <div class="fw-semibold text-gray-600">
                                                Signature is required by any person who
                                                lives with the patient. Driver will take a
                                                picture of the patient`s door. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="radio"
                                            name="delivery_methods" value="inperson" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">FACE-TO-FACE NO
                                                SIGNATURE REQUIRED</div>
                                            <div class="fw-semibold text-gray-600">Driver
                                                will deliver prescription to any person who
                                                lives with the patient, without capturing a
                                                signature. Driver will take a picture of the
                                                patient`s door. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="radio"
                                            name="delivery_methods" value="signlink" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">ONLINE SIGNATURE
                                            </div>
                                            <div class="fw-semibold text-gray-600">Driver
                                                will leave the prescription by the door and
                                                take a picture, only if patient signs online
                                                before the delivery. Without online
                                                signature, the delivery method will proceed
                                                as `Face-to-Face Signature Required`. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input
                                            class="form-check-input border-radius-50 form-control form-check-lg form-control-solid border-dark"
                                            type="radio" name="delivery_methods" value="nosign" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">SIGNATURE
                                                OPTIONAL</div>
                                            <div class="fw-semibold text-gray-600">Driver
                                                will attempt face-to-face delivery. If
                                                nobody is home, driver will leave the
                                                package by the door and take a picture.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 input-group mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-check-lg form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" type="radio"
                                            name="delivery_methods" value="noask" id="flexCheckChecked">
                                        <div class="ms-lg-5">
                                            <div class="fs-6 fw-bold mb-1">NO-CONTACT
                                                DELIVERY</div>
                                            <div class="fw-semibold text-gray-600">Driver
                                                will leave the package by the door and take
                                                a picture, without attempting face-to-face
                                                delivery. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 pb-5 border-bottom">
                            <div class="col-lg-12 text-right">
                                <button type="submit" name='submitType' value="add_with_print"
                                    class="btn btn-theme-color btn-rounded me-4"><i
                                        class="bi bi-printer fs-4 me-2"></i>Create the Order and Print</a>
                                    <button type="submit" name='submitType' value="add"
                                        class="btn btn-theme-color btn-rounded me-4"><i
                                            class="bi bi-plus-circle fs-4 me-2"></i>Add</button>
                                    <a href="#" class="btn btn-primary btn-rounded"></i>Reset</a>
                                    <a href="#" class="btn btn-success btn-rounded"></i>Go Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body pt-0">
                    <div class="row border-bottom">
                        <div class="col-lg-12">
                            <div class="card-title flex-column ">
                                <h3 class="fw-bold mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                    </svg>
                                    RECENT ORDERS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div class="table-responsive">
                                <table style="font-family: 'Lato', sans-serif;"
                                    class="table-light table-striped table-responsive"table-striped table-responsive"
                                    aria-describedby="mydesc" data-url="{{ url('orderList') }}" class='table-striped'
                                    id="table_list" data-toggle="table" data-url="" data-click-to-select="false"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="false" data-show-refresh="false"
                                    data-fixed-columns="false" data-fixed-number="1" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-pagination-successively-size="3"
                                    data-query-params="newOrderQueryParams">
                                    <thead>
                                        <th scope="col" data-field="id" data-visible="false"></th>
                                        <th scope="col" data-field="action" data-sortable="true"
                                            data-events="actionEvents">
                                            UID</th>
                                        <th scope="col" data-field="status" data-sortable="true" data-width="10"
                                            data-width-unit="%">Status</th>
                                        <th scope="col" data-field="recipient_name" data-sortable="true"
                                            data-width="10" data-width-unit="%">Recipient Name</th>
                                        <th scope="col" data-field="rx_number" data-visible="true"
                                            data-sortable="true">RX
                                            Number</th>
                                        <th scope="col" data-field="date_filled" data-visible="true"
                                            data-sortable="true">
                                            Date Filled </th>
                                        <th scope="col" data-field="facility" data-sortable="true">Facility
                                        </th>
                                        <th scope="col" data-field="hub" data-sortable="true">Hub</th>
                                        <th scope="col" data-field="recipient_address" data-visible="true"
                                            data-sortable="true">Address</th>
                                        <th scope="col" data-field="recipient_zip" data-visible="true"
                                            data-sortable="true">
                                            Zip</th>
                                        <th scope="col" data-field="recipient_city" data-visible="true"
                                            data-sortable="true">
                                            City</th>
                                        <th scope="col" data-field="in_queue" data-sortable="true" style="width:10%">
                                            In Queue
                                        </th>
                                        <th scope="col" data-field="items" data-visible="true" data-sortable="true">
                                            Items
                                        </th>
                                        <th scope="col" data-field="sub_status" data-visible="false"
                                            data-sortable="true">Sub
                                            Status</th>
                                        <th scope="col" data-field="sub_status" data-visible="false"
                                            data-sortable="true">Sub
                                            Status</th>
                                        <th scope="col" data-field="copay" data-visible="true" data-sortable="true">
                                            Copay
                                        </th>
                                        <th scope="col" data-field="client" data-sortable="true" data-width="10"
                                            data-width-unit="%">Client</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---- START :: order.modal.blade.php --->
        @include('orders.modal')
        <!---- END :: order.modal.blade.php ---->
        <div class="modal fade" tabindex="-1" id="ticket_model">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Tickets</h3>
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
                    </div>
                    <form action="{{ route('savetickets') }}" method="post">
                        @csrf <div class="modal-body">
                            <div class="form-group row mb-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                                        style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Describe
                                        Your issue And What Needs To Be
                                        Resolved Through This
                                        Ticket.</label>
                                    <span class="text-dark">Description
                                        of Issue</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3"> <select class="form-select" name="priority">
                                        <option></option>
                                        <option value="Moderate" style="background-color: yellow;" data-color="yellow">
                                            Moderate</option>
                                        <option value="Low" style="background-color: rgb(168, 214, 149);" selected>Low
                                        </option>
                                        <option value="Normal" style="background-color: rgb(240, 173, 78);">
                                            Normal</option>
                                        <option value="High" style="background-color: rgb(255, 0, 0);">
                                            High</option>
                                        <option value="Emergency" style="background-color: rgb(204, 0, 51);">
                                            Emergency</option>
                                    </select>
                                    <span class="text-dark">Priority</span>
                                </div>
                                <div class="col-lg-3"> <select class="form-select" name="type">
                                        <option></option>
                                        <option value="feedback" selected>
                                            feedback</option>
                                        <option value="improvement">
                                            improvement</option>
                                        <optgroup label="complaint">
                                            <option value="complaint,no mask">
                                                no mask</option>
                                            <option value="complaint,driver late">
                                                driver late</option>
                                            <option value="complaint,unfriendy driver">
                                                unfriendy driver
                                            </option>
                                            <option value="complaint,delivered to wrong place">
                                                delivered to wrong place
                                            </option>
                                            <option value="complaint,other">
                                                other</option>
                                        </optgroup>
                                        <optgroup label="attention">
                                            <option value="attention,address cahnged">
                                                address cahnged</option>
                                            <option value="attention,patient requested new time">
                                                patient requested new
                                                time</option>
                                            <option value="attention,other">
                                                other</option>
                                        </optgroup>
                                    </select>
                                    <span class="text-dark">Type</span>
                                </div>
                                <div class="col-lg-3"> <input type="text"
                                        class="form-control form-control-lg form-control-solid" placeholder="Order Id">
                                    <span class="text-dark">Order Id
                                        (optional)</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> <button
                                type="submit" class="btn btn-theme-color">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="recipientRelatedOrdersModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="w-100 modal-title" id="exampleModalLabel">Recipient's Orders</h5>
                        <select class="form-control" id="recipientRelatedOrdersfilter" data-control="select2"
                            data-close-on-select="false" data-placeholder="Select an option" data-allow-clear="true"
                            multiple="multiple">
                            <option value="store_in_fridge">Fridge</option>
                            <option value="subtype_confidential">Confidential</option>
                            <option value="subtype_controlled">Controlled</option>
                            <option value="subtype_hazardous">Hazardous</option>
                            <option value="subtype_sensitive">Sensitive</option>
                            <option value="order_type">Supply Regular</option>
                        </select>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table style="font-family: 'Lato', sans-serif;"
                            class="table-light table-striped table-responsive"table-striped table-responsive"
                            aria-describedby="mydesc" data-url="{{ url('getRecipientOrdersHistoryList') }}"
                            class='table-striped' id="recipient_orders_list" data-toggle="table"
                            data-click-to-select="true" data-show-copy-rows="true" data-side-pagination="server"
                            data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]" data-search="true"
                            data-toolbar="#toolbar" data-show-export="false" data-fixed-columns="false"
                            data-fixed-number="1" data-fixed-right-number="1" data-trim-on-search="false"
                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                            data-pagination-successively-size="3" data-show-columns="true"
                            data-export-types='["csv","pdf","excel"]' data-show-print='true'
                            data-export-options='{
                 "fileName": "orders-<?= date('d-m-y') ?>",
                            "ignoreColumn": ["state","action"]
                            }'
                            data-query-params="queryParamsRecipient"
                            >
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-visible="false"></th>
                                    <th scope="col" data-field="action" data-sortable="true"
                                        data-events="actionEvents">UID</th>
                                    <th scope="col" data-field="recipient_address" data-visible="true"
                                        data-sortable="true">Recipient Address</th>
                                    <th scope="col" data-field="recipient_name" data-sortable="true"
                                        data-width="10" data-width-unit="%">Recipient Name </th>
                                    <th scope="col" data-field="status" data-sortable="true" data-width="10"
                                        data-width-unit="%">Status</th>
                                    <th scope="col" data-field="time_to_deliver" data-sortable="true">Time to
                                        Deliver</th>
                                    <th scope="col" data-field="rx_number" data-visible="true"
                                        data-sortable="true">RX Number</th>
                                    <th scope="col" data-field="recipient_phone" data-visible="true"
                                        data-sortable="true">Recipient Phone</th>
                                    <th scope="col" data-field="fridge" data-visible="true" data-sortable="true">
                                        Fridge?</th>
                                    <th scope="col" data-field="confidential" data-visible="true"
                                        data-sortable="true">Confidential? </th>
                                    <th scope="col" data-field="controlled" data-visible="true"
                                        data-sortable="true"> Controlled</th>
                                    <th scope="col" data-field="hazardous" data-visible="true"
                                        data-sortable="true">Hazardous</th>
                                    <th scope="col" data-field="sensitive" data-sortable="true"
                                        data-visible="true">Sensitive? </th>
                                    <th scope="col" data-field="supply_regular" data-sortable="true"
                                        data-visible="true"> Supply regular </th>
                                    <th scope="col" data-field="supply_plus_rx" data-sortable="true"
                                        data-visible="true"> Supply plus rx</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!---- END:: NEW DRIVER NOTE  MODEL --->
    </div>
@endsection
@section('script')
    <!---START SCRIPT :: Bootstrap-Table Code --->
    <script>
        $(function() {
            setTimeout(() => {
                $('input').attr('autocomplete', 'off');
                $('form').attr('autocomplete', 'off');
            }, 500);
        });
        function newOrderQueryParams(p) {
            return {
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                limit: p.limit,
                search: p.search,
                status: 'All'
            };
        }
        window.actionEvents = {
            'click .view': function(e, value, row, index) {
                var driver_info = '';
                $("#order_id").text(row.id);
                $("#ticket_order_id").val(row.id);
                var address = row.recipient_address + "\n" + row.recipient_city + " " + row.recipient_state + " " +
                    row.recipient_zip
                $("#recipient_address").text(address);
                $("#recipient_id").parent().attr('data-recipient-id', row.recipient_id);
                $("#recipient_name").html(row.recipient_name);
                $("#order-status2").text(row.status);
                $("#order-status2").text(row.status_text);
                $("#client_name").html(row.client_url);
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
                if (row.driver_id != 0) {
                    var copayed = '';
                    if (row.is_copay_payed == 'Yes') {
                        copayed = '<label class="mt-10 fw-bold text-success fs-2">COPAY IS PAYED</label>';
                    } else {
                        copayed = '<label class="mt-10 fw-bold text-danger fs-2">COPAY IS NOT PAYED</label>';
                    }
                    driver_info = '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<div class="symbol symbol-100px symbol-md-75px symbol-circle">' + row.driver_profile +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-6">' +
                        '<label class="mt-10 fw-bold"><i class="fa fa-pencil text-dark"></i> Note Details</label>' +
                        '<p class="mt-0">' + row.contents + '</label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-md-6">' +
                        '<label class="mt-10 fw-bold">' + row.driver_name + '</label>' +
                        '<br><span>Driver</span>' +
                        '<br><label class="mt-1">' + row.date_to_deliver + '</label>' +
                        '<br><label class="mt-1">' + row.time_to_deliver + '</label>' +
                        '<br><label class="mt-1"> Recipient Name:</label>' +
                        '<br><label class="mt-1">' + row.client + '</label>' +
                        '<br><label class="mt-5"> Address:</label>' +
                        '<br><label class="mt-2">' + row.recipient_address + '</label>' +
                        '<br><label class="mt-5"> Route:#' + row.regions_id + '</label>' +
                        '<br><label class="mt-5"><span class="label label-success">0m</span></label>' +
                        '<br><label class="mt-5 fw-bold"> Dispatcher:</label>' +
                        '<br><label class="mt-5">' + row.dispatcher_name + '</label>' + '</div>' +
                        '<div class="col-md-6">' +
                        '<label class="mt-20 fw-bold">' + row.status + '</label>' +
                        '<br><label class="mt-5 fw-bold">Location:</label>' +
                        '<br><button type="button" class="btn btn-primary btn-sm btn-icon"><i class="fa fa-map text-white"></i></button><button type="button" class="btn btn-secondary btn-sm btn-icon" style="margin-left: 10px;" onclick="openWindow(`https://maps.google.com/?q=41.02295600,-72.15113800&amp;ll=41.02295600,-72.15113800&amp;z=20`);"><i class="bi bi-google"></i></button>' +
                        '</div>' +
                        '</div>' +
                        "<div class='row'>" + copayed + '</div>';
                }
                $("#driver_details").html(driver_info);
                if (row.delivery_methods_type == 'nosign') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>SIGNATURE OPTIONAL</b><br>Driver will attempt face-to-face delivery. If nobody is home, driver will leave the package by the door and take a picture.</span>'
                    );
                }
                if (row.delivery_methods_type == 'idrequired') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE ID & SIGNATURE REQUIRED</b><br>Prescription will be delivered to the assigned patient only. Both ID and signature are required by the recipient, and the ID must match the patient’s name. Driver will take a picture of the patient`s ID and the door upon delivery.</span>'
                );
            }
            if (row.delivery_methods_type == 'face2face') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE SIGNATURE REQUIRED</b><br>Signature is required by any person who lives with the patient. Driver will take a picture of the patient`s door.</span>'
                    )
                }
                if (row.delivery_methods_type == 'inperson') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>FACE-TO-FACE NO SIGNATURE REQUIRED</b><br>Driver will deliver prescription to any person who lives with the patient, without capturing a signature. Driver will take a picture of the patient`s door.</span>'
                );
            }
            if (row.delivery_methods_type == 'signlink') {
                $("#delivery_methods_type").html(
                    '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>ONLINE SIGNATURE</b><br>Driver will leave the prescription by the door and take a picture, only if patient signs online before the delivery. Without online signature, the delivery method will proceed as `Face-to-Face Signature Required`.</span>'
                    );
                }
                if (row.delivery_methods_type == 'noask') {
                    $("#delivery_methods_type").html(
                        '<span class="order-edit-field" id="order-deliveryMethod" style="color: green;"><b>NO-CONTACT DELIVERY</b><br>Driver will leave the package by the door and take a picture, without attempting face-to-face delivery.</span>'
                    );
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
                                    '<img class="w-100 h-350px"   src="' +
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
                    error: function(error) {}
                });
                setTimeout(function() {
                    // window.dispatchEvent(new Event("resize"));
                    initRecipientsMap(row.recipient_latitude, row.recipient_longitude, row
                        .recipient_address);
                }, 600);
            }
        };
    </script>
    <!---END SCRIPT :: Bootstrap-Table Code --->
    <script>
        $('.oncheckbox').click(function() {
            if ($(this).is(':checked')) {
                $(this).val('Yes');
            } else {
                $(this).val('No');
            }
        });
    </script>
    <script>
        const options = document.querySelectorAll('[data-kt-docs-advanced-forms="interactive"]');
        const inputEl = document.querySelector('[name="package_weight"]');
        options.forEach(option => {
            option.addEventListener('click', e => {
                e.preventDefault();
                inputEl.value = e.target.value;
            });
        });
        const timewindow = document.querySelectorAll('[data-kt-docs-advanced-forms="timewindow"]');
        const time_window_deliveries = document.querySelector('[name="time_window_deliveries"]');
        timewindow.forEach(option => {
            option.addEventListener('click', e => {
                e.preventDefault();
                time_window_deliveries.value = e.target.value;
            });
        });
        $(document).on('change', '[id=store-in-fridge]', function() {
            if (this.checked) {
                $('.store-in-fridge').show();
            } else {
                $('.store-in-fridge').hide();
            }
        })
        $(document).on('change', '[name=include_insurance]', function() {
            if (this.checked) {
                $('.include-insurance').show();
            } else {
                $('.include-insurance').hide();
            }
        })
        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,
            defaultValues: {
                'text-input': 'foo'
            },
            show: function() {
                $(this).slideDown();
            },
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
        $("#kt_datepicker_1").flatpickr();
        $("#kt_datepicker_3").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,
            show: function() {
                $(this).slideDown();
                $(this).find("#kt_datepicker_1").flatpickr();
            },
            isFirstItemUndeletable: true,
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
        $('#recipient_home_phone').repeater({
            initEmpty: false,
            show: function(index) {
                $(this).slideDown();
            },
            isFirstItemUndeletable: true,
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
        $('#kt_docs_repeater_recipient_email').repeater({
            initEmpty: false,
            show: function() {
                $(this).slideDown();
            },
            isFirstItemUndeletable: true,
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
        $('#order_total_price').on('input', function(e) {
            var price = $(this).val()
            var insuranceAmount = ((price * 0.75) / 100);
            $("#insurance").val(insuranceAmount);
        });
    </script>
    <script>
        function getCodeFun(lat, lng) {
            var zipcode = '';
            $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng +
                    '&key={{ env('GOOGLE_MAP_KEY') }}',
                type: "GET",
                dataType: 'json',
                async: false,
                success: function(data) {
                    var results = data.results;
                    $("#hidden_full_address").val(results.formatted_address)
                    results[0].address_components.forEach(element => {
                        if (element.types[0] == "locality") {
                            district1 = element.long_name;
                        }
                        if (element.types[0] == "postal_code") {
                            zipcode = element.long_name;
                        }
                    });
                }
            });
            return zipcode;
        }
        function initMap() {
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            var trafficLayer = new google.maps.TrafficLayer();
            // trafficLayer.setMap(map);
            const input = document.getElementById("recipient_address");
            autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                place = autocomplete.getPlace();
                formatted_address = place.formatted_address;
                latitude = place.geometry.location.lat();
                longitude = place.geometry.location.lng();
                $("#hidden_latitude").val(latitude);
                $("#hidden_longitude").val(longitude);
                // console.log('place', JSON.stringify(place));
                zipcode = getCodeFun(latitude, longitude)
                place.address_components.forEach(element => {
                    if (element.types[0] == "locality") {
                        $("#city").val(element.long_name);
                    }
                    if (element.types[0] == "postal_code") {
                        $("#zip").val(element.long_name);
                    } else {
                        $("#zip").val(zipcode);
                    }
                    if (element.types[0] == "administrative_area_level_1") {
                        $("#state").val(element.short_name).trigger('change');
                    }
                });
            });
            // var options = {types: ['address'],componentRestrictions: {country: 'us'} };
            // autocomplete = new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                for (var i = 0; i < place.address_components.length; i++) {
                    for (var j = 0; j < place.address_components[i].types.length; j++) {
                        if (place.address_components[i].types[j] == "postal_code") {
                            if ($.trim($("#zip").val()) == '') {
                                $("#zip").val(place.address_components[i].long_name);
                            }
                        }
                        if (place.address_components[i].types[j] == "locality") {
                            if ($.trim($("#city").val()) == '') {
                                $("#city").val(place.address_components[i].long_name);
                            }
                        }
                        if (place.address_components[i].types[j] == "administrative_area_level_1") {
                            if ($.trim($("#state").val()) == '') {
                                $('#state').append('<option value="' + place.address_components[i]
                                    .short_name +
                                    '" selected>' + place.address_components[i].short_name +
                                    '</option>');
                            }
                        }
                    }
                }
            });
        }
        $('input[type=radio][name=package_type]').change(function() {
            if (this.value == 'regular') {
                $("#timewindow_div").css("display", 'none');
            } else if (this.value == 'Time Window Next Day') {
                $("#timewindow_div").css("display", 'block');
            }
        });
        $(function() {
            $("#admin_client_dropdown").change(function() {
                var selected = $(this).find('option:selected');
                var email = selected.data('email');
                $("#owner_email").text(email);
            });
        });
    </script>
@endsection
