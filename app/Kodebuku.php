<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodebuku extends Model
{
     protected $fillable =['buku_id', 'kodebuku'];
    public function buku()
    {
    	return $this->belongsTo('App\Buku');
    }
    public function riwayat()
    {
    	return $this->hasMany('App\Riwayat');
    }
}
