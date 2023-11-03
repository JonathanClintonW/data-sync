<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $connection = 'mysql2';

    protected $table = 'account';
    
    protected $fillable = [
        'ciam_uid',
        'channel',
        'identity',
        'firstname',
        'lastname',
        'email',
        'email_verified_at',
        'phone',
        'phone_verified_at',
        'phone_alt',
        'point',
        'gender',
        'dob',
        'city',
        'province',
        'occupation',
        'marital_status',
        'hobby',
        'spending',
        'education',
        'hear_from',
        'newsletter',
        'referrer',
        'last_login',
        'active',
        'banned',
        'banned_reason',
        'profile_completed',
        'isduplicate',
        'bp_id',
        'fb_id',
        'tw_id',
        'ig_id',
        'line_id',
        'ponta_id',
        'source',
        'remember_token',
        'utm_source',
        'utm_campaign',
        'utm_medium',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'wa_verified_at',
        'profile_completed_at',
        'previous_product',
        'id_card_number',
        'interest',
        'store',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',
        'zipcode',
        'current_child_milk_consumed',
        'fav_comm_channel_email',
        'fav_comm_channel_sms',
        'fav_comm_channel_wa',
        'utm_content',
        'previous_product_duration',
        'condition',
        'pregnant_week',
        'still_breast_feed',
    ];
}
