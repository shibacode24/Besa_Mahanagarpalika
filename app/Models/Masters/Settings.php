<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table="settings";
    protected $fillable = ['documentation','field_vist','assistant_valuer','report_prepareation','technical_head','Bank'];
}

