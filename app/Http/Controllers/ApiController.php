<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cmakeit;
use Hash;
use App\Models\Serve\ExistingServe;
use App\Models\Master\Zone;
use App\Models\Serve\Grid;
use App\Models\Serve\NewServeForm;
use App\Models\Serve\AllUplodedDocument;
use App\Models\Master\BussinessReg;
use App\Models\Master\BussinessType;
use App\Models\Master\Business_Type;
use App\Models\Master\Document;

class ApiController extends Controller
{
    public function login(Request $request)
    {
		  //User::find(1)->update(['password'=>Hash::make(1111)]);
        $checkuser = User::where('username', $request->username)->first();
        if ($checkuser && Hash::check($request->password, $checkuser->password)) {
            return response()->json(['status' => true, 'data' => $checkuser]); //array
        } else {
            return response()->json(['status' => false, 'message' => 'User Not Found']); //array
        }
    }
	
	
	
	 public function get_user(Request $request)
    {
        //  dd($request->all());
          $get_user = User::where('id', $request->user_id)
            ->first();


        if ($get_user) {
            return response()->json(['status' => true, 'data' => $get_user]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

	 public function survey(Request $request)
    { 
		 
		 $new_name = "";
         if ($request->image != 'null') {
            $extension = explode('/', mime_content_type($request->image))[1]; // Get the file extension
            $data = base64_decode(substr($request->image, strpos($request->image, ',') + 1)); // Decode base64 data
        
            // Generate a unique image name
            $new_name = 'survey' . rand(000, 999) . time() . '.' . $extension;
        
            // Save the image temporarily before compression
            $filePath = public_path('images/') . $new_name;
            file_put_contents($filePath, $data);
        
            // Compress the image using the compressImage function
            app('compressImage')($filePath, $extension); // Compress the image
        
            // Now the image is saved and compressed at the same file path
        }
		 
          $insert = ExistingServe::create([
          'user_id' => $request->user_id,
                'survey_app_no' => $request->survey_number,
                'photo' => $new_name,
                'establishment' => $request->establishment_name, 
                'zone_no' => $request->zone, 
                'longitude' => $request->longitude, 
                'latitude' => $request->latitude, 
        ]);
        if($insert) {
            return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
        } else {
            return response()->json(['status' => false, 'message' => 'Data not found']);
        
        }
	 }
	
	public function get_survey(Request $request)
    {
        
        $get_survey = ExistingServe :: where('existing_serves.user_id',$request->user_id)
       ->whereDate('existing_serves.created_at',$request->date)
       ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
       ->select('existing_serves.*','zone.zone','zone.zone1')
       ->skip($request->skip)
       ->take(20)
       ->get();

      if ($get_survey ->isEmpty() )

         {
           
            return response()->json(['status' => false, 'message' => 'data not found']);

        } else {
       
 
            return response()->json(['status' => true, 'data' => $get_survey]);

        }
    }
  
  
  public function get_count(Request $request)
    {
        
        $get_count = ExistingServe ::where('user_id',$request->user_id)
        ->count();

        if ($get_count) {
            return response()->json(['status' => true, 'data' => $get_count]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


    public function get_zone(Request $request)
    {
        
        $get_zone = Zone ::all();

        if ($get_zone) {
            return response()->json(['status' => true, 'data' => $get_zone]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


    public function grid(Request $request)
    { 
		
		 $new_name = "";
         if ($request->image != 'null') {
            $extension = explode('/', mime_content_type($request->image))[1]; // Get the file extension
            $data = base64_decode(substr($request->image, strpos($request->image, ',') + 1)); // Decode base64 data
        
            // Generate a unique image name
            $new_name = 'survey' . rand(000, 999) . time() . '.' . $extension;
        
            // Save the image temporarily before compression
            $filePath = public_path('upload_photo/grid') . $new_name;
            file_put_contents($filePath, $data);
        
            // Compress the image using the compressImage function
            app('compressImage')($filePath, $extension); // Compress the image
        
            // Now the image is saved and compressed at the same file path
        }
		 
          $insert = Grid::create([
                'user_id' => $request->user_id,
                'grid_no' => $request->grid_no,
                'photo' => $new_name,
                'establishment_name' => $request->establishment_name, 
                'zone_id' => $request->zone, 
                'longitude' => $request->longitude, 
                'latitude' => $request->latitude, 
        ]);
        if($insert) {
            return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
        } else {
            return response()->json(['status' => false, 'message' => 'Data not found']);
        
        }
	 }

     public function get_grid(Request $request)
    {
        
        $get_grid = Grid ::all();

        if ($get_grid) {
            return response()->json(['status' => true, 'data' => $get_grid]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

    public function get_grid_count(Request $request)
    {
        
        $get_grid_count = Grid ::
        where('user_id',$request->user_id)
        ->count();

        if ($get_grid_count) {
            return response()->json(['status' => true, 'data' => $get_grid_count]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

    public function create(Request $request){

        // dd($request->all()); 
        $request->validate([
          'survey_app_no' => 'required|unique:serves'
     ]);
    
     $new_name = "";

          $store=new NewServeForm;

          $store->survey_app_no=$request->get('survey_app_no');
		//  if ($request->image != 'null') {
        //     $extension= explode('/', mime_content_type($request->image))[1];
        //     $data = base64_decode(substr($request->image, strpos($request->image, ',') + 1));
        //     $new_name='survey'.rand(000,999). time() . '.' .$extension;
        //     file_put_contents(public_path('images/') . '/' . $new_name, $data);
        //     }

        if ($request->image != 'null') {
            $extension = explode('/', mime_content_type($request->image))[1]; // Get the file extension
            $data = base64_decode(substr($request->image, strpos($request->image, ',') + 1)); // Decode base64 data
        
            // Generate a unique image name
            $new_name = 'survey' . rand(000, 999) . time() . '.' . $extension;
        
            // Save the image temporarily before compression
            $filePath = public_path('images/') . $new_name;
            file_put_contents($filePath, $data);
        
            // Compress the image using the compressImage function
            app('compressImage')($filePath, $extension); // Compress the image
        
            // Now the image is saved and compressed at the same file path
        }
        //  echo json_encode($store->photo) ;
        //  exit();
          $store->photo=$new_name;
          $store->establishment=$request->get('establishment');
          $store->establishment1=$request->get('establishment1');
          $store->bussiness_owner=$request->get('bussiness_owner');
          $store->bussiness_owner1=$request->get('bussiness_owner1');
          $store->contact_person=$request->get('contact_person');
          $store->contact_person1=$request->get('contact_person1');
          $store->shop_house_no=$request->get('shop_house_no');
          $store->shop_house_no1=$request->get('shop_house_no1');
          $store->bulding=$request->get('bulding');
          $store->bulding1=$request->get('bulding1');
          $store->street_name=$request->get('street_name');
          $store->street_name1=$request->get('street_name1');
          $store->locality=$request->get('locality');
          $store->locality1=$request->get('locality1');
          $store->prabhag_name=$request->get('prabhag_name');
          $store->prabhag_name1=$request->get('prabhag_name1');
          $store->zone_no=$request->get('zone_no');
          $store->zone_no1=$request->get('zone_no1');
          $store->pincode=$request->get('pincode');
          $store->pincode1=$request->get('pincode1');
          $store->email=$request->get('email');
          $store->email1=$request->get('email1');
          $store->wht_app_no=$request->get('wht_app_no');
          $store->wht_app_no1=$request->get('wht_app_no1');
          $store->gst_no=$request->get('gst_no');
          $store->gst_no1=$request->get('gst_no1');
          $store->year=$request->get('year');
        
          $store->type_of_bussiness_id=$request->get('type_of_bussiness_id');
          $store->type_of_bussiness_id1=$request->get('type_of_bussiness_id1');
          $store->type_of_licence_id=$request->get('type_of_licence_id');
          $store->type_of_licence_id1=$request->get('type_of_licence_id1');
          $store->no_of_employee_working=$request->get('no_of_employee_working');
          $store->no_of_employee_working1=$request->get('no_of_employee_working1');
          $store->area_of_bussiness=$request->get('area_of_bussiness');
          $store->area_of_bussiness1=$request->get('area_of_bussiness1');
          $store->licence_name=$request->get('licence_name');
          $store->licence_no=$request->get('licence_no');
          $store->licence_name1=$request->get('licence_name1');
          $store->licence_no1=$request->get('licence_no1');
    
          $store->ac_room=$request->get('ac_room');
          $store->non_ac_room=$request->get('non_ac_room');
          $store->ac_room1=$request->get('ac_room1');
          $store->non_ac_room1=$request->get('non_ac_room1');
    
          $store->bussiness_name=$request->get('bussiness_name');
          $store->bussiness_name1=$request->get('bussiness_name1');
    
          $store->bussiness_type_id=$request->get('bussiness_type');
          $store->bussiness_type_id1=$request->get('bussiness_type1');

          $store->longitude=$request->get('lng');
          $store->latitude=$request->get('lat');
         
          $store->save(); 

          foreach ($request->document_id as $index => $doc) {
            $upload_document = new AllUplodedDocument();
            $upload_document->survey_no = $request->get('survey_app_no');
            $upload_document->document_id = $doc;
          
            if (isset($request->document[$index]) && !empty($request->document[$index])) 
            {
                $document = $request->document[$index];
                $extension = explode('/', mime_content_type($document))[1];
                $data = base64_decode(substr($document, strpos($document, ',') + 1));
                $imgname = 'd'.rand(000,999) . time() . '.' . $extension;
                file_put_contents(public_path('images/document') . '/' . $imgname, $data);
                $upload_document->document = $imgname;
            }
          
            $upload_document->save();
          }
          
    
         if($store) {
            return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
        } else {
            return response()->json(['status' => false, 'message' => 'Data not found']);
        
        }
      }

      public function get_nature_of_busi(Request $request)
      {
          
        $get_nature_of_busi=BussinessType::all();
  
          if ($get_nature_of_busi) {
              return response()->json(['status' => true, 'data' => $get_nature_of_busi]);
          } else {
              return response()->json(['status' => false, 'message' => 'data not found']);
          }
      }

      public function get_license(Request $request)
      {
          
        $get_license=BussinessReg::all();
  
          if ($get_license) {
              return response()->json(['status' => true, 'data' => $get_license]);
          } else {
              return response()->json(['status' => false, 'message' => 'data not found']);
          }
      }

      public function get_business_type(Request $request)
      {
          
        $get_business_type = Business_Type :: all();
  
          if ($get_business_type) {
              return response()->json(['status' => true, 'data' => $get_business_type]);
          } else {
              return response()->json(['status' => false, 'message' => 'data not found']);
          }
      }
     
      public function document_type(Request $request)
      {
          
        $document_type = Document :: all();
  
          if ($document_type) {
              return response()->json(['status' => true, 'data' => $document_type]);
          } else {
              return response()->json(['status' => false, 'message' => 'data not found']);
          }
      }
    
     
 
}

//simakeit
