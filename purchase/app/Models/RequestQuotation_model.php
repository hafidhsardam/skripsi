<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RequestQuotation_model extends Model
{
    use HasFactory;
    protected $table = 'request_quotations';
    public $incrementing = false;
    protected $primaryKey = 'id_quotation';
    protected $fillable = ['id_quotation','id_purchase','status'];

    public static function get_idmax(){
        $query = DB::table('request_quotations')->select(DB::raw("MAX(REGEXP_SUBSTR(id_quotation,'[0-9]+')) as id_quotation"))->get();
        return $query;
    }

    public static function get_newid($auto_id,$prefix){
        $newId = substr($auto_id, 1,4);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1){
            $id_quotation = $prefix."000" .$tambah;
        }
        else if (strlen($tambah) == 2){
            $id_quotation = $prefix."00" .$tambah;
        }
        else if(strlen($tambah) == 3){
            $id_quotation = $prefix."0".$tambah;   
        }
        else if(strlen($tambah) == 4){
            $id_quotation = $prefix.$tambah;   
        }
        return $id_quotation;
    }
}
