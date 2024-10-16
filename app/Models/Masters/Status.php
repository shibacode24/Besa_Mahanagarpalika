<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\UserRole;

class Status extends Model
{
    use HasFactory;
    protected $table="status";
    protected $fillable = ['role_name_id','statu'];

    public function getRoleNameStringAttribute()
    {

        $name =userRole::where('id',$this->role_name_id);
        return $name;
    }

}
