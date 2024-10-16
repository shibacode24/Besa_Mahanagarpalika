<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class ProfileController extends Controller
{
    public function profile()
    {
     $data = User::where('role',auth()->user()->role)->first();

    //  echo json_encode($data);
    //  exit();
     return view('admin_panel.profile',compact('data'));
    }
 
    public function edit_profile(Request $request)
    {
     $data = User::where('role',auth()->user()->role)->first();
 
     $data->username=$request->get('user_name');
     $data->password=$request->password ? Hash::make($request->password) : $data->password ;
 
    //  echo json_encode($data);
    //  exit();
 
     $data->save();
 
 return redirect()->back();
    }
}
