<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $table="zone";
    protected $fillable = [
        'zone',
        'zone1',
        'zone_name',
    ];
}
