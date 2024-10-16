<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
  

use HasFactory;
    protected $table="user_roles";
    protected $fillable = ['role_name','page_name'];

    protected $casts = [
        'page_name'=> 'array',
        
    ];

    // muteoter accessor
    public function getPageNameStringAttribute(){
       // $page_name_array=['Field Executive','Assistant Valuer', 'Technical Manager', 'Technical Head'];
        return implode(',',$this->page_name);

    }

  
}
 