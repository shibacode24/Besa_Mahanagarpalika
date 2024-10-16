<?php
use App\Models\Login\User;
use App\Models\Setting\User_Permission;
use App\Models\Setting\UserRole;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

function get_user_permission()
{
    $user_data=Auth::user();
    
    $user_permission=User_Permission::where('user_id',$user_data->id)->first();
    $permission=UserRole::whereIn('id',$user_permission->role_id)->get()->pluck('page_name');         
    $permission=Arr::flatten($permission);
     return $permission;
}
?>