<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_model extends Model
{
    protected $table = 'vendors';
    protected $primaryKey = 'id_vendor';
    protected $fillable = [
        'vendor_name',
        'address',
        'phone',
        'email',
        'type',
    ];
}
