<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogsDbNew extends Model
{
    protected $table = 'logs_db_New';

    protected $fillable = [
        'user_id',
        'updated_at'
    ];
}
