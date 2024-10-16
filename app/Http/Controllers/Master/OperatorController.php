<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Operator;
use App\Models\Master\Zone;
use Hash;

class OperatorController extends Controller
{
    public function index()
    {
       $operator=Operator::leftjoin('zone','zone.id','=','operator.zone_id')
        ->select('operator.*','zone.zone')
          ->orderby('operator.id','desc')
          ->get();
       
        $zone=Zone::all();
        return view('Master.operator',compact('operator','zone'));
    }

    public function create(Request $request)
    {

        $store=new Operator();
        $store->name=$request->get('name');
        $store->mobile=$request->get('mobile');
        $store->zone_id=$request->get('zone_id');
       
        $store->username=$request->get('username');
        $store->password=  Hash::make($request->password);
  
        $store->save();
        return redirect(route('operator'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }


    public function delete(Request $request)  
    {  
      $data=Operator::where('id',$request->id)->delete();   
        return redirect(route('operator'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1 =Operator::find($request->id);
      $operator=Operator::leftjoin('zone','zone.id','=','operator.zone_id')
        ->select('operator.*','zone.zone')
          ->orderby('operator.id','desc')
          ->get();
       
        $zone=Zone::all();
      
      // exit();
    return view('Master.edit_operator',['edit_data'=>$data1,'operator'=>$operator,'zone'=>$zone]);
    }

    public function update(Request $request)
    {

        $store =Operator::find($request->id);

      $store->name=$request->get('name');
      $store->mobile=$request->get('mobile');
      $store->zone_id=$request->get('zone_id');
     
      $store->username=$request->get('username');
      if($request->password){
         $store->password=  Hash::make($request->password); 
      }
      

   $store->save();
   return redirect(route('operator'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
