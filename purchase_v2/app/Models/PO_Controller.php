<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PO_Controller extends Model
{
    // use HasFactory;
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id_po';
    public $incrementing = false;
    protected $fillable = ['id_po', 'id_purchase', 'status', 'document'];

    public static function get_idmax(){
        $query = DB::table('purchase_orders')->select(DB::raw("MAX(REGEXP_SUBSTR(id_po,'[0-9]+')) as id_po"))->get();
        return $query;
    }

    public static function get_newid($auto_id,$prefix){
        $newId = substr($auto_id, 1,4);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1){
            $id_po = $prefix."000" .$tambah;
        }
        else if (strlen($tambah) == 2){
            $id_po = $prefix."00" .$tambah;
        }
        else if(strlen($tambah) == 3){
            $id_po = $prefix."0".$tambah;   
        }
        else if(strlen($tambah) == 4){
            $id_po = $prefix.$tambah;   
        }
        return $id_po;
    }
}
