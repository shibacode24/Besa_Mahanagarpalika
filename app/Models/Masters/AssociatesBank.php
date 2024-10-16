<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AssociatesBank extends Authenticatable
{
    use HasFactory;
    use HasFactory,Notifiable;
    protected $guard = 'associatesbanks';
    protected $table="associatesbanks";
    protected $fillable = ['bankname','contactperson','mobile','email','bankaddress','bankbranch','gst_no','city','state','pincode','userid','password'];

}
