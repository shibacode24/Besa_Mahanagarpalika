<?php

namespace App\Http\Controllers\Serve;
use App\Models\Serve\NewServeForm;
use App\Http\Controllers\Controller;
use App\Models\Master\BussinessReg;
use Illuminate\Http\Request;
use App\Models\Master\BussinessType;
use App\Models\Master\TypeofLicence;
use App\Models\Master\Zone;
use App\Models\Serve\ExistingServe;
use App\Models\Master\Business_Type;
use Illuminate\Support\Str;
use DB,Hash;
use Auth;
use App\Models\Master\Notice2;
use App\Models\Master\Notice3;
use Carbon\Carbon;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
use App\Models\Master\Document;
use App\Models\Serve\AllUplodedDocument;

class NewServecontroller extends Controller
{
   public function index()
   {
//     for($i=1;$i<=9;$i++){
//       User::create([
//         'name'=>'nwsimak00'.$i,
//         'email'=>'',
//         'password'=>Hash::make('nw@simak'),
//       ]);
//     }
//     for($i=10;$i<=20;$i++){
//       User::create([
//         'name'=>'nwsimak0'.$i,
//         'email'=>'',
//         'password'=>Hash::make('nw@simak'),
//       ]);
//     }
  // for($i=21;$i<=30;$i++){
//       User::create([
//     'name'=>'nwsimak0'.$i,
//        'username'=>'nwsimak0'.$i,
//         'password'=>Hash::make('nw@simak'),
//         ]);
//       }
// dd(1);

      // $data=NewServeForm::leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')

      // ->leftjoin('bussiness_registrations','bussiness_registrations.id','=','serves.type_of_licence_id1')
      // ->leftjoin('zone','zone.id','=','serves.zone_no')
      // ->leftjoin('new_business_type','new_business_type.id','=','serves.bussiness_type_id')
   
      //   ->select('serves.*','bussiness_types.bussiness_type','bussiness_registrations.bussiness_reg_type1','zone.zone','new_business_type.business_type')
      //     ->orderby('serves.id','desc')
      //     ->get();

    

          $ty_licence=BussinessReg::
          select('id','bussiness_reg_type','bussiness_reg_type1')
          ->get();
          $ty_bussiness=BussinessType::
          select('id','bussiness_type','bussiness_type1','charges')
          ->get();

          $zone=Zone::
          select('id','zone','zone1','zone_name')
         ->get();

          $business_type = Business_Type ::
          select('id','business_type','business_type1')
          ->get();


      // echo json_encode( $data);
      // exit();

      // echo json_encode(Auth::guard('operator')->user());
      // exit();
    return view('ServeForm.new_serve_form',compact('ty_bussiness','ty_licence','zone','business_type'));
   }


   public function showserve(Request $request)
   {
      
      $zone_id =   Auth::guard('operator')->user()->zone_id;
     
      $serve_all1=NewServeForm::when($zone_id, function ($q) {
        return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
      })
     
      ->paginate(10);
     // echo json_encode($serve_all1);
      //exit();

    $data=ExistingServe::when($zone_id, function ($q) {
      return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
    })

    ->paginate(10);
    // echo json_encode($data);
    // exit();

    $all_survays = DB::table('serves')
        ->select('*')
        ->where('zone_no', Auth::guard('operator')->user()->zone_id)
        ->where(function ($query) use ($request) {
              $query->where('survey_app_no', 'like', '%' . $request->survey_app_no . '%');
              })
        ->unionAll(DB::table('existing_serves')
            ->select('*')
            ->where('zone_no', Auth::guard('operator')->user()->zone_id)
            ->where(function ($query) use ($request) {
                  $query->where('survey_app_no', 'like', '%' . $request->survey_app_no . '%');
                })
        )
        ->orderBy('id', 'desc')
        ->paginate(100);
        
      return view('ServeForm.show',compact('serve_all1','data','all_survays'));
   }

