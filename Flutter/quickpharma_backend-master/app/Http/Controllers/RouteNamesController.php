<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\OrderType;
use App\Models\Route;
use App\Models\RouteAutocreateScheduleDays;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RouteNamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!has_permissions('read', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $driver = Driver::where('status', 1)->get();
            $ordertype = OrderType::where('isActive', 'Yes')->get();
            return view('route-names.index', compact('ordertype', 'driver'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!has_permissions('create', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $validator = Validator::make($request->all(), [
                'route_name' => 'required',
                'optimal_service_time_per_stop' => 'required',
                'optimal_orders_number_per_route' => 'required',
            ], [
                'route_name.required' => 'Please Enter Route Name',
                'optimal_service_time_per_stop.required' => 'Please Enter Optimal Service Time Per Stop',
                'optimal_orders_number_per_route.required' => 'Please Enter Optimal Orders Number per Route',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $route = new Route();
                $route->route_name = $request->route_name;
                $route->order_types = isset($request->order_type) ? implode(',', $request->order_type) : '';
                $route->driver_id = isset($request->driver) ? $request->driver : 0;
                $route->optimal_service_time_per_stop = $request->optimal_service_time_per_stop;
                $route->optimal_orders_number_per_route = $request->optimal_orders_number_per_route;
                $route->save();
                if (isset($request->items)) {
                    for ($i = 0; $i < count($request->items); $i++) {
                        $data = new  RouteAutocreateScheduleDays();
                        $data->route_id = $route->id;
                        $data->days = $request->items[$i]['days'];
                        $data->hours = $request->items[$i]['hours'];
                        $data->minute = $request->items[$i]['minute'];
                        $data->save();
                    }
                }
                return redirect()->back()->with('success', 'Route Name Add Successfully');
            }
        }
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
    public function update(Request $request)
    {
        if (!has_permissions('update', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $validator = Validator::make($request->all(), [
                'route_name' => 'required',
                'optimal_service_time_per_stop' => 'required',
                'optimal_orders_number_per_route' => 'required',
                'autocreation' => 'required',
            ], [
                'route_name.required' => 'Please Enter Route Name',
                'optimal_service_time_per_stop.required' => 'Please Enter Optimal Service Time Per Stop',
                'optimal_orders_number_per_route.required' => 'Please Enter Optimal Orders Number per Route',
                'autocreation.required' => 'Please Select Autocreation',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $id = $request->edit_id;
                $route = Route::find($id);
                $route->route_name = $request->route_name;
                $route->order_types = isset($request->order_type) ? implode(',', $request->order_type) : '';
                $route->driver_id = isset($request->driver) ? $request->driver : 0;
                $route->optimal_service_time_per_stop = $request->optimal_service_time_per_stop;
                $route->optimal_orders_number_per_route = $request->optimal_orders_number_per_route;
                $route->autocreation = $request->autocreation;
                $route->update();

                if (isset($request->items)) {
                    for ($i = 0; $i < count($request->items); $i++) {

                        if($request->items[$i]['rowid'] == 0){
                            $data = new  RouteAutocreateScheduleDays();
                            $data->route_id = $id;
                            $data->days = $request->items[$i]['days'];
                            $data->hours = $request->items[$i]['hours'];
                            $data->minute = $request->items[$i]['minute'];
                            $data->save();
                        }

                        if($request->items[$i]['rowid'] > 0){
                            $row_id = $request->items[$i]['rowid'];
                            $data = RouteAutocreateScheduleDays::find($row_id);
                            $data->days = $request->items[$i]['days'];
                            $data->hours = $request->items[$i]['hours'];
                            $data->minute = $request->items[$i]['minute'];
                            $data->update();
                        }
                    }
                }
                return redirect()->back()->with('success', 'Route Name Update Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!has_permissions('delete', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            Route::find($id)->delete();
            return redirect()->back()->with('success', 'Route Name Delete Successfully');
        }

    }

    public function getRouteNamesList()
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

        // if (isset($_GET['sort'])) {
        //     $sort = $_GET['sort'];
        // }

        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }


        $sql = Route::with('routeautocreatescheduledays','driver')->orderBy($sort, $order);


        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%");
        }



        $total = $sql->count();

        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }


        $res = $sql->get();
       // return $res;
        //dd(DB::getQueryLog());

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;

        //return $res;
        $operate = '';

        $TotalOrderType =  OrderType::where('isActive', 'Yes')->get()->count();
        foreach ($res as $row) {
            $tempRow['id'] = $row->id;

            $countRouteOrderType = count($row->ordertype);
            $label = '';

            //// START :: ROUTE NO
            $label = '<div class="row">';
            for($i=1;$i<=20;$i++){
                $label .= '<a href="'.route('routename.routeQRCode').'?id='.$i.'" onclick="return openQrCodeWindows(event);" class="btn btn-icon btn-dark col-sm-1 btn-sm mb-2 me-2" target="_blank" >'.$i.'</a>';
            }
            $label .= '</div>';
            //// END :: ROUTE NO

            //// START :: DRIVER ROW
                $label .= '<div class="row">';
                $label .= '<h4 class="col-2 mb-2 mt-1 text-uppercase">Driver:</h4>';
                $label .= '<div class="col-auto">';
                $label .= ($row->driver_id != '0') ? '<a class="btn btn-sm btn-success w-auto p-3 mb-2 me-2">'.@$row->driver->name.'</a>' : '<a class="btn btn-sm btn-danger w-auto p-3 mb-2 me-2">NOT ASSIGNED</a>';
                $label .= '</div>';
                $label .= '</div>';
            //// END :: DRIVER ROW

            //// START :: TITLE
            $title = '<div class="row">';
            $title .= '<div class="col-5">';
            $title .= '<h4 class="mb-2 me-2 mt-1 text-uppercase" >'.$row->route_name.'</h4>';
            $title .= '</div>';
            $title .= '<div class="col-auto">';
            $title .= ($row->autocreation == 'On') ? '<a class="btn btn-sm btn-success  mb-2 me-2">Autocreation On</a>' : '<a class="btn btn-sm btn-danger  mb-2 me-2">Autocreation Off</a>';
            $title .= '<a class="btn btn-icon btn-danger btn-sm mb-2 me-2"><i class="bi bi-geo-alt-fill"></i></a>';

            $title .= '</div>';

            $title .= '</div>';
            $title .= '<div class="row">';
            $title .= '<div class="col-5">';
            $title .= '<h5 class="mb-2 me-2 mt-2 text-uppercase"><b>Order Type :</b></h5>';
            $title .= '</div>';
            $title .= '<div class="col-auto">';
            if($countRouteOrderType == $TotalOrderType){
                $title .= '<a class="btn btn-icon btn-success w-auto p-3 btn-sm mb-2 me-2"><small class="text-uppercase">All</small></a>';
            }else{

                foreach($row->ordertype as $row1){
                    $title .= '<a class="btn btn-icon btn-primary w-auto p-3 btn-sm mb-2 me-2"><small  class="text-uppercase">'.$row1->order_type.'</small></a>';;//'<label class="btn btn-icon btn-success col-sm-1 btn-sm mb-2 me-2">'.$row1->order_type.'</label>';
                }

            }
            $title .= '</div>';
            $title .= '</div>';

            //// START :: TITLE

            $operate = '<a  id="' . $row->id . '"   data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-icon btn-dark rounded-circle edit " title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '&nbsp;<a href="' . route('routenames.destroy', $row->id) . '" onclick="return confirmationDelete(event);" class="btn btn-icon btn-danger rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" title="Delete"><i class="bi bi-trash"></i></a>';
            $tempRow['operate'] = $operate;
            $tempRow['title'] = $title;
            $tempRow['label'] = $label;
            $tempRow['route_name'] = $row->route_name;
            $tempRow['autocreation'] = $row->autocreation;
            $tempRow['order_types'] = $row->order_types;
            $tempRow['optimal_service_time_per_stop'] = $row->optimal_service_time_per_stop;
            $tempRow['optimal_orders_number_per_route'] = $row->optimal_orders_number_per_route;
            $tempRow['driver_id'] = $row->driver_id;
            $tempRow['autocreation'] = $row->autocreation;
            $tempRow['route_autocreate_schedule_days'] = $row->routeautocreatescheduledays;

            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }


    function routeQRCode(Request $request){
        if (!has_permissions('read', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $id = $request->id;
            $html = "<h3>".$id."</h3><br>".QrCode::size(300)->generate($id);
            return $html;
        }

    }


    function removeAutoCreateSchedule(Request $request){
        if (!has_permissions('delete', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $id = $request->id;
            RouteAutocreateScheduleDays::find($id)->delete();
            $response['error'] = false;
            return response()->json($response);
        }
    }

    public function pullRoutes(Request $request){

    }
}
