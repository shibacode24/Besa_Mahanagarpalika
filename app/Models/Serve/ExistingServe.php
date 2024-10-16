<?php

namespace App\Models\Serve;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistingServe extends Model
{
    use HasFactory;
    protected $table="existing_serves";
    protected $fillable = [
    'user_id',
    'survey_app_no',
    'photo',
    'establishment',
    'establishment1',
    'bussiness_owner',
    'bussiness_owner1',
    'contact_person',
    'contact_person1',
    'shop_house_no',
    'shop_house_no1',
    'bulding',
    'bulding1',
    'street_name',
    'street_name1',
    'locality',
    'locality1',
    'prabhag_name',
    'prabhag_name1',
    'zone_no',
    'zone_no1',
    'pincode',
    'pincode1',
    'email',
    'email1',
    'wht_app_no',
    'wht_app_no1',
    'gst_no',
    'gst_no,1',
    'year',
    // 'nature_of_bussiness',
    // 'nature_of_bussiness1',
    'type_of_bussiness_id',
    'type_of_bussiness_id1',
    'type_of_licence_id',
    'type_of_licence_id1',
    'no_of_employee_working',
    'no_of_employee_working1',
    'area_of_bussiness',
    'area_of_bussiness1',
    'licence_name',
    'licence_no',
    'ac_room',
    'ac_room1',
    'non_ac_room',
    'non_ac_room1',
    'payment_mode',
    'date',
    'paid_unpaid',
    'status',
    'bussiness_name',
    'bussiness_name1',
    'receipt_no',
    'bussiness_type_id',
    'bussiness_type_id1',
    'longitude',
    'latitude',
    'certificate_year',
    'pay_amount' ,
    'expiry_date'
];
}