   public function demand_notice()
  {
    $zone_id =   Auth::guard('operator')->user()->zone_id;

    $new_notice=NewServeForm::when($zone_id, function ($q) {
      return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
    })
    ->where('generate_notice','1')
    ->get();
    //echo json_encode($new_notice);
    //exit();

  $exis_notice=ExistingServe::when($zone_id, function ($q) {
    return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
  })
  ->where('generate_notice','1')
  ->get();



  //$zone_id =   Auth::guard('operator')->user()->zone_id;

    $new_notice02=NewServeForm::when($zone_id, function ($q) {
      return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
    })
    ->where('generate_notice02','1')
    ->where('paid_unpaid','unpaid')
    ->get();
    //echo json_encode($new_notice);
    //exit();

  $exis_notice02=ExistingServe::when($zone_id, function ($q) {
    return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
  })
  ->where('generate_notice02','1')
  ->where('paid_unpaid','unpaid')
  ->get();
   

  
  $new_notice03=NewServeForm::when($zone_id, function ($q) {
    return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
  })
  ->where('generate_notice03','1')
  ->where('paid_unpaid02','unpaid')
  ->get();
  //echo json_encode($new_notice);
  //exit();

$exis_notice03=ExistingServe::when($zone_id, function ($q) {
  return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
})
->where('generate_notice03','1')
->where('paid_unpaid02','unpaid')
->get();
      // echo json_encode($exis_notice);
      // exit();
      return view('ServeForm.demand_notice',compact('new_notice','exis_notice','new_notice02','exis_notice02','new_notice03','exis_notice03'));

  }

  public function generate_certificate()
  {
    $zone_id =   Auth::guard('operator')->user()->zone_id;

    $new_generate_certificate=NewServeForm::when($zone_id, function ($q) {
      return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
    })
    ->where('status','1')
    ->get();
    //echo json_encode($new_notice);
    //exit();

  $exis_generate_certificate=ExistingServe::when($zone_id, function ($q) {
    return $q-> where('zone_no',Auth::guard('operator')->user()->zone_id);
  })
  ->where('status','1')
  ->get();
   
      // echo json_encode($exis_notice);
      // exit();
      return view('ServeForm.generate_certificate',compact('new_generate_certificate','exis_generate_certificate'));

  }

  //  public function existingserveform()
  //   {
  //   return view('ServeForm.show',compact('data1'));

  //   }

   public function create(Request $request){

    // dd($request->all()); 
    $request->validate([
      'survey_app_no' => 'required|unique:serves'
 ]);

      $store=new NewServeForm;
      $store->survey_app_no=$request->get('survey_app_no');
      if ($request->hasFile('photo')) {
         $file = $request->file('photo');
         $filename = time() . '.' . $file->getClientOriginalExtension();
         $file->move(public_path('images/'), $filename);
         $store->photo = $filename;

     }  
    //  echo json_encode($store->photo) ;
    //  exit();
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
      $store->zone_no=Auth::guard('operator')->user()->zone_id;
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
      
      $store->save(); 
     $var=$store->id;

    //  echo json_encode($store);
    //  exit();

   //  return redirect()->route('print-serve',$var);
    return back();
  }

  public function print_serve(Request $request){
    $data=NewServeForm::where('serves.id',$request->id)
    ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
    ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
    ->leftjoin('zone','zone.id','=','serves.zone_no')
    ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone')
    ->first();

    // echo json_encode($data);
    // exit();

  return view('print.receipt_new',compact('data'));

  }

  
  public function delete(Request $request)  
  {  
    $data=NewServeForm::where('id',$request->id)->delete();   
    //dd($request->id);
    return back();
  } 

