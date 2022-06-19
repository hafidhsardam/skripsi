<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{
    protected $table = 'log_history';
    protected $primaryKey = 'id_log';
    protected $fillable = ['id_log', 'id_data', 'status','id_user', 'created_at','updated_at'];
}
