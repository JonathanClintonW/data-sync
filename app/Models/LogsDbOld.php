<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogsDbOld extends Model
{
    protected $table = 'logs_db_old';

    protected $fillable = [
        'user_id',
        'updated_at'
    ];
}
