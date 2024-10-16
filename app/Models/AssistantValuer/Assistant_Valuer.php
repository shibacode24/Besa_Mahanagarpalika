<?php

namespace App\Models\AssistantValuer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant_Valuer extends Model
{
    use HasFactory;
    protected $table = "assistant_valuer";
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

    // public function status(){
    
    //     $result = DB::table('new_status')->where('valuation_id',$this->valuation_id)->first();
    //     return $result->status; 
    //  }
}
