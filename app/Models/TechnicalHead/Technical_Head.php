<?php

namespace App\Models\TechnicalHead;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical_Head extends Model
{
    use HasFactory;
    protected $table = "technical_head";
    protected $fillable= [
       
        'valuation_id',
        'status',
        'file',
        'file_name',
        'reason'
    ];

    protected $casts = [
        'file_name' => 'array',
        'file' => 'array',
    ];
}
