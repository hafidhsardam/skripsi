<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurchaseRequest_Model extends Model
{
    protected $table = 'purchase_reqs';
    protected $primaryKey = 'id_purchase';
    public $incrementing = false;
    protected $fillable = ['id_purchase','vendor_id','notes'];
    
    public static function get_idmax(){
        $query = DB::table('purchase_reqs')->select(DB::raw("MAX(REGEXP_SUBSTR(id_purchase,'[0-9]+')) as id_purchase"))->get();
        return $query;
    }

    public static function get_newid($auto_id,$prefix){
        $newId = substr($auto_id, 1,4);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1){
            $id_purchase = $prefix."000" .$tambah;
        }
        else if (strlen($tambah) == 2){
            $id_purchase = $prefix."00" .$tambah;
        }
        else if(strlen($tambah) == 3){
            $id_purchase = $prefix."0".$tambah;   
        }
        else if(strlen($tambah) == 4){
            $id_purchase = $prefix.$tambah;   
        }
        return $id_purchase;
    }
}
