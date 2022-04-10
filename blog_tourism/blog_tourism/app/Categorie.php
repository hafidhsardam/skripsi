<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = [];

    public function article()
    {
        return $this->hasOne('App\Article');
    }
}
