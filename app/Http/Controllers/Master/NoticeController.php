<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Notice2;
use App\Models\Master\Notice3;


class NoticeController extends Controller
{
    public function notice()
    {
      $data1=Notice2::first();

      $edit_notice3=Notice3::first();
        $notice2 = Notice2::all();
        $notice3 = Notice3::all();
        return view('Master.notice',compact('data1','notice2','notice3','edit_notice3','data1'));
    }
    public function insert_into_notice2(request $request)
    {
       $store= new Notice2();
       $store->notice2=$request->get('notice2');

    //    echo json_encode($store);
    //    exit();

       $store->save();
       return redirect()->back()->with(['success' => true, 'message' => 'Data Inserted Successfully !']);

    }

    public function delete_from_notice2($id)  
    {  
      $data=Notice2::find($id);  
        $data->delete();  
        return redirect()->back()->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function delete_notice3(Request $request)  
    {  
    

     $data=Notice3::where('id',$request->id)->delete(); 
        return redirect()->back()->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    
    public function edit_notice2(request $request)
    {
   // echo json_encode($request->all());
      $data1=Notice2::first();
    //    echo json_encode($data1);
    //   exit();
      $notice2 = Notice2::all();
      $notice3 = Notice3::all();
        //$data=Notice2::orderby('id','desc')->get();
      // echo json_encode($data1);
      // exit();
    return view('Master.notice',['data1'=>$data1,'notice2'=>$notice2,'notice3'=>$notice3]);
    }

 public function update_notice2(Request $request)
  {
    //dd($request->all());
 $data =Notice2::find($request->id);
 //echo json_encode($data);
     // exit();
 $data->notice2 = $request->notice2;
// echo json_encode($data);
//      exit();

 $data->save();
 return redirect()->back()->with(['success' => true, 'message' => 'Data Update Successfully  !']);
}


    public function insert_notice3(request $request)
    {
       $store= new Notice3;
       $store->notice3=$request->get('notice3');
            // echo json_encode($store);
            // exit();
       $store->save();
     return redirect()->back()->with(['success' => true, 'message' => 'Data Successfully Submitted !', 'location' => $request->get('location_id')]);

    }

    public function edit_notice3(request $request)
    {
     $edit_notice2=Notice2::first();

      $data1=Notice3::first();
     
      $notice2 = Notice2::all();
      $notice3 = Notice3::all();
    return view('Master.notice',['edit_notice3'=>$data1,'notice3'=>$notice3,'notice2'=>$notice2,'data1'=>$edit_notice2]);
    }

    public function update_notice3(Request $request)
  {
    //dd($request->all());
 $data =Notice3::find($request->id);

 $data->notice3 = $request->notice3;
//   echo json_encode($data);
//      exit();
 $data->save();
 return redirect()->back()->with(['success' => true, 'message' => 'Data Update Successfully  !']);
}

}
