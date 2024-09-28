<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Objects\Polygon;

class HubsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!has_permissions('read', 'hubs')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $hub = Hub::all();
            return view('hubs.index',compact('hub'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coverage(Request $request)
    {
        if (!has_permissions('update', 'hubs')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {

            $id = $request->hubs;
            $hub = Hub::find($id);
            $path = $request->path;  
            for($i=0;$i< count($path);$i++){
                if($i == 0)
                {
                    $lastcord = new Point($path[$i]['lat'],$path[$i]['lng']);
                }
                $polygon[] = new Point($path[$i]['lat'],$path[$i]['lng']);
            }
            $polygon[] =$lastcord;
            $hub->area = new Polygon([new LineString($polygon)]);
            $hub->path = json_encode($request->path);
            $hub->update();
            return 1;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if (!has_permissions('create', 'hubs')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            if($request->address_latitude == "" && $request->address_longitude == ''){
                return redirect()->back()->with('error', 'Address Is Missing');
            }
            $hub = new Hub();
            $hub->title = $request->title;
            $hub->address = $request->address;
            $hub->location = new Point($request->address_latitude,$request->address_longitude);
            
            $hub->save();
            return redirect()->back()->with('success', 'Hub Add Successfully');
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
        if (!has_permissions('update', 'hubs')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $id = $request->edit_id;
            $hub = Hub::find($id);
            $hub->title = $request->title;
            $hub->address = $request->address;
            $hub->location = new Point($request->address_latitude,$request->address_longitude);
            $hub->update();
            return redirect()->back()->with('success', 'Hub Update Successfully');
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
        if (!has_permissions('delete', 'hubs')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            Hub::find($id)->delete();
            return redirect()->back()->with('success', 'Hub Delete Successfully');
        }
    }


    public function getHubList() {
    
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
 
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
 
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        }

        $sql = Hub::orderBy($sort, $order);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhere('title', 'LIKE', "%$search%")->orwhere('address', 'LIKE', "%$search%");
        }
        $total = $sql->count();
        if (isset($_GET['limit'])) {
            $sql =  $sql->skip($offset)->take($limit);
        }

        $res = $sql->get();
     
        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;
 
        //return $res;
        $operate = '';
        foreach ($res as $row) {
            $operate = '<a  id="'.$row->id .'"   data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-icon btn-dark rounded-circle edit" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '&nbsp;<a href="' . route('destroy.hubs', $row->id) . '" onclick="return confirmationDelete(event);" class="btn btn-icon btn-danger rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" title="Delete"><i class="bi bi-trash"></i></a>';
            $tempRow['id'] = $row->id;
            $tempRow['title'] = $row->title;
            $tempRow['address'] = $row->address;
            $tempRow['status'] = $row->status;
            $tempRow['color'] = randomHex();
            $tempRow['address_latitude'] = $row->location->latitude;
            $tempRow['address_longitude'] = $row->location->longitude;
            $tempRow['action'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }


    public function pullCoverage(Request $request){
        
        $regions = Hub::get();
        $rows = array();
        
        $tempRow = array();
        $count = 1;
    
        //return $res;
        foreach ($regions as $row) {
            $rows['title'] = $row->title;
            $rows['address'] = $row->address;
            $rows['path'] = json_decode($row->path);
            $rows['id'] = $row->id;
            $rows['color'] = randomHex();
            $tempRow[] =  $rows;
            $count++;
           
        }
        return response()->json($tempRow);

        
    }
}
