<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Zone;

class ZoneController extends Controller
{
    public function index(Request $request)
    {
        $zone_all =Zone::all();
        return view('Master.zone',compact('zone_all'));
    }


    public function create(Request $request){
        $store=new Zone;
        $store->zone=$request->get('zone');
        $store->zone1=$request->get('zone1');
        $store->zone_name=$request->get('zone_name');
        $store->save();
        return redirect(route('zone'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }

    public function delete(Request $request)  
    {  
      $data=Zone::where('id',$request->id)->delete();   
        return redirect(route('zone'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=Zone::find($request->id);
      $zone_all =zone::all();

      
      // exit();
    return view('Master.edit_zone',['edit_data'=>$data1,'zone_all'=>$zone_all]);
    }


    public function update(Request $request)
    {
      //dd($request->all());
   $store =Zone::find($request->id);
   //echo json_encode($data);
       // exit();
   $store->zone = $request->zone;
   $store->zone1 = $request->zone1;
   $store->zone_name = $request->zone_name;
   $store->save();
   return redirect(route('zone'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
