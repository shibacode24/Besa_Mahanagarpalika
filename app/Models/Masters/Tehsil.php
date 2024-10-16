<?php

namespace App\Models\Masters;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    use HasFactory;

    protected $table="tehsil";
    protected $filllable=[
        'state_id',
        'district_id',
        'tehsil'
    ];
}
