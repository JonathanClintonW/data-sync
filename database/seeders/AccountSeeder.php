<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 70,
                'ciam_uid' => '0',
                'channel' => 'web',
                'identity' => 'RAHMAHRA1079',
                'firstname' => 'Rahmah',
                'lastname' => 'Yanti',
                'email' => 'rahmah_yanti@yahoo.com',
                'phone' => '6281584446886',
                'phone_verified_at' => '2021-07-12 14:09:41.706667',
                'phone_alt' => NULL,
                'point' => 0,
                'gender' => 'f',
                'dob' => '1982-03-08',
                'city' => 'Kota Tangerang',
                'province' => NULL,
                'occupation' => 'Pegawai Perusahaan Swasta',
                'marital_status' => 'Menikah',
                'hobby' => NULL, // Add other fields here
                'spending' => NULL,
                'education' => 'Pasca Sarjana',
                'hear_from' => NULL,
                'newsletter' => 1,
                'referrer' => 0,
                'last_login' => '2018-11-28 08:29:00.000',
                'active' => 1,
                'banned' => 0,
                'banned_reason' => NULL,
                'profile_completed' => 1,
                'isduplicate' => 0,
                'bp_id' => NULL,
                'fb_id' => NULL,
                'tw_id' => NULL,
                'ig_id' => NULL,
                'line_id' => NULL,
                'ponta_id' => NULL,
                'source' => NULL,
                'remember_token' => NULL,
                'utm_source' => NULL,
                'utm_campaign' => NULL,
                'utm_medium' => NULL,
                'created_by' => '2015-09-02 17:46:21.000',
                'created_at' => '2018-11-28 09:00:23.000',
                'updated_at' => NULL,
                'updated_by' => '2021-10-12 14:09:41.000',
                'wa_verified_at' => '2015-09-02 17:46:21.000',
                'profile_completed_at' => NULL,
                'previous_product' => NULL,
                'id_card_number' => NULL,
                'interest' => NULL,
                'store' => NULL,
                'provinsi_id' => NULL,
                'kabupaten_id' => NULL,
                'kecamatan_id' => NULL,
                'kelurahan_id' => NULL,
                'zipcode' => NULL,
                'current_child_milk_consumed' => NULL,
                'fav_comm_channel_email' => NULL,
                'fav_comm_channel_sms' => NULL,
                'fav_comm_channel_wa' => NULL,
                'utm_content' => NULL,
                'previous_product_duration' => NULL,
                'condition' => NULL,
                'pregnant_week' => NULL,
                'still_breast_feed' => NULL,
            ],

        ];

        DB::connection('database2')->table('account')->insert($data);
    }
}
