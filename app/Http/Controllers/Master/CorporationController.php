<?php

namespace App\Http\Controllers\Master;
use App\Models\Master\Corporation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\State;
use App\Models\Master\City;

class CorporationController extends Controller
{
    public function index()
    {
        $corporation_all=Corporation::leftjoin('states','states.id','=','corporations.state_id')
        ->leftjoin('citys','citys.id','=','corporations.city_id')
        ->select('corporations.*','states.state','citys.city')
          ->orderby('corporations.id','desc')
          ->get();
        $state=State::all();
        $city=city::all();
        
        return view('Master.corporation',compact('corporation_all','state','city'));
    }

    public function create(Request $request){

        
        
        $store=new Corporation;
        $store->name=$request->get('name');
        $store->address=$request->get('address');
        $store->pincode=$request->get('pincode');
        $store->email=$request->get('email');
        $store->mobile=$request->get('mobile');
        $store->state_id=$request->get('state_id');
        $store->city_id=$request->get('city_id');
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/corporation_logo'), $filename);
            $store->logo = $filename;

        }  

        if ($request->hasFile('header')) {
            $file = $request->file('header');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/corporation-header'), $filename);
            $store->header = $filename;

        }  
       
        $store->save();
        return redirect(route('corporation'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }

    public function delete(Request $request)  
    {  
      $data=Corporation::where('id',$request->id)->delete();   
        return redirect(route('corporation'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 


    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=Corporation::find($request->id);
      $corporation_all=Corporation::leftjoin('states','states.id','=','corporations.state_id')
      ->leftjoin('citys','citys.id','=','corporations.city_id')
      ->select('corporations.*','states.state','citys.city')
        ->orderby('corporations.id','desc')
        ->get();
      $state=State::all();
      $city=city::all();
      

      
      // exit();
    return view('Master.edit_corporation',['edit_data'=>$data1,'corporation_all'=>$corporation_all,'state'=>$state,'city'=>$city]);
    }

    
    public function update(Request $request)
    {
      //dd($request->all());
   $store =Corporation::find($request->id);
   $store->name=$request->get('name');
   $store->address=$request->get('address');
   $store->pincode=$request->get('pincode');
   $store->email=$request->get('email');
   $store->mobile=$request->get('mobile');
   $store->state_id=$request->get('state_id');
   $store->city_id=$request->get('city_id');
   if ($request->hasFile('logo')) {
       $file = $request->file('logo');
       $filename = time() . '.' . $file->getClientOriginalExtension();
       $file->move(public_path('images/corporation_logo'), $filename);
       $store->logo = $filename;

   }  

   if ($request->hasFile('header')) {
       $file = $request->file('header');
       $filename = time() . '.' . $file->getClientOriginalExtension();
       $file->move(public_path('images/corporation-header'), $filename);
       $store->header = $filename;

   }  

   $store->save();
   return redirect(route('corporation'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }


}
