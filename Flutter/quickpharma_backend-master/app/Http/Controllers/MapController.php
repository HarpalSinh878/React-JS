<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Hub;
use App\Models\Order;
use App\Models\Regions;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;
class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   $location = array(
        //     'locations' => array(
        //         '4100 E Donald Douglas Dr',
        //         // '11340 South St',
        //         // '10998 Walker St',
        //         // '800 N Brookhurst St',
        //         // '1656 W Katella Ave'
        //     )
        //     );


        // $response = Http::get('http://www.mapquestapi.com/directions/v2/optimizedroute', [
        //     'key' => 'Gm4zcu7tFeY90gZ4qFfd53LL2Dv3g3G5',
        //     'json' =>  json_encode($location),
        // ]);


        // $data = json_decode($response);
        // return $data;


        if (!has_permissions('read', 'route_name')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $routename = Route::all();
            $hubs = Hub::where('status',1)->get();
            $pharmacy = User::where('status',1)->where('userType',1)->get();
            $driver = Driver::where('status',1)->get();
            return view('map.index',compact('routename','hubs','driver','pharmacy'));
        }


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
    public function update(Request $request)
    {
        if (!has_permissions('update', 'map')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $id = $request->regionid;
            $region = Regions::find($id);
            if(isset($request->route_name)){
                $region->route_name = $request->route_name;
            }
            if(isset($request->route_name_id)){
                $region->route_name_id = $request->route_name_id;
            }
            if(isset($request->route_name_i)){
                $region->route_name_i = $request->route_name_i;
            }
            if(isset($request->path)){
                $region->path = json_encode($request->path);
                $path = $request->path;
                for($i=0;$i< count($path);$i++){
                    if($i == 0)
                    {
                        $lastcord = new Point($path[$i]['lat'],$path[$i]['lng']);
                    }
                    $polygon[] = new Point($path[$i]['lat'],$path[$i]['lng']);
                }
                $polygon[] =$lastcord;
                $region->area = new Polygon([new LineString($polygon)]);
            }


            $region->update();
            return 1;
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
        if (!has_permissions('delete', 'map')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            Regions::find($id)->delete();
            return redirect()->back()->with('success', 'Route Region Delete Successfully');
        }

    }


    public function saveRegions(Request $request){
        $region = new Regions();
        $region->route_name = $request->route_name;
        $region->route_name_id = $request->route_name_id;
        $region->route_name_i = $request->route_name_i;
        $region->path = json_encode($request->path);
        $region->regions_color = randomHex();

        $path = $request->path;
        for($i=0;$i< count($path);$i++){
            if($i == 0)
            {
                $lastcord = new Point($path[$i]['lat'],$path[$i]['lng']);
            }
            $polygon[] = new Point($path[$i]['lat'],$path[$i]['lng']);
        }
        $polygon[] =$lastcord;
        $region->area = new Polygon([new LineString($polygon)]);
        $region->save();
        return 1;
    }
    public function pullRegions(Request $request){

        $regions = Regions::where('is_route_optimized','No')->get();
        $rows = array();

        $tempRow = array();
        $count = 1;

        $markers['markers'] = array();
        $info['info'] = array();
        //return $res;
        foreach ($regions as $row) {

            // DB::enableQueryLog();
            // $orders = Order::whereWithin('location', Polygon::fromJson($row->area))->where('status', 'Ready for Delivery')
            // ->where(function($query){
            //     $query-Orhere('is_pickup_order', 'Yes')
            //     ->orWhere('status', 'Ready for Pickup');
            // })->get()->count();
            // dd(DB::getQueryLog());
            
            $rows['name'] = $row->route_name."-".$row->route_name_i;
            $rows['color'] = $row->regions_color;
            $rows['added'] = date('m/d at H:i:s A',strtotime($row->created_at));
            $rows['orders'] = Order::whereWithin('location', Polygon::fromJson($row->area))->where('status','Ready for Delivery')->get()->count();
            // $rows['orders'] = Order::whereWithin('location', Polygon::fromJson($row->area))->where('status','Ready for Delivery')->get()->count();
            $rows['route_name_i'] = $row->route_name_i;
            $rows['route_name_id'] = $row->route_name_id;
            $rows['uid'] = $row->id;
            $rows['path'] = json_decode($row->path);
            $rows['settings'] = null;
            $tempRow[$row->id] =  $rows;
            $count++;

        }
        return response()->json($tempRow);


    }


    public function getRegions(Request $request){
        $regions = Regions::where('is_route_optimized','No')->with('route')->get();
        //return $regions;
        $html = '';
        foreach($regions as $row){
           $total_order =  Order::whereWithin('location', Polygon::fromJson($row->area))->where('status','Ready for Delivery')->get()->count();
            $html .= '<li class="list-group-item" aria-current="true"><div class="region mt-3 mb-3" data-regionid="'.$row->id.'" data-color="'.$row->regions_color.'" id="'.$row->id.'">';
                $html .= '<div class="row mb-3">';
                    $html .= '<div class="col-lg-9">';
                        $html .= '<span class="badge badge-dark" id="region_ocount_'.$row->id.'" style="background-color: '.$row->regions_color.'; font-weight: bold; margin-right: 5px;">'.$total_order.'</span>';
                        $html .= '<a href="javascript:void(0);" onclick="showRegionNameModal('.$row->id.');" class="link-underlined"><u>'.$row->route->route_name."-".$row->route_name_i.'</u>&nbsp;<i class="fa fa-pencil text-dark"></i></a></b><br>';
                        $html .= '<small>(<b>#'.$row->id.'</b>)&nbsp;'.date('m/d H:i:s A',strtotime($row->created_at)).'</small>';
                        $html .= '<div id="map_routeConsole_'.$row->id.'"></div>';
                    $html .= '</div>';
                    $html .= '<div class="col-lg-3" style="padding-left: 0px;">';
                    $html .= '<a href="' . route('regions.destroy', $row->id) . '" onclick="return confirmationRegionDelete(event);" class="btn btn-outline btn-icon btn-outline-danger  btn-active-light-danger btn-sm" style="width: 38px;" ><i class="bi bi-trash3-fill"></i></a>';
                    $html .= ' <button '. (($total_order < 1) ? 'disabled' : '') .' class="btn btn-outline btn-icon btn-outline-success btn-active-light-success btn-sm '. (($total_order == 0) ? 'disabled' : '') .'" style="width: 38px;" onclick="showOptimizeModal('.$row->id.');"><i class="fa fa-cog"></i></button>';
                    $html .= '</div>';
                $html .= '</div>';
                $html .= '</div></li>';
        }
        //$html .= '</div>';
        return $html;
    }


    public function saveOptimizeRoute(Request $request){

        $getRegion = $request->regions[0];
        $regions = Regions::find($getRegion);
        $getOrders = Order::whereWithin('location', Polygon::fromJson($regions->area))->get();
        //return $getOrders;
//'Gm4zcu7tFeY90gZ4qFfd53LL2Dv3g3G5'
        $location_address = array();
        $location_with_id = array();
        foreach($getOrders as $key => $row){
           array_push($location_address, $row->address);
           $location_with_id[$key]['id'] =  $row->id;
           $location_with_id[$key]['address'] =  $row->address;
        }
        $location = json_encode(array('locations' => $location_address));

        $response = Http::get('http://www.mapquestapi.com/directions/v2/optimizedroute', [
            // 'key' => "c4GfJhvMGA6Ek4SLYInrfmG6Y5A4yG6x",//env('MAPQUEST_API'),
            'key' => "Gm4zcu7tFeY90gZ4qFfd53LL2Dv3g3G5",//env('MAPQUEST_API'),
            'json' =>  $location,
        ]);

        $data = json_decode($response);

        if(!isset($data->route->routeError)){
            $locationSequence = $data->route->locationSequence;
            $i =1;
            foreach($locationSequence as $key => $row){
                Order::where('id',$location_with_id[$row]['id'])->update([
                    'order_sequence' =>  $i,
                    'status' => 'Route Optimized',
                    'driver_id' => ($request->sameday_check == true) ? ($request->sameday_driver) : 0,
                    'regions_id' => $getRegion,
                ]);
                $i++;
            }
            $regions->service_time  = $request->service_time;
            $regions->starts_at  = $request->startsAt;
            $regions->sameday_delivery  = ($request->sameday_check == true) ? 'Yes' : 'No';
            $regions->is_real  = ($request->is_real == true) ? 'Yes' : 'No';
            $regions->is_queued  = ($request->is_queued == true) ? 'Yes' : 'No';
            $regions->is_route_optimized ='Yes';

            $regions->sameday_start_place  = $request->sameday_start_place;
            $regions->hub_start_lat  = $request->hub_start_lat;
            $regions->hub_start_lng  = $request->hub_start_lng;
            $regions->sameday_finish_place  = $request->sameday_finish_place;
            $regions->hub_finish_lat  = $request->hub_finish_lat;
            $regions->hub_finish_lng  = $request->hub_finish_lng;
            $regions->driver_id  = ($request->sameday_check == true) ? ($request->sameday_driver) : 0;

            $regions->approximate_driving_time  = $data->route->realTime;
            $regions->distance  = $data->route->distance;
            $regions->actual_driving_time  = $data->route->time;
            $regions->sessionId  = $data->route->sessionId;

            $regions->total_order = Order::whereWithin('location', Polygon::fromJson($regions->area))->get()->count();
            $regions->update();
            return 1;
        }else{
            // dd($location, $location_address, $data);
            return 0;
        }
    }



}
