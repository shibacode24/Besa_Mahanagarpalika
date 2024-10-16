<?php

namespace App\Http\Controllers\Master;
use App\Models\Master\BussinessReg;
use App\Models\Master\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BussinessRegController extends Controller
{
    public function index()
    {  $bussiness_all =BussinessReg::all();

        return view('Master.bussiness_reg',compact('bussiness_all'));
    }

    public function create(Request $request){
        $store=new BussinessReg;
        $store->bussiness_reg_type=$request->get('bussiness_reg_type');
        $store->bussiness_reg_type1=$request->get('bussiness_reg_type1');
        $store->save();
        return redirect(route('bussiness'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }


   
    public function delete(Request $request)  
    {  
      $data=BussinessReg::where('id',$request->id)->delete();   
        return redirect(route('bussiness'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=BussinessReg::find($request->id);
      $bussiness_all =BussinessReg::all();

      
      // exit();
    return view('Master.edit_bussiness_reg',['edit_data'=>$data1,'bussiness_all'=>$bussiness_all]);
    }

    public function update(Request $request)
    {
      //dd($request->all());
   $store =BussinessReg::find($request->id);
   $store->bussiness_reg_type=$request->get('bussiness_reg_type');
   $store->bussiness_reg_type1=$request->get('bussiness_reg_type1');
   $store->save();
   return redirect(route('bussiness'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }

}


