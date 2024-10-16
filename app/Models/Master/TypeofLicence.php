<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeofLicence extends Model
{
    use HasFactory;
    protected $table="type_of_licences";
    protected $fillable = ['type_of_licence','licence_no'];
}
