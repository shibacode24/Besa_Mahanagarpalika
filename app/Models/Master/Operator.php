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
    protected $casts = [
        'zone_id' => 'array',
    ];

    public function getZoneNamesAttribute()
    {
        // Check if zone_id is an array; if not, return an empty array to prevent errors
        $zoneIds = is_array($this->zone_id) ? $this->zone_id : [];
    
        // Fetch and return zone names if there are valid zone IDs
        return Zone::whereIn('id', $zoneIds)->pluck('zone')->toArray();
    }

    
}
