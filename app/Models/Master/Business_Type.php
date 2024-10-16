<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_Type extends Model
{
    use HasFactory;
    protected $table="new_business_type";
    protected $fillable = [
        'business_type',
        'business_type1'
    ];
}
