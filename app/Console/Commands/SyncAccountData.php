<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\LogDbNew;

class SyncAccountData extends Command
{
    // Asse02 to Asse01 Sync
    protected $signature = 'sync:accountdata';

    protected $description = 'Sync data from member to account';

    public function handle()
    {

        $chunkSize = env('SYNC_CHUNK_SIZE', 100);

        $mysqlData = DB::connection('mysql')
            ->table('member')
            ->orderBy('id')
            ->chunk($chunkSize, function($accountRecords) {
            foreach ($accountRecords as $record) {

                $accountTimestamp = $record->UpdatedOn;
                $newConnection = 'mysql2';
                $oldConnection = 'mysql';

                $logTimestamp = DB::connection($oldConnection)
                    ->table('logs_db_old')
                    ->where('user_id', $record->id)
                    ->value('updated_at');
    
                $custNameParts = explode(' ', $record->CustName, 2);
                $firstname = $custNameParts[0];
                $lastname = isset($custNameParts[1]) ? $custNameParts[1] : '';
                
                if ($logTimestamp === null || $accountTimestamp > $logTimestamp) {
                    $existingRecord = Account::find($record->id);

                    if($existingRecord) {
                        $existingRecord->firstname = $firstname;
                        $existingRecord->lastname = $lastname;
                        $existingRecord->phone = $record->PhoneNumber1;
                        $existingRecord->email = $record->Email;

                        $existingRecord->updated_at = $accountTimestamp;

                        $existingRecord->save();

                        DB::connection($oldConnection)
                        ->table('logs_db_old')
                        ->updateOrInsert(
                            ['user_id' => $record->id],
                            ['updated_at' => $accountTimestamp]
                        );
                    
                    } else {
                        DB::connection($newConnection)->table('account')->insert([
                            'id' => $record->id,
                            'ciam_uid' => null,
                            'channel' => null,
                            'identity' => null,
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'email' => $record->Email,
                            'email_verified_at' => null,
                            'phone' => $record->PhoneNumber1,
                            'phone_verified_at' => null,
                            'phone_alt' => null,
                            'point' => null,
                            'gender' => null,
                            'dob' => null,
                            'city' => null,
                            'province' => null,
                            'occupation' => null,
                            'marital_status' => null,
                            'hobby' => null,
                            'spending' => null,
                            'education' => null,
                            'hear_from' => null,
                            'newsletter' => null,
                            'referrer' => null,
                            'last_login' => null,
                            'active' => null,
                            'banned' => null,
                            'banned_reason' => null,
                            'profile_completed' => null,
                            'isduplicate' => null,
                            'bp_id' => null,
                            'fb_id' => null,
                            'tw_id' => null,
                            'ig_id' => null,
                            'line_id' => null,
                            'ponta_id' => null,
                            'source' => null,
                            'remember_token' => null,
                            'utm_source' => null,
                            'utm_campaign' => null,
                            'utm_medium' => null,
                            'created_by' => null,
                            'created_at' => null,
                            'updated_at' => $accountTimestamp,
                            'updated_by' => null,
                            'wa_verified_at' => null,
                            'profile_complited_at' => null,
                            'previous_product' => null,
                            'id_card_number' => null,
                            'interest' => null,
                            'store' => null,
                            'provinsi_id' => null,
                            'kabupaten_id' => null,
                            'kecamatan_id' => null,
                            'kelurahan_id' => null,
                            'zipcode' => null,
                            'current_child_milk_consumed' => null,
                            'fav_comm_channel_email' => null,
                            'fav_comm_channel_sms' => null,
                            'fav_comm_channel_wa' => null,
                            'utm_content' => null,
                            'previous_product_duration' => null,
                            'condition' => null,
                            'pregnant_week' => null,
                            'still_breast_feed' => null,
                        ]);

                        DB::connection($oldConnection)
                            ->table('logs_db_old')
                            ->updateOrInsert(
                                ['user_id' => $record->id],
                                ['updated_at' => $accountTimestamp]
                            );
                    }
                    $this->info('Processed a chunk of data.');
                }
            }
        });

        $this->info('Data synchronization job dispatched.');        
    }
}
