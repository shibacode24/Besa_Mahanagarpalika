<?php

namespace App\Http\Controllers\Master;
use App\Models\Master\BussinessType;
use App\Models\Master\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeOfBussinessController extends Controller
{
    public function index(Request $request)
    {
        $bussinesstype_all =BussinessType::all();

        $hotel_data = Hotel::first();




        return view('Master.type_of_business',compact('bussinesstype_all','hotel_data'));
    }

    public function create(Request $request){
        $store=new BussinessType;
        $store->bussiness_type=$request->get('bussiness_type');
        $store->bussiness_type1=$request->get('bussiness_type1');

        $store->charges=$request->get('charges');

        $store->renewal_charges=$request->get('renewal_charges');
        $store->late_fee=$request->get('late_fee');
        $store->reg_fee=$request->get('reg_fee');
        
        $store->save();
        return redirect(route('typeofbussiness'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }

  //   public function create_hotel(Request $request){
  //     $store=new Hotel;
  //     $store->non_ac_room=$request->get('non_ac_room');
  //     $store->ac_room=$request->get('ac_room');
  //     $store->save();
  //     return redirect(route('typeofbussiness'));
  // }


  // public function delete_hotel(Request $request)  
  //   {  
  //     $data=Hotel::where('id',$request->id)->delete();   
  //       return redirect(route('typeofbussiness'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
  //   } 


    public function delete(Request $request)  
    {  
      $data=BussinessType::where('id',$request->id)->delete();   
        return redirect(route('typeofbussiness'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=BussinessType::find($request->id);
      $bussinesstype_all =BussinessType::all();
      $all =Hotel::all();

      
      // exit();
    return view('Master.edit_type_of_bussiness',['edit_data'=>$data1,'bussinesstype_all'=>$bussinesstype_all,'alls'=>$all]);
    }

    public function update(Request $request)
    {
      //dd($request->all());
   $store =BussinessType::find($request->id);
   //echo json_encode($data);
       // exit();
   $store->bussiness_type = $request->bussiness_type;
   $store->bussiness_type1 = $request->bussiness_type1;
   $store->charges = $request->charges;
   $store->renewal_charges=$request->get('renewal_charges');
   $store->late_fee=$request->get('late_fee');
   $store->reg_fee=$request->get('reg_fee');
   $store->save();
   return redirect(route('typeofbussiness'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }


  public function edit_hotel(request $request)
  {
//  echo json_encode($request->all());
//  exit();
    $hotel_data=Hotel::find($request->id);
   // $hotel_data=Hotel::where('id',1);
    $all =Hotel::all();
    $bussinesstype_all =BussinessType::all();

//dd($all);
    
    // exit();
  return view('Master.type_of_business',['hotel_data'=>$hotel_data,'alls'=>$all,'bussinesstype_all'=>$bussinesstype_all]);
  }

  public function update_hotel(Request $request)
  {
//     echo json_encode($request->all());
//  exit();
   
 $store =Hotel::find($request->id);
 
 $store->non_ac_room = $request->non_ac_room;
 $store->ac_room = $request->ac_room;

 $store->save();
 return redirect(route('typeofbussiness'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
}
  
}