  public function edit(request $request)
    {
  //  echo json_encode($request->all());
      $data1=NewServeForm::find($request->id);
     // $serve_all=NewServeForm::all();

      // $serve_all=NewServeForm::leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')

      // ->leftjoin('bussiness_registrations','bussiness_registrations.id','=','serves.type_of_licence_id1')
      // ->leftjoin('new_business_type','new_business_type.id','=','serves.bussiness_type_id')
      // ->leftjoin('zone','zone.id','=','serves.zone_no')
   
      //   ->select('serves.*','bussiness_types.bussiness_type','bussiness_registrations.bussiness_reg_type1','new_business_type.business_type','zone.zone','new_business_type.business_type1','new_business_type.business_type1')
      //     ->orderby('serves.id','desc')
      //     ->get();

// dd($serve_all);

          $ty_licence=BussinessReg::all();
          $ty_bussiness=BussinessType::all();
          $business_type = Business_Type :: all();
          $zone=Zone::all();
          $document_type = Document :: all();
          $all_document = AllUplodedDocument ::where('survey_no',$data1->survey_app_no)->get();

//dd($serve_all);
// echo json_encode($serve_all);
//       exit();
    return view('ServeForm.edit_new_serve',['edit_data'=>$data1 , 'ty_licence'=>$ty_licence,'ty_bussiness'=>$ty_bussiness,'zone'=>$zone,'business_type'=>$business_type, 'document_type'=>$document_type, 'all_document'=>$all_document]);
    }



    
    public function update(Request $request)
    {
      // dd($request->all());
      
   $store =NewServeForm::find($request->id);
   
       
       $store->survey_app_no=$request->get('survey_app_no');
       if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
     
        $file->move(public_path('images/'), $filename);

        $filePath = public_path('images/') . $filename;
        app('compressImage')($filePath, $file->getClientOriginalExtension());
        $store->photo = $filename;
    }
    
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
      //  $store->nature_of_bussiness=$request->get('nature_of_bussiness');
      //  $store->nature_of_bussiness1=$request->get('nature_of_bussiness1');
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
       $store->save();


    //    foreach ($request->document_id as $index => $doc) {
    //     $upload_document = new AllUplodedDocument();
    //     $upload_document->survey_no = $request->get('survey_app_no');
    //     $upload_document->document_id = $doc;
        
    //     if (isset($request->document[$index]) && !empty($request->document[$index])) {
    //         $document = $request->document[$index];
            
    //         // Check if the document is in base64 format
    //         if (strpos($document, 'data:image/') === 0) {
    //             $extension = explode('/', mime_content_type($document))[1];
    //             $data = base64_decode(substr($document, strpos($document, ',') + 1));
                
    //             // Ensure valid extension and base64 decode success
    //             if ($extension && $data) {
    //                 $imgname = 'd' . rand(000, 999) . time() . '.' . $extension;
                    
    //                 // Ensure directory exists
    //                 $path = public_path('images/document');
    //                 if (!file_exists($path)) {
    //                     mkdir($path, 0777, true);
    //                 }
                    
    //                 // Save the file
    //                 file_put_contents($path . '/' . $imgname, $data);
    //                 $upload_document->document = $imgname;
    //             } else {
    //                 // Handle invalid data
    //                 return back()->with('error', 'Invalid document data.');
    //             }
    //         } else {
    //             // Handle invalid base64 format
    //             return back()->with('error', 'Invalid base64 format.');
    //         }
    //     }
        
    //     $upload_document->save();
    // }
    
    
if($request->document_id)
{
       foreach ($request->document_id as $index => $doc) {
        $upload_document = new AllUplodedDocument();
        $upload_document->survey_no = $request->get('survey_app_no');
        $upload_document->document_id = $doc;
      
        if (isset($request->document[$index]) && !empty($request->document[$index])) 
        {
            $document = $request->document[$index];
            $extension = explode('/', mime_content_type($document))[1];
            $data = base64_decode(substr($document, strpos($document, ',') + 1));
            $imgname = 'd' . rand(000, 999) . time() . '.' . $extension;
  
            // Save the image temporarily before compression
            $filePath = public_path('images/document') . '/' . $imgname;
            file_put_contents($filePath, $data);
        
            // Compress the image using the compressImage function
            app('compressImage')($filePath, $extension); // Single line for compression
            $upload_document->document = $imgname;
        }
       }
        $upload_document->save();
      }
      
