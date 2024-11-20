<?php

namespace App\Http\Controllers\Serve;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\BussinessReg;
use App\Models\Master\Zone;
use App\Models\Master\Document;
use App\Models\Master\Business_Type;

use App\Models\Master\BussinessType;
use App\Models\Serve\ExistingServe; 
use App\Models\Serve\NewServeForm;
use PHPUnit\Util\Json;
use DB;
use Illuminate\Support\Str;
use Auth;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;
use Carbon\Carbon;
use App\Models\Serve\AllUplodedDocument;

class ExistingServeController extends Controller
{


    public function existingserveform(Request $request)
    {


      // $data = DB::table('serves')
      // ->where('zone_no',4)
      // ->where('paid_unpaid','unpaid')
      // ->select('wht_app_no')
      // ->get();
    
      // echo json_encode($data);
      // exit();


    //$data1=ExistingServe::leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')

    // where('survey_app_no',$request->survey_app_no)
    //  ->pluck('photo')
    // ->first();leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')

      // ->leftjoin('bussiness_registrations','bussiness_registrations.id','=','existing_serves.type_of_licence_id1')
      // ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      // ->leftjoin('new_business_type','new_business_type.id','=','existing_serves.bussiness_type_id')
   
      // ->select('existing_serves.*','bussiness_types.bussiness_type','bussiness_registrations.bussiness_reg_type1','zone.zone','new_business_type.business_type')
      //   ->orderby('existing_serves.id','desc')
      //   ->get();

        // echo json_encode(Auth::guard('operator')->user()->zone_id);
        // exit();

        $ty_licence=BussinessReg::all();
        $ty_bussiness=BussinessType::all();
        if (is_array(Auth::guard('operator')->user()->zone_id) && in_array("All", Auth::guard('operator')->user()->zone_id)) 
        {
          $zone=Zone::get();
        
        }
        else{
          $zone=Zone::whereIn('id',Auth::guard('operator')->user()->zone_id)->get();

        }

        $business_type = Business_Type :: all();
        $document_type = Document :: all();
// dd($document_type);
    $serve_all=ExistingServe::all();

  // return view('ServeForm.new_serve_form',compact('serve_all','ty_bussiness','ty_licence'));
    // $data = NewServeForm ::all();
    //  dd($data1);
    //  exit();
       return view('ServeForm.existing_serve_form',compact('ty_bussiness','ty_licence','zone','business_type','document_type'));
    }


