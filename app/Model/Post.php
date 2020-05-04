<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Subcategory(){
        return $this->hasOne('App\Model\subcategory','id','sucategory_id');
    }
}
