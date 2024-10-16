<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice2 extends Model
{
    use HasFactory;
    protected $table="notice2";
    protected $fillable = ['date'];
}
