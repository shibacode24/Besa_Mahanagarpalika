<?php

namespace App\Models\Serve;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{
    use HasFactory;
    protected $table="grid";
    protected $fillable = [
    'user_id',
    'grid_no',
    'photo',
    'establishment_name',
    'zone_id', 
    'longitude', 
    'latitude', 
    ];
}
