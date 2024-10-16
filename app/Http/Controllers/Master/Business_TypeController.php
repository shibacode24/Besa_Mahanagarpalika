<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Business_Type;

class Business_TypeController extends Controller
{
    public function index()
    {  $bussiness_all =Business_Type::all();

        return view('Master.business_type',compact('bussiness_all'));
    }

    public function create(Request $request){
        $store=new Business_Type;
        $store->business_type=$request->get('business_type');
        $store->business_type1=$request->get('business_type1');
        $store->save();
        return redirect(route('new_bussiness'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }


   
    public function delete(Request $request)  
    {  
      $data=Business_Type::where('id',$request->id)->delete();   
        return redirect(route('new_bussiness'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=Business_Type::find($request->id);
      $bussiness_all =Business_Type::all();

      
      // exit();
    return view('Master.edit_business_type',['edit_data'=>$data1,'bussiness_all'=>$bussiness_all]);
    }

    public function update(Request $request)
    {
      //dd($request->all());
   $store =Business_Type::find($request->id);
   $store->business_type=$request->get('business_type');
   $store->business_type1=$request->get('business_type1');
   $store->save();
   return redirect(route('new_bussiness'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
