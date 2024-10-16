<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class ReportController extends Controller
{

    public function data_from_app(Request $request)

    {

        $user = User:: where('role','2')
        ->orderby('id','asc')
        ->get();

        // echo json_encode($user);
        //  exit();


        // $get_data = User:: join('surveys','surveys.user_id','=','users.id')
        // ->select('surveys.*','users.name')
        // ->orderby('id','asc')
        // ->get();


        $get_data = DB::table('existing_serves')->select('*', DB::raw('DATE(created_at) as date'));

    
        $get_data = $get_data->where(['user_id' => $request->user]);
    
      if (isset($request->date)) {
        $get_data = $get_data->whereDate('created_at', $request->date);
          
      }
      $get_data = $get_data->orderby('date', 'desc')->get();
    
      // echo json_encode($get_data);
      // exit();
        return view('Report.data_from_app',compact('user','get_data'));
       }
}
