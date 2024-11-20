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
     ->orwhere('paid_unpaid02','paid')
      ->orwhere('paid_unpaid02','paid')
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
      ->orwhere('paid_unpaid02','paid')
      ->orwhere('paid_unpaid02','paid')
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

     $zones = DB::table('zone')->get(); 
          $demandData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $demand1 = DB::table('serves')
                  ->join('bussiness_types', 'bussiness_types.id', '=', 'serves.type_of_bussiness_id')
                  ->where('zone_no', $zone->id)
                  ->sum('bussiness_types.charges');

              // Calculate demand for 'existing_serves' table
              $demand2 = DB::table('existing_serves')
                  ->join('bussiness_types', 'bussiness_types.id', '=', 'existing_serves.type_of_bussiness_id')
                  ->where('zone_no', $zone->id)
                  ->sum('bussiness_types.charges');

              // Store the total demand for the current zone
              $demandData[$zone->zone] = $demand1 + $demand2;
          }


          $applicationData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $application1 = DB::table('serves')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Calculate demand for 'existing_serves' table
              $application2 = DB::table('existing_serves')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Store the total demand for the current zone
              $applicationData[$zone->zone] = $application1 + $application2;
          }


          $noticeData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $notice1 = DB::table('serves')
                  ->where('generate_notice','1')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Calculate demand for 'existing_serves' table
              $notice2 = DB::table('existing_serves')
                  ->where('generate_notice','1')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Store the total demand for the current zone
              $noticeData[$zone->zone] = $notice1 + $notice2;
          }

          $receiptData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $receipt1 = DB::table('serves')
                  ->where('paid_unpaid','paid')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Calculate demand for 'existing_serves' table
              $receipt2 = DB::table('existing_serves')
                  ->where('paid_unpaid','paid')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Store the total demand for the current zone
              $receiptData[$zone->zone] = $receipt1 + $receipt2;
          }
          
          
          $licenseData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $license1 = DB::table('serves')
                  ->where('status','1')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Calculate demand for 'existing_serves' table
              $license2 = DB::table('existing_serves')
                  ->where('status','1')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Store the total demand for the current zone
              $licenseData[$zone->zone] = $license1 + $license2;
          }

          
          $todays_receiptData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $todays_receipt1 = DB::table('serves')
                  ->where('paid_unpaid','paid')
                  ->whereRaw('Date(date) = CURDATE()')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Calculate demand for 'existing_serves' table
              $todays_receipt2 = DB::table('existing_serves')
                  ->where('paid_unpaid','paid')
                  ->whereRaw('Date(date) = CURDATE()')
                  ->where('zone_no', $zone->id)
                  ->count();

              // Store the total demand for the current zone
              $todays_receiptData[$zone->zone] = $todays_receipt1 + $todays_receipt2;
          }

          
          $todays_trade_feeData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $todays_trade_fee1 = DB::table('serves')
              ->where('paid_unpaid','paid')
              ->whereRaw('Date(date) = CURDATE()')
              ->where('zone_no', $zone->id)
              ->sum('pay_amount');
              
              // Calculate demand for 'existing_serves' table
              $todays_trade_fee2 = DB::table('existing_serves')
              ->where('paid_unpaid','paid')
              ->whereRaw('Date(date) = CURDATE()')
              ->where('zone_no', $zone->id)
              ->sum('pay_amount');

              // Store the total demand for the current zone
              $todays_trade_feeData[$zone->zone] = $todays_trade_fee1 + $todays_trade_fee2;
          }

          $total_trade_feeData = []; 
          foreach ($zones as $zone) {
              // Calculate demand for 'serves' table
              $total_trade_fee1 = DB::table('serves')
              ->where('zone_no', $zone->id)
              ->sum('pay_amount');
              
              // Calculate demand for 'existing_serves' table
              $total_trade_fee2 = DB::table('existing_serves')
              ->where('zone_no', $zone->id)
              ->sum('pay_amount');

              // Store the total demand for the current zone
              $total_trade_feeData[$zone->zone] = $total_trade_fee1 + $total_trade_fee2;
          }
         

    return view('admin_panel.dashboard',compact('demandData','zones','applicationData','noticeData','receiptData','licenseData','todays_receiptData','todays_trade_feeData','total_trade_feeData'));
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
  // dd($request->zone);
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


// $data = DB::table('existing_serves')
//     ->select('*')
//     ->when($request->zone !== 'all', function ($query) use ($request, $role, $zone_id) {
//         // Apply zone filter only if it is not 'all'
//         if ($role == '1') {
//             // Apply role-based filter for specific zone_id if zone is not 'all'
//             return $query->where('zone_no', $zone_id);
//         } else {
//             return $query->where('zone_no', $request->zone);
//         }
//     })
//     ->where(function ($query) {
//         // Check for any of the 'paid' statuses
//         $query->where('paid_unpaid', 'paid')
//               ->orWhere('paid_unpaid02', 'paid')
//               ->orWhere('paid_unpaid03', 'paid');
//     })
//     ->join('zone', 'zone.id', '=', 'existing_serves.zone_no')
//     ->leftJoin('bussiness_types', 'bussiness_types.id', '=', 'existing_serves.type_of_bussiness_id')
//     ->leftJoin('hotel_charges', 'hotel_charges.hotel_id', '=', 'existing_serves.type_of_bussiness_id')
//     ->select(
//         'existing_serves.*',
//         'bussiness_types.charges',
//         'hotel_charges.non_ac_room as Non_AC',
//         'hotel_charges.ac_room as AC',
//         'bussiness_types.bussiness_type',
//         'zone.zone'
//     )
//     ->orderBy('date', 'desc')
//     ->get();



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