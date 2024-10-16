<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\Operator;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    
    public function login_page()

    {
     return view('admin_panel.login');
    }

    public function login_submit(Request $request)
    {
      
       if (auth()->attempt(array('username' => $request['username'], 'password' => $request['password'],'role' => '0'))) 
       { 
        // dd(1);
      // echo json_encode(Auth::user());
      // exit();
          return redirect()->route('admin_dashboard');
      }

      elseif (Auth::guard('operator')->attempt(array('username' => $request['username'], 'password' => $request['password']))) 
      {
         // echo json_encode(Auth::guard('operator')->user());
         // exit();
         return redirect()->route('dashboard');
      }

      else{
        // dd(2);
       // echo "error','Invalid Login Credentials.";
        return redirect()->back()->with('error','Invalid Login Credentials.');  
          }

    }
    public function log_out()
    {
       Auth::logout();
      
      return redirect()->route('login_page');
    }


    public function admin_panel()
   {
     
      if(Auth::user())
      {
     $user=User::where('role',1)->get();
   
    return view('dashboard');
      }
      else{
         return redirect()->route('login_page');

      }
   }
   public function operator_login_page()
   {
    return view('operator_login');
   }

   public function operator_login_submit(Request $request)
   {

     
if (Auth::guard('operator')->attempt(array('username' => $request['username'], 'password' => $request['password']))) 
{
   // echo json_encode(Auth::guard('operator')->user());
   // exit();
   return redirect()->route('dashboard');
}
else{

 return redirect()->back()->with('error','Invalid Login Credentials.');  
   }

   }
   public function operator_log_out()
   {
      Auth::guard('operator')->logout();
     
     return redirect()->route('login_page');
   }


   public function operator_admin_panel()
  {
    
     if(Auth::user())
     {
     
    $user=User::where('role','1')->get();
  
   return view('Master.dashboard');
     }
     else{
        return redirect()->route('login_page');

     }
  }

}
