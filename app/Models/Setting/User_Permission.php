<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Permission extends Model
{
    use HasFactory;
    protected $table="user_permission";
    protected $fillable = [
        'user_id',
        'role_id'
    ];
    protected $casts =  [
        'role_id'=> 'array',
        ];
   
}
