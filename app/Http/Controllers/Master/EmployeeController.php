<?php

namespace App\Http\Controllers\Master;
use App\Models\Master\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\State;
use App\Models\Master\City;
use App\Models\User;
use Hash;


class EmployeeController extends Controller
{
    public function index()
    {
       $employee_all=User::where('role','2')
        ->leftjoin('states','states.id','=','users.state_id')
        ->leftjoin('citys','citys.id','=','users.city_id')
        ->select('users.*','states.state','citys.city')
          ->orderby('users.id','desc')
          ->get();
  
        $state=State::all();
        $city=city::all();
        return view('Master.employee',compact('employee_all','state','city'));
    }

    public function create(Request $request)
    {

        // $request->validate([
            
        //     'mobile' => 'required|min:10|max:10|unique',
        //     'email'=>'required',
        //     'password'=>'required',
        // ]); 
           
        $store=new User;
        $store->name=$request->get('name');
        $store->address=$request->get('address');
        $store->pincode=$request->get('pincode');
        $store->email=$request->get('email');
        $store->mobile=$request->get('mobile');
        $store->state_id=$request->get('state_id');
        $store->city_id=$request->get('city_id');

        if ($request->hasFile('adhar')) {
            $file = $request->file('adhar');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/employee_adhar'), $filename);
            $store->adhar = $filename;

        }   



        if ($request->hasFile('pan')) {
            $file = $request->file('pan');
            $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
            $file->move(public_path('images/employee_pan'), $filename);
            $store->pan = $filename;

        } 
       
        $store->username=$request->get('username');
        $store->password=  Hash::make($request->password);
  
        $store->save();
        return redirect(route('employee'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }


    public function delete(Request $request)  
    {  
      $data=User::where('id',$request->id)->delete();   
        return redirect(route('employee'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=User::find($request->id);
      $employee_all=User::where('role','2')
      ->leftjoin('states','states.id','=','users.state_id')
      ->leftjoin('citys','citys.id','=','users.city_id')
      ->select('users.*','states.state','citys.city')
        ->orderby('users.id','desc')
        ->get();
      $state=State::all();
      $city=city::all();
      
      // exit();
    return view('Master.edit_employee',['edit_data'=>$data1,'employee_all'=>$employee_all,'state'=>$state,'city'=>$city]);
    }

    public function update(Request $request)
    {


      //dd($request->all());
   $store =User::find($request->id);
   $store->name=$request->get('name');
   $store->address=$request->get('address');
   $store->pincode=$request->get('pincode');
   $store->email=$request->get('email');
   $store->mobile=$request->get('mobile');
   $store->state_id=$request->get('state_id');
   $store->city_id=$request->get('city_id');

   if ($request->hasFile('adhar')) {
       $file = $request->file('adhar');
       $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
       $file->move(public_path('images/employee_adhar'), $filename);
       $store->adhar = $filename;

   }   

   if ($request->hasFile('pan')) {
       $file = $request->file('pan');
       $extension = $file->getClientOriginalExtension();
    
            // Compress the image
            $filePath = $file->getPathname();
            app('compressImage')($filePath, $extension); // Single line for compression
    
            // Generate a new filename and move the compressed image
            $filename = time() . '.' . $extension;
       $file->move(public_path('images/employee_pan'), $filename);
       $store->pan = $filename;

   } 
  
   $store->username=$request->get('username');
   if($request->password){
       $store->password=  Hash::make($request->password);
    }

   $store->save();
   return redirect(route('employee'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
