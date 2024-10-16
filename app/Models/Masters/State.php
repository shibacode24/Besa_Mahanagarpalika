<?php

namespace App\Models\Masters;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table="state";
    protected $filllable=['state'];
}
