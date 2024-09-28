<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('my-account.index');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $destinationPath = public_path('images') . config('global.USER_IMG_PATH');
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        
        $user = User::find(Auth::user()->id);
        if($request->has('name')){
            $user->name = $request->name;
        }
        if($request->has('doing_business_as')){
            $user->doing_business_as = $request->doing_business_as;
        }

        if($request->has('business_name')){
            $user->business_name = $request->business_name;
        }

        if($request->has('city')){
            $user->city = $request->city;
        }

        if($request->has('state')){
            $user->state = $request->state;
        }
        if($request->has('zip')){
            $user->zip = $request->zip;
        }

        if($request->has('apt')){
            $user->apt = $request->apt;
        }
        if($request->has('phone')){
            $user->phone = $request->phone;
        }
        
        if($request->has('conform_password')){
            $user->password = Hash::make($request->conform_password);
        }
        
        if ($request->hasFile('profile') && $request->profile != '') {
            $file = $request->file('profile');
            $fileName = time() . rand(1, 100) . '.' . $file->extension();
            $file->move($destinationPath, $fileName);
            
            $oldImage = $user->avatar;
            if($oldImage != ''){
                if (file_exists(public_path('images') . config('global.USER_IMG_PATH') .  $oldImage)) {
                    unlink(public_path('images') . config('global.USER_IMG_PATH') . $oldImage);
                }
            }
            
            
            $user->avatar = $fileName;

        }



        $user->update();
        return redirect()->back()->with('success', 'Profile Update Successfully');
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
}
