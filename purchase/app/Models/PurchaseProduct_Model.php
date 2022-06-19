<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct_Model extends Model
{
    protected $table = 'purchase_prods';
    protected $primaryKey = 'id_purchase_prod';
    protected $fillable = ['id_purchase_prod', 'id_purchase', 'id_produk', 'qty', 'price', 'created_at', 'updated_at'];
}
