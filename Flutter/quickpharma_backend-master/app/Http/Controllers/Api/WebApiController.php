<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Regions;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebApiController extends Controller
{
    public function getOptimizeRoute(Request $request)
    {
        $regions = Regions::where('is_route_optimized', 'Yes')->with('route', 'dispatcher', 'driver')->get();

        foreach ($regions as $row) {
            $row->uid = $row->id;
            $row->driverid = $row->driver_id;

            $name = '<small>' . date('m/d/Y H:s A') . ' (' . $row->route_name . '  - ' . $row->route_name_i . ')</small><br>';

            if ($row->driver_id != 0) {
                $name .= '<b>[ ' . @$row->driver->name . ' ]</b><br>';
            }

            if ($row->dispatcher_id != 0) {
                $name .= '<span style="font-size: 10px; color: #000">' . $row->dispatcher->name . '</span>';
            }

            $row->name = $name;
            $class = '';
            $renderStats = '';
            if ($row->is_started == 'No') {
                $class = 'btn btn-outline btn-outline-warning btn-active-light-warning';
            } else {
                $class = 'btn btn-outline btn-outline-primary btn-active-light-primary';
                $renderStats = '<div class="route-stats"><span style="background:#46be8a;width: 0%; border: none!important;" class="route-stats-cell">' . $row->total_order . '</span></div>';
            }
            // $renderStats = '<div class="route-stats"><span style="background:#46be8a;width: 100%; border: none!important;" class="route-stats-cell">'.$row->total_order.'</span></div>';
            $row->class = $class;
            $row->renderStats = $renderStats;
        }

        $response['error'] = false;
        $response['message'] = "Data Fetch Successfully";
        $response['data'] = $regions;
        return response()->json($response, 200);
    }


    public function getOrderDetail(Request $request)
    {
        $id = $request->id;
        $sql = Regions::where('is_route_optimized', 'Yes')->with('route', 'dispatcher', 'driver')->find($id);
        $sql->created = date('d/m/Y H:i A', strtotime($sql->created_at));
        $sql->starts_at = date('d/m/Y H:i A', strtotime($sql->starts_at));
        $sql->started = ($sql->started != '') ? date('d/m/Y H:i A', strtotime($sql->started)) : '';
        $sql->dispatcher_name = ($sql->dispatcher_id == 0) ? '<a  data-bs-toggle="modal" data-bs-target="#dispatcher_model" class="text-danger">N/A</a>' : '<a  data-bs-toggle="modal" data-bs-target="#dispatcher_model" class="">' . $sql->dispatcher->name . '</a>';
        $sql->service_time_modal = '<a  data-bs-toggle="modal" data-bs-target="#service_time_model" class="text-dark"><b>' . (($sql->service_time == '') ? 0 : $sql->service_time) . '</b></a>';
        $sql->actual_driving_time =  ($sql->actual_driving_time != '') ?  (convertSecToHourOrMin($sql->actual_driving_time)) : '0 Hr 0 Min';
        $sql->approximate_driving_time = ($sql->approximate_driving_time != '') ? (convertSecToHourOrMin($sql->approximate_driving_time)) : '0 Hr 0 Min';

        $temp_image = '<img alt="Pic" src="' . asset('assets/media/avatars/300-1.jpg') . '" class="rounded-circle" height="50" width="50" >';
        $sql->driver_profile = ($sql->driver != '') ? (($sql->driver->avatar != '') ? '<a  data-lightbox="roadtrip" href="' . url('') . config('global.IMG_PATH') . config('global.DRIVER_IMG_PATH')  . $sql->driver->avatar . '"><img class="rounded avatar-md shadow img-fluid" alt="" src="' . url('') . config('global.IMG_PATH') . config('global.DRIVER_IMG_PATH') . $sql->driver->avatar . '" width="55"></a>' : $temp_image) : $temp_image;

        $response['error'] = false;
        $response['message'] = "Data Fetch Successfully";
        $response['data'] = $sql;
        return response()->json($response, 200);
    }

    public function getRouteOrders(Request $request)
    {
        // DB::enableQueryLog();

        $offset = 0;
        $limit = 10;
        $sort = 'order_sequence';
        $order = 'ASC';
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

        if (isset($_GET['regions_id']) && !empty($_GET['regions_id'])) {
            $sql =  $sql->where('regions_id', $_GET['regions_id']);
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

        //return $res;
        $operate = '';
        foreach ($res as $row) {
            $tempRow['id'] = $row->id;

            $status_color = '';


            $tempRow['client'] = $row->client->name;
            $tempRow['recipient_name'] = $row->recipient->name;
            $tempRow['request_call_upon_arrival'] = ($row->request_call_upon_arrival == 'Yes') ? $row->recipient->phone : 'Call Not Required';
            $tempRow['need_to_call'] =  'Call Not Required';
            $tempRow['date_to_deliver'] = date('d-m-Y', strtotime($row->date_to_deliver));
            $tempRow['time_to_deliver'] = ($row->time_to_deliver != '') ? date('H:m: A', strtotime($row->time_to_deliver)) : 'N/A';
            $tempRow['pickup_date'] = $row->pickup_date;
            $tempRow['pickup_time_min'] = $row->pickup_time_min;
            $tempRow['pickup_time_max'] = $row->pickup_time_max;
            $tempRow['recipient_email_to_owner'] = $row->recipient_email_to_owner;
            $tempRow['is_sms'] = $row->is_sms;
            $tempRow['is_call'] = $row->is_call;
            $tempRow['condition'] = $row->condition;
            $tempRow['facility'] = 'New York';

            $tempRow['created_at'] = date('d/m/Y h:m: A', strtotime($row->created_at));;

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

            $tempRow['driver_name'] = isset($row->driver) ? $row->driver->name : 'N/A';
            $operate =  '<span class="badge badge-dark">' . $row->order_sequence . '</span>';

            $tempRow['order_id'] = "#" . $row->id;


            $tempRow['action'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;

        return response()->json($bulkData);
    }
}
