<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\City;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $city_all =City::all();
        return view('Master.city',compact('city_all'));
    }


    public function create(Request $request){
        $store=new City;
        $store->city=$request->get('city');
        $store->save();
        return redirect(route('city'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }

    public function delete(Request $request)  
    {  
      $data=City::where('id',$request->id)->delete();   
        return redirect(route('city'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=city::find($request->id);
      $city_all =City::all();

      
      // exit();
    return view('Master.edit_city',['edit_data'=>$data1,'city_all'=>$city_all]);
    }


    public function update(Request $request)
    {
      //dd($request->all());
   $store =city::find($request->id);
   //echo json_encode($data);
       // exit();
   $store->city = $request->city;
   $store->save();
   return redirect(route('city'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
  
  }


