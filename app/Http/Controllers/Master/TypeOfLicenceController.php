<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\TypeofLicence;

class TypeOfLicenceController extends Controller
{
    public function index()
    {
        $licence_all =TypeofLicence::all();
        return view('Master.type_of_licence',compact('licence_all'));
    }

    public function create(Request $request){
        $store=new TypeofLicence;
        $store->type_of_licence=$request->get('type_of_licence');
        $store->licence_no=$request->get('licence_no');
        
        $store->save();
        return redirect(route('typeoflicence'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }


    public function delete(Request $request)  
    {  
      $data=TypeofLicence::where('id',$request->id)->delete();   
        return redirect(route('typeoflicence'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=TypeofLicence::find($request->id);
      $licence_all =TypeofLicence::all();

      // exit();
    return view('Master.edit_type_of_licence',['edit_data'=>$data1,'licence_all'=>$licence_all]);
    }

    public function update(Request $request)
    {
      //dd($request->all());
   $store =TypeofLicence::find($request->id);
   $store->type_of_licence=$request->get('type_of_licence');
   $store->licence_no=$request->get('licence_no');
   $store->save();
   return redirect(route('typeoflicence'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
