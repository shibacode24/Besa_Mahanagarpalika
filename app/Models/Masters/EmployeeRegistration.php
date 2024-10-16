<?php

namespace App\Models\Masters;
use App\Models\Area;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRegistration extends Model
{
    use HasFactory;
    protected $table = "employee_registraions";
    protected $fillable = [
    'role',
    'name',
    'contact',
    'mobile',
    'email',
    'bankname',
    'ifsc_code',
    'account_no',
    'location_id',
    'area_id',
    'adhar',
    'pan',
    'photo',
    'other'];

    // protected $casts = 
    // [
    //     'area_id' => 'array'
    // ];
    
    // public function getAreaNameAttribute ()
    // {
    //     $area = Area::whereIn('id',$this->area_id)->pluck('area')->toArray();
    //     $area2=implode(",",$area);
    //     return $area2;
    // }
}
