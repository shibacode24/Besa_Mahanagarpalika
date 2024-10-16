<?php

namespace App\Http\Controllers;
use App\Models\Serve\ExistingServe;
use App\Models\Serve\NewServeForm;
use App\Models\Master\Business_Type;
use session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Master\Zone;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function showserve(Request $request)
   {

    //$user = User :: where('role',1)
  // ->where('zone_id',auth()->user()->zone_id)     //use this method -- for blade
   //->where('zone_id',$request->zone_id)
    //->where('email',$this->session->get('email'))
  //  ->first();

  //  echo json_encode($user);
  //  exit();
  // echo json_encode(Auth::user());
  //  exit();


$role = Auth::user()->role;
$zone_id=NULL;
 if($role == '1'){
  $zone_id = Auth::user()->zone_id;
 }
 
 $zone = Zone:: 
 orderby('id','asc')
 ->get();

 $serve_all1 = DB::table('serves')->select('*');


 if($request->zone != 'all'){
  $serve_all1 = $serve_all1->when($request->zone, function ($q) use($request) {
  return $q-> where('zone_no',$request->zone);
  });
}

$serve_all1 = $serve_all1->when($role == '1', function ($q)  use ($zone_id) {
  return $q->where('zone_no',$zone_id);
  })
 ->where('paid_unpaid','paid')
 ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
 ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
 ->join('zone','zone.id','=','serves.zone_no')
 ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

$serve_all1 = $serve_all1->orderby('id', 'desc')->get();

// echo json_encode($serve_all1);
// exit();


$data = DB::table('existing_serves')->select('*');

    if($request->zone != 'all')
    {
      $data = $data->when($request->zone, function ($q) use($request) {
        return $q-> where('zone_no',$request->zone);
      });
    }
    $data = $data->when($role == '1', function ($q)  use ($zone_id) {
        return $q->where('zone_no',$zone_id);
      })
      ->where('paid_unpaid','paid')
    ->join('zone','zone.id','=','existing_serves.zone_no')
    ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
    ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

    $data = $data->orderby('date', 'desc')->get();

  // echo json_encode($serve_all);
      // exit();


  $new_notice2 = DB::table('serves')->select('*');


 if($request->zone != 'all'){
  $new_notice2 = $new_notice2->when($request->zone, function ($q) use($request) {
  return $q-> where('zone_no',$request->zone);
  });
}

$new_notice2 = $new_notice2->when($role == '1', function ($q)  use ($zone_id) {
  return $q->where('zone_no',$zone_id);
  })
 ->where('paid_unpaid02','paid')
 ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
 ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
 ->join('zone','zone.id','=','serves.zone_no')
 ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

$new_notice2 = $new_notice2->orderby('id', 'desc')->get();

// echo json_encode($new_notice2);
// exit();


$ext_notice2 = DB::table('existing_serves')->select('*');

    if($request->zone != 'all')
    {
      $ext_notice2 = $ext_notice2->when($request->zone, function ($q) use($request) {
        return $q-> where('zone_no',$request->zone);
      });
    }
    $ext_notice2 = $ext_notice2->when($role == '1', function ($q)  use ($zone_id) {
        return $q->where('zone_no',$zone_id);
      })
      ->where('paid_unpaid02','paid')
    ->join('zone','zone.id','=','existing_serves.zone_no')
    ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
    ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

    $ext_notice2 = $ext_notice2->orderby('date', 'desc')->get();

  // echo json_encode($ext_notice2);
  //     exit();


  $new_notice3 = DB::table('serves')->select('*');


  if($request->zone != 'all'){
   $new_notice3 = $new_notice3->when($request->zone, function ($q) use($request) {
   return $q-> where('zone_no',$request->zone);
   });
 }
 
 $new_notice3 = $new_notice3->when($role == '1', function ($q)  use ($zone_id) {
   return $q->where('zone_no',$zone_id);
   })
  ->where('paid_unpaid03','paid')
  ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
  ->join('zone','zone.id','=','serves.zone_no')
  ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
 
 $new_notice3 = $new_notice3->orderby('id', 'desc')->get();
 
 // echo json_encode($new_notice2);
 // exit();
 
 
 $ext_notice3 = DB::table('existing_serves')->select('*');
 
     if($request->zone != 'all')
     {
       $ext_notice3 = $ext_notice3->when($request->zone, function ($q) use($request) {
         return $q-> where('zone_no',$request->zone);
       });
     }
     $ext_notice3 = $ext_notice3->when($role == '1', function ($q)  use ($zone_id) {
         return $q->where('zone_no',$zone_id);
       })
       ->where('paid_unpaid03','paid')
     ->join('zone','zone.id','=','existing_serves.zone_no')
     ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
     ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
     ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
 
     $ext_notice3 = $ext_notice3->orderby('date', 'desc')->get();
 
   // echo json_encode($ext_notice2);
   //     exit();


     

      // $serve_all=NewServeForm:: when($zone_id, function ($q) {
      //   return $q-> where('zone_no',Auth::user()->zone_id);
      // })
      // ->where('paid_unpaid','paid')
      // ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
      // ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
      // ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type')
      // ->get();

      // echo json_encode($serve_all);
      // exit();

    // $data1=ExistingServe:: when($zone_id, function ($q) {
    //   return $q-> where('zone_no',Auth::user()->zone_id);
    // })
    // ->where('paid_unpaid','paid')
    // ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    // ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
    // ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type')
    // ->get();


    //  echo json_encode($data1);

      return view('admin_panel.admin_dashboard',compact('serve_all1','data','zone','new_notice2','ext_notice2','new_notice3','ext_notice3'));
   }

   public function existingserveform()
    {
    return view('admin_panel.admin_dashboard',compact('data1'));

    }

public function update_status(Request $request)
{
  //dd($request->all());
  $store =NewServeForm::find($request->id)->update(
[
    'status' => '1' 
]
  );

//    echo json_encode($store);
//    exit();

  return back();
}

