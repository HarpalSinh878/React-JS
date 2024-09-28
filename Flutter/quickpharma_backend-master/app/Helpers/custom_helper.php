<?php

use App\Models\Order;
use App\Models\OrdersActivity;
use App\Models\OrdersStatusActivity;
use App\Models\Regions;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Raconteur\PointInPolygon\Polygon;
use Raconteur\PointInPolygon\Point;
use App\Models\Setting;

if (!function_exists('system_setting')) {
    function system_setting($type)
    {
        $db = Setting::where('type', $type)->first();
        return (isset($db)) ? $db->data : '';
    }
}
if (!function_exists('differenceInHours')) {
    function differenceInHours($startdate, $enddate)
    {
        $starttimestamp = strtotime($startdate);
        $endtimestamp = strtotime($enddate);
        $difference = abs($endtimestamp - $starttimestamp) / 3600;
        return $difference;
    }
}
if (!function_exists('getClientPermission')) {
    function getClientPermission()
    {
        $config = array(
            'orders' => array(
                "create" => "on",
                "read" => "on",
                "update" => "on",
                "delete" => "on"
            )
        );
        return json_encode($config);
    }
}
if (!function_exists('getOrdersTotal')) {
    function getOrdersTotal($type)
    {
        if ($type == '') {
            if (Auth::user()->userType == 0 || Auth::user()->userType == 2) {
                return  Order::all()->count();
            } else {
                return  Order::where(function ($query) {
                    $query->where('user_id', Auth::user()->id)->orWhere('added_by', Auth::user()->id);
                })->get()->count();
            }
            return  Order::all()->count();
        } else {
            if (Auth::user()->userType == 0 || Auth::user()->userType == 2) {
                return  Order::where('status', $type)->get()->count();
            } else {
                return  Order::where('status', $type)->where(function ($query) {
                    $query->where('user_id', Auth::user()->id)->orWhere('added_by', Auth::user()->id);
                })->get()->count();
            }
        }
    }
}
if (!function_exists('getTicketsTotal')) {
    function getTicketsTotal($type)
    {
        if ($type == '') {
            return  Ticket::all()->count();
        } else {
            // if (Auth::user()->userType == 0 || Auth::user()->userType == 2){
            //     return  Order::where('status',$type)->get()->count();
            // }else{
            //     return  Order::where('status',$type)->where(function ($query) {
            //         $query->where('user_id',Auth::user()->id)->orWhere('added_by',Auth::user()->id);
            //     })->get()->count();
            // }
            // return  0;
            return  Ticket::where('status', $type)->get()->count();
        }
    }
}
if (!function_exists('orderActivityHistory')) {
    function orderActivityHistory($orderid, $activity)
    {
        $ordersactivity = new OrdersActivity();
        $ordersactivity->order_id = $orderid;
        $ordersactivity->added_by = Auth::user()->id;
        $ordersactivity->activity = $activity;
        $ordersactivity->save();
    }
}
if (!function_exists('orderStatusHistory')) {
    function orderStatusHistory($orderid, $from, $to)
    {
        $ordersatatusactivity = new OrdersStatusActivity();
        $ordersatatusactivity->order_id = $orderid;
        $ordersatatusactivity->added_by = Auth::user()->id;
        $ordersatatusactivity->from = $from;
        $ordersatatusactivity->to = $to;
        $ordersatatusactivity->save();
    }
}
if (!function_exists('apiorderActivityHistory')) {
    function apiorderActivityHistory($orderid, $activity, $added_by)
    {
        $ordersactivity = new OrdersActivity();
        $ordersactivity->order_id = $orderid;
        $ordersactivity->added_by = $added_by;
        $ordersactivity->activity = $activity;
        $ordersactivity->save();
    }
}
if (!function_exists('apiorderStatusHistory')) {
    function apiorderStatusHistory($orderid, $from, $to, $added_by)
    {
        $ordersatatusactivity = new OrdersStatusActivity();
        $ordersatatusactivity->order_id = $orderid;
        $ordersatatusactivity->added_by = $added_by;
        $ordersatatusactivity->from = $from;
        $ordersatatusactivity->to = $to;
        $ordersatatusactivity->save();
    }
}
if (!function_exists('randomHex')) {
    function randomHex()
    {
        $chars = 'ABCDEF0123456789';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $color;
    }
}
function is_dir_empty($dir)
{
    if (!is_readable($dir)) return NULL;
    return (count(scandir($dir)) == 2);
}
if (!function_exists('convertSecToHourOrMin')) {
    function convertSecToHourOrMin($seconds)
    {
        $secs = $seconds % 60;
        $hrs = $seconds / 60;
        $mins = $hrs % 60;
        $hrs = $hrs / 60;
        return (((int)$hrs < 10 && (int)$hrs != 0) ? "0" : '') . (int)$hrs . " Hr " . (((int)$mins < 10 && (int)$mins != 0) ? "0" : '') . (int)$mins . " Min";
    }
}
if (!function_exists('getStatusBackgroundColor')) {
    function getStatusBackgroundColor($status)
    {
        if ($status == 'Ready to Print') {
            $status_color = '<span class="badge badge-dark">Ready To Print</span>';
        } else if ($status == 'Ready for Pickup') {
            $status_color = '<span class="badge badge-brinjal">Ready To Pickup</span>';
        } else if ($status == 'Pickup Occurred') {
            $status_color = '<span class="badge badge-primary">Pickup Occurred</span>';
        } else if ($status == 'Ready for Delivery') {
            $status_color = '<span class="badge badge-primary">Ready For Delivery</span>';
        } else if ($status == 'Route Optimized') {
            $status_color = '<span class="badge badge-primary">Route Optimized</span>';
        } else if ($status == 'Driver Out') {
            $status_color = '<span class="badge badge-success">Driver Out</span>';
        } else if ($status == 'Delivered') {
            $status_color = '<span class="badge badge-success">Delivered</span>';
        } else if ($status == 'Delivery Attempted') {
            $status_color = '<span class="badge badge-danger">Delivery Attempted</span>';
        } else if ($status == 'Returned') {
            $status_color = '<span class="badge badge-maroon">Returned</span>';
        } else if ($status == 'Rejected') {
            $status_color = '<span class="badge badge-danger">Rejected</span>';
        } else if ($status == 'Back to Pharmacy') {
            $status_color = '<span class="badge badge-brinjal">Back to Pharmacy</span>';
        } else if ($status == 'Investigation') {
            $status_color = '<span class="badge badge-warning">Investigation</span>';
        } else if ($status == 'Other Date Delivery') {
            $status_color = '<span class="badge badge-brinjal">Other Date Delivery</span>';
        } else if ($status == 'Ready To Optimize') {
            $status_color = '<span class="badge badge-brinjal">Ready To Optimize</span>';
        } else if ($status == 'On Its Way To Facility') {
            $status_color = '<span class="badge badge-brinjal">On Its Way To Facility</span>';
        } else if ($status == 'Not Present') {
            $status_color = '<span class="badge badge-light">Not Present</span>';
        } else if ($status == 'Recipient Refused') {
            $status_color = '<span class="badge badge-danger">Recipient Refused</span>';
        } else if ($status == 'Skipped') {
            $status_color = '<span class="badge badge-info">Skipped</span>';
        } else if ($status == 'Wrong Address') {
            $status_color = '<span class="badge badge-danger">Wrong Address</span>';
        }else{
            $status_color = '<span class="badge">'.$status.'</span>';
        }
        return $status_color;
    }
}
