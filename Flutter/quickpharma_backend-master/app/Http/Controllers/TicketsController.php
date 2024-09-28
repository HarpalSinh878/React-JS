<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    public function index()
    {

        return view('tickets.index');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Ticket = new Ticket();
        $Ticket->description = ($request->description) ? $request->description : '';
        $Ticket->priority = $request->priority;
        $Ticket->type = ($request->type) ? $request->type : '';
        $Ticket->order_id = ($request->order_id) ? $request->order_id : '';
        $Ticket->assign_to = ($request->assign_to) ? $request->assign_to : '';
        $Ticket->managed_by = ($request->managed_by) ? $request->managed_by : '';
        $Ticket->added_by = Auth::user()->id;
        $Ticket->last_status_update = date("Y-m-d H:i:s");
        $Ticket->last_updated_by = Auth::user()->id;
        $Ticket->save();
        return redirect()->back()->with('success', 'Ticket Create Succssfully');;
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

    }

    public function getTicketList() {
         DB::enableQueryLog();

        $offset = 0;
        $limit = 10;
        $sort = 'id';
        $order = 'DESC';
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



        $sql = Ticket::with('addedby','lastupdatedby')->orderBy($sort, $order);

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = $sql->where('id', 'LIKE', "%$search%")->orwhere('Description', 'LIKE', "%$search%")->orwhere('priority', 'LIKE', "%$search%")->orwhere('type', 'LIKE', "%$search%")->orwhere('status', 'LIKE', "%$search%");
        }

        if (isset($_GET['status'])) {
            $status = $_GET['status'];

            if ($status != 'All') {
               $sql =  $sql->where('status', $status);
            }
        }

        if (isset($_GET['order_id']) && $_GET['order_id'] != '') {
            $order_id = $_GET['order_id'];
            $sql = $sql->where('order_id',$order_id);
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

            $status_color = '';

            if ($row->status == 'Open') {
                $status_color = '<span class="badge badge-success">Open</span>';
            } else if ($row->status == 'Assigned') {
                $status_color = '<span class="badge badge-light">Assigned</span>';
            } else if ($row->status == 'In Progress') {
                $status_color = '<span class="badge badge-primary">In Progress</span>';
            } else if ($row->status == 'Ready to Resolve') {
                $status_color = '<span class="badge badge-secondary">Ready to Resolve</span>';
            } else if ($row->status == 'Resolved') {
                $status_color = '<span class="badge badge-info">Resolved</span>';
            } else if ($row->status == 'On Hold') {
                $status_color = '<span class="badge badge-light">On Hold</span>';
            } else if ($row->status == 'Rejected') {
                $status_color = '<span class="badge badge-danger">Rejected</span>';
            }

            if ($row->priority == 'Moderate') {
                $priority_color = '<span class="badge bg-warning">Moderate</span>';
            } else if ($row->priority == 'Low') {
                $priority_color = '<span class="badge badge-light-success">Low</span>';
            } else if ($row->priority == 'Normal') {
                $priority_color = '<span class="badge badge-light-warning">Normal</span>';
            } else if ($row->priority == 'High') {
                $priority_color = '<span class="badge badge-danger">High</span>';
            } else if ($row->priority == 'Emergency') {
                $priority_color = '<span class="badge badge-danger">Emergency</span>';
            }

            $tempRow['id'] = $row->id;
            $tempRow['action'] = "#".$row->id;
            $tempRow['description'] = $row->description;
            $tempRow['priority'] = $priority_color;//$row->priority;
            $tempRow['status'] = $status_color;
            $tempRow['type'] = $row->type;
            $tempRow['assigned_to'] = '';
            $tempRow['order_id'] = $row->order_id;
            $tempRow['submitted'] = date('d/m/Y h:m A', strtotime($row->created_at));
            $tempRow['submitted_by'] = isset($row->addedby) ? $row->addedby->name : '' ;
            $date = Carbon::now()->parse(date('Y-m-d H:i', strtotime($row->created_at)));

            $hours_in_status = Carbon::now()->parse(date('Y-m-d H:i', strtotime($row->last_status_update)));

            $tempRow['hours_in_status'] = $hours_in_status->diffInHours() . " hrs " . ($hours_in_status->diffInMinutes() - ($hours_in_status->diffInHours() * 60)) . " min";
            $tempRow['hours_in_system'] = $date->diffInHours() . " hrs " . ($date->diffInMinutes() - ($date->diffInHours() * 60)) . " min";
            $tempRow['last_updated'] = date('d/m/Y h:m A', strtotime($row->updated_at));
            $tempRow['closed'] = date('d/m/Y h:m A', strtotime($row->created_at));
            $tempRow['last_updated_by'] = isset($row->lastupdatedby) ? $row->lastupdatedby->name : '' ;;
            $rows[] = $tempRow;
            $count++;
        }
        $bulkData['rows'] = $rows;
        return response()->json($bulkData);
    }


    public function saveMultipleStatus(Request $request)
    {
        $ids = $request->ids;
        for ($i = 0; $i < count($ids); $i++) {
            $ticket = Ticket::find($ids[$i]['id']);
            $ticket->status = $request->status;
            $ticket->last_status_update = date("Y-m-d H:i:s");
            $ticket->update();
        }

        $response['error'] = false;
        return response()->json($response);
    }


    public function ticketsstatistics()
    {
        $response['error'] = false;
        $response['open'] = getTicketsTotal('Open');
        $response['Assigned'] = getTicketsTotal('Assigned');
        $response['InProgress'] = getTicketsTotal('In Progress');
        $response['ReadytoResolve'] = getTicketsTotal('Ready to Resolve');
        $response['Resolved'] = getTicketsTotal('Resolved');
        $response['OnHold'] = getTicketsTotal('On Hold');
        $response['Rejected'] = getTicketsTotal('Rejected');
        return response()->json($response);
    }
}
