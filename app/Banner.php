<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    
    public function first() {

        return $this->first('App\Banner');

    }
}
