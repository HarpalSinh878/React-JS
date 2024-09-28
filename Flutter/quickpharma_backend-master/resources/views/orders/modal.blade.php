  <!---- START :: ORDER DETAILS MODEL --->
  <div class="modal fade" tabindex="-1" id="order_details_model" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title" style="float: left;">
                      <i class="icmn-database"></i> Order Details
                      <small>#<span id='order_id'></span></small>
                  </h3>
                  <span id="orderModalActions" style="float: right; ">
                      <a class="btn btn-success btn-sm margin-right-5 margin-bottom-10" target="_blank"
                          id="order-printid"><i class="bi bi-printer"></i></a>
                      <a class="btn btn-warning btn-sm margin-right-5 margin-bottom-10 edit_order" data-order-id=""><i
                              class="fa fa-edit"></i></a>
                      <a style="cursor: pointer;" id="confirmAndNodeDeleteOrder"
                          onclick="return confirmAndNodeDeleteOrder(event);"
                          class="btn btn-danger btn-sm margin-right-5 margin-bottom-10"><i class="bi bi-trash"></i>
                          Cancel The Order</a>
                      <a class="btn btn-success btn-sm margin-right-5 margin-bottom-10 confirmation" target="_blank"
                          id="delivery_slip_url" href="#"><i class="bi bi-printer"></i> Delivery Slip</a>
                      <a class="btn btn-success btn-sm margin-bottom-10 margin-right-5" target="_blank"
                          id="confirmation_url"> Confirmation</a>
                      <a class="btn btn-success btn-sm margin-bottom-10 margin-right-5" target="_blank"
                          id="deliveryslip_and_confirmation"> Delivery Slip &amp; Confirmation</a>
                      <a data-bs-toggle="modal" data-bs-target="#ticket_model"
                          class="btn btn-success btn-sm margin-right-5 margin-bottom-10 toNewTicket"><i
                              class="bi bi-ticket-detailed-fill"></i> New Ticket</a>
                  </span>
              </div>
              <div class="modal-body">
                  <div class="from-group row col-lg-12">
                      <div class="col-lg-7">
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title">
                                          Information</h3>
                                  </div>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-md-4" id="orderModalInfo1">
                                              <p><b>Client</b>:<br><span id="client_name"></span>
                                              </p>
                                              <div
                                                  style="padding:2px; border-radius: 4px;color:white;background:#acb7bf">
                                                  Attempts limit
                                                  <b>(2)</b>
                                              </div>
                                              <br><b>Recipient
                                                  Name:</b><br><a class="link-underlined" href="javascript:void(0);"
                                                  onclick="relatedOrders(&quot;11805273&quot;,&quot;BRUNELL ERIC&quot;);"><i
                                                      class="icmn-pointer"></i>
                                                  <span id="recipient_name"></span></a><br><br><b>Recipient
                                                  Address:</b><br><span class="order-edit-field"
                                                  id="order-recipientAddress">
                                                  <a href="javascript:void(0);" class="link-underlined"
                                                      onclick="edit_order(&quot;11805273&quot;);"><i
                                                          class="fa fa-pencil"></i>
                                                      <span id="recipient_address"></span>
                                                  </a><br><br>
                                              </span><br><b>Recipient
                                                  Phone:</b><br><i class="fa fa-phone"></i>
                                              Cell <a
                                                  onclick="makeCall(&quot;receipt&quot;, &quot;{{ Auth::user()->phone }}&quot;, &quot;+{{ Auth::user()->phone }}&quot;)"
                                                  class="link-underlined" style="cursor: pointer;"><span
                                                      id="recipient_phone"></span></a><br>
                                              <br><b>Request Call
                                                  Upon
                                                  Arrival</b>:<br><span
                                                  id="request_call_upon_arrival"></span><br><br><b>Provider
                                                  Name</b>:<br><br>
                                              <br><b>Num.
                                                  Items</b>:<br><span class="order-edit-field" id="order-items"><input
                                                      type="number" class="form-control" name="orderItems"
                                                      id="orderItems"></span><br><br><b>Orders`s
                                                  Insurance</b>:<br><span style="color: green">No</span><br><br><b>Track
                                                  Link
                                                  Opened</b>:<br><span style="color: red">No</span><br><br>
                                              <p></p>
                                          </div>
                                          <div class="col-md-4" id="orderModalInfo2">
                                              <p><b>Status</b>:<br><span id="order-status2"><span
                                                          class="label label-danger"></span></span>
                                              </p>
                                              <p></p><b>Sub
                                                  Status</b>:<br><span class="order-edit-field"
                                                  id="order-substatus"><span class="label label-">Open</span></span><br>
                                              <p></p>
                                              <b>Activity</b>:<br><span class="order-edit-field"
                                                  id="order-activity"><span class="label label-"></span></span>
                                              <p></p><span style="color: #1b00ff"><b>Special
                                                      Instructions</b>:<br><span
                                                      id="special_instructions"></span></span>
                                              <p></p>
                                              <b>Recipient`s
                                                  Comments</b>:<br>
                                              <div class="user-description-text">
                                              </div>
                                              <br><b>Created</b>:<br><span id="created"></span>
                                              <p></p>
                                              <div>
                                                  <b>Delivery
                                                      method</b>:<br>
                                                  <span class="order-edit-field" id="delivery_methods_type">
                                                  </span>
                                                  <p></p>
                                              </div>
                                              <b>Copay</b>:<br>$<span id="copay"></span>
                                              <br><br><b>Weight</b>:<br><span
                                                  id="weight"></span><br><br><b>Initials</b>:<br>RR<br><br><b>Sign
                                                  Link:</b> <a target="_blank"
                                                  href="https://dashboard.QuickPharma.ai/o/index/sg?o=11805273&amp;h=73c43">click
                                                  here</a>
                                              <p></p>
                                          </div>
                                          <div class="col-md-4" id="orderModalInfo3">
                                              <p><b>Order
                                                      Type</b>:<br><span class="order-edit-field-off"
                                                      id="order-type"></span>
                                              </p>
                                              <p></p><b>Order
                                                  Condition</b>:<br><span class="order-edit-field-off"
                                                  id="order-condition">regular</span>
                                              <p></p><b>Current
                                                  Route</b>:<br>N/A<br>
                                              <b>Current
                                                  Driver</b>:<br><span id="current_driver"></span><br><br><b>Date
                                                  to
                                                  Deliver</b>:<br><span id="date_to_deliver"></span><br><b>Date/Time
                                                  to Deliver (Prom
                                                  ETA)</b>:<br>
                                              <div class="changePromisedEtaContainer" style="display:none">
                                                  <label class="input-group pickupDate_single">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <input type="text"
                                                                  class="form-control promisedEtaDatePicker valid"
                                                                  placeholder="Date" aria-required="true"
                                                                  aria-invalid="false">
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                          <div class="btn-group btn-group-toggle col-md-12"
                                                              data-toggle="buttons">
                                                          </div>
                                                      </div>
                                                  </label>
                                              </div>
                                              <b>ETA</b>:<br>N/A<br><br><b>Attempts</b>:<br>0<br><br><b>Time
                                                  Delivered</b>:<br>N/A<br><br>
                                              <div
                                                  style="padding:2px;
                                        border-radius: 4px;
                                        color:#fff;
                                        background:red">
                                                  <b style="background-color: transparent;">&nbsp;If
                                                      Not Present,
                                                      Wrong
                                                      Address,
                                                      or Recipient
                                                      Refused,
                                                      Call</b>:
                                              </div>
                                              <div>
                                                  <i class="fa fa-phone"></i>
                                                  Cell:
                                                  <a onclick="makeCall('pharmacy', '11805273', '+15164727688')"
                                                      class="link-underlined" style="cursor: pointer;">
                                                      +15164727688
                                                  </a>
                                              </div><br>
                                              <p></p>
                                          </div>
                                          <div class="col-md-12" id="rxTableInfo4">
                                          </div>
                                          <div class="col-md-12" id="soTableInfo4">
                                          </div>
                                          <div class="col-md-12" id="coTableInfo4">
                                          </div>
                                          <style>
                                              #pickup-batchOrders-list .main {
                                                  background-color: #eacf7d;
                                              }
                                          </style>
                                          <div class="col-md-12" id="pickupBatchInfo5">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          Recipient address on map
                                      </h3>
                                  </div>
                                  <div class="card-body">
                                      <div class="col-md-12">
                                          <!--begin::Map-->
                                          <div id="recipient_address_on_map" class="w-100" style="height: 300px">
                                          </div>
                                          <!--end::Map-->
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          Dispatch Notes</h3>
                                  </div>
                                  <div class="card-body">
                                      N/A
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          SMS</h3>
                                  </div>
                                  <div class="card-body">
                                      <textarea id="sms_message_text" class="form-control" placeholder="Type and press enter..." style="height: 100px;"></textarea>
                                      <div style="padding-bottom: 20px; display: block;" class="margin-20">
                                          <h5><small><i class="bi bi-arrow-clockwise"></i>
                                                  Quick
                                                  Reply:</small>
                                          </h5>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you!&quot;);">Thank
                                              You</button> <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;You are very welcome! Thank you for using QuickPharma services!&quot;);">You
                                              are very
                                              welcome</button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you for reaching out to QuickPharma Unfortunately we do not do time frame delivery. Please contact us with preferred date of reschedule. Thank you!&quot;);">No
                                              frame time contact
                                              with
                                              date </button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;You are very welcome and thank you so much for using our service. Our goal is to provide the best service possible and we glad to hear positive feedback! Thank you.&quot;);">Thank
                                              you for positive
                                              feedback</button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you for reaching out to QuickPharma! Your delivery has been confirmed!&quot;);">Delivery
                                              confirmed </button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you for reaching out to QuickPharma! Please, contact us with preferred date of reschedule!&quot;);">contact
                                              with date of
                                              reschedule</button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you for reaching out to QuickPharma! Please sign at the link above so we can leave the medication at your address. If we do not get the signature, we would not be able to leave it without your presence. Thank you!&quot;);">sign
                                              on the link
                                          </button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you for reaching out QuickPharma please accept our apologies due to some difficulties on the road our driver is  getting late we  will call you when the driver will be at your address
                                            &quot;);">driver
                                              is late </button>
                                          <button
                                              class="btn btn-outline btn-outline-success btn-active-light-success btn-sm"
                                              onclick="quick_reply_template(&quot;Thank you for reaching out to QuickPharma! Absolutely , we will reschedule your delivery for tomorrow. You will receive an another text message with ETA. Thank you for Using QuickPharma Have a Great Day.&quot;);">Reschedule
                                              for
                                              tomorrow</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-5 ">
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          Driver Notes </h3>
                                      <div class="card-toolbar">
                                          <a data-bs-toggle="modal" data-bs-target="#new_driver_note"
                                              class="btn btn-success btn-sm margin-right-5 margin-bottom-10 toNewTicket"><i
                                                  class="bi bi-check-lg"></i>
                                              Add</a>
                                      </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class='col-md-12 col-12 form-group'>
                                              <div class="mb-5" id="order_document">
                                              </div>
                                              <div class="" id="driver_details">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          Route Images</h3>
                                  </div>
                                  <div class="card-body">
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          Recipient Online
                                          Signatures Via Link</h3>
                                  </div>
                                  <div class="card-body">
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          <span class="text-danger text-decoration-underline">
                                              Patient Call Notes
                                          </span>
                                          Pharmacy Call Notes
                                          Auto calls
                                      </h3>
                                  </div>
                                  <div class="card-body">
                                      N/A
                                  </div>
                              </div>
                          </div>
                          <div class="row mb-4 ms-2">
                              <div class="card shadow-sm">
                                  <div class="card-header">
                                      <h3 class="card-title text-uppercase">
                                          Call Notes</h3>
                                  </div>
                                  <div class="card-body">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-4 mx-2">
                      <div class="card shadow-sm">
                          <div class="card-header">
                              <h3 class="card-title text-uppercase">Tickets</h3>
                          </div>
                          <div class="card-body">
                              <table style="font-family: 'Lato', sans-serif;" aria-describedby="mydesc"
                                  data-url="{{ url('GetTicketsList') }}" class='table-striped'
                                  id="tickets_table_list" data-toggle="table" data-side-pagination="server"
                                  data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]"
                                  data-search="true" data-fixed-columns="false" data-fixed-number="1"
                                  data-fixed-right-number="1" data-trim-on-search="false"
                                  data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                  data-pagination-successively-size="3" data-query-params="queryParamsTickets">
                                  <thead>
                                      <tr>
                                          <th scope="col" data-field="id" data-visible="false"></th>
                                          <th scope="col" data-field="id" data-sortable="true">UID</th>
                                          <th scope="col" data-field="description" data-sortable="false">
                                              Description</th>
                                          <th scope="col" data-field="priority" data-sortable="false">Priority
                                          </th>
                                          <th scope="col" data-field="type" data-sortable="false">Type</th>
                                          <th scope="col" data-field="status" data-sortable="true">Status</th>
                                          <th scope="col" data-field="assigned_to" data-sortable="true">Assigned
                                              To</th>
                                          <th scope="col" data-field="order_id" data-sortable="false">Order Id
                                          </th>
                                          <th scope="col" data-field="submitted" data-sortable="false">Submitted
                                          </th>
                                          <th scope="col" data-field="submitted_by" data-sortable="false">
                                              Submitted By</th>
                                          <th scope="col" data-field="hours_in_status" data-sortable="false">Hours
                                              in Status</th>
                                          <th scope="col" data-field="hours_in_system" data-sortable="false">Hours
                                              in System</th>
                                          <th scope="col" data-field="last_updated" data-sortable="false">Last
                                              Updated</th>
                                          <th scope="col" data-field="last_updated_by" data-sortable="false">Last
                                              Updated By</th>
                                          <th scope="col" data-field="closed" data-sortable="false">Closed</th>
                                          <th scope="col" data-field="closed_by" data-sortable="true">Closed By
                                          </th>
                                      </tr>
                                  </thead>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-4 mx-2">
                      <div class="card shadow-sm">
                          <div class="card-header">
                              <h3 class="card-title text-uppercase">Status History</h3>
                          </div>
                          <div class="card-body">
                              <table style="font-family: 'Lato', sans-serif;" aria-describedby="mydesc"
                                  data-url="{{ url('getOrderStatusHistoryList') }}" class='table-striped'
                                  id="status_history_table_list" data-toggle="table" data-side-pagination="server"
                                  data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]"
                                  data-search="true" data-fixed-columns="false" data-fixed-number="1"
                                  data-fixed-right-number="1" data-trim-on-search="false"
                                  data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                  data-pagination-successively-size="3" data-query-params="queryParamsStatusHistory">
                                  <thead>
                                      <tr>
                                          <th scope="col" data-field="user" data-sortable="false">User</th>
                                          <th scope="col" data-field="time" data-sortable="false">Time</th>
                                          <th scope="col" data-field="from" data-sortable="true">From</th>
                                          <th scope="col" data-field="to" data-sortable="true">To</th>
                                      </tr>
                                  </thead>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-4 mx-2">
                      <div class="card shadow-sm">
                          <div class="card-header">
                              <h3 class="card-title text-uppercase">Activity History</h3>
                          </div>
                          <div class="card-body">
                              <table style="font-family: 'Lato', sans-serif;"
                                  class="table-light table-striped table-responsive" aria-describedby="mydesc"
                                  data-url="{{ url('getOrderActivityHistoryList') }}" class='table-striped'
                                  id="activity_history_table_list" data-toggle="table" data-side-pagination="server"
                                  data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200,All]"
                                  data-search="true" data-fixed-columns="false" data-fixed-number="1"
                                  data-fixed-right-number="1" data-trim-on-search="false"
                                  data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                  data-pagination-successively-size="3" data-query-params="queryParamsActivity">
                                  <thead>
                                      <tr>
                                          <th scope="col" data-field="time" data-sortable="true">Time</th>
                                          <th scope="col" data-field="type" data-sortable="true">Type</th>
                                          <th scope="col" data-field="order_id" data-sortable="true">Id</th>
                                          <th scope="col" data-field="user" data-sortable="true">User</th>
                                          <th scope="col" data-field="activity" data-sortable="true">Activity</th>
                                      </tr>
                                  </thead>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <!---- END :: ORDER DETAILS MODELL --->
  <!---- START :: NEW DRIVER NOTE MODEL --->
  <div class="modal fade" tabindex="-1" id="new_driver_note" data-bs-backdrop="static" data-bs-keyboard="false"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title">New Driver Note</h3>
                  <!--begin::Close-->
                  <div class="btn btn-icon btn-sm text-dark btn-active-light-primary ms-2" data-bs-dismiss="modal"
                      aria-label="Close">
                      <i class="bi bi-x-lg"></i>
                  </div>
                  <!--end::Close-->
              </div>
              <form action="{{ route('DriverNote') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                      <div class="form-group row mb-2">
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Order
                                  #</label>
                              <input type="text" name="order_id" readonly id="add_driver_note_modal_order_id"
                                  class="form-control form-control-lg form-control-solid" placeholder="Order ID">
                          </div>
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Order
                                  status</label>
                              <select class="form-select form-select-solid" name="status"
                                  id="new_driver_note_status" data-control="select2"
                                  data-dropdown-parent="#new_driver_note" data-placeholder="Select an option"
                                  data-allow-clear="true">
                                  <option value="" selected>Select Order Status</option>
                                  <option value="Delivered">Delivered</option>
                                  <option value="Delivery Attempted">Delivery Attempted</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Driver</label>
                              <select class="form-select form-select-solid" name="driver" id="driver"
                                  data-control="select2" data-dropdown-parent="#new_driver_note"
                                  data-placeholder="Select an option" data-allow-clear="true">
                                  @isset($driver)
                                      @foreach ($driver as $row)
                                          <option value="{{ $row->id }}">(#{{ $row->id }}){{ $row->name }}
                                          </option>
                                      @endforeach
                                  @endisset
                              </select>
                          </div>
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Activity Type</label>
                              <select class="form-select" name="activity_type" id="activity_type">
                                  <option value="" selected>Select Activity Type</option>
                                  <option value="Delivered">Delivered</option>
                                  <option value="Not Present">Not Present</option>
                                  <option value="Wrong Address"> Wrong Address</option>
                                  <option value="Refuse">Refuse</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Contents</label>
                              <input type="text" name="contents" id="contents"
                                  class="form-control form-control-lg form-control-solid" placeholder="Contents">
                          </div>
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Note
                                  added</label>
                              <input type="text" name="note_added" id="note_added"
                                  class="form-control form-control-lg form-control-solid" placeholder="Note added">
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <div class="col-lg-6">
                          </div>
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Is Copay payed?</label>
                              <select class="form-select" name="is_copay_payed" id="is_copay_payed">
                                  <option value="No">No</option>
                                  <option value="Yes">Yes
                                  </option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Attach
                                  photo</label>
                              <div class="form-group row mb-2">
                                  <div class="col-md-12">
                                      <div class="form-line">
                                          <input class="form-control form-control-lg form-control-solid"
                                              id="attachfile" name="attachfile[]" onchange="Filevalidation()"
                                              multiple type="file">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Attach
                                  signature</label>
                              <div class="form-group row mb-2">
                                  <div class="col-md-12">
                                      <div class="form-line">
                                          <input class="form-control form-control-lg form-control-solid"
                                              id="attachsignature" name="attachsignature[]"
                                              onchange="Filevalidation()" multiple type="file">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row mb-2">
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Copay</label>
                              <div class="form-group row mb-2">
                                  <div class="col-md-12">
                                      <div class="form-line">
                                          <input class="form-control form-control-lg form-control-solid"
                                              id="copay_file" name="copay[]" onchange="Filevalidation()" multiple
                                              type="file">
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <label class="col-lg-12 col-form-label">Fridge</label>
                              <div class="form-group row mb-2">
                                  <div class="col-md-12">
                                      <div class="form-line">
                                          <input class="form-control form-control-lg form-control-solid"
                                              id="fridge_file" name="fridge[]" onchange="Filevalidation()" multiple
                                              type="file">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline  btn-outline-danger btn-active-light-danger"
                          onclick="ResetNewdriverNoteForm()">RESET
                          FORM</button>
                      <button type="submit" class="btn btn-theme-color">ADD DRIVER
                          NOTE</button>
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
                  <table style="font-family: 'Lato', sans-serif;" class="table-light table-striped table-responsive"
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
                              <th scope="col" data-field="recipient_name" data-sortable="true" data-width="10"
                                  data-width-unit="%">Recipient Name </th>
                              <th scope="col" data-field="status" data-sortable="true" data-width="10"
                                  data-width-unit="%">Status</th>
                              <th scope="col" data-field="time_to_deliver" data-sortable="true">Time to Deliver
                              </th>
                              <th scope="col" data-field="rx_number" data-visible="true" data-sortable="true">RX
                                  Number</th>
                              <th scope="col" data-field="recipient_phone" data-visible="true"
                                  data-sortable="true">Recipient Phone</th>
                              <th scope="col" data-field="fridge" data-visible="true" data-sortable="true">
                                  Fridge?</th>
                              <th scope="col" data-field="confidential" data-visible="true" data-sortable="true">
                                  Confidential? </th>
                              <th scope="col" data-field="controlled" data-visible="true" data-sortable="true">
                                  Controlled</th>
                              <th scope="col" data-field="hazardous" data-visible="true" data-sortable="true">
                                  Hazardous</th>
                              <th scope="col" data-field="sensitive" data-visible="true" data-sortable="true">
                                  Sensitive? </th>
                              <th scope="col" data-field="supply_regular" data-visible="true"
                                  data-sortable="true"> Supply regular </th>
                              <th scope="col" data-field="supply_plus_rx" data-visible="true"
                                  data-sortable="true"> Supply plus rx</th>
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
  @section('js')
      <script>
          // FOR EDIT ORDER ____ START
          $('.edit_order').on('click', function() {
              $('#edit_order_model').modal('show');
              $('#edit_order_model .spinner').show();
              $('#edit_order_model .order-content').hide().html('');
              $.ajax({
                  url: "{{ route('orders.get-edit-data') }}",
                  type: "GET",
                  data: {
                      "id": $(this).attr('data-order-id')
                  },
                  success: function(response) {
                      $('#order_details_model').modal('hide');
                      $('#edit_order_model .spinner').hide();
                      $('#edit_order_model .order-content').show().html(response.data);
                      initMapForEditOrder();
                  },
                  error: function(error) {
                      $('#edit_order_model').modal('hide');
                      toastr.error('Something Went Wrong.!!')
                      return false;
                  }
              });
          });
          $('#edit_order_form').on('submit', function() {
              var formData = new FormData(this);
              $.ajax({
                  type: 'POST',
                  url: $('#edit_order_form').attr('data-url'),
                  data: formData,
                  cache: false,
                  processData: false,
                  contentType: false,
                  success: function(response) {
                      if (response.status == 1) {
                          toastr.success(response.message)
                          $('#edit_order_model .order-content').html('');
                          $('#edit_order_model').modal('hide');
                          $('#table_list').bootstrapTable('refresh');
                      } else {
                          toastr.error(response.message)
                      }
                      return false;
                  },
                  error: function(error) {
                      toastr.error('Something Went Wrong..!!')
                      return false;
                  }
              });
              return false;
          });
          function initMapForEditOrder() {
              const directionsService = new google.maps.DirectionsService();
              const directionsRenderer = new google.maps.DirectionsRenderer();
              var trafficLayer = new google.maps.TrafficLayer();
              // trafficLayer.setMap(map);
              const input = document.getElementById("edit_recipient_address");
              autocomplete = new google.maps.places.Autocomplete(input);
              autocomplete.addListener('place_changed', function() {
                  place = autocomplete.getPlace();
                  formatted_address = place.formatted_address;
                  latitude = place.geometry.location.lat();
                  longitude = place.geometry.location.lng();
                  $("#edit_hidden_latitude").val(latitude);
                  $("#edit_hidden_longitude").val(longitude);
                  // console.log('place', JSON.stringify(place));
                  zipcode = getCodeFun(latitude, longitude);
                  place.address_components.forEach(element => {
                      if (element.types[0] == "locality") {
                          $("#edit_city").val(element.long_name);
                      }
                      if (element.types[0] == "postal_code") {
                          $("#edit_zip").val(element.long_name);
                      } else {
                          $("#edit_zip").val(zipcode);
                      }
                      if (element.types[0] == "administrative_area_level_1") {
                          $("#edit_state").val(element.short_name).trigger('change');
                      }
                  });
                  // var options = {types: ['address'],componentRestrictions: {country: 'us'} };
                  // autocomplete = new google.maps.places.Autocomplete(input, options);
                  google.maps.event.addListener(autocomplete, 'place_changed', function() {
                      var place = autocomplete.getPlace();
                      for (var i = 0; i < place.address_components.length; i++) {
                          for (var j = 0; j < place.address_components[i].types.length; j++) {
                              if (place.address_components[i].types[j] == "postal_code") {
                                  if ($.trim($("#edit_zip").val()) == '') {
                                      $("#edit_zip").val(place.address_components[i].long_name);
                                  }
                              }
                              if (place.address_components[i].types[j] == "locality") {
                                  if ($.trim($("#edit_city").val()) == '') {
                                      $("#edit_city").val(place.address_components[i].long_name);
                                  }
                              }
                              if (place.address_components[i].types[j] == "administrative_area_level_1") {
                                  if ($.trim($("#edit_state").val()) == '') {
                                      $('#edit_state').append('<option value="' + place.address_components[i]
                                          .short_name +
                                          '" selected>' + place.address_components[i].short_name +
                                          '</option>');
                                  }
                              }
                          }
                      }
                  });
              });
          }
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
                      //   $("#hidden_full_address").val(results.formatted_address)
                      results[0].address_components.forEach(element => {
                          // district1 = element.types[0] == "locality" ? element.long_name : '';
                          if (element.types[0] == "postal_code") {
                              zipcode = element.long_name;
                          }
                      });
                  }
              });
              return zipcode;
          }
          // FOR EDIT ORDER ____ END
      </script>
      <script>
          $("#order_details_model").on('shown.bs.modal', function() {
              $('#status_history_table_list').bootstrapTable('refresh');
              $('#activity_history_table_list').bootstrapTable('refresh');
              $('#tickets_table_list').bootstrapTable('refresh');
          });
          function queryParamsStatusHistory(p) {
              return {
                  sort: p.sort,
                  order: p.order,
                  offset: p.offset,
                  limit: p.limit,
                  search: p.search,
                  order_id: $("#add_driver_note_modal_order_id").val()
              };
          }
          function queryParamsActivity(p) {
              return {
                  sort: p.sort,
                  order: p.order,
                  offset: p.offset,
                  limit: p.limit,
                  search: p.search,
                  order_id: $("#add_driver_note_modal_order_id").val()
              };
          }
          function queryParamsTickets(p) {
              return {
                  sort: p.sort,
                  order: p.order,
                  offset: p.offset,
                  limit: p.limit,
                  search: p.search,
                  order_id: $("#add_driver_note_modal_order_id").val()
              };
          }
          $("#note_added").flatpickr({
              enableTime: true,
              dateFormat: "Y-m-d H:i",
              maxDate: new Date()
          });
          $('#kt_docs_repeater_attach_photo').repeater({
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
          $('#kt_docs_repeater_attach_signature').repeater({
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
          $('#kt_docs_repeater_attach_copay').repeater({
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
          $('#kt_docs_repeater_attach_fridge').repeater({
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
          function ResetNewdriverNoteForm() {
              $("#new_driver_note_status").val('').trigger('change');
              $("#driver").val('').trigger('change');
              $("#driver").val('').trigger('change');
              $("#activity_type").val('').trigger('change');
              $("#contents").val('');
              $("#note_added").val('');
              $("#is_copay_payed").val('No').trigger('change');
          }
      </script>
      <script>
          var initRecipientsMap = function(latitude, longitude, address) {
              // Check if Leaflet is included
              if (!L) {
                  return;
              }
              // Define Map Location
              var leaflet = L.map('recipient_address_on_map', {
                  center: [latitude, longitude],
                  zoom: 100
              });
              // Init Leaflet Map. For more info check the plugin's documentation: https://leafletjs.com/
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors  contributors, Imagery © <a href="#">quickpharma</a>'
              }).addTo(leaflet);
              // Set Geocoding
              var geocodeService;
              if (typeof L.esri.Geocoding === 'undefined') {
                  geocodeService = L.esri.geocodeService();
              } else {
                  geocodeService = L.esri.Geocoding.geocodeService();
              }
              // Define Marker Layer
              var markerLayer = L.layerGroup().addTo(leaflet);
              // Set Custom SVG icon marker
              var leafletIcon = L.divIcon({
                  html: `<span class="svg-icon svg-icon-primary shadow svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="24" width="24" height="0"/><path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/></g></svg></span>`,
                  bgPos: [10, 10],
                  iconAnchor: [20, 37],
                  popupAnchor: [0, -37],
                  className: 'leaflet-marker'
              });
              // Show current address
              L.marker([latitude, longitude], {
                  icon: leafletIcon
              }).addTo(markerLayer).bindPopup(address, {
                  closeButton: false
              }).openPopup();
              // Map onClick Action
              leaflet.on('click', function(e) {
                  geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
                      if (error) {
                          return;
                      }
                      markerLayer.clearLayers();
                      selectedlocation = result.address.Match_addr;
                      L.marker(result.latlng, {
                          icon: leafletIcon
                      }).addTo(markerLayer).bindPopup(result.address.Match_addr, {
                          closeButton: false
                      }).openPopup();
                  });
              });
          }
          //   Code to get reciepients orders
          var filter_recipient_id = '';
          function recipientRelatedOrders(recipient_id) {
              filter_recipient_id = recipient_id;
              $('#recipient_orders_list').bootstrapTable('refresh');
          }
          $('#recipientRelatedOrdersfilter').on('change', function() {
              // filter_recipient = $(this).val();
              $('#recipient_orders_list').bootstrapTable('refresh');
          });
          function queryParamsRecipient(p) {
              return {
                  sort: p.sort,
                  order: p.order,
                  offset: p.offset,
                  limit: p.limit,
                  search: p.search,
                  recipient_id: filter_recipient_id,
                  filter_recipient: $('#recipientRelatedOrdersfilter').val(),
              };
          }
      </script>
  @endsection
