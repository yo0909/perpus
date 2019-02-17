<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penuli extends Model
{
     protected $fillable =['nama'];
    public function buku()
    {
    	return $this->hasMany('App\Buku');
    }
}
