<?php

namespace App\Models\TechnicalManager;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technical_Manager extends Model
{
    use HasFactory;
    protected $table = "technical_manager";
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
