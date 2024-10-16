<?php

namespace App\Models\Masters;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distric extends Model
{
    use HasFactory;

    protected $table="district";
    protected $filllable=[
        'state_id',
        'District'
    ];
}
