<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QaqcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::where('status', 1)->get();
        return view('qaqc.dashboard',compact('driver'));
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

    public function getQaqcDashboardList()
    {
         DB::enableQueryLog();

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


        $sql = Order::where('driver_id',"!=",0)->with('recipient', 'client', 'driver');

        

        if (isset($_GET['driver_filter'])) {
            $driver_id = $_GET['driver_filter'];
            if($driver_id  != ''){
                $sql =  $sql->where('driver_id', $driver_id);
            }
           
        }   
        
        if($_GET['date_after'] != '' || $_GET['date_before'] != ''){

           
            if ((isset($_GET['date_after']) && $_GET['date_after'] != '') && (isset($_GET['date_before']) && $_GET['date_before'] != '')) {
                $date_after = date('Y-m-d',strtotime($_GET['date_after']));
                $date_before = date('Y-m-d',strtotime($_GET['date_before']));
                $sql =  $sql->whereBetween(DB::raw('DATE(note_added)'), [$date_after, $date_before]);
            }else if (isset($_GET['date_after']) && $_GET['date_after'] != '') {
                $date_after = date('Y-m-d',strtotime($_GET['date_after']));
                $sql =  $sql->where(DB::raw("DATE(note_added) = '".$date_after."'"));
            }else if (isset($_GET['date_before']) && $_GET['date_before'] != '') {
                $date_before = date('Y-m-d',strtotime($_GET['date_before']));
                $sql =  $sql->where(DB::raw("DATE(note_added) = '".$date_before."'"));
            }
        }else{
            $sql =  $sql->whereDate('note_added', '=', Carbon::today()->toDateString());
        }
        

        $total = $sql->count();

        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }


        $res = $sql->orderBy($sort, $order)->get();
        //dd(DB::getQueryLog());
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;

        //return $res;
        $operate = '';
        foreach ($res as $row) {
            
            $tempRow['no'] = $count;
            $tempRow['qaqc'] = '<div style="width: 180px;"><div style="display: inline-block; font-weight: bold; color: green; font-size: 10px; margin: 5px;">DD</div><div style="display: inline-block; font-weight: bold; color: green; font-size: 10px; margin: 5px;">GF</div><div style="display: inline-block; font-weight: bold; color: green; font-size: 10px; margin: 5px;">PHC</div><div style="display: inline-block; font-weight: bold; color: red; font-size: 10px; margin: 5px;">Ph.Dl</div><div style="display: inline-block; font-weight: bold; color: red; font-size: 10px; margin: 5px;">Ph.Sg</div><div style="display: inline-block; font-weight: bold; color: red; font-size: 10px; margin: 5px;">DM</div><div style="display: inline-block; font-weight: bold; color: red; font-size: 10px; margin: 5px;">RN</div></div>';
            $tempRow['note_date'] = date('d/m/Y h:m: A', strtotime($row->note_added));;
        
            $tempRow['id'] = $row->id;

            $status_color = '';

            if ($row->status == 'Ready to Print') {
                $status_color = '<span class="badge badge-success">Ready To Print</span>';
            } else if ($row->status == 'Ready for Pickup') {
                $status_color = '<span class="badge badge-light">Ready To Pickup</span>';
            } else if ($row->status == 'Pickup Occurred') {
                $status_color = '<span class="badge badge-primary">Pickup Occurred</span>';
            } else if ($row->status == 'Route Optimized') {
                $status_color = '<span class="badge badge-secondary">Route Optimized</span>';
            } else if ($row->status == 'Ready for Delivery') {
                $status_color = '<span class="badge badge-info">Ready For Delivery</span>';
            } else if ($row->status == 'Driver Out') {
                $status_color = '<span class="badge badge-light">Driver Out</span>';
            } else if ($row->status == 'Delivered') {
                $status_color = '<span class="badge badge-success">Delivered</span>';
            } else if ($row->status == 'Delivery Attempted') {
                $status_color = '<span class="badge badge-warning">Delivery Attempted</span>';
            } else if ($row->status == 'Returned') {
                $status_color = '<span class="badge badge-dark">Delivery Attempted</span>';
            } else if ($row->status == 'Rejected') {
                $status_color = '<span class="badge badge-danger">Rejected</span>';
            } else if ($row->status == 'Investigation') {
                $status_color = '<span class="badge badge-primary">Investigation</span>';
            } else if ($row->status == 'Back To Pharmacy') {
                $status_color = '<span class="badge badge-light">Back To Pharmacy</span>';
            } else if ($row->status == 'Other Date Delivery') {
                $status_color = '<span class="badge badge-info">Other Date Delivery</span>';
            } else if ($row->status == 'Ready To Optimize') {
                $status_color = '<span class="badge badge-dark">Ready To Optimize</span>';
            } else if ($row->status == 'On Its Way To Facility') {
                $status_color = '<span class="badge badge-warning">On Its Way To Facility</span>';
            }


            $order_status =  '<a href="#" data-bs-toggle="modal" data-bs-target="#order_status_model" class="link-underlined orderstatus">  <i class="icmn-pointer"></i>' . $status_color . '</a>';
            $tempRow['order_status'] = $order_status;
            $tempRow['status'] = $status_color;
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
            $tempRow['time_to_deliver'] = 'N/A'; //date('H:m: A', strtotime($row->date_to_deliver));
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
            $tempRow['created_at'] = date('d/m/Y h:m: A', strtotime($row->created_at));;
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
            $tempRow['recipient_address'] = $row->recipient->address;
            $tempRow['recipient_city'] = $row->recipient->city;
            $tempRow['recipient_state'] = $row->recipient->state;
            $tempRow['recipient_zip'] = $row->recipient->zip;
            $tempRow['recipient_apt'] = $row->recipient->apt;
            $tempRow['recipient_phone'] = $row->recipient->phone;
            $tempRow['driver_id'] = $row->driver_id;
            $tempRow['dispatcher_id'] = $row->dispatcher_id;
            $tempRow['contents'] = $row->contents;
            $tempRow['note_added'] = $row->note_added;
            $tempRow['is_copay_payed'] = $row->is_copay_payed;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['dispatcher_id'] = $row->dispatcher_id;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['recipient_latitude'] = $row->recipient->latitude;
            $tempRow['recipient_longitude'] = $row->recipient->longitude;
            $tempRow['attempts'] = $row->attempts;
            $tempRow['driver_name'] = isset($row->driver) ? $row->driver->name : 'N/A';
            $tempRow['dispatcher'] = '';
            $operate =  '<a href="#" data-bs-toggle="modal" data-bs-target="#order_details_model" class="link-underlined view">  <i class="icmn-pointer"></i>#' . $row->id . '</a>';
            $tempRow['action'] = $operate;

            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;

        return response()->json($bulkData);
    }
}
