<?php


namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessType extends Model
{
    use HasFactory;
    protected $table="bussiness_types";
    protected $fillable = [
        'bussiness_type',
        'bussiness_type1',
        'charges'
    ];
}
