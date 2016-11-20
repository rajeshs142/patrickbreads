<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nav';
    
    public function parent() {

        return $this->hasOne('App\Nav', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Nav', 'parent_id', 'id');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 3, 'children')))
                    ->where('parent_id', '=', NULL)
                    ->orderBy('nav.order', 'asc')
                    ->get();

    }
    
}