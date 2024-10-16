<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_status extends Model
{
    use HasFactory;

    protected $table="new_status";
    protected $fillable = ['status','role_id'];
}