    public function create(Request $request){

    //  dd($request->all());

  //     $request->validate([
  //       'survey_app_no' => 'required|unique:existing_serves'
  //  ]);

       // $store=new ExistingServe;

      //   if ($request->hasFile('photo')) {
      //      $file = $request->file('photo');
      //      $filename = time() . '.' . $file->getClientOriginalExtension();
      //      $file->move(public_path('images/serve_photo'), $filename);
      //      $store->photo = $filename;
  
      //  }   

      if(ExistingServe :: where('survey_app_no',$request->survey_app_no)->exists())
      {
      //dd(1);
      $store= ExistingServe :: where('survey_app_no',$request->survey_app_no)->update([
     
      'survey_app_no'=>$request->get('survey_app_no'),
        'establishment'=>$request->get('establishment'),
        'establishment1'=>$request->get('establishment1'),
        'bussiness_owner'=>$request->get('bussiness_owner'),
        'bussiness_owner1'=>$request->get('bussiness_owner1'),
        'contact_person'=>$request->get('contact_person'),
        'contact_person1'=>$request->get('contact_person1'),
        'shop_house_no'=>$request->get('shop_house_no'),
        'shop_house_no1'=>$request->get('shop_house_no1'),
        'bulding'=>$request->get('bulding'),
        'bulding1'=>$request->get('bulding1'),
        'street_name'=>$request->get('street_name'),
        'street_name1'=>$request->get('street_name1'),
        'locality'=>$request->get('locality'),
        'locality1'=>$request->get('locality1'),
        'prabhag_name'=>$request->get('prabhag_name'),
        'prabhag_name1'=>$request->get('prabhag_name1'),
        'zone_no'=>$request->get('zone_no'),
        'zone_no1'=>$request->get('zone_no1'),
        'pincode'=>$request->get('pincode'),
        'pincode1'=>$request->get('pincode1'),
        'email'=>$request->get('email'),
        'email1'=>$request->get('email1'),
        'wht_app_no'=>$request->get('wht_app_no'),
        'wht_app_no1'=>$request->get('wht_app_no1'),
        'gst_no'=>$request->get('gst_no'),
        'gst_no1'=>$request->get('gst_no1'),
        'year'=>$request->get('year'),
        'type_of_bussiness_id'=>$request->get('type_of_bussiness_id'),
        'type_of_bussiness_id1'=>$request->get('type_of_bussiness_id1'),
        'type_of_licence_id'=>$request->get('type_of_licence_id'),
        'type_of_licence_id1'=>$request->get('type_of_licence_id1'),
        'no_of_employee_working'=>$request->get('no_of_employee_working'),
        'no_of_employee_working1'=>$request->get('no_of_employee_working1'),
        'area_of_bussiness'=>$request->get('area_of_bussiness'),
        'area_of_bussiness1'=>$request->get('area_of_bussiness1'),
        'photo'=>$request->get('photo'),
        
        'licence_name'=>$request->get('licence_name'),
        'licence_no'=>$request->get('licence_no'),
        'licence_name1'=>$request->get('licence_name1'),
        'licence_no1'=>$request->get('licence_no1'),
  
        'ac_room'=>$request->get('ac_room'),
        'non_ac_room'=>$request->get('non_ac_room'),
        'ac_room1'=>$request->get('ac_room1'),
        'non_ac_room1'=>$request->get('non_ac_room1'),


        'bussiness_name'=>$request->get('bussiness_name'),
       'bussiness_name1'=>$request->get('bussiness_name1'),

       'bussiness_type_id'=>$request->get('bussiness_type'),
       'bussiness_type_id1'=>$request->get('bussiness_type1'),

        //$store->save();
        //$var1=  $store->id;
    
      ]);
      // echo json_encode($store);
      // exit();
    }
    else{
      //dd(2);
      
      $store=new NewServeForm;
      $store->survey_app_no=$request->get('survey_app_no');
      //$filename = "";
      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $extension = $file->getClientOriginalExtension();
         // Compress the image
         $filePath = $file->getPathname();
         app('compressImage')($filePath, $extension); // Single line for compression
         // Generate a new filename and move the compressed image
         $filename = time() . '.' . $extension;
         $file->move(public_path('images/'), $filename);
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

      //  echo json_encode($store);
      //  exit();
      
      $store->save(); 
    }
// dd($request->all());
if($request->document_id)
{
foreach ($request->document_id as $index => $doc) {
  $upload_document = new AllUplodedDocument();
  $upload_document->survey_no = $request->get('survey_app_no');
  $upload_document->document_id = $doc;

  if (isset($request->document[$index]) && !empty($request->document[$index])) 
  {
      $document = $request->document[$index];
      $extension = explode('/', mime_content_type($document))[1]; // Get the file extension from mime type
      $data = base64_decode(substr($document, strpos($document, ',') + 1)); // Decode the base64 data
  
      // Generate a random image name
      $imgname = 'd' . rand(000, 999) . time() . '.' . $extension;
  
      // Save the image temporarily before compression
      $filePath = public_path('images/document') . '/' . $imgname;
      file_put_contents($filePath, $data);
  
      // Compress the image using the compressImage function
      app('compressImage')($filePath, $extension); // Single line for compression
  
      // Save the image name in the database
      $upload_document->document = $imgname;
  }
}
  
  $upload_document->save();
}


        return redirect()->route('existingserve')->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }

    public function print_serve1(Request $request){
      $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone')
      ->first();
      //return redirect()->route('existingserve');
  
      // echo json_encode($data);
      // exit();
     return view('print.receipt_existing',compact('data'));


    }

    public function amount(Request $request){
      $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone')
      ->first();
      //return redirect()->route('existingserve');
  
      // echo json_encode($data);
      // exit();
     return view('print.amount',compact('data'));


    }

