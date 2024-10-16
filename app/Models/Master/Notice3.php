<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice3 extends Model
{
    use HasFactory;
    protected $table="notice3";
    protected $fillable = ['date'];
}
