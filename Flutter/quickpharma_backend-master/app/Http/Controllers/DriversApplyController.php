<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriversApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!has_permissions('read', 'drivers')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            return view('drivers-apply.index');
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

    public function driverapplylist()
    {
        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';
        $status = 'all';

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
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        }


        $sql = Driver::orderBy($sort, $order);
        // $sql = Driver::whereIn('job_approved',[1,2])->orderBy($sort, $order);


        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('name', 'LIKE', "%$search%");
        }

        if ($status != 'all') {
            if ($status == 'open') {
                $sql = $sql->where('status', 1);
            }
            if ($status == 'banned') {
                $sql = $sql->where('status', 0);
            }
        }

        $total = $sql->count();

        if (isset($_GET['limit'])) {
            $sql = $sql->skip($offset)->take($limit);
        }


        $res = $sql->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;



        foreach ($res as $row) {

            // $operate = '<a  id="' . $row->id . '"   data-bs-toggle="modal" data-bs-target="#editDriverModal" class="btn btn-icon btn-dark rounded-circle edit " title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            // $operate .= '<a  id="' . $row->id . '" data-bs-toggle="modal" class="btn btn-icon btn-secondary rounded-circle resetpassword"  data-bs-target="#resetPasswordModel"><i class="bi bi-key text-dark-50"></i></a>';

            $operate = '&nbsp;<a id="' . $row->id . '" class="btn btn-icon btn-success rounded-circle" onclick="return changestatus(this.id,2);" title="Accept"><i class="fa fa-check"></i></a>';
            $operate .= '&nbsp;<a id="' . $row->id . '" class="btn btn-icon btn-danger rounded-circle" onclick="return changestatus(this.id,3);" title="Reject"><i class="fa fa-close"></i></a>';

            $tempRow['id'] = $row->id;
            $tempRow['uid'] = "#" . $row->id;
            $tempRow['created_at'] = date('d/m/y', strtotime($row->created_at));
            $tempRow['name'] = $row->name;
            $tempRow['email'] = $row->email;
            $tempRow['username'] = $row->username;
            // $tempRow['address'] = $row->address;
            $tempRow['phone'] = $row->phone;
            $tempRow['status'] = ($row->job_approved == '1') ? '<span class="badge rounded-pill bg-warning">Pending</span>' : '<span class="badge rounded-pill bg-success">Accepted</span>';
            // $tempRow['avatar'] = ($row->avatar != '') ? '<a  data-lightbox="roadtrip" href="' .url('').config('global.IMG_PATH').config('global.DRIVER_IMG_PATH')  . $row->avatar . '"><img class="rounded avatar-md shadow img-fluid" alt="" src="' . url('').config('global.IMG_PATH').config('global.DRIVER_IMG_PATH') . $row->avatar . '" width="55"></a>' : '';
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
    public function updateStatus(Request $request)
    {
        if($request->status == 2){
            Driver::where('id', $request->id)->update(['job_approved' => $request->status]);
            $message = 'Driver Apply Request Accepted successfully';
        }else{
            Driver::where('id', $request->id)->delete();
            $message = 'Driver Apply Request Rejected successfully';
        }
        return response()->json(['status'=>1,'message'=>$message],200);
    }
}
