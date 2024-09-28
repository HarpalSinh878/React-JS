<?php

namespace App\Http\Controllers;

use App\Models\Driver;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
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

            return view('drivers.index');
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

        if (!has_permissions('create', 'drivers')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {

            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:drivers,username',
                'email' => 'required|email|unique:drivers,email',
                'phone' => 'required|unique:drivers,phone',
                'username' => 'required',
                'password' => 'required',
                'conform_password' => 'required|same:password',
            ], [
                'username.unique' => 'Sorry, this username has already been taken!',
                'email.unique' => 'Sorry, this email has already been taken!',
                'phone.unique' => 'Sorry, this phone has already been taken!',
                'username.required' => 'Please Enter Username',
                'password.required' => 'Please Enter Password',
                'conform_password.required' => 'Please Enter Confirm Password',
                'conform_password.same' => 'Password And Confirm Password Must Be Same',
            ]);

            if (!$validator->fails()) {
                $driver = new Driver();
                $driver->name = $request->name;
                $driver->email = $request->email;
                $driver->phone = $request->phone;
                $driver->username = $request->username;
                $driver->address = $request->address;
                $driver->password = Hash::make($request->conform_password);
                $driver->save();
                return redirect()->back()->with('success', 'Driver Insert Successfully');
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
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

        if (!has_permissions('update', 'drivers')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $id = $request->edit_id;
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:drivers,username,' . $id,
                'email' => 'required|email|unique:drivers,email,' . $id,
                'phone' => 'required|unique:drivers,phone,' . $id,
                'username' => 'required',
            ], [
                'username.unique' => 'Sorry, this username has already been taken!',
                'email.unique' => 'Sorry, this email has already been taken!',
                'phone.unique' => 'Sorry, this phone has already been taken!',
                'username.required' => 'Please Enter Username',
            ]);

            if (!$validator->fails()) {
                $driver = Driver::find($id);
                $driver->name = $request->name;
                $driver->email = $request->email;
                $driver->phone = $request->phone;
                $driver->username = $request->username;
                $driver->address = $request->address;
                $driver->update();
                return redirect()->back()->with('success', 'Driver Update Successfully');
            } else {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }




    public function driverList()
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

            $operate = '<a  id="' . $row->id . '"   data-bs-toggle="modal" data-bs-target="#editDriverModal" class="btn btn-icon btn-dark rounded-circle edit " title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '<a  id="' . $row->id . '" data-bs-toggle="modal" class="btn btn-icon btn-secondary rounded-circle resetpassword"  data-bs-target="#resetPasswordModel"><i class="bi bi-key text-dark-50"></i></a>';

            if ($row->status == '0') {
                $operate .=   '&nbsp;<a id="' . $row->id . '" class="btn btn-icon btn-success rounded-circle" onclick="return active(this.id);" title="Enable"><i class="bi bi-eye-fill"></i></a>';
            } else {
                $operate .=   '&nbsp;<a id="' . $row->id . '" class="btn btn-icon btn-danger rounded-circle" onclick="return disable(this.id);" title="Disable"><i class="bi bi-eye-slash-fill"></i></a>';
            }

            $tempRow['id'] = $row->id;
            $tempRow['uid'] = "#" . $row->id;
            $tempRow['created_at'] = date('d/m/y', strtotime($row->created_at));
            $tempRow['name'] = $row->name;
            $tempRow['email'] = $row->email;
            $tempRow['username'] = $row->username;
            $tempRow['address'] = $row->address;
            $tempRow['phone'] = $row->phone;
            $tempRow['status'] = ($row->status == '0') ? '<span class="badge rounded-pill bg-danger">Banned</span>' : '<span class="badge rounded-pill bg-success">Open</span>';
            $tempRow['avatar'] = ($row->avatar != '') ? '<a  data-lightbox="roadtrip" href="' .url('').config('global.IMG_PATH').config('global.DRIVER_IMG_PATH')  . $row->avatar . '"><img class="rounded avatar-md shadow img-fluid" alt="" src="' . url('').config('global.IMG_PATH').config('global.DRIVER_IMG_PATH') . $row->avatar . '" width="55"></a>' : '';
            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }


    public function resetpassword(Request $request)
    {

        if (!has_permissions('update', 'drivers')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $id = $request->edit_id;
            Driver::where('id', $id)->update(['password' => Hash::make($request->conform_password)]);
            return redirect()->back()->with('success', 'Password Reset Successfully');
        }
    }


    public function updateStatus(Request $request)
    {

        Driver::where('id', $request->id)->update(['status' => $request->status]);
        $response['error'] = false;
        return response()->json($response);
    }


    public function driverstatistics()
    {
        $response['error'] = false;
        $response['all'] = Driver::get()->count();
        $response['open'] = Driver::where('status', 1)->get()->count();
        $response['banned'] = Driver::where('status', 0)->get()->count();
        return response()->json($response);
    }

    public function updateMultipleStatus(Request $request)
    {

        $ids = $request->ids;
        for ($i = 0; $i < count($ids); $i++) {
            // echo $ids[$i]['id'];
            Driver::where('id', $ids[$i]['id'])->update(['status' => $request->status]);
        }
        $response['error'] = false;
        return response()->json($response);
    }


    public function getAllDriver(Request $request)
    {
        $driver = Driver::where('status', 1);
        if (isset($request->searchTerm)) {
            $search = $request->searchTerm;
            $driver = $driver->where('name', 'LIKE', "%$search%");
        }
        $driver = $driver->get();
        $tempArray = array();
        foreach ($driver as $row) {
            $tempArray[] = array(
                "id" => $row->id,
                "text" => "(#" . $row->id . ") " . $row->name
            );
        }
        return response()->json($tempArray);
    }
}