       return redirect(route('showserve'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }

  

  public function edit_existing(request $request)
    {
  // echo json_encode($request->all());
      $data1=ExistingServe::where('id',$request->id)->first();
      //find($request->id);
     // $serve_all=NewServeForm::all();

      // $serve_all=ExistingServe::leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')

      // ->leftjoin('bussiness_registrations','bussiness_registrations.id','=','existing_serves.type_of_licence_id1')
      // ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      // ->leftjoin('new_business_type','new_business_type.id','=','existing_serves.bussiness_type_id')
   
      //   ->select('existing_serves.*','bussiness_types.bussiness_type','bussiness_registrations.bussiness_reg_type1')
      //     ->orderby('existing_serves.id','desc')
      //     ->get();

// echo json_encode($serve_all);
// exit();

          $ty_licence=BussinessReg::all();
          $ty_bussiness=BussinessType::all();
          $zone=Zone::all();
          $business_type = Business_Type :: all();
          $document_type = Document :: all();
          $all_document = AllUplodedDocument ::where('survey_no',$data1->survey_app_no)->get();
//dd($serve_all);use App\Models\Master\Document;
// dd($data1);
      // exit();
    return view('ServeForm.edit_existing_form',['edit_data'=>$data1, 'ty_licence'=>$ty_licence,'ty_bussiness'=>$ty_bussiness,'zone'=>$zone,'business_type'=>$business_type, 'document_type'=>$document_type, 'all_document'=>$all_document]);
    }



    
    public function update_existing(Request $request)
    {
      // dd($request->id);
  // $store =ExistingServe::where('id',$request->id)->first();

 

   $store =ExistingServe::find($request->id);
   
       $store->survey_app_no=$request->get('survey_app_no');
       
       if ($request->hasFile('photo')) {
          $file = $request->file('photo');
         // Compress the image
         $filename = time() . '.' . $file->getClientOriginalExtension();
     
         $file->move(public_path('images/'), $filename);
 
         $filePath = public_path('images/') . $filename;
         app('compressImage')($filePath, $file->getClientOriginalExtension());
          $file->move(public_path('images/serve_photo'), $filename);
          $store->photo = $filename;
 
      }   
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
       
       $store->save();

       if($request->document_id)
{
       foreach ($request->document_id as $index => $doc) {
        $upload_document = new AllUplodedDocument();
        $upload_document->survey_no = $request->get('survey_app_no');
        $upload_document->document_id = $doc;
      
        if (isset($request->document[$index]) && !empty($request->document[$index])) 
        {
            $document = $request->document[$index];
            $extension = explode('/', mime_content_type($document))[1];
            $data = base64_decode(substr($document, strpos($document, ',') + 1));
            $imgname = 'd' . rand(000, 999) . time() . '.' . $extension;
  
            // Save the image temporarily before compression
            $filePath = public_path('images/document') . '/' . $imgname;
            file_put_contents($filePath, $data);
        
            // Compress the image using the compressImage function
            app('compressImage')($filePath, $extension); // Single line for compression
            $upload_document->document = $imgname;
        }
       }
        $upload_document->save();
      }

       return redirect(route('showserve'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }


  public function delete_existing(Request $request)  
  {  
    $data=ExistingServe::where('id',$request->id)->delete();   
    //dd($request->id);
    return back();
  } 

  public function get_busnes(Request $request)
  {
    // dd($request->all());
    $data=DB::table('bussiness_types')
    //->join('add_medicines','add_medicines.data_id','=','data.id')
  //   ->join('primary__sales','primary__sales.id','=','data.batch_no_id')
    ->where([
      'bussiness_types.id' =>$request->serve,
      //   medicine_id=>$request->medicine,
    ])
    ->select('bussiness_types.bussiness_type1')->first();
   //  dd($request->all);
    return response()->json($data);
  }
  
  public function get_licence(Request $request)
  {
    // dd($request->all());
    $data=DB::table('bussiness_registrations')
    //->join('add_medicines','add_medicines.data_id','=','data.id')
  //   ->join('primary__sales','primary__sales.id','=','data.batch_no_id')
    ->where([
      'bussiness_registrations.id' =>$request->serve,
      //   medicine_id=>$request->medicine,
    ])
    ->select('bussiness_registrations.bussiness_reg_type1')->first();
   //   dd($request->all);
    return response()->json($data);
  }

  public function get_zone(Request $request)
  {
    // dd($request->all());
    $data=DB::table('zone')
    ->where([
      'zone.id' =>$request->serve,
    ])
    ->select('zone.zone1')->first();
   //   dd($request->all);
    return response()->json($data);
  }

  public function get_business_type(Request $request)
  {
    // dd($request->all());
    $data=DB::table('new_business_type')
    ->where([
      'new_business_type.id' =>$request->serve,
    ])
    ->select('new_business_type.business_type1')->first();
   //   dd($request->all);
    return response()->json($data);
  }


  public function edit_payment_mode1(request $request)
    {
    
      $edit_data=NewServeForm::where('serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
      ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('print.new_payment',compact('edit_data'));
    }

    public function update_payment_mode1(Request $request)
    {
      // dd($request->all());
      $store =NewServeForm::find($request->id);
      $store->payment_mode=$request->get('payment_mode');
      $store->date=$request->get('date');
      $store->receipt_no=$request->get('receipt_no');
      $store->book_no=$request->get('book_no');
      $store->paid_unpaid= 'paid' ;
      $store->past_year = $request->past_year;
      $store->certificate_year= $request->get('year');
      $store->pay_amount= $request->get('new_amount') + $request->get('new_amount1');

      //  echo json_encode($store);
      //  exit();

      $store->save();
      

      $var=$store->id;
      
      return redirect()->route('print-serve',$var);

      //return redirect(route('print-serve1'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);

    }

    public function edit_payment_mode02(request $request)
    {
    
      $edit_data=NewServeForm::where('serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
      ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.late_fee')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('print.new_payment02',compact('edit_data'));
    }

    public function update_payment_mode02(Request $request)
    {
      // dd($request->all());
      $store =NewServeForm::find($request->id);
      $store->payment_mode=$request->get('payment_mode');
      $store->date=$request->get('date');
      $store->receipt_no=$request->get('receipt_no');
      $store->book_no=$request->get('book_no');
      $store->paid_unpaid02= 'paid' ;
      $store->past_year02 = $request->past_year;
      $store->certificate_year02 = $request->get('year');
      $store->pay_amount= $request->get('new_amount') + $request->get('new_amount1');

      //  echo json_encode($store);
      //  exit();

      $store->save();
      

      $var=$store->id;
      
      return redirect()->route('print-serve',$var);

      //return redirect(route('print-serve1'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);

    }

    public function edit_payment_mode03(request $request)
    {
    
      $edit_data=NewServeForm::where('serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
      ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('print.new_payment03',compact('edit_data'));
    }

    public function update_payment_mode03(Request $request)
    {
      // dd($request->all());
      $store =NewServeForm::find($request->id);
      $store->payment_mode=$request->get('payment_mode');
      $store->date=$request->get('date');
      $store->receipt_no=$request->get('receipt_no');
      $store->book_no=$request->get('book_no');
      $store->paid_unpaid03= 'paid' ;
      $store->past_year03 = $request->past_year;
      $store->certificate_year03 = $request->get('year');
      $store->pay_amount= $request->get('new_amount') + $request->get('new_amount1');

      //  echo json_encode($store);
      //  exit();

      $store->save();
      $var=$store->id;
      return redirect()->route('print-serve',$var);

    }

public function new_certificate(Request $request)
{

  $data=NewServeForm::where('serves.id',$request->id)
  ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
  ->leftjoin('zone','zone.id','=','serves.zone_no')
  ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      //->orderby('serves.id','desc')
      ->first();


      $zone = Str::substr($data->zone, 5, 8); //server side
      //$zone = Str::substr($data->zone, 7, 10); //local side

      $license_no = 'BESA'.$data->survey_app_no.date('mY').$zone;
      
      $qrData = "Establishment: {$data->establishment}\nOwner: {$data->bussiness_owner}\nLicense No: {$license_no}\nBusiness: {$data->bussiness_name}\nZone: {$data->zone}";

      // Generate the QR code
      // $result = Builder::create()
      //     ->writer(new PngWriter())
      //     ->writerOptions([])
      //     ->data($qrData)
      //     ->encoding(new Encoding('UTF-8'))
      //     // ->errorCorrectionLevel(ErrorCorrectionLevel::LOW())
      //     ->size(300)
      //     ->margin(10)
      //     ->build();
  
      // // Save the QR code image
      // $fileName = 'qrcode_' . $data->id . '.png';
      // $result->saveToFile(public_path('qrcodes/' . $fileName));
  
      // // Generate the URL for the QR code image
      // $qrCodeUrl = asset('qrcodes/' . $fileName);
  
      // Pass data and QR code URL to the view
      return view('print.new_certificate', compact('data', 'zone'));
      // return view('print.new_certificate', compact('data', 'zone', 'qrCodeUrl'));
  }

public function new_notice(Request $request)
{

  $data=NewServeForm::where('serves.id',$request->id)
  ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
  ->leftjoin('zone','zone.id','=','serves.zone_no')
  ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      //->orderby('serves.id','desc')
      ->first();
       $zone = Str::substr($data->zone, 5, 8); //server side
      //$zone = Str::substr($data->zone, 7, 10);

  return view('print.new_notice',compact('data','zone'));
}

public function send_notice(Request $request)
{

  $data=NewServeForm::where('serves.id',$request->id)
  ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
  ->leftjoin('zone','zone.id','=','serves.zone_no')
  ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      //->orderby('serves.id','desc')
      ->first();
       $zone = Str::substr($data->zone, 5, 8); //server side
      //$zone = Str::substr($data->zone, 7, 10);

  return view('print.send_notice',compact('data','zone'));
}

public function new_notice02(Request $request)
{

  $data=NewServeForm::where('serves.id',$request->id)
  ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
  ->leftjoin('zone','zone.id','=','serves.zone_no')
  ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','bussiness_types.late_fee','zone.zone','zone.zone_name')
      //->orderby('serves.id','desc')
      ->first();
       $zone = Str::substr($data->zone, 5, 8); //server side
      //$zone = Str::substr($data->zone, 7, 10);

  return view('print.new_notice02',compact('data','zone'));
}
public function new_notice03(Request $request)
{

  $data=NewServeForm::where('serves.id',$request->id)
  ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
  ->leftjoin('zone','zone.id','=','serves.zone_no')
  ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      //->orderby('serves.id','desc')
      ->first();
       $zone = Str::substr($data->zone, 5, 8); //server side
      //$zone = Str::substr($data->zone, 7, 10);

  return view('print.new_notice03',compact('data','zone'));
}

public function generate_notice(Request $request){
   //dd($request->id);
  // $notice2 = Notice2::all();
  //  echo json_encode($notice2);
  //  exit();

  $generate_notice=NewServeForm::find($request->id);

  $generate_notice->generate_notice = '1';
  $generate_notice->generate_notice_date = $request->generate_notice_date;
  $generate_notice->past_year = $request->past_year;
  $generate_notice->certificate_year = $request->year;
  // $generate_notice->pay_amount = $generate_notice->past_year + $generate_notice->certificate_year;
  //$generate_notice ->notice2_date =  Carbon::parse($request->generate_notice_date)->addDays($notice2[0]->notice2)->format('Y-m-d');
  // echo json_encode($generate_notice);
  // exit();
  $generate_notice->save();
 
  return redirect()->back();
}

public function generate_notice02(Request $request){
  //dd($request->id);
 // $notice2 = Notice2::all();
 //  echo json_encode($notice2);
 //  exit();

 $generate_notice=NewServeForm::find($request->id);

 $generate_notice->generate_notice02 = '1';
 $generate_notice->notice2_date = $request->generate_notice_date;
 $generate_notice->past_year02 = $request->past_year;
 $generate_notice->certificate_year02 = $request->year;
 
//  echo json_encode($generate_notice);
//  exit();
 $generate_notice->save();

 return redirect()->back();
}


public function generate_notice03(Request $request){

 $generate_notice=NewServeForm::find($request->id);

 $generate_notice->generate_notice03 = '1';
 $generate_notice->notice3_date = $request->generate_notice_date;
 $generate_notice->past_year03 = $request->past_year;
 $generate_notice->certificate_year03 = $request->year;
 
//  echo json_encode($generate_notice);
//  exit();
 $generate_notice->save();

 return redirect()->back();
}

}
