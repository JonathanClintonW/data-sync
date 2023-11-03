<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\LogDbOld;

class SyncMemberData extends Command
{
    // Asse01 to Asse02 Sync
    protected $signature = 'sync:memberdata';

    protected $description = 'Sync data from account to member';

    public function handle()
    {
        $newConnection = 'mysql2';
        $chunkSize = env('SYNC_CHUNK_SIZE', 100);

        $mysql2Data = DB::connection($newConnection)
        ->table('account')
        ->orderBy('id')
        ->chunk($chunkSize, function ($accountRecords) {
            foreach ($accountRecords as $record) {

                $accountTimestamp = $record->updated_at;
                $oldConnection = 'mysql';
                
                $logTimestamp = DB::connection($oldConnection)
                    ->table('logs_db_new')
                    ->where('user_id', $record->id)
                    ->value('updated_at');
    
                $custName = $record->firstname;
                if (!empty($record->lastname)) {
                    $custName .= ' ' . trim($record->lastname);
                }
    
                if ($logTimestamp === null || $accountTimestamp > $logTimestamp) {
                    $existingRecord = Member::find($record->id);
    
                    if ($existingRecord) {
                        $existingRecord->CustName = $custName;
                        $existingRecord->PhoneNumber1 = $record->phone;
                        $existingRecord->Email = $record->email;
    
                        $existingRecord->UpdatedOn = $accountTimestamp;
    
                        $existingRecord->save();
    
                        DB::connection($oldConnection)
                            ->table('logs_db_new')
                            ->where('user_id', $record->id)
                            ->update(['updated_at' => $accountTimestamp]);
    
                    } else {
                        DB::connection($oldConnection)->table('member')->insert([
                            'id' => $record->id,            
                            'CustName' => $custName,
                            'PhoneNumber1' => $record->phone, 
                            'PhoneNumber2' => null,
                            'PhoneNumber3' => null,
                            'Address' => null,
                            'Address2' => null,
                            'Address3' => null,
                            'City' => null,
                            'ZipCode' => null,
                            'Email' => $record->email,
                            'FK_MEMBER_ID' => null,
                            'MemberID' => null,
                            '_ContactID' => null,
                            'CreatedBy' => null,
                            'CreatedOn' => null,
                            'UpdatedBy' => null,
                            'UpdatedOn' => $accountTimestamp,
                            'OptimisticLockField' => null,
                            'GCRecord' => null,
                            'PrefReward1' => null,
                            'PrefReward2' => null,
                            'IsMemberPC' => null,
                            'IsWillingToPC' => null,
                            'CLIsCust' => null,
                            'CLNewChild' => null,
                            'iCity' => null,
                            'iProvince' => null,
                            'SpouseName' => null,
                            'BestTimeToCall' => null,
                            'MemBekerja' => null,
                            'CustBirthDate' => null,
                            'JenisKelamin' => null,
                            'RefCode' => null,
                            'utm_source' => null,
                            'utm_medium' => null,
                            'utm_campaign' => null,
                            'utm_content' => null,
                            'ciam_uuid' => null,
                        ]);
    
                        DB::connection($oldConnection)
                            ->table('logs_db_new')
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
