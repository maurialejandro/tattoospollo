<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
    use HasFactory;
    protected $table = 'tattos';

    //relacion one to many 
    /* public function tattos(){
        return $this->hasMany('App/Tatto');     //todos los tattos de un id en especifico
    }*/
    //leacion uno a uno 
    public function user(){
        return $this->belongsTo('App/User','user_id');
    }

}
