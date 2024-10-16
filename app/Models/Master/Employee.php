<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $fillable = [
    'name',
    'email',
    'mobile',
    'address',
    'state',
    'city',
    'pincode',
    'adhar',
    'pan',
    'username',
    'password'
];

}
