<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
     protected $fillable =['judul', 'penulis_id', 'tahun_terbit','sinopsis'];
    public function penulis()
    {
    	return $this->belongsTo('App\Penuli');
    }
    public function kodebuku()
    {
    	return $this->hasMany('App\Kodebuku');
    }
}
