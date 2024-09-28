<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordOtp;
use App\Models\Driver;
use App\Models\Order;
use App\Models\OrdersDocument;
use App\Models\Regions;
use App\Models\Setting;
use App\Models\RegionMaskedPhotos;
use Carbon\Carbon;
use Exception;
use Faker\Extension\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    ////  START :: 1. login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            if (Auth::guard('drivers')->attempt(['username' => request('username'), 'password' => request('password')])) {
                $credentials =  Auth::guard('drivers')->user();
                if ($credentials->status == 1) {
                    if (!$token = JWTAuth::fromUser($credentials)) {
                        $response['error'] = true;
                        $response['message'] = 'Login credentials are invalid.';
                    } else {
                        $driver = Driver::find($credentials->id);
                        $driver->api_token = $token;
                        $driver->update();
                        if (filter_var($driver->avatar, FILTER_VALIDATE_URL) === false) {
                            $driver->avatar = ($driver->avatar != '') ? url('') . config('global.IMG_PATH') . config('global.DRIVER_IMG_PATH') . $driver->avatar : '';
                        } else {
                            $driver->avatar = $driver->avatar;
                        }
                        $response['error'] = false;
                        $response['message'] = 'Login Successfully';
                        $response['token'] = $token;
                        $response['data'] = $driver;
                    }
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Your Account is suspended, Please Contact to Support.';
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'Login credentials Is Not A invalid.';
            }
        } else {
            $response['error'] = true;
            $response['message'] = 'Please fill all data and Submit';
        }
        return response()->json($response);
    }
    ////  END :: 1. login
    ////  START :: 2. get_order
    public function get_order(Request $request)
    {
        $offset = isset($request->offset) ? $request->offset : 0;
        $limit = isset($request->limit) ? $request->limit : 10;
        $order = Order::with('recipient:id,name,address,delivery_address,city,zip,state,apt,phone', 'client:id,name,business_name,address,city,zip,state,apt,phone', 'prescriptions:id,order_id,rx_number,date_filled', 'order_document')->where('driver_id', request('user_id'));
        if (isset($request->search) && !empty($request->search)) {
            //$search = $request->search;
            //$order->where('category', 'LIKE', "%$search%");
        }
        if (isset($request->regions_id) && !empty($request->regions_id)) {
            //$search = $request->search;
            $order =  $order->where('regions_id', $request->regions_id);
        }
        if (isset($request->status) && !empty($request->status)) {
            $order = $order->where('status', $request->status);
        } else {
            $order = $order->whereIn('status', ['Driver Out']);
        }
        if (isset($request->id) && !empty($request->id)) {
            $id = $request->id;
            $order = $order->where('id', '=', $id);
        }
        $total = $order->get()->count();
        $result = $order->orderBy('order_sequence', 'ASC')->skip($offset)->take($limit)->get();
        if (!$result->isEmpty()) {
            foreach ($result as $row) {
                if ($row->order_document != null) {
                    for ($i = 0; $i < count($row->order_document); $i++) {
                        if (filter_var($row->order_document[$i]->document, FILTER_VALIDATE_URL) === false) {
                            $row->order_document[$i]->document_path = ($row->order_document[$i]->document != '') ? url('') . '/images' . config('global.ORDERS_IMG_PATH')  . $row->id . "/" . $row->order_document[$i]->document : '';
                        } else {
                            $row->order_document[$i]->document_path  = $row->order_document[$i]->document;
                        }
                        //1:Attach photo | 2:Attach signature | 3: Copay | 4:Fridge 
                        if ($row->order_document[$i]->type == '1') {
                            $row->order_document[$i]->document_type = 'Attach Photo';
                        }
                        if ($row->order_document[$i]->type == '2') {
                            $row->order_document[$i]->document_type = 'Attach Signature';
                        }
                        if ($row->order_document[$i]->type == '3') {
                            $row->order_document[$i]->document_type = 'Copay';
                        }
                        if ($row->order_document[$i]->type == '4') {
                            $row->order_document[$i]->document_type = 'Fridge';
                        }
                    }
                }
                $row->date_to_deliver = ($row->date_to_deliver != null) ? strtotime($row->date_to_deliver) : null;
                // $row->time_to_deliver = ($row->time_to_deliver != null) ? strtotime($row->time_to_deliver) : null;
                $row->pickup_date = ($row->pickup_date != null) ? strtotime($row->pickup_date) : null;
                $row->order_created_at = ($row->created_at != 'null') ? strtotime($row->created_at) : null;
            }
            $response['error'] = false;
            $response['message'] = "Data Fetch Successfully";
            $response['total'] = $total;
            $response['data'] = $result;
        } else {
            $response['error'] = true;
            $response['message'] = "No data found!";
        }
        return response()->json($response);
    }
    ////  END :: 2. get_order
    ////  START :: 3. update_order
    public function update_order(Request $request)
    {
        $validator = Validator::make($request->all(), ['order_id' => 'required']);
        if (!$validator->fails()) {
            $order_id = $request->order_id;
            $order = Order::find($order_id);
            if ($order != '') {
                $FolderPath = public_path('images') . config('global.ORDERS_IMG_PATH');
                if (!is_dir($FolderPath)) {
                    mkdir($FolderPath, 0777, true);
                }
                $destinationPath = public_path('images') . config('global.ORDERS_IMG_PATH') . "/" . $order_id;
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                if ($request->hasfile('attachfile')) {
                    foreach ($request->file('attachfile') as $file) {
                        $name = time() . rand(1, 100) . '.' . $file->extension();
                        $file->move($destinationPath, $name);
                        OrdersDocument::create([
                            'order_id' => $order_id,
                            'document' => $name,
                            'type' => '1'
                        ]);
                    }
                }
                if ($request->hasfile('attachsignature')) {
                    foreach ($request->file('attachsignature') as $file) {
                        $name = time() . rand(1, 1000) . '.' . $file->extension();
                        $file->move($destinationPath, $name);
                        OrdersDocument::create([
                            'order_id' => $order_id,
                            'document' => $name,
                            'type' => '2'
                        ]);
                    }
                }
                if ($request->hasfile('copay')) {
                    foreach ($request->file('copay') as $file) {
                        $name = time() . rand(1, 1000) . '.' . $file->extension();
                        $file->move($destinationPath, $name);
                        OrdersDocument::create([
                            'order_id' => $order_id,
                            'document' => $name,
                            'type' => '3'
                        ]);
                    }
                }
                if ($request->hasfile('fridge')) {
                    foreach ($request->file('fridge') as $file) {
                        $name = time() . rand(1, 1000) . '.' . $file->extension();
                        $file->move($destinationPath, $name);
                        OrdersDocument::create([
                            'order_id' => $order_id,
                            'document' => $name,
                            'type' => '4'
                        ]);
                    }
                }
                //// START :: Order Activity History
                $activity = 'Driver Add Driver Notes';
                apiorderActivityHistory($order->id, $activity, request('user_id'));
                //// END :: Order Activity History
                if ($request->status != '') {
                    //// START :: Order Activity History
                    $activity = 'Changed status from ' . $order->status . ' to ' . $request->status;
                    apiorderActivityHistory($order->id, $activity, request('user_id'));
                    //// END :: Order Activity History
                    //// START :: Order Status History
                    apiorderStatusHistory($order->id, $order->status, $request->status, request('user_id'));
                    //// END :: Order Status History
                    $order->status = $request->status;
                    if ($request->status == 'Delivery Attempted') {
                        $order->increment('attempts');
                    }
                }
                if ($request->contents != '') {
                    $order->contents = $request->contents;
                }
                if ($request->note_added != '') {
                    $order->note_added = $request->note_added;
                }
                if ($request->is_copay_payed != '') {
                    $order->is_copay_payed = $request->is_copay_payed;
                }
                if ($request->date_to_deliver != '') {
                    $order->date_to_deliver = $request->date_to_deliver;
                }
                if ($request->time_to_deliver != '') {
                    $order->time_to_deliver = $request->time_to_deliver;
                }
                if ($request->order_activity != '') {
                    $order->order_activity = $request->order_activity;
                }
                $order->update();
                $response['error'] = false;
                $response['message'] = "Driver Note Update Successfully";
            } else {
                $response['error'] = true;
                $response['message'] = 'Order Id Not Found';
            }
        } else {
            $response['error'] = true;
            $response['message'] = 'Please fill all data and Submit';
        }
        return response()->json($response);
    }
    ////  END :: 3. update_order
    ////  START :: 4. update_user
    public function update_user(Request $request)
    {
        $driver = Driver::find($request->user_id);
        $validator = Validator::make($request->all(), [
            'username' => ['unique:drivers,username,' . $request->user_id],
            'email' => ['unique:drivers,email,' . $request->user_id],
            'phone' => ['unique:drivers,phone,' . $request->user_id]
        ]);
        if (!$validator->fails()) {
            $destinationPath = public_path('images') . config('global.DRIVER_IMG_PATH');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            // image upload
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $imageName = microtime(true) . "." . $avatar->getClientOriginalExtension();
                $avatar->move($destinationPath, $imageName);
                $driver->avatar = $imageName;
            }
            if (isset($request->name) && $request->name != '') {
                $driver->name = $request->name;
            }
            if (isset($request->address) && $request->address != '') {
                $driver->address = $request->address;
            }
            if (isset($request->fcm_id) && $request->fcm_id != '') {
                $driver->fcm_id = $request->fcm_id;
            }
            if (isset($request->username) && $request->username != '') {
                $driver->username = $request->username;
            }
            if (isset($request->email) && $request->email != '') {
                $driver->email = $request->email;
            }
            if (isset($request->phone) && $request->phone != '') {
                $driver->phone = $request->phone;
            }
            if (isset($request->latitude) && $request->latitude != '') {
                $driver->latitude = $request->latitude;
            }
            if (isset($request->longitude) && $request->longitude != '') {
                $driver->longitude = $request->longitude;
            }
            if (isset($request->app_settings) && $request->app_settings != '') {
                $driver->app_settings = $request->app_settings;
            }
            $driver->update();
            $response['error'] = false;
            $response['message'] = "Profile Successfully Update";
        } else {
            $response['error'] = true;
            $response['message'] = (isset($request->username)) ? 'Username Alredy Use' : ((isset($request->email)) ? 'Email Address Alredy Use' : ((isset($request->phone)) ? 'Phone Number Alredy Use' : ''));
        }
        return response()->json($response);
    }
    ////  END :: 4. update_user
    ////  START :: 5. get_user
    public function get_user(Request $request)
    {
        $driver = Driver::find($request->user_id);
        if (!empty($driver)) {
            if (filter_var($driver->avatar, FILTER_VALIDATE_URL) === false) {
                $driver->avatar = ($driver->avatar != '') ? url('') . config('global.IMG_PATH') . config('global.DRIVER_IMG_PATH') . $driver->avatar : '';
            } else {
                $driver->avatar = $driver->avatar;
            }
            $response['error'] = false;
            $response['message'] = "Profile Fetch Successfully";
            $response['data'] = $driver;
        } else {
            $response['error'] = true;
            $response['message'] = "No data found!";
        }
        return response()->json($response);
    }
    ////  END :: 5. get_user
    ////  START :: 6. forgot_password
    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            $response['error'] = true;
            $response['message'] = "Please Enter valid Email id";
        } else {
            $email = $request->email;
            $driver = Driver::where('email', $email)->first();
            if ($driver != '') {
                $otp = rand(1000, 9999);
                $driver->otp = $otp;
                $driver->update();
                $mailData = [
                    'title' => 'Reset Password Otp',
                    'body' => 'Reset Password Otp',
                    'otp' => $otp
                ];
                Mail::to($email)->send(new ForgotPasswordOtp($mailData));
                $response['error'] = false;
                $response['message'] = "Password recovery email has been sent to you.";
            } else {
                $response['error'] = true;
                $response['message'] = "Email Id Not Found";
            }
        }
        return response()->json($response);
    }
    ////  END :: 6. forgot_password
    ////  START :: 7. reset_password
    public function reset_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'otp' => 'required',
            'password' => 'required',
            'conform_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            $response['error'] = true;
            $response['message'] = "Please fill all data and Submit";
        } else {
            $otp = $request->otp;
            $email = $request->email;
            $password = $request->password;
            $driver = Driver::where('otp', $otp)->where('email', $email)->first();
            if ($driver != '') {
                $driver->password = Hash::make($password);
                $driver->otp = null;
                $driver->update();
                $response['error'] = false;
                $response['message'] = "New password configured successfully.";
            } else {
                $response['error'] = true;
                $response['message'] = "Failed! Please enter correct otp.";
            }
        }
        return response()->json($response);
    }
    ////  END :: 7. resetPassword
    ////  START :: 8. change_password
    public function change_password(Request $request)
    {
        $driver = Driver::find($request->user_id);
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'conform_password' => 'required|same:password',
            'current_password' => ['required', function ($attribute, $value, $fail) use ($driver) {
                if (!Hash::check($value, $driver->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
        ]);
        if (!$validator->fails()) {
            $conform_password = $request->password;
            $driver->password = Hash::make($conform_password);
            $driver->update();
            $response['error'] = false;
            $response['message'] = "Password Change Successfully";
        } else {
            $response['error'] = true;
            $response['message'] = "Old Password and New Password Not Match";
        }
        return response()->json($response);
    }
    ////  END :: 8. change_password
    ////  START :: 9. remove_order_document
    public function remove_order_document(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'order_id' => 'required',
        ]);
        if (!$validator->fails()) {
            $id = $request->id;
            $order_id = $request->order_id;
            $orders_document = OrdersDocument::where('id', $id)->where('order_id', $order_id)->first();
            if ($orders_document->document != '') {
                if (file_exists(public_path('images') . config('global.ORDERS_IMG_PATH') . $orders_document->order_id . "/" . $orders_document->document)) {
                    unlink(public_path('images') . config('global.ORDERS_IMG_PATH') . $orders_document->order_id . "/" . $orders_document->document);
                }
                if (is_dir_empty(public_path('images') . config('global.ORDERS_IMG_PATH') . $orders_document->order_id)) {
                    rmdir(public_path('images') . config('global.ORDERS_IMG_PATH') . $orders_document->order_id);
                }
            }
            $orders_document->delete();
            $response['error'] = false;
            $response['message'] = "Document Delete successfully";
        } else {
            $response['error'] = true;
            $response['message'] = "Order id or Document id Required";
        }
        return response()->json($response);
    }
    ////  END :: 9. remove_order_document
    ////  START :: 10. delete_user
    public function delete_user(Request $request)
    {
        $id = $request->user_id;
        Driver::find($id)->delete();
        $response['error'] = false;
        $response['message'] = "Driver Delete successfully";
        return response()->json($response);
    }
    ////  END :: 10. delete_user
    ////  START :: 11. verify_otp
    public function verify_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'otp' => 'required'
        ]);
        if ($validator->fails()) {
            $response['error'] = true;
            $response['message'] = "Please fill all data and Submit";
        } else {
            $otp = $request->otp;
            $email = $request->email;
            $password = $request->password;
            $driver = Driver::where('otp', $otp)->where('email', $email)->first();
            if ($driver != '') {
                $response['error'] = false;
                $response['message'] = "Otp Is Valid";
            } else {
                $response['error'] = false;
                $response['message'] = "Otp Is invalid";
            }
        }
        return response()->json($response);
    }
    ////  END :: 11. verify_otp
    ////  START :: 12. dashboard_statistics
    public function dashboard_statistics(Request $request)
    {
        $data['total_orders_today'] = Order::where('driver_id', request('user_id'))->whereDate('created_at', Carbon::today())->count();
        $data['total_orders_this_month'] = Order::where('driver_id', request('user_id'))->whereMonth('created_at', Carbon::now()->month)->count();
        $data['total_orders_pending'] = Order::where('driver_id', request('user_id'))->whereIn('status', ['Route Optimized', 'Driver Out'])->count();
        $data['total_orders_complete'] = Order::where('driver_id', request('user_id'))->whereIn('status', ['Delivered'])->count();
        $data['total_earnings_this_month'] = DB::table('orders')->where('driver_id', request('user_id'))->whereIn('status', ['Delivered'])
            ->whereBetween(DB::raw('DATE(date_to_deliver)'), [Carbon::now()->startOfMonth()->format('Y-m-d'), Carbon::now()->endOfMonth()->format('Y-m-d')])
            ->selectRaw('date_to_deliver as Date')
            ->selectRaw('sum(payout) as Payout')
            ->groupBy('date_to_deliver')
            ->sum('Payout');
        $response['error'] = false;
        $response['message'] = "Data Fetch Successfully";;
        $response['data'] =  $data;
        return response()->json($response);
    }
    ////  END :: 12. dashboard_statistics
    ////  START :: 13. get_system_settings
    public function get_system_settings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
        ]);
        if (!$validator->fails()) {
            $type = $request->type;
            $result = '';
            if (isset($type)) {
                if ($type == 'company') {
                    $result =  Setting::select('type', 'data')->WhereIn('type', ['company_name', 'company_website', 'company_email', 'company_address', 'company_tel1', 'company_tel2'])->get();
                    if (!empty($result)) {
                        $response['error'] = false;
                        $response['message'] = "Data Fetch Successfully";
                        $response['data'] = $result;
                    } else {
                        $response['error'] = true;
                        $response['message'] = "No data found!";
                    }
                } else if ($type == 'maintenance') {
                    $result =  Setting::select('type', 'data')->WhereIn('type', ['maintenance_mode', 'maintenance_message'])->get();
                    if (!empty($result)) {
                        $response['error'] = false;
                        $response['message'] = "Data Fetch Successfully";
                        $response['data'] = $result;
                    } else {
                        $response['error'] = true;
                        $response['message'] = "No data found!";
                    }
                } else {
                    $result =  system_setting($type);
                    if ($result != '') {
                        $response['error'] = false;
                        $response['message'] = "Data Fetch Successfully";
                        $response['data'] = $result;
                    } else {
                        $response['error'] = true;
                        $response['message'] = "No data found!";
                    }
                }
            }
        } else {
            $response = [
                'error' => true,
                'message' => 'Please fill all data and Submit'
            ];
        }
        return response()->json($response);
    }
    ////  END :: 13. get_system_settings
    ////  START :: 14. get_my_route
    public function get_my_route(Request $request)
    {
        $regions = Regions::select('id', 'route_name', 'service_time', 'starts_at', 'total_order', 'started', 'is_started', 'last_stop', 'driver_current_location', 'approximate_driving_time', 'distance', 'actual_driving_time', 'is_request_mask_photo', 'mask_photo', 'driver_id', 'dispatcher_id')->where('driver_id', $request->user_id)->where('is_finished', 'No')->get();
        if (!empty($regions)) {
            foreach ($regions as $row) {
                $row->service_time = round($row->service_time / 60) . " min";
            }
            $response['error'] = false;
            $response['message'] = "Data Fetch Successfully";
            $response['data'] = $regions;
        } else {
            $response['error'] = true;
            $response['message'] = "No data found!";
        }
        return response()->json($response);
    }
    ////  END :: 14. get_my_route
    ////  START :: 15. update_my_route
    public function update_my_route(Request $request)
    {
        $regions_id = $request->regions_id;
        $regions = Regions::find($regions_id);
        if ($regions != '') {
            if (isset($request->started) && $request->started != '') {
                $regions->started = $request->started;
            }

            if (isset($request->is_started) && $request->is_started != '') {
                $regions->is_started = $request->is_started;
            }

            if (isset($request->driver_current_location) && $request->driver_current_location != '') {
                $regions->driver_current_location = $request->driver_current_location;
            }

            if (isset($request->last_stop) && $request->last_stop != '') {
                $regions->last_stop = $request->last_stop;
            }
            $destinationPath = public_path('images') . config('global.MASK_IMG_PATH');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            // image upload
            if ($request->hasFile('mask_photo')) {
                $avatar = $request->file('mask_photo');
                $imageName = microtime(true) . "." . $avatar->getClientOriginalExtension();
                $avatar->move($destinationPath, $imageName);
                $regions->mask_photo = $imageName;

                $newmaskedphoto = new RegionMaskedPhotos();
                $newmaskedphoto->regions_id = $regions_id;
                $newmaskedphoto->mask_photo = $imageName;
                $newmaskedphoto->save();
            }
            $regions->update();
            $response['error'] = false;
            $response['message'] = "Update Successfully";
        } else {
            $response['error'] = true;
            $response['message'] = "Region Not Found";
        }
        return response()->json($response);
    }
    ////  END :: 15. update_my_route
    ////  START :: 16. driver_statistics
    public function driver_statistics(Request $request)
    {
        $driver = $request->user_id;
        if ($request->has('from') && $request->has('to')) {
            $startDate = $request->from;
            $endDate = $request->to;
        } else {
            $startDate = date('Y-m-d');
            $endDate =  date('Y-m-d');
        }
        $getOrder = DB::table('orders')->where('driver_id', $driver)->whereIn('status', ['Delivered'])
            ->whereBetween(DB::raw('DATE(date_to_deliver)'), [$startDate, $endDate])
            ->selectRaw('date_to_deliver as Date')
            ->selectRaw('sum(payout) as Payout')
            ->groupBy('date_to_deliver')
            ->get();
        if ($getOrder->isNotEmpty()) {
            $response['error'] = false;
            $response['message'] = "Data Fetch Successfully";
            $response['total_payout'] = $getOrder->sum('Payout');
            $response['data'] = $getOrder;
        } else {
            $response['error'] = true;
            $response['message'] = "No data found!";
        }
        // $validator = Validator::make($request->all(), [
        //     'from' => 'required',
        //     'to' => 'required',

        // ]);
        // if (!$validator->fails()) {
        //     $startDate = $request->from;
        //     $endDate = $request->to;
        //     $getOrder = DB::table('orders')->whereIn('status', ['Delivered'])
        //     ->whereBetween(DB::raw('DATE(date_to_deliver)'), [$startDate,$endDate])
        //     ->selectRaw('date_to_deliver as Date')
        //     ->selectRaw('sum(payout) as Payout')
        //     ->groupBy('date_to_deliver')
        //     ->get(); 
        //     if ($getOrder->isNotEmpty()) {
        //         $response['error'] = false;
        //         $response['message'] = "Data Fetch Successfully";
        //         $response['total_payout'] = $getOrder->sum('Payout');
        //         $response['data'] = $getOrder;
        //     } else {
        //         $response['error'] = true;
        //         $response['message'] = "No data found!";
        //     }
        // } else {
        //     $response['error'] = true;
        //     $response['message'] = 'Please fill all data and Submit';
        // }
        return response()->json($response);
    }
    ////  END :: 16. driver_statistics
}
