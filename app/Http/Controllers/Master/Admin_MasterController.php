<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Master\Zone;
use Hash;

class Admin_MasterController extends Controller
{
    public function index()
    {
       $admin =User::
       where('role','1')
       ->orwhere('role','2')
       ->leftjoin('zone','zone.id','=','users.zone_id')
        ->select('users.*','zone.zone')
          ->orderby('users.id','desc')
          ->get();
          // echo json_encode( $admin);
          // exit();
        $zone=Zone::all();
        return view('Master.admin',compact('admin','zone'));
    }

    public function create(Request $request)
    {

        $store=new User();
        $store->name=$request->get('name');
        $store->mobile=$request->get('mobile');
        $store->zone_id=$request->get('zone_id');
       
        $store->username=$request->get('username');
        $store->role= $request->get('role');
        $store->password=  Hash::make($request->password);
      // echo json_encode( $store);
        // exit();
        
  
        $store->save();
        
        return redirect(route('admin'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);


    }


    public function delete(Request $request)  
    {  
      $data=User::where('id',$request->id)->delete();   
        return redirect(route('admin'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1 =User::find($request->id);
      $admin =User::where('role',1)
      ->orwhere('role','2')
       ->leftjoin('zone','zone.id','=','users.zone_id')
        ->select('users.*','zone.zone')
          ->orderby('users.id','desc')
          ->get();
       
        $zone=Zone::all();
      
      // exit();
    return view('Master.edit_admin_master',['edit_data'=>$data1,'admin'=>$admin,'zone'=>$zone]);
    }

    public function update(Request $request)
    {

        $store =User::find($request->id);

      $store->name=$request->get('name');
      $store->mobile=$request->get('mobile');
      $store->zone_id=$request->get('zone_id');
      $store->role= $request->get('role');
      $store->username=$request->get('username');
      $store->password=  Hash::make($request->password);
      
      // echo json_encode( $store);
        // exit();

   $store->save();
   return redirect(route('admin'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
