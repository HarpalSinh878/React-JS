<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DispatcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dispatcher.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required',
            'conform_password' => 'required|same:password',
        ], [
            'name.required' => 'Please Enter Name',
            // 'email.required' => 'Please Enter Email Address',
            'email.email' => 'Please Enter Valid Email Address',
            'email.unique' => 'Sorry, this email has already been taken!',
            'phone.required' => 'Please Enter Phone',
            'phone.unique' => 'Sorry, this phone has already been taken!',
            'password.required' => 'Please Enter Password',
            'conform_password.required' => 'Please Enter Confirm Password',
            'conform_password.same' => 'Password And Confirm Password Must Be Same',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email != "" ? $request->email : '';
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->permissions = getClientPermission();
            $user->userType = 3;
            $user->status = 1;
            $user->password = Hash::make($request->conform_password);
            $user->latitude = $request->address_latitude;
            $user->longitude = $request->address_longitude;
            $user->save();

            return redirect()->back()->with('success', 'Dispatcher Insert Successfully');
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
        $id = $request->edit_id;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email|unique:users,email,' . $id,
            'phone' => 'required|unique:users,phone,' . $id,
        ], [
            'name.required' => 'Please Enter Name',
            // 'email.required' => 'Please Enter Email Address',
            'email.email' => 'Please Enter Valid Email Address',
            'email.unique' => 'Sorry, this email has already been taken!',
            'phone.required' => 'Please Enter Phone',
            'phone.unique' => 'Sorry, this phone has already been taken!',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email != "" ? $request->email : '';
            $user->phone = $request->phone;
            $user->permissions = getClientPermission();;
            $user->address = $request->address;
            $user->latitude = $request->address_latitude;
            $user->longitude = $request->address_longitude;
            $user->update();
            return redirect()->back()->with('success', 'dispatcher Update Successfully');
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
        //
    }



    public function dispatcherList()
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


        $sql = User::orderBy($sort, $order);


        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('name', 'LIKE', "%$search%");
        }

        if($status !='all'){
            if($status == 'open'){
                $sql = $sql->where('status', 1);
            }
            if($status == 'banned'){
                $sql = $sql->where('status', 0);
            }
        }

        $total = $sql->count();

        if (isset($_GET['limit'])) {
            $sql = $sql->skip($offset)->take($limit);
        }


        $res = $sql->where('userType', '=', '3')->get();

        $bulkData = array();
        $bulkData['total'] = $total;
        $rows = array();
        $tempRow = array();
        $count = 1;

        foreach ($res as $row) {

            $operate = '<a  id="' . $row->id . '"   data-bs-toggle="modal" data-bs-target="#editDispatcherModal" class="btn btn-icon btn-dark rounded-circle edit " title="Edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
            $operate .= '<a  id="' . $row->id . '" data-bs-toggle="modal" class="btn btn-icon btn-secondary rounded-circle resetpassword"  data-bs-target="#resetPasswordModel"><i class="bi bi-key text-dark-50"></i></a>';

            if ($row->status == '0') {
                $operate .=   '&nbsp;<a id="'.$row->id.'" class="btn btn-icon btn-success rounded-circle" onclick="return active(this.id);" title="Enable"><i class="bi bi-eye-fill"></i></a>';
            } else {
                $operate .=   '&nbsp;<a id="'.$row->id.'" class="btn btn-icon btn-danger rounded-circle" onclick="return disable(this.id);" title="Disable"><i class="bi bi-eye-slash-fill"></i></a>';
            }

            $tempRow['id'] = $row->id;
            $tempRow['uid'] = "#" . $row->id;
            $tempRow['created_at'] = date('d/m/y', strtotime($row->created_at));
            $tempRow['name'] = $row->name;
            $tempRow['email'] = $row->email;
            $tempRow['address'] = $row->address;
            $tempRow['latitude'] = $row->latitude;
            $tempRow['longitude'] = $row->longitude;
            $tempRow['phone'] = $row->phone;
            $tempRow['status'] = ($row->status == '0') ? '<span class="badge rounded-pill bg-danger">Banned</span>' : '<span class="badge rounded-pill bg-success">Open</span>';

            $tempRow['operate'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }

        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }


    public function resetpassword(Request $request)
    {
        $id = $request->edit_id;
        User::where('id', $id)->update(['password' => Hash::make($request->conform_password)]);
        return redirect()->back()->with('success', 'Password Reset Successfully');
    }


    public function updateStatus(Request $request)
    {
        User::where('id', $request->id)->update(['status' => $request->status]);
        $response['error'] = false;
        return response()->json($response);
    }


    public function dispatcherstatistics(){
        $response['error'] = false;
        $response['all'] = User::where('userType','=','3')->get()->count();
        $response['open'] = User::where('status',1)->where('userType','=','3')->get()->count();
        $response['banned'] = User::where('status',0)->where('userType','=','3')->get()->count();
        return response()->json($response);
    }

    public function updateMultipleStatus(Request $request)
    {

        $ids = $request->ids;
        for($i=0;$i < count($ids);$i++){
           // echo $ids[$i]['id'];
            User::where('id',$ids[$i]['id'])->update(['status' => $request->status]);
        }
        $response['error'] = false;
        return response()->json($response);
    }
}
