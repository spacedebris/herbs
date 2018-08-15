<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Herb extends Model
{


    public $fillable = ['name','from','to','destination','purpose','financing','advances','description'];

    public function users(){
    	return $this->belongsToMany('App\Herb');
    }
}