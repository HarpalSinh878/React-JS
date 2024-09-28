<?php
namespace App\Http\Controllers;
use App\Models\Driver;
use App\Models\Order;
use App\Models\OrdersActivity;
use App\Models\OrdersDocument;
use App\Models\OrdersStatusActivity;
use App\Models\Prescriptions;
use App\Models\Recipient;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use MatanYadaev\EloquentSpatial\Objects\Point;
use App\Models\OrderType;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!has_permissions('read', 'orders')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $driver = Driver::where('status', 1)->get();
            return view('orders.index', compact('driver'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = Driver::where('status', 1)->get();
        $client = User::where('status', 1)->where('userType', 1)->get();
        return view('orders.new-order', compact('driver', 'client'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //return $request;
            $recipient_home_phone = array();
            $recipient_other_email = array();
            if (isset($request->recipient_home_phone)) {
                for ($i = 0; $i < count($request->recipient_home_phone); $i++) {
                    $recipient_home_phone[$i] = $request->recipient_home_phone[$i]['recipient_home_phone'];
                }
            }
            if (isset($request->kt_docs_repeater_recipient_email[1])) {
                for ($i = 1; $i <= count($request->kt_docs_repeater_recipient_email); $i++) {
                    if (isset($request->kt_docs_repeater_recipient_email[$i])) {
                        $recipient_other_email[$i] = $request->kt_docs_repeater_recipient_email[$i]['recipient_email'];
                    }
                }
            }
            $recipient_email = ($request->kt_docs_repeater_recipient_email['0']) ? $request->kt_docs_repeater_recipient_email['0']['recipient_email'] : '';
            $recipient_cell_phone = $request->recipient_cell_phone;
            if (!empty($recipient_email)) {
                $recipient = Recipient::where('email', $recipient_email)->first();
            } else {
                $recipient = Recipient::where('phone', $recipient_cell_phone)->first();
            }
            if (empty($recipient)) {
                $saveRecipient = new Recipient();
                $saveRecipient->name = ($request->recipient_name) ? $request->recipient_name : '';
                $saveRecipient->email = ($recipient_email) ? $recipient_email : '';
                $saveRecipient->phone = ($recipient_cell_phone) ? $recipient_cell_phone : '';
                $saveRecipient->address = ($request->recipient_address) ? $request->recipient_address : '';
                $saveRecipient->delivery_address = ($request->recipient_address) ? $request->recipient_address : '';
                $saveRecipient->city = ($request->city) ? $request->city : '';
                $saveRecipient->zip = ($request->zip) ? $request->zip : '';
                $saveRecipient->state = ($request->state) ? $request->state : '';
                $saveRecipient->apt = ($request->floor) ? $request->floor : '';
                $saveRecipient->home_phone = (!empty($recipient_home_phone)) ? json_encode($recipient_home_phone)  : '[]';
                $saveRecipient->other_email = (!empty($recipient_other_email)) ? json_encode($recipient_other_email)  : '[]';
                $saveRecipient->latitude = ($request->latitude) ? $request->latitude : '';
                $saveRecipient->longitude = ($request->longitude) ? $request->longitude : '';
                $saveRecipient->added_by = Auth::user()->id;
                $saveRecipient->save();
                $recipient_id = $saveRecipient->id;
            } else {
                $recipient->latitude = ($request->latitude) ? $request->latitude : '';
                $recipient->longitude = ($request->longitude) ? $request->longitude : '';
                $recipient->delivery_address = ($request->recipient_address) ? $request->recipient_address : '';
                $recipient->update();
                $recipient_id = $recipient->id;
            }
            $order = new Order();
            $order->recipient_id = $recipient_id;
            $order->user_id = $request->client;
            $order->request_call_upon_arrival = isset($request->request_call_upon_arrival) ? $request->request_call_upon_arrival : 'No';
            $order->include_insurance = isset($request->include_insurance) ? $request->include_insurance : 'No';
            $order->order_total_price =  isset($request->order_total_price) ? $request->order_total_price : '0';
            $order->insurance_rate =  isset($request->insurance) ? $request->insurance : '0.0';
            $order->delivery_methods_type = isset($request->delivery_methods) ? $request->delivery_methods : '';
            $order->special_instructions  = isset($request->special_instructions) ? $request->special_instructions : '';
            $order->weight = isset($request->package_weight) ? $request->package_weight : '';
            $order->items = isset($request->package_item) ? $request->package_item : '';
            $order->copay = isset($request->package_copay) ? $request->package_copay : '';
            $order->order_type = isset($request->package_type) ? $request->package_type : '';
            $order->subtype_fridge = isset($request->package_subtype) ? $request->package_subtype : 'No';
            $order->store_in_fridge = isset($request->store_in_fridge) ? $request->store_in_fridge : '';
            $order->subtype_confidential = isset($request->subtype_confidential) ? $request->subtype_confidential : 'No';
            $order->subtype_sensitive = isset($request->subtype_sensitive) ? $request->subtype_sensitive : 'No';
            $order->subtype_hazardous = isset($request->subtype_hazardous) ? $request->subtype_hazardous : 'No';
            $order->subtype_controlled = isset($request->subtype_controlled) ? $request->subtype_controlled : 'No';
            $order->subtype_woundcare = isset($request->subtype_woundcare) ? $request->subtype_woundcare : 'No';
            $order->date_to_deliver = isset($request->date_to_deliver) ? $request->date_to_deliver : '';
            $order->time_to_deliver = isset($request->time_to_deliver) ? $request->time_to_deliver : '';
            $order->time_window_deliveries = isset($request->time_window_deliveries) ? $request->time_window_deliveries : '';
            $order->pickup_date = isset($request->pickup_date) ? $request->pickup_date : '';
            $order->pickup_time_min = isset($request->pickup_time_min) ? $request->pickup_time_min : '';
            $order->pickup_time_max =  isset($request->pickup_time_max) ? $request->pickup_time_max : '';
            $order->recipient_email_to_owner =  isset($request->recipient_email_to_owner) ? $request->recipient_email_to_owner : 'No';
            $order->operator_initials =  isset($request->operator_initials) ? $request->operator_initials : '';
            $order->documents_to_sign_by_recipient =  isset($request->document_to_sign_by_recipient) ? implode(',', $request->document_to_sign_by_recipient) : '';
            $order->added_by =   Auth::user()->id;
            $order->latitude = ($request->latitude) ? $request->latitude : '';
            $order->longitude = ($request->longitude) ? $request->longitude : '';
            $order->location = new Point($request->latitude, $request->longitude);
            $order->address = $request->recipient_address;
            $order->save();
            $order_id = $order->id;
            if (isset($request->kt_docs_repeater_basic)) {
                for ($i = 0; $i < count($request->kt_docs_repeater_basic); $i++) {
                    $rx_number = $request->kt_docs_repeater_basic[$i]['rx_number'];
                    $date_filled = $request->kt_docs_repeater_basic[$i]['date_filled'];
                    $prescriptions = new Prescriptions();
                    $prescriptions->order_id = $order_id;
                    $prescriptions->rx_number = $rx_number;
                    $prescriptions->date_filled = $date_filled;
                    $prescriptions->save();
                }
            }
            // START :: Order Activity History
            $activity = 'New order created.';
            orderActivityHistory($order_id, $activity);
            // END :: Order Activity History
            if ($request->submitType == 'add') {
                return redirect()->back();
            } else {
                return redirect('QRCode?id=' . $order->id);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong..!')->withInput();
        }
    }
    public function updateorderdetails(Request $request)
    {
        // Update Recipient Info --- START
        $validator = Validator::make($request->all(), [
            'recipient_id' => 'required',
            'recipient_name' => 'required',
            'recipient_cell_phone' => 'required',
            'recipient_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'state' => 'required',
            'floor' => 'required',
        ], [
            'recipient_id.required' => 'Recipient Id Required',
            'recipient_name.required' => 'Please Enter Recipient Name',
            'recipient_cell_phone.required' => 'Please Enter Recipient Cell Phone',
            'recipient_address.required' => 'Please Enter Recipient Address',
            'latitude.required' => 'Invalid Address!!',
            'longitude.required' => 'Invalid Address!!',
            'city.required' => 'Please Enter city',
            'zip.required' => 'Please Enter zip',
            'state.required' => 'Please Enter state',
            'floor.required' => 'Please Enter Apt/Suite/Floor',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $key => $error) {
                return response()->json(["status" => 0, "message" => $error[0]], 200);
            }
        }
        $recipientdata = Recipient::find($request->recipient_id);
        $recipientdata->name = $request->recipient_name;
        $recipientdata->phone = $request->recipient_cell_phone;
        $recipientdata->home_phone = !empty($request->recipient_home_phone) ? array_filter($request->recipient_home_phone) : '[]';
        $recipientdata->delivery_address = $request->recipient_address;
        $recipientdata->address = $request->recipient_address;
        $recipientdata->latitude = $request->latitude;
        $recipientdata->longitude = $request->longitude;
        $recipientdata->city = $request->city;
        $recipientdata->zip = $request->zip;
        $recipientdata->state = $request->state;
        $recipientdata->apt = $request->floor;
        $recipientdata->save();
        // Update Recipient Info --- END
        // Update Order Info --- START
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'package_item' => 'required',
            'package_copay' => 'required',
            'order_type' => 'required',
            'date_to_deliver' => 'required',
            'time_to_deliver' => 'required',
        ], [
            'order_id.required' => 'Order Id Required',
            'package_item.required' => 'Please enter Items',
            'package_copay.required' => 'Please enter Copay',
            'order_type.required' => 'Please enter Order type',
            'date_to_deliver.required' => 'Please enter Date to Deliver',
            'time_to_deliver.required' => 'Please enter Time to Deliver',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $key => $error) {
                return response()->json(["status" => 0, "message" => $error[0]], 200);
            }
        }
        $order = Order::find($request->order_id);
        $order->request_call_upon_arrival = isset($request->request_call_upon_arrival) ? $request->request_call_upon_arrival : 'No';
        $order->delivery_methods_type = isset($request->delivery_methods_type) ? $request->delivery_methods_type : '';
        $order->items = isset($request->package_item) ? $request->package_item : '';
        $order->copay = isset($request->package_copay) ? $request->package_copay : '';
        $order->order_type = isset($request->order_type) ? $request->order_type : '';
        $order->subtype_fridge = isset($request->package_subtype) ? $request->package_subtype : 'No';
        $order->store_in_fridge = isset($request->store_in_fridge) ? $request->store_in_fridge : '';
        $order->subtype_confidential = isset($request->subtype_confidential) ? $request->subtype_confidential : 'No';
        $order->subtype_sensitive = isset($request->subtype_sensitive) ? $request->subtype_sensitive : 'No';
        $order->subtype_hazardous = isset($request->subtype_hazardous) ? $request->subtype_hazardous : 'No';
        $order->subtype_controlled = isset($request->subtype_controlled) ? $request->subtype_controlled : 'No';
        $order->subtype_woundcare = isset($request->subtype_woundcare) ? $request->subtype_woundcare : 'No';
        $order->date_to_deliver = isset($request->date_to_deliver) ? $request->date_to_deliver : '';
        $order->time_to_deliver = isset($request->time_to_deliver) ? $request->time_to_deliver : '';
        $order->pickup_date = isset($request->pickup_date) ? $request->pickup_date : '';
        $order->pickup_time_min = isset($request->pickup_time_min) ? $request->pickup_time_min : '';
        $order->pickup_time_max =  isset($request->pickup_time_max) ? $request->pickup_time_max : '';
        $order->latitude = ($request->latitude) ? $request->latitude : '';
        $order->longitude = ($request->longitude) ? $request->longitude : '';
        $order->location = new Point($request->latitude, $request->longitude);
        $order->address = $request->recipient_address;
        $order->eta_date_time = $request->eta_date_time;
        $order->not_paying_copay_action = $request->not_paying_copay_action;
        $order->save();
        // Update Order Info --- End
        return response()->json(["status" => 1, "message" => 'Order details updated successfully'], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    function getRecipientOrdersHistoryList(Request $request)
    {
        // DB::enableQueryLog();
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';
        $status = 0;
        if (isset($_GET['offset'])) {
            $offset = $_GET['offset'];
        }
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }
        // if (isset($_GET['sort'])) {
        //     $sort = $_GET['sort'];
        // }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }
        $sql = Order::with('recipient', 'client', 'driver')->orderBy($sort, $order);
        if (Auth::user()->userType == 1) {
            $sql = $sql->where(function ($query) {
                $query->where('user_id', Auth::user()->id)->orWhere('added_by', Auth::user()->id);
            });
        }
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhereHas('recipient', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            })->orwhereHas('client', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            })->orwhereHas('driver', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
        }
        if ($request->has('recipient_id') && $request->recipient_id != "") {
            $sql =  $sql->where('recipient_id', $request->recipient_id);
        }
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status != 'All') {
                $sql =  $sql->where('status', $status);
            }
        }
        if ($request->has('filter_recipient') && count($request->filter_recipient) > 0) {
            $filter_recipient = $request->filter_recipient;
            $sql =  $sql->where(function ($query) use ($filter_recipient) {
                foreach ($filter_recipient as $row) {
                    if ($row == 'order_type') {
                        $query->orWhere('order_type', 'regular');
                    } else {
                        $query->orWhere($row, 'Yes');
                    }
                }
            });
        }
        $total = $sql->count();
        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }
        $res = $sql->get();
        //dd(DB::getQueryLog());
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;
        //return $res;
        $operate = '';
        foreach ($res as $row) {
            $tempRow['id'] = $row->id;
            $tempRow['status'] = getStatusBackgroundColor($row->status);
            $tempRow['status_text'] = $row->status;
            $tempRow['client'] = $row->client->name;
            $tempRow['recipient_name'] = $row->recipient->name;
            $tempRow['request_call_upon_arrival'] = $row->request_call_upon_arrival;
            $tempRow['include_insurance'] = $row->include_insurance;
            $tempRow['order_total_price'] = $row->order_total_price;
            $tempRow['insurance_rate'] = $row->insurance_rate;
            $tempRow['delivery_methods_type'] = $row->delivery_methods_type;
            $tempRow['special_instructions'] = $row->special_instructions;
            $tempRow['weight'] = $row->weight;
            $tempRow['items'] = $row->items;
            $tempRow['copay'] = $row->copay;
            $tempRow['order_type'] = $row->order_type;
            $tempRow['subtype_fridge'] = $row->subtype_fridge;
            $tempRow['store_in_fridge'] = $row->store_in_fridge;
            $tempRow['subtype_confidential'] = $row->subtype_confidential;
            $tempRow['subtype_sensitive'] = $row->subtype_sensitive;
            $tempRow['subtype_hazardous'] = $row->subtype_hazardous;
            $tempRow['subtype_controlled'] = $row->subtype_controlled;
            $tempRow['subtype_woundcare'] = $row->subtype_woundcare;
            $tempRow['documents_to_sign_by_recipient'] = $row->documents_to_sign_by_recipient;
            $tempRow['date_to_deliver'] = date('d-m-Y', strtotime($row->date_to_deliver));
            $tempRow['time_to_deliver'] = ($row->time_to_deliver != '') ? date('H:m: A', strtotime($row->time_to_deliver)) : 'N/A';
            $tempRow['pickup_date'] = $row->pickup_date;
            $tempRow['pickup_time_min'] = $row->pickup_time_min;
            $tempRow['pickup_time_max'] = $row->pickup_time_max;
            $tempRow['recipient_email_to_owner'] = $row->recipient_email_to_owner;
            $tempRow['operator_initials'] = $row->operator_initials;
            $tempRow['is_sms'] = $row->is_sms;
            $tempRow['is_call'] = $row->is_call;
            $tempRow['condition'] = $row->condition;
            $tempRow['facility'] = 'New York';
            $tempRow['hub'] = 'Long Island';
            $tempRow['created_at'] = date('d/m/Y h:m: A', strtotime($row->created_at));
            $tempRow['hub'] = 'Long Island';
            $tempRow['supply_regular'] = 'No';
            $tempRow['supply_plus_rx'] = 'No';
            $tempRow['eta'] = 'No';
            $tempRow['promised_eta'] = 'No';
            $tempRow['eta_error'] = 'No';
            $tempRow['scheduled'] = '0';
            $date = Carbon::now()->parse(date('Y-m-d H:i:s', strtotime($row->created_at)));
            $tempRow['in_system'] = $date->diffInHours(); //." hrs ".$date->diffInMinutes(). " min";
            $tempRow['in_queue'] = $date->diffInHours() . " hrs " . ($date->diffInMinutes() - ($date->diffInHours() * 60)) . " min"; //$date->h . " hrs " . $date->i . " min";
            $tempRow['last_contact_in_person'] = 'N/A';
            $tempRow['eta'] = date('H:m: A', strtotime($row->created_at));
            $tempRow['promised_eta'] = 'N/A';
            $tempRow['custom'] = 'N/A';
            $tempRow['eta_error'] = '';
            $tempRow['remote_id'] = '';
            $tempRow['recipient_address'] = $row->recipient->address;
            $tempRow['recipient_city'] = $row->recipient->city;
            $tempRow['recipient_state'] = $row->recipient->state;
            $tempRow['recipient_zip'] = $row->recipient->zip;
            $tempRow['recipient_apt'] = $row->recipient->apt;
            $tempRow['recipient_phone'] = $row->recipient->phone;
            $tempRow['driver_id'] = $row->driver_id;
            $tempRow['dispatcher_id'] = $row->dispatcher_id;
            $tempRow['contents'] = ($row->contents != null) ? $row->contents : '';
            $tempRow['note_added'] = $row->note_added;
            $tempRow['is_copay_payed'] = $row->is_copay_payed;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['dispatcher_id'] = $row->dispatcher_id;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['recipient_latitude'] = $row->recipient->latitude;
            $tempRow['recipient_longitude'] = $row->recipient->longitude;
            $tempRow['driver_name'] = isset($row->driver) ? $row->driver->name : 'N/A';
            $operate =  '<a href="#" data-bs-toggle="modal" data-bs-target="#order_details_model" class="link-underlined view">  <i class="icmn-pointer"></i>#' . $row->id . '</a>';
            $tempRow['action'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
    public function getAllOrderList()
    {
        // DB::enableQueryLog();
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';
        $status = 0;
        if (isset($_GET['offset'])) {
            $offset = $_GET['offset'];
        }
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }
        // if (isset($_GET['sort'])) {
        //     $sort = $_GET['sort'];
        // }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }
        $sql = Order::with('recipient', 'client', 'driver', 'dispatcher')->orderBy($sort, $order);
        if (Auth::user()->userType == 1) {
            $sql = $sql->where(function ($query) {
                $query->where('user_id', Auth::user()->id)->orWhere('added_by', Auth::user()->id);
            });
        }
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhereHas('recipient', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            })->orwhereHas('client', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            })->orwhereHas('driver', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
        }
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if ($status != 'All') {
                $sql =  $sql->where('status', $status);
            }
        }
        $total = $sql->count();
        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }
        $res = $sql->get();
        //dd(DB::getQueryLog());
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;
        $operate = '';
        foreach ($res as $row) {
            $tempRow['id'] = $row->id;
            $tempRow['status'] = getStatusBackgroundColor($row->status);
            $tempRow['status_text'] = $row->status;
            $tempRow['client'] = $row->client->name;
            $tempRow['client_url'] = '<a target="_blank" class="link-dark text-decoration-underline" href="' . url('editclient') . "/" . $row->user_id . '"  aria-selected="true" ></i>&nbsp;' . $row->client->name . '</a>';
            $tempRow['recipient_name'] = $row->recipient->name;
            $tempRow['request_call_upon_arrival'] = $row->request_call_upon_arrival;
            $tempRow['include_insurance'] = $row->include_insurance;
            $tempRow['order_total_price'] = $row->order_total_price;
            $tempRow['insurance_rate'] = $row->insurance_rate;
            $tempRow['delivery_methods_type'] = $row->delivery_methods_type;
            $tempRow['special_instructions'] = $row->special_instructions;
            $tempRow['weight'] = $row->weight;
            $tempRow['items'] = $row->items;
            $tempRow['copay'] = $row->copay;
            $tempRow['order_type'] = $row->order_type;
            $tempRow['subtype_fridge'] = $row->subtype_fridge;
            $tempRow['store_in_fridge'] = $row->store_in_fridge;
            $tempRow['subtype_confidential'] = $row->subtype_confidential;
            $tempRow['subtype_sensitive'] = $row->subtype_sensitive;
            $tempRow['subtype_hazardous'] = $row->subtype_hazardous;
            $tempRow['subtype_controlled'] = $row->subtype_controlled;
            $tempRow['subtype_woundcare'] = $row->subtype_woundcare;
            $tempRow['documents_to_sign_by_recipient'] = $row->documents_to_sign_by_recipient;
            $tempRow['date_to_deliver'] = date('d-m-Y', strtotime($row->date_to_deliver));
            $tempRow['time_to_deliver'] = ($row->time_to_deliver != '') ? date('H:m: A', strtotime($row->time_to_deliver)) : 'N/A';
            $tempRow['pickup_date'] = $row->pickup_date;
            $tempRow['pickup_time_min'] = $row->pickup_time_min;
            $tempRow['pickup_time_max'] = $row->pickup_time_max;
            $tempRow['recipient_email_to_owner'] = $row->recipient_email_to_owner;
            $tempRow['operator_initials'] = $row->operator_initials;
            $tempRow['is_sms'] = $row->is_sms;
            $tempRow['is_call'] = $row->is_call;
            $tempRow['condition'] = $row->condition;
            $tempRow['facility'] = 'New York';
            $tempRow['hub'] = 'Long Island';
            $tempRow['created_at'] = date('d/m/Y h:m: A', strtotime($row->created_at));
            $tempRow['hub'] = 'Long Island';
            $tempRow['scheduled'] = '0';
            $date = Carbon::now()->parse(date('Y-m-d H:i:s', strtotime($row->created_at)));
            $tempRow['in_system'] = $date->diffInHours(); //." hrs ".$date->diffInMinutes(). " min";
            $tempRow['in_queue'] = $date->diffInHours() . " hrs " . ($date->diffInMinutes() - ($date->diffInHours() * 60)) . " min"; //$date->h . " hrs " . $date->i . " min";
            $tempRow['last_contact_in_person'] = 'N/A';
            $tempRow['eta'] = date('H:m: A', strtotime($row->created_at));
            $tempRow['promised_eta'] = 'N/A';
            $tempRow['custom'] = 'N/A';
            $tempRow['eta_error'] = '';
            $tempRow['remote_id'] = '';
            $tempRow['contents'] = $row->contents;
            $tempRow['note_added'] = $row->note_added;
            $tempRow['is_copay_payed'] = $row->is_copay_payed;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['dispatcher_id'] = $row->dispatcher_id;
            $tempRow['regions_id'] = $row->regions_id;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['recipient_address'] = $row->recipient->address;
            $tempRow['recipient_city'] = $row->recipient->city;
            $tempRow['recipient_state'] = $row->recipient->state;
            $tempRow['recipient_zip'] = $row->recipient->zip;
            $tempRow['recipient_apt'] = $row->recipient->apt;
            $tempRow['recipient_phone'] = $row->recipient->phone;
            $tempRow['recipient_latitude'] = $row->recipient->latitude;
            $tempRow['recipient_longitude'] = $row->recipient->longitude;
            $tempRow['recipient_name'] = '<a target="_blank" class="link-dark text-decoration-underline" data-bs-toggle="modal" data-bs-target="#recipientRelatedOrdersModal" onclick="recipientRelatedOrders(' . $row->recipient_id . ')" aria-selected="false" tabindex="-1" role="tab"><i class="bi bi-hand-index"></i>&nbsp;' . $row->recipient->name . '</a>';
            $tempRow['dispatcher_id'] = $row->dispatcher_id;
            $tempRow['dispatcher_name'] = isset($row->dispatcher) ? $row->dispatcher->name : 'N/A';
            $tempRow['driver_id'] = $row->driver_id;
            $tempRow['driver_name'] = isset($row->driver) ? $row->driver->name : 'N/A';
            $driver_profile = '';
            if ($row->driver_id > 0) {
                if ($row->driver != "" && $row->driver->avatar != "") {
                    $driver_profile = '<img  alt="" src="' . url('') . config('global.IMG_PATH') . config('global.DRIVER_IMG_PATH') . $row->driver->avatar . '">';
                }else{
                    $driver_profile = "<img src=" . asset('assets/media/avatars/300-1.jpg') . " alt='driver'>";
                }
            }
            $tempRow['driver_profile'] = $driver_profile; 
            // isset($row->driver) ? (($row->driver->avatar != '') ? '<img  alt="" src="' . url('') . config('global.IMG_PATH') . config('global.DRIVER_IMG_PATH') . $row->driver->avatar . '">' : "<img src=" . asset('assets/media/avatars/300-1.jpg') . " alt='driver'>") : ("<img src=" . asset('assets/media/avatars/300-1.jpg') . " alt='driver'>");
            $operate =  '<a href="#" data-bs-toggle="modal" data-bs-target="#order_details_model" class="link-underlined view">  <i class="icmn-pointer"></i>#' . $row->id . '</a>';
            $tempRow['action'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
    public function saveStatus(Request $request)
    {
        $id = $request->orderid;
        $order = Order::find($id);
        if ($order == '') {
            return redirect()->back()->with('error', 'Order Id Not Found');
        } else {
            //// START :: Order Activity History
            $activity = 'Changed status from ' . $order->status . ' to ' . $request->status;
            orderActivityHistory($id, $activity);
            //// END :: Order Activity History
            //// START :: Order Status History
            orderStatusHistory($id, $order->status, $request->status);
            //// END :: Order Status History
            $order->status = $request->status;
            $order->update();
            if ($request->ajax()) {
                $response['error'] = false;
                return response()->json($response);
            } else {
                return redirect()->back()->with('success', 'Order Status Change Succssfully');
            }
        }
    }
    public function saveMultipleStatus(Request $request)
    {
        $ids = $request->ids;
        for ($i = 0; $i < count($ids); $i++) {
            $order = Order::find($ids[$i]['id']);
            //// START :: Order Activity History
            $activity = 'Changed status from ' . $order->status . ' to ' . $request->status;
            orderActivityHistory($order->id, $activity);
            //// END :: Order Activity History
            //// START :: Order Status History
            orderStatusHistory($order->id, $order->status, $request->status);
            //// END :: Order Status History
            $order->status = $request->status;
            $order->update();
        }
        $response['error'] = false;
        return response()->json($response);
    }
    public function driverNote(Request $request)
    {
        $order_id = $request->order_id;
        $order = Order::find($order_id);
        $FolderPath = public_path('images') . config('global.ORDERS_IMG_PATH');
        if (!is_dir($FolderPath)) {
            mkdir($FolderPath, 0777, true);
        }
        $destinationPath = public_path('images') . config('global.ORDERS_IMG_PATH') . "/" . $order_id;
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        if ($request->hasfile('attachfile')) {
            foreach ($request->file('attachfile') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move($destinationPath, $name);
                OrdersDocument::create([
                    'order_id' => $order_id,
                    'document' => $name,
                    'type' => '1'
                ]);
            }
        }
        if ($request->hasfile('attachsignature')) {
            foreach ($request->file('attachsignature') as $file) {
                $name = time() . rand(1, 1000) . '.' . $file->extension();
                $file->move($destinationPath, $name);
                OrdersDocument::create([
                    'order_id' => $order_id,
                    'document' => $name,
                    'type' => '2'
                ]);
            }
        }
        if ($request->hasfile('copay')) {
            foreach ($request->file('copay') as $file) {
                $name = time() . rand(1, 1000) . '.' . $file->extension();
                $file->move($destinationPath, $name);
                OrdersDocument::create([
                    'order_id' => $order_id,
                    'document' => $name,
                    'type' => '3'
                ]);
            }
        }
        if ($request->hasfile('fridge')) {
            foreach ($request->file('fridge') as $file) {
                $name = time() . rand(1, 1000) . '.' . $file->extension();
                $file->move($destinationPath, $name);
                OrdersDocument::create([
                    'order_id' => $order_id,
                    'document' => $name,
                    'type' => '4'
                ]);
            }
        }
        //// START :: Order Activity History
        $activity = 'Add Or Update Driver Notes';
        orderActivityHistory($order->id, $activity);
        //// END :: Order Activity History
        $order->driver_id = ($request->driver != '') ? $request->driver : 0;
        if ($request->status != '') {
            //// START :: Order Status History
            orderStatusHistory($order->id, $order->status, $request->status);
            //// END :: Order Status History
            $order->status = $request->status;
        }
        if ($request->contents != '') {
            $order->contents = $request->contents;
        }
        if ($request->note_added != '') {
            $order->note_added = $request->note_added;
        }
        if ($request->is_copay_payed != '') {
            $order->is_copay_payed = $request->is_copay_payed;
        }
        $order->update();
        return redirect()->back()->with('success', 'Update Succssfully');
    }
    public function getOrderDocument(Request $request)
    {
        $order_id = $request->id;
        $document = OrdersDocument::where('order_id', $order_id)->get();
        foreach ($document as $row) {
            if (filter_var($row->document, FILTER_VALIDATE_URL) === false) {
                $row->document = ($row->document != '') ? url('') . '/images' . config('global.ORDERS_IMG_PATH')  . $order_id . "/" . $row->document : '';
            } else {
                $row->document = $row->document;
            }
        }
        return $document;
    }
    public function orderQRcode(Request $request)
    {
        $order_id = explode(',', $request->id);
        foreach ($order_id as $row) {
            //// START :: Order Activity History
            $activity = 'Printed a label.';
            orderActivityHistory($row, $activity);
            //// END :: Order Activity History
        }
        $order = Order::with('recipient')->WhereIn('id', $order_id)->get();
        foreach ($order as $key => $value) {
            
            if ($value->is_pickup_order == "Yes" && $value->status == "Ready to Print") {
                
                $activity = 'Changed status from ' . $value->status . ' to Ready for Pickup';
                orderActivityHistory($value->id, $activity);
                orderStatusHistory($value->id, $value->status, 'Ready for Pickup');
                $checkorder = Order::find($value->id);
                $checkorder->status = "Ready for Pickup";
                $checkorder->save();
            }
        }
        return view('qrcode', compact('order'));
    }
    public function deliveryslip(Request $request)
    {
        $order_id = explode(',', $request->id);
        foreach ($order_id as $row) {
            //// START :: Order Activity History
            $activity = 'Print Delivery Slip';
            orderActivityHistory($row, $activity);
            //// END :: Order Activity History
        }
        $order = Order::with('recipient', 'client', 'prescriptions')->WhereIn('id', $order_id)->get();
        return view('deliveryslip', compact('order'));                     
    }
    public function confirmation(Request $request)
    {
        $order_id = explode(',', $request->id);
        foreach ($order_id as $row) {
            //// START :: Order Activity History
            $activity = 'Print Confirmation';
            orderActivityHistory($row, $activity);
            //// END :: Order Activity History
        }
        $order = Order::with('recipient', 'client', 'prescriptions', 'driver')->WhereIn('id', $order_id)->get();
        return view('confirmation', compact('order'));
    }
    public function deliveryslipandconfirmation(Request $request)
    {
        $order_id = $request->id;
        //// START :: Order Activity History
        $activity = 'Print Delivery Slip And Confirmation';
        orderActivityHistory($order_id, $activity);
        //// END :: Order Activity History
        $order = Order::with('recipient', 'client', 'prescriptions', 'driver')->where('id', $order_id)->first();
        return view('confirmationanddeliveryslip', compact('order'));
    }
    public function getOrderStatusHistoryList()
    {
        // DB::enableQueryLog();
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';
        $status = 0;
        if (isset($_GET['offset'])) {
            $offset = $_GET['offset'];
        }
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }
        // if (isset($_GET['sort'])) {
        //     $sort = $_GET['sort'];
        // }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }
        $sql = OrdersStatusActivity::with('user')->orderBy($sort, $order);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->where('from', 'LIKE', "%$search%")->where('to', 'LIKE', "%$search%")->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
        }
        if (isset($_GET['order_id']) && $_GET['order_id'] != '') {
            $order_id = $_GET['order_id'];
            $sql = $sql->where('order_id', $order_id);
        }
        $total = $sql->count();
        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }
        $res = $sql->get();
        //dd(DB::getQueryLog());
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;
        //return $res;
        foreach ($res as $row) {
            $tempRow['id'] = $row->id;
            $from_status_color = getStatusBackgroundColor($row->from);
            // if ($row->from == 'Ready to Print') {
            //     $from_status_color = '<span class="badge badge-success">Ready To Print</span>';
            // } else if ($row->from == 'Ready for Pickup') {
            //     $from_status_color = '<span class="badge badge-light">Ready To Pickup</span>';
            // } else if ($row->from == 'Pickup Occurred') {
            //     $from_status_color = '<span class="badge badge-primary">Pickup Occurred</span>';
            // } else if ($row->from == 'Route Optimized') {
            //     $from_status_color = '<span class="badge badge-secondary">Route Optimized</span>';
            // } else if ($row->from == 'Ready for Delivery') {
            //     $from_status_color = '<span class="badge badge-info">Ready For Delivery</span>';
            // } else if ($row->from == 'Driver Out') {
            //     $from_status_color = '<span class="badge badge-light">Driver Out</span>';
            // } else if ($row->from == 'Delivered') {
            //     $from_status_color = '<span class="badge badge-success">Delivered</span>';
            // } else if ($row->from == 'Delivery Attempted') {
            //     $from_status_color = '<span class="badge badge-warning">Delivery Attempted</span>';
            // } else if ($row->from == 'Returned') {
            //     $from_status_color = '<span class="badge badge-dark">Delivery Attempted</span>';
            // } else if ($row->from == 'Rejected') {
            //     $from_status_color = '<span class="badge badge-danger">Rejected</span>';
            // } else if ($row->from == 'Investigation') {
            //     $from_status_color = '<span class="badge badge-primary">Investigation</span>';
            // } else if ($row->from == 'Back To Pharmacy') {
            //     $from_status_color = '<span class="badge badge-light">Back to Pharmacy</span>';
            // } else if ($row->from == 'Other Date Delivery') {
            //     $from_status_color = '<span class="badge badge-info">Other Date Delivery</span>';
            // } else if ($row->from == 'Ready To Optimize') {
            //     $from_status_color = '<span class="badge badge-dark">Ready To Optimize</span>';
            // } else if ($row->from == 'On Its Way To Facility') {
            //     $from_status_color = '<span class="badge badge-warning">On Its Way To Facility</span>';
            // }
            $to_status_color = getStatusBackgroundColor($row->to);
            // if ($row->to == 'Ready to Print') {
            //     $to_status_color = '<span class="badge badge-success">Ready To Print</span>';
            // } else if ($row->to == 'Ready for Pickup') {
            //     $to_status_color = '<span class="badge badge-light">Ready To Pickup</span>';
            // } else if ($row->to == 'Pickup Occurred') {
            //     $to_status_color = '<span class="badge badge-primary">Pickup Occurred</span>';
            // } else if ($row->to == 'Route Optimized') {
            //     $to_status_color = '<span class="badge badge-secondary">Route Optimized</span>';
            // } else if ($row->to == 'Ready for Delivery') {
            //     $to_status_color = '<span class="badge badge-info">Ready For Delivery</span>';
            // } else if ($row->to == 'Driver Out') {
            //     $to_status_color = '<span class="badge badge-light">Driver Out</span>';
            // } else if ($row->to == 'Delivered') {
            //     $to_status_color = '<span class="badge badge-success">Delivered</span>';
            // } else if ($row->to == 'Delivery Attempted') {
            //     $to_status_color = '<span class="badge badge-warning">Delivery Attempted</span>';
            // } else if ($row->to == 'Returned') {
            //     $to_status_color = '<span class="badge badge-dark">Delivery Attempted</span>';
            // } else if ($row->to == 'Rejected') {
            //     $to_status_color = '<span class="badge badge-danger">Rejected</span>';
            // } else if ($row->to == 'Investigation') {
            //     $to_status_color = '<span class="badge badge-primary">Investigation</span>';
            // } else if ($row->to == 'Back To Pharmacy') {
            //     $to_status_color = '<span class="badge badge-light">Back to Pharmacy</span>';
            // } else if ($row->to == 'Other Date Delivery') {
            //     $to_status_color = '<span class="badge badge-info">Other Date Delivery</span>';
            // } else if ($row->to == 'Ready To Optimize') {
            //     $to_status_color = '<span class="badge badge-dark">Ready To Optimize</span>';
            // } else if ($row->to == 'On Its Way To Facility') {
            //     $to_status_color = '<span class="badge badge-warning">On Its Way To Facility</span>';
            // }
            $tempRow['from'] = $from_status_color;
            $tempRow['to'] = $to_status_color;
            $tempRow['user'] = '<a target="_blank" class="link-dark text-decoration-underline" data-bs-toggle="modal" data-bs-target="#recipientRelatedOrdersModal" onclick="recipientRelatedOrders(' . $row->added_by . ')" aria-selected="false" tabindex="-1" role="tab"><i class="bi bi-hand-index"></i>&nbsp;' . (isset($row->user) ? $row->user->name : '') . '</a>';
            $tempRow['time'] = date('d/m/Y h:m A', strtotime($row->created_at)) . " " . $row->created_at->diffForHumans();
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
    public function getOrderActivityHistoryList()
    {
        // DB::enableQueryLog();
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';
        if (isset($_GET['offset'])) {
            $offset = $_GET['offset'];
        }
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }
        $sql = OrdersActivity::with('user')->orderBy($sort, $order);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->where('from', 'LIKE', "%$search%")->where('to', 'LIKE', "%$search%")->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            });
        }
        if (isset($_GET['order_id']) && $_GET['order_id'] != '') {
            $order_id = $_GET['order_id'];
            $sql = $sql->where('order_id', $order_id);
        }
        $total = $sql->count();
        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }
        $res = $sql->get();
        //dd(DB::getQueryLog());
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;
        //return $res;
        foreach ($res as $row) {
            $tempRow['id'] = $row->id;
            $tempRow['type'] = $row->type;
            $tempRow['order_id'] = "#" . $row->order_id;
            $tempRow['activity'] = $row->activity;
            $tempRow['user'] = '<a target="_blank" class="link-dark text-decoration-underline"><i class="bi bi-hand-index"></i>&nbsp;' . (isset($row->user) ? $row->user->name : '') . '</a>';
            $tempRow['time'] = date('d/m/Y h:m A', strtotime($row->created_at)) . " " . $row->created_at->diffForHumans();
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
    public function pullOrders(Request $request)
    {
        $orders = Order::with('recipient', 'client', 'driver')->where('status', $request->status)->get();
        $rows = array();
        $rows1 = array();
        $tempRow = array();
        $count = 1;
        $i = 0;
        // $markers['markers'] = array();
        // $info['info'] = array();
        $tempRow['markers'] = array();
        $tempRow['info'] = array();
        //return $res;
        foreach ($orders as $row) {
            $status_color = getStatusBackgroundColor($row->status);
            // if ($row->status == 'Ready to Print') {
            //     $status_color = '<span class="badge badge-success">Ready To Print</span>';
            // } else if ($row->status == 'Ready for Pickup') {
            //     $status_color = '<span class="badge badge-light">Ready To Pickup</span>';
            // } else if ($row->status == 'Pickup Occurred') {
            //     $status_color = '<span class="badge badge-primary">Pickup Occurred</span>';
            // } else if ($row->status == 'Route Optimized') {
            //     $status_color = '<span class="badge badge-secondary">Route Optimized</span>';
            // } else if ($row->status == 'Ready for Delivery') {
            //     $status_color = '<span class="badge badge-info">Ready For Delivery</span>';
            // } else if ($row->status == 'Driver Out') {
            //     $status_color = '<span class="badge badge-light">Driver Out</span>';
            // } else if ($row->status == 'Delivered') {
            //     $status_color = '<span class="badge badge-success">Delivered</span>';
            // } else if ($row->status == 'Delivery Attempted') {
            //     $status_color = '<span class="badge badge-warning">Delivery Attempted</span>';
            // } else if ($row->status == 'Returned') {
            //     $status_color = '<span class="badge badge-dark">Delivery Attempted</span>';
            // } else if ($row->status == 'Rejected') {
            //     $status_color = '<span class="badge badge-danger">Rejected</span>';
            // } else if ($row->status == 'Investigation') {
            //     $status_color = '<span class="badge badge-primary">Investigation</span>';
            // } else if ($row->status == 'Back to Pharmacy') {
            //     $status_color = '<span class="badge badge-light">Back to Pharmacy</span>';
            // } else if ($row->status == 'Other Date Delivery') {
            //     $status_color = '<span class="badge badge-info">Other Date Delivery</span>';
            // } else if ($row->status == 'Ready To Optimize') {
            //     $status_color = '<span class="badge badge-dark">Ready To Optimize</span>';
            // } else if ($row->status == 'On Its Way To Facility') {
            //     $status_color = '<span class="badge badge-warning">On Its Way To Facility</span>';
            // }
            $rows[$i][0] = $row->id;
            $rows[$i][1] = $row->latitude;
            $rows[$i][2] = $row->longitude;
            $rows[$i][3] = $row->recipient->delivery_address;
            $rows[$i][4] = $status_color;
            $rows[$i][5] = $row->order_type;
            $rows[$i][6] = $row->sub_status;
            $rows[$i]['order_status'] = $row->status;
            $rows[$i]['recipient_apt'] = $row->recipient->apt;
            $rows[$i]['recipient_name'] = $row->recipient->name;
            $rows[$i]['recipient_phone'] = $row->recipient->phone;
            $rows1[$i][0] =  "<b>#" . $row->id . "</b><br>Type: <b>" . $row->order_type . "</b><br>" . $row->recipient->name . "<br>" . $row->recipient->address . " <br>+1" . $row->recipient->phone . "<br><br>" . $status_color;
            $tempRow['markers'] =  $rows;
            $tempRow['info'] =  $rows1;
            $count++;
            $i++;
        }
        return response()->json($tempRow);
    }

    public function geteditdata(Request $request)
    {
        try {
            $getorderdetails = Order::with('recipient')->where('id', $request->id)->first();
            $getordertypes = OrderType::where('isActive', 'Yes')->get();
            $data = view("orders.edit-order-modal", compact('getorderdetails', 'getordertypes'))->render();
            return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $data], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Invalid Order'], 200);
        }
    }
}
