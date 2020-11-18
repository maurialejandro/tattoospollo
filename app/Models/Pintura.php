<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pintura extends Model
{
    use HasFactory;
    protected $table = 'pinturas';

    public function user(){
        return $this->belongsTo('App/User', 'user_id');
    }
}
