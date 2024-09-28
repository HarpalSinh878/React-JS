<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title text-uppercase"> Recipient Information </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-5">
                            <input type="text" name="recipient_name"
                                class="form-control form-control-lg form-control-solid" placeholder="Recipient Name"
                                value="{{ $getorderdetails['recipient']->name }}" autocomplete="off" required>
                            <input type="hidden" name="recipient_id" value="{{ $getorderdetails['recipient']->id }}">
                            <small>Recipient Name</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-5">
                            <input type="text" name="recipient_cell_phone"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Recipient Cell Phone" value="{{ $getorderdetails['recipient']->phone }}"
                                autocomplete="off" required>
                            <small>Recipient Cell Phone</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-5">
                            <div class="form-group">
                                @if (!in_array($getorderdetails['recipient']->home_phone, ['[null]', '[]']))
                                    @foreach (json_decode($getorderdetails['recipient']->home_phone, true) as $key => $phone)
                                        <div class="mb-5 remove{{ $key }}">
                                            <div class="input-group">
                                                <input type="text" name="recipient_home_phone[]"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Recipient Home Phone" value="{{ $phone }}"
                                                    autocomplete="off" required aria-label="Recipient Home Phone"
                                                    aria-describedby="basic-addon1">
                                                @if ($key == 0)
                                                    <button type="button" class="btn btn-info add_recipient_phone"
                                                        id="basic-addon1"> <i class="fa fa-plus"></i> Add </button>
                                                @else
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="remove_recipient_phone({{ $key }})"> <i
                                                            class="fa fa-trash"></i> Delete </button>
                                                @endif
                                            </div>
                                            <small>Recipient Home Phone</small>
                                        </div>
                                        <span class="d-none hiddencount">{{ $key }}</span>
                                    @endforeach
                                    <div class="extra_fields"></div>
                                @else
                                    <div class="mb-2">
                                        <div class="input-group">
                                            <input type="text" name="recipient_home_phone[]"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Recipient Home Phone" autocomplete="off">
                                            <button type="button" class="btn btn-info add_recipient_phone"> <i
                                                    class="fa fa-plus"></i> Add </button>
                                        </div>
                                        <span class="d-none hiddencount">1</span>
                                        <small>Recipient Home Phone</small>
                                    </div>
                                    <div class="extra_fields"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-5">
                            <div class="fv-row fv-plugins-icon-container">
                                <input type="text" name="recipient_address"
                                    class="form-control form-control-lg form-control-solid border-dark pac-target-input"
                                    id="edit_recipient_address" placeholder="Recipient Address"
                                    value="{{ $getorderdetails['recipient']->address }}" autocomplete="off" required>
                                <input type="hidden" id="edit_hidden_latitude" name="latitude"
                                    value="{{ $getorderdetails['recipient']->latitude }}" autocomplete="off" required>
                                <input type="hidden" id="edit_hidden_longitude" name="longitude"
                                    value="{{ $getorderdetails['recipient']->longitude }}" autocomplete="off" required>
                                <small>Recipient Address</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input type="text" name="city" id="edit_city"
                                class="form-control form-control-lg form-control-solid border-dark" placeholder="City"
                                value="{{ $getorderdetails['recipient']->city }}" autocomplete="off" required>
                            <small>City</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input type="text" name="zip" id="edit_zip"
                                class="form-control form-control-lg form-control-solid border-dark" placeholder="ZIP"
                                value="{{ $getorderdetails['recipient']->zip }}" autocomplete="off" required>
                            <small>Zip</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <select id="edit_state" name="state"
                                class="form-select form-control form-control-solid border-dark"
                                data-hide-search="true" data-control="select2" data-placeholder="Select State"
                                autocomplete="off" required>
                                <option></option>
                                <option value="NY"
                                    {{ $getorderdetails['recipient']->state == 'NY' ? 'selected' : '' }}>NY</option>
                                <option value="CT"
                                    {{ $getorderdetails['recipient']->state == 'CT' ? 'selected' : '' }}>CT</option>
                                <option value="NJ"
                                    {{ $getorderdetails['recipient']->state == 'NJ' ? 'selected' : '' }}>NJ</option>
                                <option value="CA"
                                    {{ $getorderdetails['recipient']->state == 'CA' ? 'selected' : '' }}>CA</option>
                            </select>
                            <small>State</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input type="text" name="floor"
                                class="form-control form-control-lg form-control-solid border-dark"
                                placeholder="Apt/Suite/Floor" value="{{ $getorderdetails['recipient']->apt }}"
                                autocomplete="off" required>
                            <small>Apt/Suite/Floor</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input class="form-control form-control-lg form-control-solid border-dark rounded"
                                name="date_to_deliver" value="{{ $getorderdetails->date_to_deliver }}"
                                min="{{ date('Y-m-d') }}" type="date" placeholder="Date to Deliver"
                                aria-label="Date to Deliver" aria-describedby="basic-addon2" autocomplete="off"
                                required />
                            <small>Date to Deliver</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input class="form-control form-control-lg form-control-solid border-dark rounded"
                                name="time_to_deliver" type="time" placeholder="Time to Deliver"
                                aria-label="Time to Deliver" aria-describedby="basic-addon2"
                                value="{{ $getorderdetails->time_to_deliver }}" autocomplete="off" required />
                            <small>Time To Deliver</small>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <div
                                class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                    name="request_call_upon_arrival"
                                    value="{{ $getorderdetails->request_call_upon_arrival }}"
                                    id="edit_request_call_upon_arrival"
                                    {{ $getorderdetails->request_call_upon_arrival == 'Yes' ? 'checked' : '' }} />
                                <label class="form-check-label" for="edit_request_call_upon_arrival"> Request Call
                                    Upon Arrival </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm mt-5">
            <div class="card-header">
                <h3 class="card-title text-uppercase"> Time To Pick Up </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-5">
                            <input class="form-control form-control-lg form-control-solid border-dark rounded"
                                name="pickup_date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}"
                                type="date" aria-label="Recipient's username" aria-describedby="basic-addon2"
                                autocomplete="off" required>
                            <small>Pickup Date</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input type="time" name="pickup_time_min" value="{{ date('h:i') }}"
                                class="form-control form-control-lg form-control-solid" placeholder="Pickup Time Min"
                                autocomplete="off" required>
                            <small>Pickup Time Min</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input type="time" name="pickup_time_max"
                                value="{{ date('H:i', strtotime(date('Y-m-d H:i:s') . ' + 1 hours 30 minute')) }}"
                                class="form-control form-control-lg form-control-solid" placeholder="Pickup Time Max"
                                autocomplete="off" required>
                            <small>Pickup Time Max</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title text-uppercase w-100 mt-5"> ETA </h3>
                <p>order status must be Route Optimized</p>
            </div>
            <div class="card-body">
                <input type="datetime" name="eta_date_time"
                    class="form-control form-control-lg form-control-solid date_and_time_picker"
                    placeholder="Eta date & Time" value="{{ $getorderdetails->eta_date_time }}">
                <small>ETA Date & Time</small>
            </div>
        </div>
        <div class="card shadow-sm mt-5">
            <div class="card-header">
                <h3 class="card-title text-uppercase"> Order Information </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-5">
                            <div class="input-group">
                                <span class="input-group-text" id="rx_number">
                                    <span class="svg-icon svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
                                            <path
                                                d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z" />
                                        </svg>
                                    </span>
                                </span>
                                <input type="text" class="form-control" name="edit_rx_number"
                                    placeholder="RX Number" aria-label="Username" aria-describedby="edit_rx_number"
                                    autocomplete="off" disabled />
                            </div>
                            <small>RX Number</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon-date-filled">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                        <path
                                            d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                    </svg>
                                </span>
                            </span>
                            <input type="text" name="date_filled" class="form-control" placeholder="Date Filled"
                                aria-label="Username" aria-describedby="basic-addon-date-filled" id="kt_datepicker_1"
                                autocomplete="off" disabled />
                        </div>
                        <small>Date Filled</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm mt-5">
            <div class="card-header">
                <h3 class="card-title text-uppercase"> Package Details </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-5">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon-">
                                    <span class="svg-icon svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
                                            <path
                                                d="M8.39 12.648a1.32 1.32 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1.06 1.06 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.512.512 0 0 0-.523-.516.539.539 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532 0 .312.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531 0 .313.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242l-.515 2.492zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z" />
                                        </svg>
                                    </span>
                                </span>
                                <input type="number" class="form-control" placeholder="1"
                                    value="{{ $getorderdetails->items }}" aria-label="Username"
                                    aria-describedby="basic-addon-" name="package_item" autocomplete="off" required>
                            </div>
                            <small>Items</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-5">
                            <div class="input-group ">
                                <span class="input-group-text" id="basic-addon1">
                                    <span class="svg-icon svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path
                                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                        </svg>
                                    </span>
                                </span>
                                <input type="number" class="form-control" placeholder="1" aria-label="Username"
                                    aria-describedby="basic-addon1" name="package_copay"
                                    value="{{ $getorderdetails->copay }}" autocomplete="off" required>
                            </div>
                            <small>Copay $</small>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <select name="not_paying_copay_action" id="not_paying_copay_action-test"
                                class="form-control" autocomplete="off">
                                <option></option>
                                <option value="1"
                                    {{ $getorderdetails->not_paying_copay_action == '1' ? 'selected' : '' }}>Allow
                                    Rx2Go to Give the Medication to the Patient, even if the patient does not pay the
                                    copay.</option>
                                <option value="2"
                                    {{ $getorderdetails->not_paying_copay_action == '2' ? 'selected' : '' }}>Do not
                                    give the medicine to the patient, bring it back to the pharmacy.</option>
                                <option value="3"
                                    {{ $getorderdetails->not_paying_copay_action == '3' ? 'selected' : '' }}>Amount of
                                    copay will be available on all necessary legal documents, But we will not attempt to
                                    collect the copay.</option>
                            </select>
                            <small>What to do if patient not paying copay</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-5">
                            <select name="order_type"
                                class="form-control form-control-lg form-control-solid border-dark rounded">
                                @foreach ($getordertypes as $ordertype)
                                    <option value="{{ $ordertype->order_type }}"
                                        {{ $getorderdetails->order_type == $ordertype->order_type ? 'selected' : '' }}>
                                        {{ $ordertype->order_type }}</option>
                                @endforeach
                            </select>
                            <small>Order type</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50 oncheckbox"
                                            id="store-in-fridge" name="package_subtype" type="checkbox"
                                            value="{{ $getorderdetails->subtype_fridge }}" id="flexCheckChecked1"
                                            {{ $getorderdetails->subtype_fridge == 'Yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked1"> Fridge </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5 store-in-fridge ps-8">
                                    <div
                                        class="form-check ps-lg-5 mb-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" name="store_in_fridge"
                                            type="radio" value="No" id="flexCheckChecked2"
                                            {{ $getorderdetails->store_in_fridge == 'no' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked2"> QuickPharma will not
                                            store the item in the fridge. </label>
                                    </div>
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50" name="store_in_fridge"
                                            type="radio" value="Yes" id="flexCheckChecked3"
                                            {{ $getorderdetails->store_in_fridge == 'yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked3"> QuickPharma will
                                            store the item in the fridge. </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50 oncheckbox"
                                            name="subtype_confidential"
                                            value="{{ $getorderdetails->subtype_confidential }}" type="checkbox"
                                            value="1" id="flexCheckChecked4"
                                            {{ $getorderdetails->subtype_confidential == 'Yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked4"> Confidential </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                            name="subtype_sensitive"
                                            value="{{ $getorderdetails->subtype_sensitive }}" id="flexCheckChecked5"
                                            {{ $getorderdetails->subtype_sensitive == 'Yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked5"> Sensitive </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                            name="subtype_hazardous"
                                            value="{{ $getorderdetails->subtype_hazardous }}" id="flexCheckChecked6"
                                            {{ $getorderdetails->subtype_hazardous == 'Yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked6"> Hazardous </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                            name="subtype_controlled"
                                            value="{{ $getorderdetails->subtype_controlled }}" id="flexCheckChecked7"
                                            {{ $getorderdetails->subtype_controlled == 'Yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked7"> Controlled </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div
                                        class="form-check ps-lg-5 form-check-custom form-check-solid form-control form-control-solid border-dark">
                                        <input class="form-check-input border-radius-50 oncheckbox" type="checkbox"
                                            name="subtype_woundcare"
                                            value="{{ $getorderdetails->subtype_woundcare }}" id="flexCheckChecked8"
                                            {{ $getorderdetails->subtype_woundcare == 'Yes' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexCheckChecked8"> Wound care patient
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <small>Subtypes</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-5">
                            <select name="delivery_methods_type" class="form-select text-wrap">
                                <option value="">Select an Delivery Method Type...</option>
                                <option value="idrequired"
                                    {{ $getorderdetails->delivery_methods_type == 'idrequired' ? 'selected' : '' }}>
                                    FACE-TO-FACE ID &amp; SIGNATURE REQUIRED Prescription will be delivered to the
                                    assigned patient only. Both ID and signature are required by the recipient, and the
                                    ID must match the patient’s name. Driver will take a picture of the patient`s ID and
                                    the door upon delivery.</option>
                                <option value="face2face"
                                    {{ $getorderdetails->delivery_methods_type == 'face2face' ? 'selected' : '' }}>
                                    FACE-TO-FACE SIGNATURE REQUIREDSignature is required by any person who lives with
                                    the patient. Driver will take a picture of the patient`s door. </option>
                                <option value="inperson"
                                    {{ $getorderdetails->delivery_methods_type == 'inperson' ? 'selected' : '' }}>
                                    FACE-TO-FACE NO SIGNATURE REQUIREDDriver will deliver prescription to any person who
                                    lives with the patient, without capturing a signature. Driver will take a picture of
                                    the patient`s door.</option>
                                <option value="signlink"
                                    {{ $getorderdetails->delivery_methods_type == 'signlink' ? 'selected' : '' }}>
                                    ONLINE SIGNATURE Driver will leave the prescription by the door and take a picture,
                                    only if patient signs online before the delivery. Without online signature, the
                                    delivery method will proceed as `Face-to-Face Signature Required`.</option>
                                <option value="nosign"
                                    {{ $getorderdetails->delivery_methods_type == 'nosign' ? 'selected' : '' }}>
                                    SIGNATURE OPTIONALDriver will attempt face-to-face delivery. If nobody is home,
                                    driver will leave the package by the door and take a picture. </option>
                                <option value="noask"
                                    {{ $getorderdetails->delivery_methods_type == 'noask' ? 'selected' : '' }}>
                                    NO-CONTACT DELIVERYDriver will leave the package by the door and take a picture,
                                    without attempting face-to-face delivery. </option>
                            </select>
                            <small> Delivery Method Type </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.oncheckbox').click(function() {
        if ($(this).is(':checked')) {
            $(this).val('Yes');
        } else {
            $(this).val('No');
        }
    });
    $(".date_and_time_picker").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d h:i A",
    });
    $('[id=store-in-fridge]').on('change', function() {
        if (this.checked) {
            $('.store-in-fridge').show();
        } else {
            $('.store-in-fridge').hide();
        }
    });
    $('[id=store-in-fridge]:checked').on('change', function() {
        if (this.checked) {
            $('.store-in-fridge').show();
        } else {
            $('.store-in-fridge').hide();
        }
    }).change();
    $('.add_recipient_phone').on('click', function() {
        var count = $('.hiddencount:last()').html();
        count++;
        var html = '<div class="mb-5 remove' + count +
            '"><div class="input-group"><input type="text" name="recipient_home_phone[]" class="form-control form-control-lg form-control-solid" placeholder="Recipient Home Phone"> <button type="button" class="btn btn-danger" onclick="remove_recipient_phone(' +
            count +
            ')"> <i class="fa fa-close"></i> Delete </button> </div> <span class="d-none hiddencount">' +
            count + '</span> <small>Recipient Home Phone</small></div>';
        $('.extra_fields').append(html);
    });
    function remove_recipient_phone(id) {
        $('.remove' + id).remove();
    }
</script>
