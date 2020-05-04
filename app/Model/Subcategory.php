<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function Category(){
        return $this->hasOne('App\Model\category','id','category_id');
    }
}
