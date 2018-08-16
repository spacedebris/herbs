<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Herb extends Model
{


    public $fillable = ['name','description','appiliance','notes'];

    public function users(){
    	return $this->belongsToMany('App\Herb');
    }
}