<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Recipient;
use Illuminate\Support\Facades\Validator;

class AddressTesterController extends Controller
{
    public function index()
    {
        return view('address-tester.index');
    }
    public function recipientinfo(Request $request)
    {
        try {
            $data = Recipient::where('name', 'LIKE', '%' . $request->keyword . '%')->get();
            $html = '';
            if (count($data) > 0 && $request->keyword != "") {
                $html .= '<div class="col-lg-8 position-absolute" style="z-index:1;top:0;right:0;height:250px;overflow-y:auto;"><ul class="list-group" id="country-list">';
                foreach ($data as $key => $value) {
                    $html .= '<li class="list-group-item" onClick="selectCountry(this);" data-address="'.$value->address.'" data-state="'.$value->state.'" data-city="'.$value->city.'" data-zip="'.$value->zip.'" data-latitude="'.$value->latitude.'" data-longitude="'.$value->longitude.'" data-apt="'.$value->apt.'" data-recipient-name="'.$value->name.'"> '.$value->name.' </li>';
                }
                $html .= '</ul></div>';
            }
            return response()->json(['status' => 1, 'message' => 'Successul', 'data' => $html], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => 'Something Went Wrong!!'], 200);
        }
    }
}
