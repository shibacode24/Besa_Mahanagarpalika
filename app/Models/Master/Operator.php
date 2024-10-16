<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Operator extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $guard = 'operator';
    protected $table="operator";
    protected $fillable = [
        'name',
        'mobile',
        'zone_id',
        'username',
        'password'

    ];
}
