<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Regions;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class RouteTimeLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!has_permissions('read', 'route_timeline')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
           return view('route-timeline.index');
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


    public function getRouteTimeline(Request $request){
        
        $regions = Regions::get();
        $rows = array();
        $rows1 = array();
        $tempRow = array();
        $count = 1;
        $i = 0;
        
        //return $res;
        foreach ($regions as $row) {
            $rows[$i]['id'] = $row->id;
            $rows[$i]['route_name'] = $row->route_name."-".$row->route_name_i;
            $rows[$i]['recipient_id'] = $row->recipient_id;
            $get_order = Order::whereWithin('location', Polygon::fromJson($row->area))->get();
            $k= 0;
            foreach($get_order as $row1){
                $rows1[$k]['id'] = $row1->id;
                $rows1[$k]['pickup_date'] = $row1->pickup_date;
                $rows1[$k]['start'] = date("D M d Y H:i:s", strtotime($row1->created_at)) ;
                $rows1[$k]['end'] =  date("D M d Y H:i:s", strtotime($row1->created_at) + 1800) ;
                $rows1[$k]['group_id'] = $row->id;
                $rows1[$k]['recipient_id'] = $row->recipient_id;
                $k++;
            }
           
            $tempRow['group'] =  $rows;
            $tempRow['orders'] =  $rows1;
            $count++;
            $i++;
           
        }
        return response()->json($tempRow);

        
    }
}