public function update_status_existing(Request $request)
{
  //dd($request->all());
  $store =ExistingServe::find($request->id)->update(
[
    'status' => '1' 
]
  );

//    echo json_encode($store);
//    exit();

  return back();
}


public function report1(Request $request)
{

          $role = Auth::user()->role;
          $zone_id=NULL;
          if($role == '1'){
          $zone_id = Auth::user()->zone_id;
          }

          $zone = Zone:: 
          orderby('id','asc')
          ->get();

          $serve_all1 = DB::table('serves')->select('*');

          if($request->zone != 'all'){
            $serve_all1 = $serve_all1->when($request->zone, function ($q) use($request) {
            return $q-> where('zone_no',$request->zone);
            });
          }

          if (isset($request->from_date) && isset($request->to_date)) {
            $serve_all1 = $serve_all1->whereDate('serves.created_at', '<=', $request->to_date)
              ->whereDate('serves.created_at', '>=', $request->from_date);
          }
          
          $serve_all1 = $serve_all1->when($role == '1', function ($q)  use ($zone_id) {
            return $q->where('zone_no',$zone_id);
            })
           ->where('paid_unpaid','paid')
          //  ->where('paid_unpaid02','paid')
          //  ->where('paid_unpaid03','paid')
           ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
           ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
           ->join('zone','zone.id','=','serves.zone_no')
           ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
          
          $serve_all1 = $serve_all1->orderby('id', 'desc')->get();

         
          //$serve_zone = Str::substr($serve_all1->zone, 7, 10);
          
          // echo json_encode($serve_all1);
          // exit();
         
          
          $data = DB::table('existing_serves')->select('*');
          
              if($request->zone != 'all')
              {
                $data = $data->when($request->zone, function ($q) use($request) {
                  return $q-> where('zone_no',$request->zone);
                });
              }

              if (isset($request->from_date) && isset($request->to_date)) {
                $data = $data->whereDate('existing_serves.created_at', '<=', $request->to_date)
                  ->whereDate('existing_serves.created_at', '>=', $request->from_date);
              }

              $data = $data->when($role == '1', function ($q)  use ($zone_id) {
                  return $q->where('zone_no',$zone_id);
                })
                ->where('paid_unpaid','paid')
              ->join('zone','zone.id','=','existing_serves.zone_no')
              ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
              ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
              ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
          
              $data = $data->orderby('date', 'desc')->get();

              $estab1 = DB::table('serves')->select('*');
              if($request->zone != 'all')
              {
                $estab1 = $estab1->when($request->zone, function ($q) use($request) {
                  return $q-> where('zone_no',$request->zone);
                });
              }
              // if($request->establishment != 'all'){
              //         $estab1 = $estab1->when($request->establishment, function ($q) use($request) {
              //         return $q-> where('area_of_bussiness','<=',$request->establishment);
              //         });
              //       }
       
                if ($request->establishment != 'all') {
                  $establishmentValue = (int)$request->establishment;
              
                  $estab1 = $estab1->when($establishmentValue == 250, function ($q) {
                  return $q->where('area_of_bussiness', '<', 250);
                      })
                      ->when($establishmentValue == 2500, function ($q) {
                          return $q->whereBetween('area_of_bussiness', [250, 2500]);
                      })
                      ->when($establishmentValue == 5000, function ($q) {
                          return $q->where('area_of_bussiness', '>', 2500);
                      });
				}
                  $estab1 = $estab1->when($role == '1', function ($q)  use ($zone_id) {
                      return $q->where('zone_no',$zone_id);
                      })
                    ->where('paid_unpaid','paid')
                     ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
                     ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
                     ->join('zone','zone.id','=','serves.zone_no')
                     ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
                    
                    $estab1 = $estab1->orderBy('id', 'desc')->get();
    
                  //   echo json_encode($estab1);
                  //  exit();
              

              $estab_data1 = DB::table('existing_serves')->select('*');

              if($request->zone != 'all')
              {
                $estab_data1 = $estab_data1->when($request->zone, function ($q) use($request) {
                  return $q-> where('zone_no',$request->zone);
                });
              }
              if ($request->establishment != 'all') {
            $establishmentValue = (int)$request->establishment;
        
            $estab_data1 = $estab_data1->when($establishmentValue == 250, function ($q) {
                    return $q->where('area_of_bussiness', '<', 250);
                      })
                      ->when($establishmentValue == 2500, function ($q) {
                          return $q->whereBetween('area_of_bussiness', [250, 2500]);
                      })
                      ->when($establishmentValue == 5000, function ($q) {
                          return $q->where('area_of_bussiness', '>', 2500);
                      });
        }
        $estab_data1 = $estab_data1->when($role == '1', function ($q)  use ($zone_id) {
                  return $q->where('zone_no',$zone_id);
                  })
                ->where('paid_unpaid','paid')
                ->join('zone','zone.id','=','existing_serves.zone_no')
                ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
                ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
                ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
                
                $estab_data1 = $estab_data1->orderBy('id', 'desc')->get();
        
                     // echo json_encode($estab_data1);
                     //  exit();

                    $business1 = Business_Type :: all();
         
          $new_business = DB::table('serves')->select('*');

          if($request->zone != 'all'){
            $new_business = $new_business->when($request->zone, function ($q) use($request) {
            return $q-> where('zone_no',$request->zone);
            });
          }

          if($request->business != 'all'){
            $new_business = $new_business->when($request->business, function ($q) use($request) {
            return $q-> where('bussiness_type_id',$request->business);
            });
          }
  
          $new_business = $new_business->when($role == '1', function ($q)  use ($zone_id) {
            return $q->where('zone_no',$zone_id);
            })
           //->where('paid_unpaid','paid')
          //  ->where('paid_unpaid02','paid')
          //  ->where('paid_unpaid03','paid')
           ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
           ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
           ->join('zone','zone.id','=','serves.zone_no')
           ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
          
          $new_business = $new_business->orderby('id', 'desc')->get();

         
          //$serve_zone = Str::substr($serve_all1->zone, 7, 10);
          
          // echo json_encode($business);
          // exit();
         
          
          $data_business = DB::table('existing_serves')->select('*');

          if($request->zone != 'all')
              {
                $data_business = $data_business->when($request->zone, function ($q) use($request) {
                  return $q-> where('zone_no',$request->zone);
                });
              }

              if($request->business != 'all')
              {
                $data_business = $data_business->when($request->business, function ($q) use($request) {
                  return $q-> where('bussiness_type_id',$request->business);
                });
              }

              $data_business = $data_business->when($role == '1', function ($q)  use ($zone_id) {
                  return $q->where('zone_no',$zone_id);
                })
                //->where('paid_unpaid','paid')
              ->join('zone','zone.id','=','existing_serves.zone_no')
              ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
              ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
              ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
          
              $data_business = $data_business->orderby('date', 'desc')->get();

                      // echo json_encode($data_business);
                      // exit();
	
	 $new_all = DB::table('serves')->select('*');
                    if($request->zone != 'all')
                    {
                      $new_all = $new_all->when($request->zone, function ($q) use($request) {
                        return $q-> where('zone_no',$request->zone);
                      });
                    }
                      if ($request->establishment != 'all') {
                        $establishmentValue = (int)$request->establishment;
                    
                        $new_all = $new_all->when($establishmentValue == 250, function ($q) {
                                return $q->where('area_of_bussiness', '<', 250);
                            })
                            ->when($establishmentValue == 2500, function ($q) {
                                return $q->whereBetween('area_of_bussiness', [250, 2500]);
                            })
                            ->when($establishmentValue == 5000, function ($q) {
                                return $q->where('area_of_bussiness', '>', 2500);
                            });
                          }
                        $new_all = $new_all->when($role == '1', function ($q)  use ($zone_id) {
                            return $q->where('zone_no',$zone_id);
                            })
                          // ->where('paid_unpaid','paid')
                           ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
                           ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
                           ->join('zone','zone.id','=','serves.zone_no')
                           ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
                          
                          $new_all = $new_all->orderBy('id', 'desc')->get();
          
                        //   echo json_encode($estab1);
                        //  exit();
                    
      
                    $exist_new = DB::table('existing_serves')->select('*');
      
                    if($request->zone != 'all')
                    {
                      $exist_new = $exist_new->when($request->zone, function ($q) use($request) {
                        return $q-> where('zone_no',$request->zone);
                      });
                    }
                if ($request->establishment != 'all') {
                  $establishmentValue = (int)$request->establishment;
              
                  $exist_new = $exist_new->when($establishmentValue == 250, function ($q) {
                          return $q->where('area_of_bussiness', '<', 250);
                      })
                      ->when($establishmentValue == 2500, function ($q) {
                          return $q->whereBetween('area_of_bussiness', [250, 2500]);
                      })
                      ->when($establishmentValue == 5000, function ($q) {
                          return $q->where('area_of_bussiness', '>', 2500);
                      });
              }
              $exist_new = $exist_new->when($role == '1', function ($q)  use ($zone_id) {
                        return $q->where('zone_no',$zone_id);
                        })
                      // ->where('paid_unpaid','paid')
                      ->join('zone','zone.id','=','existing_serves.zone_no')
                      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
                      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
                      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');
                      
                      $exist_new = $exist_new->orderBy('id', 'desc')->get();
	
	             $new_fees_paid = DB::table('serves')->select('*');


              if($request->zone != 'all'){
                $new_fees_paid = $new_fees_paid->when($request->zone, function ($q) use($request) {
                return $q-> where('zone_no',$request->zone);
                });
              }

              if (isset($request->f_date) && isset($request->t_date)) {
                $new_fees_paid = $new_fees_paid->whereDate('serves.date', '<=', $request->t_date)
                  ->whereDate('serves.date', '>=', $request->f_date);
              }

              $new_fees_paid = $new_fees_paid->when($role == '1', function ($q)  use ($zone_id) {
                return $q->where('zone_no',$zone_id);
                })
                
              ->where('paid_unpaid','paid')
              ->orWhere('paid_unpaid02','paid')
              ->orWhere('paid_unpaid03','paid')
              ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
              ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
              ->join('zone','zone.id','=','serves.zone_no')
              ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

              $new_fees_paid = $new_fees_paid->orderby('id', 'desc')->get();

              // echo json_encode($new_fees_paid);
              // exit();


              $exist_fees_paid = DB::table('existing_serves')->select('*');

                  if($request->zone != 'all')
                  {
                    $exist_fees_paid = $exist_fees_paid->when($request->zone, function ($q) use($request) {
                      return $q-> where('zone_no',$request->zone);
                    });
                  }

                  if (isset($request->f_date) && isset($request->t_date)) {
                    $exist_fees_paid = $exist_fees_paid->whereDate('existing_serves.date', '<=', $request->t_date)
                      ->whereDate('existing_serves.date', '>=', $request->f_date);
                  }

                  $exist_fees_paid = $exist_fees_paid->when($role == '1', function ($q)  use ($zone_id) {
                      return $q->where('zone_no',$zone_id);
                    })
                  ->where('paid_unpaid','paid')
                  ->orWhere('paid_unpaid02','paid')
                  ->orWhere('paid_unpaid03','paid')
                  ->join('zone','zone.id','=','existing_serves.zone_no')
                  ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
                  ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
                  ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

                  $exist_fees_paid = $exist_fees_paid->orderby('date', 'desc')->get();

                  // echo json_encode($exist_fees_paid);
                  // exit();

                  $zone1 = Zone:: 
                  orderby('id','asc')
               ->get();
	
            return view('admin_panel.report1',compact('serve_all1','data','zone','estab1','estab_data1','business1','new_business','data_business','exist_new','new_all','exist_fees_paid','new_fees_paid','zone1'));
}