    public function get_form_data(Request $request)
            {
              // dd($request->all());
              $data=DB::table('serves')
            //   ->join('add_medicines','add_medicines.data_id','=','data.id')
            //   ->join('primary__sales','primary__sales.id','=','data.batch_no_id')
              ->where([
                'survey_app_no' =>$request->serve,
                //   medicine_id=>$request->medicine,
              ])
              ->select('serves.*')->first();
              return response()->json($data);
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

            
 public function get_estab(Request $request)
    {
      // dd($request->all());
      $data = DB::table('existing_serves')
    ->whereIn('existing_serves.zone_no', Auth::guard('operator')->user()->zone_id)
    ->where('existing_serves.survey_app_no', $request->serve)
    ->join('zone', 'zone.id', '=', 'existing_serves.zone_no')
    ->select('existing_serves.establishment', 'existing_serves.photo', 'existing_serves.zone_no', 'zone.zone1')
    ->first();


      return response()->json($data);
    }




    public function edit_payment_mode(request $request)
    {
    
      $edit_data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('print.existing_payment',compact('edit_data'));
    }



public function update_payment_mode(Request $request)
{

  $current_year = Carbon::now()->year;

  // Get the number of years to add from the request
  $years_to_add = $request->get('year', 1); // Default to 1 if not provided

  // Create a Carbon instance for the 1st of March of the current year
  $start_date = Carbon::create($current_year, 3, 1);

  // Add the requested number of years to the start date
  $expiry_date = $start_date->addYears($years_to_add)->format('Y-m-d');

  // Output the calculated expiry date (for debugging purposes)
  // echo "Expiry Date: " . $expiry_date;
  // dd($request->all());
  $store =ExistingServe::find($request->id);
  $store->payment_mode=$request->get('payment_mode');
  $store->date=$request->get('date');
  $store->paid_unpaid = 'paid';
  $store->certificate_year= $request->get('year');
  $store->expiry_date= $expiry_date;
  $store->past_year = $request->past_year;
  $store->pay_amount= $request->get('new_amount') + $request->get('new_amount1');
  $store->receipt_no=$request->get('receipt_no');
  $store->book_no=$request->get('book_no');

  // echo json_encode($store);
  // exit();


  $store->save();

  $var=$store->id;

 
  //return redirect()->route('print-serve',$var);

//   $update = ExistingServe::where('id', $request->id)->update(
//     [
        
//         'payment_mode' => $request->payment_mode,
//         'date' => $request->date,
//     ]
// );

// $var=$update->id;

  //  echo json_encode($update);
  //  exit();

  return redirect()->route('print-serve1',$var);

  //return redirect(route('print-serve1'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);

}

public function edit_payment_mode02(request $request)
    {
    
      $edit_data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','bussiness_types.late_fee','zone.zone')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('print.existing_payment02',compact('edit_data'));
    }



public function update_payment_mode02(Request $request)
{
  // dd($request->all());
 $current_year = Carbon::now()->year;

  // Get the number of years to add from the request
  $years_to_add = $request->get('year', 1); // Default to 1 if not provided

  // Create a Carbon instance for the 1st of March of the current year
  $start_date = Carbon::create($current_year, 3, 1);

  // Add the requested number of years to the start date
  $expiry_date = $start_date->addYears($years_to_add)->format('Y-m-d');

  $store =ExistingServe::find($request->id);
  $store->payment_mode=$request->get('payment_mode');
  $store->date=$request->get('date');
  $store->paid_unpaid02 = 'paid';
  $store->expiry_date= $expiry_date;
  $store->certificate_year02= $request->get('year');
  $store->past_year02 = $request->past_year;
  $store->pay_amount= $request->get('new_amount') + $request->get('new_amount1');
  $store->receipt_no=$request->get('receipt_no');
  $store->book_no=$request->get('book_no');

  // echo json_encode($store);
  // exit();


  $store->save();

  $var=$store->id;

  return redirect()->route('print-serve1',$var);

  //return redirect(route('print-serve1'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);

}

public function edit_payment_mode03(request $request)
    {
    
      $edit_data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('print.existing_payment03',compact('edit_data'));
    }



public function update_payment_mode03(Request $request)
{
  // dd($request->all());
 $current_year = Carbon::now()->year;

  // Get the number of years to add from the request
  $years_to_add = $request->get('year', 1); // Default to 1 if not provided

  // Create a Carbon instance for the 1st of March of the current year
  $start_date = Carbon::create($current_year, 3, 1);

  // Add the requested number of years to the start date
  $expiry_date = $start_date->addYears($years_to_add)->format('Y-m-d');

  $store =ExistingServe::find($request->id);
  $store->payment_mode=$request->get('payment_mode');
  $store->date=$request->get('date');
  $store->paid_unpaid03 = 'paid';
  $store->certificate_year03= $request->get('year');
   $store->expiry_date= $expiry_date;
  $store->past_year03 = $request->past_year;
  $store->pay_amount= $request->get('new_amount') + $request->get('new_amount1');
  $store->receipt_no=$request->get('receipt_no');
  $store->book_no=$request->get('book_no');

  // echo json_encode($store);
  // exit();


  $store->save();

  $var=$store->id;

  return redirect()->route('print-serve1',$var);

  //return redirect(route('print-serve1'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);

}
public function existing_certificate(Request $request)
{

  $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      ->first();
      $zone = Str::substr($data->zone, 5, 8);

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

  return view('print.existing_certificate',compact('data','zone'));
  // return view('print.existing_certificate',compact('data','zone','qrCodeUrl'));
}

public function existing_notice(Request $request)
{

  $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      ->first();

      $zone = Str::substr($data->zone, 5, 8);
    //    echo json_encode($zone);
    // exit();


  return view('print.existing_notice',compact('data','zone'));
}

public function existing_send_notice(Request $request)
{

  $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      ->first();

      $zone = Str::substr($data->zone, 5, 8);
    //    echo json_encode($zone);
    // exit();


  return view('print.existing_send_notice',compact('data','zone'));
}

public function existing_notice02(Request $request)
{

  $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','bussiness_types.late_fee','zone.zone','zone.zone_name')
      ->first();

      $zone = Str::substr($data->zone, 5, 8);
    //    echo json_encode($data);
    // exit();


  return view('print.existing_notice02',compact('data','zone'));
}
public function existing_notice03(Request $request)
{

  $data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','bussiness_types.reg_fee','zone.zone','zone.zone_name')
      ->first();

      $zone = Str::substr($data->zone, 5, 8);
    //    echo json_encode($zone);
    // exit();


  return view('print.existing_notice03',compact('data','zone'));
}

public function generate_existing_notice(Request $request){
  // dd($request->all());
  $generate_notice=ExistingServe::find($request->id);

  $generate_notice->generate_notice = '1';
  $generate_notice->generate_notice_date = $request->generate_notice_date;
  $generate_notice->past_year = $request->past_year;
  $generate_notice->certificate_year = $request->year;

    // echo json_encode($generate_notice);
    // exit();
  $generate_notice->save();
 
  return redirect()->back();
}

public function generate_existing_notice02(Request $request){
  // dd($request->all());
  $generate_notice=ExistingServe::find($request->id);

  $generate_notice->generate_notice02 = '1';
  $generate_notice->notice2_date = $request->generate_notice_date;
  $generate_notice->past_year02 = $request->past_year;
  $generate_notice->certificate_year02 = $request->year;

    // echo json_encode($generate_notice);
    // exit();
  $generate_notice->save();
 
  return redirect()->back();
}

public function generate_existing_notice03(Request $request){
  // dd($request->all());
  $generate_notice=ExistingServe::find($request->id);

  $generate_notice->generate_notice03 = '1';
  $generate_notice->notice3_date = $request->generate_notice_date;
  $generate_notice->past_year03 = $request->past_year;
  $generate_notice->certificate_year03 = $request->year;

    // echo json_encode($generate_notice);
    // exit();
  $generate_notice->save();
 
  return redirect()->back();
}



}
