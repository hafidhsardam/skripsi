<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
