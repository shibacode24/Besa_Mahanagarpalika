<?php


namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    use HasFactory;
    protected $table="corporations";
    protected $fillable = ['name','address','state','city','pincode','email','mobile','logo','header'];
}
