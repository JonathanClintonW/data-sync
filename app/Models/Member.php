<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    protected $connection = 'mysql';

    protected $table = 'member';

    protected $fillable = [
        'CustName',
        'PhoneNumber1',
        'PhoneNumber2',
        'PhoneNumber3',
        'Address',
        'Address2',
        'Address3',
        'City',
        'ZipCode',
        'Email',
        'FK_MEMBER_ID',
        'MemberID',
        '_ContactID',
        'CreatedBy',
        'CreatedOn',
        'UpdatedBy',
        'UpdatedOn',
        'OptimisticLockField',
        'GCRecord',
        'PrefReward1',
        'PrefReward2',
        'IsMemberPC',
        'IsWillingToPC',
        'CLIsCust',
        'CLNewChild',
        'iCity',
        'iProvince',
        'SpouseName',
        'BestTimeToCall',
        'MemBekerja',
        'CustBirthDate',
        'JenisKelamin',
        'RefCode',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'ciam_uuid',
    ];
}