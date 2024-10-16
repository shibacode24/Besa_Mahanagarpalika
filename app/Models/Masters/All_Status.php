<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_Status extends Model
{
    use HasFactory;
    protected $table="all_status";
    protected $fillable = ['valuation_id','status','role_id'];
}
