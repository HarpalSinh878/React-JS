<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use App\Models\Regions;
use App\Models\RegionMaskedPhotos;
use App\Models\User;
use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use MatanYadaev\EloquentSpatial\Objects\Point;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dispatcher = User::where('userType', '2')->get();
        $driver = Driver::where('status', '1')->get();
        $client = User::where('status', 1)->where('userType', 1)->get();
        return view('routes.index', compact('dispatcher', 'driver', 'client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function updateroute(Request $request)
    {
        $regions_id = $request->route_id;
        $regions = Regions::find($regions_id);
        if (isset($request->modal_dispatcher)) {
            $regions->dispatcher_id = $request->modal_dispatcher;
            if ($request->modal_dispatcher > 0) {
                Order::where('regions_id', $regions_id)->update([
                    'dispatcher_id' => $request->modal_dispatcher
                ]);
            }
        }

        if (isset($request->modal_driver)) {
            $regions->driver_id = $request->modal_driver;
            if ($request->modal_driver > 0) {
                Order::where('regions_id', $regions_id)->update([
                    'driver_id' => 1000
                ]);
            }
        }

        if (isset($request->modal_service_time)) {
            $regions->service_time = $request->modal_service_time;
        }

        if (isset($request->is_request_mask_photo)) {
            $regions->is_request_mask_photo = $request->is_request_mask_photo;
        }


        if (isset($request->starts_at)) {
            $regions->started = $request->starts_at;
        }

        if (isset($request->is_route_start)) {
            $regions->is_started = 'Yes';

            Order::where('regions_id', $regions_id)->update(['status' => 'Driver Out']);
        }

        if (isset($request->is_stop_payout)) {
            $order_ids = explode(',', $request->order_uids);
            Order::where('regions_id', $regions_id)->whereIn('id', $order_ids)->update(['payout' => $request->stop_payout]);
        }

        if (isset($request->is_finish_route)) {
            Order::where('regions_id', $regions_id)->where('status', 'Driver Out')->update(['status' => 'Skipped']);
            $regions->is_finished = 'Yes';
        }

        $regions->update();
        $response['error'] = false;
        $response['message'] = "Update Successfully";
        return response()->json($response, 200);
    }
    public function deleteregion(Request $request)
    {
        $region = Regions::find($request->regions_id);
        if (!empty($region)) {
            try {
                Regions::where('id', $request->regions_id)->delete();
                Order::select('id', 'status', 'order_type')->where('status', '!=', 'Delivered')->where('regions_id', $request->regions_id)->update(['status' => 'Back to Pharmacy', 'regions_id' => 0]);
                return response()->json(['status' => 1, 'message' => 'Region Deleted Successfully'], 200);
            } catch (\Throwable $th) {
                return response()->json(['status' => 0, 'message' => 'Unable to delete The Region'], 200);
            }
        }
        return response()->json(['status' => 0, 'message' => 'Region Not Foud'], 200);
    }
    public function getregionorders(Request $request)
    {
        $orders = Order::with('recipient', 'client', 'driver')->where('regions_id', $request->regions_id);
        if ($request->has('show_pickups') == 1) {
            $orders =  $orders->where('is_pickup_order', 'Yes');
        }else{
            $orders =  $orders->where('is_pickup_order', 'No');
        }
        $orders = $orders->get();
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
        $region = Regions::with('driver')->find($request->regions_id);

        if (@$region['driver']->avatar != "") {
            $avtar = asset('assets/media/avatars/' . $region['driver']->avatar);
        } else {
            $avtar = asset('assets/media/avatars/300-1.jpg');
        }
        $tempRow['driver_info'] =  [
            'info' => "<b>#" . $region['driver']->id . "</b><br> Driver Name : <b>" . $region['driver']->name . "</b><br>",
            'avatar' => $avtar,
            'latitude' => @json_decode($region->driver_current_location, true)['latitude'],
            'longitude' => @json_decode($region->driver_current_location, true)['longitude'],
        ];

        return response()->json($tempRow);
    }
    public function showmaskedphoto(Request $request)
    {
        $region = Regions::find($request->regions_id);
        if (!empty($region)) {
            $region = RegionMaskedPhotos::where('regions_id', $request->regions_id)->select('id', 'status', 'created_at', DB::raw("CONCAT('" . url('images/mask_photo') . "/', mask_photo) AS mask_photo"))->get();
            return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $region], 200);
        }
        return response()->json(['status' => 0, 'message' => 'Region Not Foud'], 200);
    }
    public function managemaskedphoto(Request $request)
    {
        $region = RegionMaskedPhotos::where('id', $request->id)->first();
        if (\File::exists(public_path('images/mask_photo/' . $region->mask_photo))) {
            \File::delete(public_path('images/mask_photo/' . $region->mask_photo));
        }
        RegionMaskedPhotos::where('id', $request->id)->delete();
        return response()->json(['status' => 1, 'message' => 'Successfull', 'data' => $region], 200);
    }
    public function showpickuporders(Request $request)
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
        $getregiondata = Regions::find($request->regions_id);
        $sql = Order::with('recipient', 'client', 'driver')->where('regions_id', $request->regions_id)->where('is_pickup_order', 'Yes')->orderBy($sort, $order);
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
        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }
        $res = $sql->get();
        //dd(DB::getQueryLog());
        $bulkData = array();
        $bulkData['total'] = $sql->count();
        $rows = array();
        $tempRow = array();
        $count = 1;
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

            $tempRow['pickup_time'] = $row->pickup_time_min . ' - ' . $row->pickup_time_max;
            $tempRow['route_name'] = @$getregiondata->route_name != "" ? $getregiondata->route_name : '';

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
            // $tempRow['eta'] = 'No';
            // $tempRow['promised_eta'] = 'No';
            $tempRow['eta_error'] = 'No';
            $tempRow['scheduled'] = '0';
            $date = Carbon::now()->parse(date('Y-m-d H:i:s', strtotime($row->created_at)));
            $tempRow['in_system'] = $date->diffInHours(); //." hrs ".$date->diffInMinutes(). " min";
            $tempRow['in_queue'] = $date->diffInHours() . " hrs " . ($date->diffInMinutes() - ($date->diffInHours() * 60)) . " min"; //$date->h . " hrs " . $date->i . " min";
            $tempRow['last_contact_in_person'] = 'N/A';
            $tempRow['eta'] = date('H:m: A', strtotime($row->created_at));
            $tempRow['promised_eta'] = 'N/A';
            $tempRow['custom'] = 'N/A';
            // $tempRow['eta_error'] = '';
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
    public function createpickuporder(Request $request)
    {
        try {
            $getclientdata = User::find($request->client);
            $checkrecipient = Recipient::where('email',$getclientdata->email)->first();
            if(empty($checkrecipient)){
                $checkrecipient = new Recipient();
            }
            $checkrecipient->name = $getclientdata->name;
            $checkrecipient->email = $getclientdata->email != "" ? $getclientdata->email : '';
            $checkrecipient->phone = $getclientdata->phone;
            $checkrecipient->home_phone = !empty($getclientdata->phone) ? '["'.$getclientdata->phone.'"]' : '[]';
            $checkrecipient->delivery_address = $getclientdata->address;
            $checkrecipient->address = $getclientdata->address;
            $checkrecipient->latitude = $getclientdata->latitude;
            $checkrecipient->longitude = $getclientdata->longitude;
            $checkrecipient->city = $getclientdata->city;
            $checkrecipient->zip = $getclientdata->zip;
            $checkrecipient->state = $getclientdata->state;
            $checkrecipient->apt = $getclientdata->apt;
            $checkrecipient->added_by = Auth::user()->id;
            $checkrecipient->save();
            $recipient_id = $checkrecipient->id;

            $order = new Order();
            $order->recipient_id = $recipient_id;
            $order->user_id = $request->client;

            $order->regions_id = $request->regions_id;
            $order->status = 'Ready for Pickup';

            $order->request_call_upon_arrival = isset($request->request_call_upon_arrival) ? $request->request_call_upon_arrival : 'No';
            $order->include_insurance = isset($request->include_insurance) ? $request->include_insurance : 'No';
            $order->order_total_price =  isset($request->order_total_price) ? $request->order_total_price : '0';
            $order->insurance_rate =  isset($request->insurance) ? $request->insurance : '0.0';
            $order->delivery_methods_type = isset($request->delivery_methods) ? $request->delivery_methods : 'face2face';
            $order->special_instructions  = isset($request->special_instructions) ? $request->special_instructions : '';
            $order->weight = isset($request->package_weight) ? $request->package_weight : 'small';
            $order->items = isset($request->package_item) ? $request->package_item : '1';
            $order->copay = isset($request->package_copay) ? $request->package_copay : '';
            $order->order_type = isset($request->package_type) ? $request->package_type : 'regular';
            $order->subtype_fridge = isset($request->package_subtype) ? $request->package_subtype : 'No';
            $order->store_in_fridge = isset($request->store_in_fridge) ? $request->store_in_fridge : '';
            $order->subtype_confidential = isset($request->subtype_confidential) ? $request->subtype_confidential : 'No';
            $order->subtype_sensitive = isset($request->subtype_sensitive) ? $request->subtype_sensitive : 'No';
            $order->subtype_hazardous = isset($request->subtype_hazardous) ? $request->subtype_hazardous : 'No';
            $order->subtype_controlled = isset($request->subtype_controlled) ? $request->subtype_controlled : 'No';
            $order->subtype_woundcare = isset($request->subtype_woundcare) ? $request->subtype_woundcare : 'No';
            $order->date_to_deliver = isset($request->date_to_deliver) ? $request->date_to_deliver : '';
            $order->time_to_deliver = isset($request->pickup_time_min) ? $request->pickup_time_min : '';
            $order->time_window_deliveries = isset($request->time_window_deliveries) ? $request->time_window_deliveries : '';
            $order->pickup_date = isset($request->date_to_deliver) ? $request->date_to_deliver : '';
            $order->pickup_time_min = isset($request->pickup_time_min) ? $request->pickup_time_min : '';
            $order->pickup_time_max =  isset($request->pickup_time_max) ? $request->pickup_time_max : '';
            $order->recipient_email_to_owner =  isset($request->recipient_email_to_owner) ? $request->recipient_email_to_owner : 'No';
            $order->operator_initials =  isset($request->operator_initials) ? $request->operator_initials : '';
            $order->documents_to_sign_by_recipient =  isset($request->document_to_sign_by_recipient) ? implode(',', $request->document_to_sign_by_recipient) : '';
            $order->added_by = Auth::user()->id;
    
            $order->is_pickup_order	= 'Yes';
            
            $order->latitude = ($checkrecipient->latitude) ? $checkrecipient->latitude : '';
            $order->longitude = ($checkrecipient->longitude) ? $checkrecipient->longitude : '';
            $order->location = new Point($checkrecipient->latitude, $checkrecipient->longitude);
            $order->address = $checkrecipient->address;
    
            $order->save();

            return response()->json(["status" => 1, "message" => 'Order Created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(["status" => 0, "message" => 'Something Went Wrong!!'], 200);
        }

        // Update Order Info --- End
    }
}
