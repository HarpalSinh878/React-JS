<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!has_permissions('read', 'order_type')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            return view('order-type.index');
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
        if (!has_permissions('create', 'order_type')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $validator = Validator::make($request->all(), [
                'order_type' => 'required',
            ], [
                'order_type.required' => 'Please Enter Order Type Label',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $orderType = new OrderType();
                $orderType->order_type = $request->order_type;
                $orderType->save();
                return redirect()->back()->with('success', 'Order Type Add Successfully');
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
        if (!has_permissions('update', 'order_type')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $validator = Validator::make($request->all(), [
                'order_type' => 'required',
            ], [
                'order_type.required' => 'Please Enter Order Type Label',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $id = $request->edit_id;
                $orderType = OrderType::find($id);
                $orderType->order_type = $request->order_type;
                $orderType->isActive = $request->isActive;
                $orderType->update();
                return redirect()->back()->with('success', 'Order Type Update Successfully');
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
        if (!has_permissions('delete', 'order_type')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            OrderType::find($id)->delete();
            return redirect()->back()->with('success', 'Order Type Delete Successfully');
        }
    }


    public function getOrderTypeList() {

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

        $sql = OrderType::orderBy($sort, $order);
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhere('order_type', 'LIKE', "%$search%")->orwhere('isActive', 'LIKE', "%$search%");
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
            $operate .= '&nbsp;<a href="' . route('ordertype.destroy', $row->id) . '" onclick="return confirmationDelete(event);" class="btn btn-icon btn-danger rounded-circle" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" title="Delete"><i class="bi bi-trash"></i></a>';
            $tempRow['id'] = $row->id;
            $tempRow['order_type'] = $row->order_type;
            $tempRow['user_type'] = isset($row->user_type) ? $row->user_type : '';
            $tempRow['isActive'] = $row->isActive;
            $tempRow['action'] = $operate;
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }
}
