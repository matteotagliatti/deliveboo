<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'user_id',
        'nome',
        'descrizione',
        'ingredienti',
        'prezzo',
        'visibilita'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }
}
