<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessReg extends Model
{
    use HasFactory;
    protected $table="bussiness_registrations";
    protected $fillable = ['bussiness_type','charges'];
}