public function edit_new_payment(request $request)
    {
    
      $edit_data=NewServeForm::where('serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
      ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('admin_panel.edit_new_payment',compact('edit_data'));
    }

    public function update_new_payment(Request $request)
    {
       //dd($request->all());

      $store =NewServeForm::where('id',$request->id)->first();
      $store->payment_mode=$request->get('payment_mode');
      $store->date=$request->get('date');
      $store->receipt_no=$request->get('receipt_no');
      $store->book_no=$request->get('book_no');
      $store->paid_unpaid= 'paid' ;
      $store->certificate_year= $request->get('year');
      $store->pay_amount= $request->get('new_amount');
      $store->save();

      $var=$store->id;

      //  echo json_encode($store);
      //  exit();

      return redirect()->route('dashboard1');

      //return redirect(route('print-serve1'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);

    }

    public function edit_existing_payment(request $request)
    {
    
      $edit_data=ExistingServe::where('existing_serves.id',$request->id)
      ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
      ->leftjoin('zone','zone.id','=','existing_serves.zone_no')
      ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','bussiness_types.bussiness_type1','zone.zone')
      ->first();
  
      // echo json_encode($edit_data);  
      // exit();
    return view('admin_panel.edit_existing_payment',compact('edit_data'));
    }



public function update_existing_payment(Request $request)
{
  // dd($request->all());
  $store =ExistingServe::find($request->id);
  $store->payment_mode=$request->get('payment_mode');
  $store->date=$request->get('date');
  $store->paid_unpaid = 'paid';
  $store->certificate_year= $request->get('year');
  $store->pay_amount= $request->get('new_amount');
  $store->receipt_no=$request->get('receipt_no');
  $store->book_no=$request->get('book_no');

  // echo json_encode($store);
  // exit();


  $store->save();

  $var=$store->id;

 
  return redirect()->route('dashboard1');

  
}

public function barchart(Request $request)
{    	

  //zone 1

  $demand1 = DB::table('serves')
  ->join('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
  ->where('zone_no',3)
  ->sum('bussiness_types.charges');
  

$demand2 = DB::table('existing_serves')
->join('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
  ->where('zone_no',3)
  ->sum('bussiness_types.charges');

   $zone1_demand = $demand1 + $demand2;

  //  echo json_encode($zone1_demand);

  $survey1 = DB::table('existing_serves')
  ->where('zone_no',3)
  ->count();


  $application1 = DB::table('existing_serves')
  ->where('zone_no',3)
  ->count();

  $application2 = DB::table('serves')
  ->where('zone_no',3)
  ->count();

  $zone1_application = $application1 + $application2;

  $license1 = DB::table('existing_serves')
  ->where('status','1')
  ->where('zone_no',3)
  ->count();

  $license2 = DB::table('serves')
  ->where('status','1')
  ->where('zone_no',3)
  ->count();

 $zone1_license = $license1 + $license2;


 $generate_notice1 = DB::table('existing_serves')
  ->where('generate_notice','1')
  ->where('zone_no',3)
  ->count();

$generate_notice2 = DB::table('serves')
    ->where('generate_notice','1')
    ->where('zone_no',3)
    ->count();

  $zone1_generate_notice = $generate_notice1 + $generate_notice2;

 $unpaid1 = DB::table('existing_serves')
    ->where('paid_unpaid','unpaid')
    ->where('zone_no',3)
    ->count();

                    
$unpaid2 = DB::table('serves')
      ->where('paid_unpaid','unpaid')
      ->where('zone_no',3)
        ->count();
$zone1_unpaid = $unpaid1 + $unpaid2;


$receipt1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->where('zone_no',3)
		->count();

	$receipt2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->where('zone_no',3)
		->count();

    $zone1_receipt = $receipt1 + $receipt2;

    $todays_receipt1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',3)
		->count();

    $todays_receipt2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',3)
		->count();

    $zone1_todays_receipt = $todays_receipt1 + $todays_receipt2;
	
	$todays_payment1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',3)
		->sum('pay_amount');

    $todays_payment2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',3)
		->sum('pay_amount');

    $zone1_payment_receipt = $todays_payment1 + $todays_payment2;

    $payment1 = DB::table('serves')
		//->where('paid_unpaid','paid')
    ->where('zone_no',3)
		->sum('pay_amount');

	$payment2 = DB::table('existing_serves')
	//	->where('paid_unpaid','paid')
    ->where('zone_no',3)
		->sum('pay_amount');

    $zone1_payment = $payment1 + $payment2;

    $today1 = DB::table('serves')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('zone_no',3)
                  ->count();

    $today2 = DB::table('existing_serves')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('zone_no',3)
                  ->count();
    $zone1_today = $today1 + $today2;

     //zone 2

     $demand1 = DB::table('serves')
     ->join('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
     ->where('zone_no',4)
     ->sum('bussiness_types.charges');
     
   
   $demand2 = DB::table('existing_serves')
   ->join('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
     ->where('zone_no',4)
     ->sum('bussiness_types.charges');
   
      $zone2_demand = $demand1 + $demand2;

     $survey2 = DB::table('existing_serves')
     ->where('zone_no',4)
     ->count();

  $application1 = DB::table('existing_serves')
  ->where('zone_no',4)
  ->count();

  $application2 = DB::table('serves')
  ->where('zone_no',4)
  ->count();

  $zone2_application = $application1 + $application2;

  $license1 = DB::table('existing_serves')
  ->where('status','1')
  ->where('zone_no',4)
  ->count();

  $license2 = DB::table('serves')
  ->where('status','1')
  ->where('zone_no',4)
  ->count();

 $zone2_license = $license1 + $license2;


 $generate_notice1 = DB::table('existing_serves')
  ->where('generate_notice','1')
  ->where('zone_no',4)
  ->count();

$generate_notice2 = DB::table('serves')
    ->where('generate_notice','1')
    ->where('zone_no',4)
    ->count();

  $zone2_generate_notice = $generate_notice1 + $generate_notice2;

 $unpaid1 = DB::table('existing_serves')
    ->where('paid_unpaid','unpaid')
    ->where('zone_no',4)
    ->count();

                    
$unpaid2 = DB::table('serves')
      ->where('paid_unpaid','unpaid')
      ->where('zone_no',4)
        ->count();
$zone2_unpaid = $unpaid1 + $unpaid2;


$receipt1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->where('zone_no',4)
		->count();

	$receipt2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->where('zone_no',4)
		->count();

    $zone2_receipt = $receipt1 + $receipt2;

    $todays_receipt1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',4)
		->count();

    $todays_receipt2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',4)
		->count();

    $zone2_todays_receipt = $todays_receipt1 + $todays_receipt2;
	
$todays_payment1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',4)
		->sum('pay_amount');

    $todays_payment2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',4)
		->sum('pay_amount');

    $zone2_payment_receipt = $todays_payment1 + $todays_payment2;

    // echo json_encode($zone2_todays_receipt);
    // exit();

    $payment1 = DB::table('serves')
    ->where('zone_no',4)
		->sum('pay_amount');

	 $payment2 = DB::table('existing_serves')
    ->where('zone_no',4)
		->sum('pay_amount');

    $zone2_payment = $payment1 + $payment2;

    // $today1 = DB::table('serves')
    // ->where((DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as formatted_dob')), '=', Carbon::now()->format('Y-m-d'))
   // ->where('zone_no',4)
		// ->count();

	// $today2 = DB::table('existing_serves')
  // ->where('created_at', '=', Carbon::now()->format('Y-m-d'))
  //   ->where('zone_no',4)
	// 	->count();


    $today1 = DB::table('serves')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('zone_no',4)
                  ->count();

    $today2 = DB::table('existing_serves')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('zone_no',4)
                  ->count();


    $zone2_today = $today1 + $today2;

    //zone 3

    $demand1 = DB::table('serves')
    ->join('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
    ->where('zone_no',5)
    ->sum('bussiness_types.charges');
    
  
  $demand2 = DB::table('existing_serves')
  ->join('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->where('zone_no',5)
    ->sum('bussiness_types.charges');
  
     $zone3_demand = $demand1 + $demand2;

    $survey3 = DB::table('existing_serves')
    ->where('zone_no',5)
    ->count();

    $application1 = DB::table('existing_serves')
    ->where('zone_no',5)
    ->count();
  
    $application2 = DB::table('serves')
    ->where('zone_no',5)
    ->count();
  
    $zone3_application = $application1 + $application2;
  
    $license1 = DB::table('existing_serves')
    ->where('status','1')
    ->where('zone_no',5)
    ->count();
  
    $license2 = DB::table('serves')
    ->where('status','1')
    ->where('zone_no',5)
    ->count();
  
   $zone3_license = $license1 + $license2;
  
  
   $generate_notice1 = DB::table('existing_serves')
    ->where('generate_notice','1')
    ->where('zone_no',5)
    ->count();
  
  $generate_notice2 = DB::table('serves')
      ->where('generate_notice','1')
      ->where('zone_no',5)
      ->count();
  
    $zone3_generate_notice = $generate_notice1 + $generate_notice2;
  
   $unpaid1 = DB::table('existing_serves')
      ->where('paid_unpaid','unpaid')
      ->where('zone_no',5)
      ->count();
  
                      
  $unpaid2 = DB::table('serves')
        ->where('paid_unpaid','unpaid')
        ->where('zone_no',5)
          ->count();
  $zone3_unpaid = $unpaid1 + $unpaid2;
  
  
  $receipt1 = DB::table('serves')
      ->where('paid_unpaid','paid')
      ->where('zone_no',5)
      ->count();
  
    $receipt2 = DB::table('existing_serves')
      ->where('paid_unpaid','paid')
      ->where('zone_no',5)
      ->count();
  
      $zone3_receipt = $receipt1 + $receipt2;

      $todays_receipt1 = DB::table('serves')
      ->where('paid_unpaid','paid')
      ->whereRaw('Date(date) = CURDATE()')
      ->where('zone_no',5)
      ->count();
  
      $todays_receipt2 = DB::table('existing_serves')
      ->where('paid_unpaid','paid')
      ->whereRaw('Date(date) = CURDATE()')
      ->where('zone_no',5)
      ->count();
  
      $zone3_todays_receipt = $todays_receipt1 + $todays_receipt2;
	
	$todays_payment1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',5)
		->sum('pay_amount');

    $todays_payment2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',5)
		->sum('pay_amount');

    $zone3_payment_receipt = $todays_payment1 + $todays_payment2;

      $payment1 = DB::table('serves')
      ->where('zone_no',5)
      ->sum('pay_amount');
  
     $payment2 = DB::table('existing_serves')
      ->where('zone_no',5)
      ->sum('pay_amount');
  
      $zone3_payment = $payment1 + $payment2;
  
      $today1 = DB::table('serves')->select(DB::raw('*'))
      ->whereRaw('Date(created_at) = CURDATE()')
      ->where('zone_no',5)
      ->count();

$today2 = DB::table('existing_serves')->select(DB::raw('*'))
      ->whereRaw('Date(created_at) = CURDATE()')
      ->where('zone_no',5)
      ->count();
  
      $zone3_today = $today1 + $today2;

//zone 4

$demand1 = DB::table('serves')
->join('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
->where('zone_no',6)
->sum('bussiness_types.charges');


$demand2 = DB::table('existing_serves')
->join('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
->where('zone_no',6)
->sum('bussiness_types.charges');

 $zone4_demand = $demand1 + $demand2;

$survey4 = DB::table('existing_serves')
      ->where('zone_no',6)
      ->count();

      $application1 = DB::table('existing_serves')
      ->where('zone_no',6)
      ->count();
    
      $application2 = DB::table('serves')
      ->where('zone_no',6)
      ->count();
    
      $zone4_application = $application1 + $application2;
    
      $license1 = DB::table('existing_serves')
      ->where('status','1')
      ->where('zone_no',6)
      ->count();
    
      $license2 = DB::table('serves')
      ->where('status','1')
      ->where('zone_no',6)
      ->count();
    
     $zone4_license = $license1 + $license2;
    
    
     $generate_notice1 = DB::table('existing_serves')
      ->where('generate_notice','1')
      ->where('zone_no',6)
      ->count();
    
    $generate_notice2 = DB::table('serves')
        ->where('generate_notice','1')
        ->where('zone_no',6)
        ->count();
    
      $zone4_generate_notice = $generate_notice1 + $generate_notice2;
    
     $unpaid1 = DB::table('existing_serves')
        ->where('paid_unpaid','unpaid')
        ->where('zone_no',6)
        ->count();
    
                        
    $unpaid2 = DB::table('serves')
          ->where('paid_unpaid','unpaid')
          ->where('zone_no',6)
            ->count();
    $zone4_unpaid = $unpaid1 + $unpaid2;
    
    
    $receipt1 = DB::table('serves')
        ->where('paid_unpaid','paid')
        ->where('zone_no',6)
        ->count();
    
      $receipt2 = DB::table('existing_serves')
        ->where('paid_unpaid','paid')
        ->where('zone_no',6)
        ->count();
    
        $zone4_receipt = $receipt1 + $receipt2;

        $todays_receipt1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',6)
		->count();

    $todays_receipt2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',6)
		->count();

    $zone4_todays_receipt = $todays_receipt1 + $todays_receipt2;
	
	$todays_payment1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',6)
		->sum('pay_amount');

    $todays_payment2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',6)
		->sum('pay_amount');

    $zone4_payment_receipt = $todays_payment1 + $todays_payment2;

        $payment1 = DB::table('serves')
    ->where('zone_no',6)
		->sum('pay_amount');

	 $payment2 = DB::table('existing_serves')
    ->where('zone_no',6)
		->sum('pay_amount');

    $zone4_payment = $payment1 + $payment2;

    $today1 = DB::table('serves')->select(DB::raw('*'))
    ->whereRaw('Date(created_at) = CURDATE()')
    ->where('zone_no',6)
    ->count();

$today2 = DB::table('existing_serves')->select(DB::raw('*'))
    ->whereRaw('Date(created_at) = CURDATE()')
    ->where('zone_no',6)
    ->count();

    $zone4_today = $today1 + $today2;

//zone 5

$demand1 = DB::table('serves')
->join('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
->where('zone_no',7)
->sum('bussiness_types.charges');


$demand2 = DB::table('existing_serves')
->join('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
->where('zone_no',7)
->sum('bussiness_types.charges');

 $zone5_demand = $demand1 + $demand2;
        $survey5 = DB::table('existing_serves')
           ->where('zone_no',7)
           ->count();

        $application1 = DB::table('existing_serves')
        ->where('zone_no',7)
        ->count();
      
        $application2 = DB::table('serves')
        ->where('zone_no',7)
        ->count();
      
        $zone5_application = $application1 + $application2;
      
        $license1 = DB::table('existing_serves')
        ->where('status','1')
        ->where('zone_no',7)
        ->count();
      
        $license2 = DB::table('serves')
        ->where('status','1')
        ->where('zone_no',7)
        ->count();
      
       $zone5_license = $license1 + $license2;
      
      
       $generate_notice1 = DB::table('existing_serves')
        ->where('generate_notice','1')
        ->where('zone_no',7)
        ->count();
      
      $generate_notice2 = DB::table('serves')
          ->where('generate_notice','1')
          ->where('zone_no',7)
          ->count();
      
        $zone5_generate_notice = $generate_notice1 + $generate_notice2;
      
       $unpaid1 = DB::table('existing_serves')
          ->where('paid_unpaid','unpaid')
          ->where('zone_no',7)
          ->count();
      
                          
      $unpaid2 = DB::table('serves')
            ->where('paid_unpaid','unpaid')
            ->where('zone_no',7)
              ->count();
      $zone5_unpaid = $unpaid1 + $unpaid2;
      
      
      $receipt1 = DB::table('serves')
          ->where('paid_unpaid','paid')
          ->where('zone_no',7)
          ->count();
      
        $receipt2 = DB::table('existing_serves')
          ->where('paid_unpaid','paid')
          ->where('zone_no',7)
          ->count();
      
          $zone5_receipt = $receipt1 + $receipt2;

          $todays_receipt1 = DB::table('serves')
          ->where('paid_unpaid','paid')
          ->whereRaw('Date(date) = CURDATE()')
          ->where('zone_no',7)
          ->count();

          $todays_receipt2 = DB::table('existing_serves')
          ->where('paid_unpaid','paid')
          ->whereRaw('Date(date) = CURDATE()')
          ->where('zone_no',7)
          ->count();

       $zone5_todays_receipt = $todays_receipt1 + $todays_receipt2;
	
	$todays_payment1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',7)
		->sum('pay_amount');

    $todays_payment2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',7)
		->sum('pay_amount');

    $zone5_payment_receipt = $todays_payment1 + $todays_payment2;

          $payment1 = DB::table('serves')
    ->where('zone_no',7)
		->sum('pay_amount');

	 $payment2 = DB::table('existing_serves')
    ->where('zone_no',7)
		->sum('pay_amount');

    $zone5_payment = $payment1 + $payment2;

    $today1 = DB::table('serves')->select(DB::raw('*'))
    ->whereRaw('Date(created_at) = CURDATE()')
    ->where('zone_no',7)
    ->count();

$today2 = DB::table('existing_serves')->select(DB::raw('*'))
    ->whereRaw('Date(created_at) = CURDATE()')
    ->where('zone_no',7)
    ->count();

    $zone5_today = $today1 + $today2;

    //zone 6

    $demand1 = DB::table('serves')
    ->join('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
    ->where('zone_no',8)
    ->sum('bussiness_types.charges');
    
  
  $demand2 = DB::table('existing_serves')
  ->join('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->where('zone_no',8)
    ->sum('bussiness_types.charges');
  
     $zone6_demand = $demand1 + $demand2;

    $survey6 = DB::table('existing_serves')
    ->where('zone_no',8)
    ->count();

          $application1 = DB::table('existing_serves')
          ->where('zone_no',8)
          ->count();
        
          $application2 = DB::table('serves')
          ->where('zone_no',8)
          ->count();
        
          $zone6_application = $application1 + $application2;
        
          $license1 = DB::table('existing_serves')
          ->where('status','1')
          ->where('zone_no',8)
          ->count();
        
          $license2 = DB::table('serves')
          ->where('status','1')
          ->where('zone_no',8)
          ->count();
        
         $zone6_license = $license1 + $license2;
        
        
         $generate_notice1 = DB::table('existing_serves')
          ->where('generate_notice','1')
          ->where('zone_no',8)
          ->count();
        
        $generate_notice2 = DB::table('serves')
            ->where('generate_notice','1')
            ->where('zone_no',8)
            ->count();
        
          $zone6_generate_notice = $generate_notice1 + $generate_notice2;
        
         $unpaid1 = DB::table('existing_serves')
            ->where('paid_unpaid','unpaid')
            ->where('zone_no',8)
            ->count();
        
                            
        $unpaid2 = DB::table('serves')
              ->where('paid_unpaid','unpaid')
              ->where('zone_no',8)
                ->count();
        $zone6_unpaid = $unpaid1 + $unpaid2;
        
        
        $receipt1 = DB::table('serves')
            ->where('paid_unpaid','paid')
            ->where('zone_no',8)
            ->count();
        
          $receipt2 = DB::table('existing_serves')
            ->where('paid_unpaid','paid')
            ->where('zone_no',8)
            ->count();
        
            $zone6_receipt = $receipt1 + $receipt2;
            $todays_receipt1 = DB::table('serves')
            ->where('paid_unpaid','paid')
            ->whereRaw('Date(date) = CURDATE()')
            ->where('zone_no',8)
            ->count();
        
            $todays_receipt2 = DB::table('existing_serves')
            ->where('paid_unpaid','paid')
            ->whereRaw('Date(date) = CURDATE()')
            ->where('zone_no',8)
            ->count();
        
            $zone6_todays_receipt = $todays_receipt1 + $todays_receipt2;
	
	$todays_payment1 = DB::table('serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',8)
		->sum('pay_amount');

    $todays_payment2 = DB::table('existing_serves')
		->where('paid_unpaid','paid')
    ->whereRaw('Date(date) = CURDATE()')
    ->where('zone_no',8)
		->sum('pay_amount');

    $zone6_payment_receipt = $todays_payment1 + $todays_payment2;


            $payment1 = DB::table('serves')
             ->where('zone_no',8)
		         ->sum('pay_amount');

	           $payment2 = DB::table('existing_serves')
              ->where('zone_no',8)
		          ->sum('pay_amount');

             $zone6_payment = $payment1 + $payment2;

             $today1 = DB::table('serves')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('zone_no',8)
                  ->count();

    $today2 = DB::table('existing_serves')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('zone_no',8)
                  ->count();

            $zone6_today = $today1 + $today2;

    return view('admin_panel.dashboard',compact('zone1_generate_notice','zone1_license','zone1_unpaid','zone1_receipt','zone1_application','zone1_payment','zone1_today','zone2_generate_notice','zone2_license','zone2_unpaid','zone2_receipt','zone2_application','zone2_payment','zone2_today','zone3_generate_notice','zone3_license','zone3_unpaid','zone3_receipt','zone3_application','zone3_payment','zone3_today','zone4_generate_notice','zone4_license','zone4_unpaid','zone4_receipt','zone4_application','zone4_payment','zone4_today','zone5_generate_notice','zone5_license','zone5_unpaid','zone5_receipt','zone5_application','zone5_payment','zone5_today','zone6_generate_notice','zone6_license','zone6_unpaid','zone6_receipt','zone6_application','zone6_payment','zone6_today','survey6','survey5','survey4','survey3','survey2','survey1','zone1_todays_receipt','zone2_todays_receipt','zone3_todays_receipt','zone4_todays_receipt','zone5_todays_receipt','zone6_todays_receipt','zone1_payment_receipt','zone2_payment_receipt','zone3_payment_receipt','zone4_payment_receipt','zone5_payment_receipt','zone6_payment_receipt','zone1_demand','zone2_demand','zone3_demand','zone4_demand','zone5_demand','zone6_demand'));
}



public function business_type_report(Request $request)
{
$business_type = Business_Type:: orderby('id','asc')
->get();


$get_data = DB::table('existing_serves')->select('*');
//$get_data1 = DB::table('serves')->select('*');


$get_data = $get_data->where(['id' => $request->business_type]);
//$get_data1 = $get_data->where(['id' => $request->business_type]);

// if (isset($request->date)) {
// $get_data = $get_data->whereDate('created_at', $request->date);
  
// }
$get_data = $get_data->orderby('date', 'desc')->get();

// echo json_encode($get_data);
// exit();
return view('Report.data_from_app',compact('business_type','get_data'));
}

public function receipt(Request $request)
{
  $role = Auth::user()->role;
$zone_id=NULL;
 if($role == '1'){
  $zone_id = Auth::user()->zone_id;
 }
 
 $zone = Zone:: 
 orderby('id','asc')
 ->get();

 $serve_all1 = DB::table('serves')->select('*');


 if($request->zone != 'all'){
  $serve_all1 = $serve_all1->when($request->zone, function ($q) use($request) {
  return $q-> where('zone_no',$request->zone);
  });
}

$serve_all1 = $serve_all1->when($role == '1', function ($q)  use ($zone_id) {
  return $q->where('zone_no',$zone_id);
  })
 ->where('paid_unpaid','paid')
 ->orWhere('paid_unpaid02','paid')
 ->orWhere('paid_unpaid03','paid')
 ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
 ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
 ->join('zone','zone.id','=','serves.zone_no')
 ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

$serve_all1 = $serve_all1->orderby('id', 'desc')->get();

// echo json_encode($serve_all1);
// exit();


$data = DB::table('existing_serves')->select('*');

    if($request->zone != 'all')
    {
      $data = $data->when($request->zone, function ($q) use($request) {
        return $q-> where('zone_no',$request->zone);
      });
    }
    $data = $data->when($role == '1', function ($q)  use ($zone_id) {
        return $q->where('zone_no',$zone_id);
      })
      ->where('paid_unpaid','paid')
      ->orWhere('paid_unpaid02','paid')
      ->orWhere('paid_unpaid03','paid')
    ->join('zone','zone.id','=','existing_serves.zone_no')
    ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
    ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

    $data = $data->orderby('date', 'desc')->get();

  // echo json_encode($serve_all);
      // exit();
      return view('admin_panel.receipt',compact('serve_all1','data','zone'));
}

public function license(Request $request)
{
  $role = Auth::user()->role;
$zone_id=NULL;
 if($role == '1'){
  $zone_id = Auth::user()->zone_id;
 }
 
 $zone = Zone:: 
 orderby('id','asc')
 ->get();

 $serve_all1 = DB::table('serves')->select('*');


 if($request->zone != 'all'){
  $serve_all1 = $serve_all1->when($request->zone, function ($q) use($request) {
  return $q-> where('zone_no',$request->zone);
  });
}

$serve_all1 = $serve_all1->when($role == '1', function ($q)  use ($zone_id) {
  return $q->where('zone_no',$zone_id);
  })
 ->where('status','1')
 ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
 ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
 ->join('zone','zone.id','=','serves.zone_no')
 ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

$serve_all1 = $serve_all1->orderby('id', 'desc')->get();

// echo json_encode($serve_all1);
// exit();


$data = DB::table('existing_serves')->select('*');

    if($request->zone != 'all')
    {
      $data = $data->when($request->zone, function ($q) use($request) {
        return $q-> where('zone_no',$request->zone);
      });
    }
    $data = $data->when($role == '1', function ($q)  use ($zone_id) {
        return $q->where('zone_no',$zone_id);
      })
      ->where('status','1')
    ->join('zone','zone.id','=','existing_serves.zone_no')
    ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
    ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

    $data = $data->orderby('date', 'desc')->get();

  // echo json_encode($serve_all);
      // exit();
      return view('admin_panel.licenses',compact('serve_all1','data','zone'));
}

public function fee_collected(Request $request)
{
  $role = Auth::user()->role;
$zone_id=NULL;
 if($role == '1'){
  $zone_id = Auth::user()->zone_id;
 }
 
 $zone = Zone:: 
 orderby('id','asc')
 ->get();

 $serve_all1 = DB::table('serves')->select('*');


 if($request->zone != 'all'){
  $serve_all1 = $serve_all1->when($request->zone, function ($q) use($request) {
  return $q-> where('zone_no',$request->zone);
  });
}

$serve_all1 = $serve_all1->when($role == '1', function ($q)  use ($zone_id) {
  return $q->where('zone_no',$zone_id);
  })
 ->where('paid_unpaid','paid')
 ->orWhere('paid_unpaid02','paid')
 ->orWhere('paid_unpaid03','paid')
 ->leftjoin('bussiness_types','bussiness_types.id','=','serves.type_of_bussiness_id')
 ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','serves.type_of_bussiness_id')
 ->join('zone','zone.id','=','serves.zone_no')
 ->select('serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

$serve_all1 = $serve_all1->orderby('id', 'desc')->get();

// echo json_encode($serve_all1);
// exit();


$data = DB::table('existing_serves')->select('*');

    if($request->zone != 'all')
    {
      $data = $data->when($request->zone, function ($q) use($request) {
        return $q-> where('zone_no',$request->zone);
      });
    }
    $data = $data->when($role == '1', function ($q)  use ($zone_id) {
        return $q->where('zone_no',$zone_id);
      })
    ->where('paid_unpaid','paid')
    ->orWhere('paid_unpaid02','paid')
    ->orWhere('paid_unpaid03','paid')
    ->join('zone','zone.id','=','existing_serves.zone_no')
    ->leftjoin('bussiness_types','bussiness_types.id','=','existing_serves.type_of_bussiness_id')
    ->leftjoin('hotel_charges','hotel_charges.hotel_id','=','existing_serves.type_of_bussiness_id')
    ->select('existing_serves.*','bussiness_types.charges','hotel_charges.non_ac_room as Non_AC','hotel_charges.ac_room as AC','bussiness_types.bussiness_type','zone.zone');

    $data = $data->orderby('date', 'desc')->get();

  // echo json_encode($serve_all);
      // exit();
      return view('admin_panel.fee_collect',compact('serve_all1','data','zone'));
}

}