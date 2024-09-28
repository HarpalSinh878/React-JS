<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendVerificationOtp;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        if($request->send_otp == 1){
            $otp = rand(1000, 9999);
            session()->put('verification_otp',$otp);
            $mailData = [
                'title' => 'Account Verification Otp',
                'body' => 'Account Verification Otp',
                'otp' => $otp
            ];
            try {
                Mail::to($request->email)->send(new SendVerificationOtp($mailData));
                return response()->json(['status' => 1, 'message' => "Account Verification Otp email has been sent to you."],200);
            } catch (\Exception $e) {
                return response()->json(['status' => 0, 'message' => "Email error!!"],200);
            }
        }
        if($request->verify_otp == 1){
            if($request->otp == ""){
                return response()->json(['status' => 0, 'message' => "Please Enter OTP"],200);
            }
            if($request->otp != session()->get('verification_otp')){
                return response()->json(['status' => 0, 'message' => "Please Enter Valid OTP"],200);
            }else{
                return response()->json(['status' => 1, 'message' => "OTP Verification Successfull"],200);
            }
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'repeat_password' => 'required|same:password',
            'phone' => 'required',
            'business_name' => 'required',
            'doing_business_as' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'Apt' => 'required',
            'mailing_address' => 'required',
        ]);

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->business_name = $request->business_name;
            $user->doing_business_as = $request->doing_business_as;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip = $request->zipcode;
            $user->apt = $request->Apt;
            $user->address = $request->mailing_address;
            $user->password = Hash::make($request->password);
            $user->permissions = getClientPermission();
            $user->userType = 1;
            $user->status = 1;
            $user->save();
            session()->forget('verification_otp');
            return redirect('/');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
