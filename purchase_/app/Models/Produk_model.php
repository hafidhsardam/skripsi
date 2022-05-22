<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk_model extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $incrementing = false;
    protected $fillable = ['id_produk', 'nama_produk', 'stok', 'price', 'type'];

    public static function get_idmax(){
        $query = DB::table('produk')->select(DB::raw("MAX(REGEXP_SUBSTR(id_produk,'[0-9]+')) as id_produk"))->get();
        return $query;
    }

    public static function get_newid($auto_id,$prefix){
        $newId = substr($auto_id, 1,4);
        $tambah = (int)$newId + 1;
        if (strlen($tambah) == 1){
            $id_produk = $prefix."000" .$tambah;
        }
        else if (strlen($tambah) == 2){
            $id_produk = $prefix."00" .$tambah;
        }
        else if(strlen($tambah) == 3){
            $id_produk = $prefix."0".$tambah;   
        }
        else if(strlen($tambah) == 4){
            $id_produk = $prefix.$tambah;   
        }
        return $id_produk;
    }
}
