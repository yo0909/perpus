<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Riwayat extends Model
{
     protected $fillable =['kodebuku_id', 'status', 'denda','created_at','lamapeminjaman','user_id'];
    public function kodebuku()
    {
    	return $this->belongsTo('App\Kodebuku');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getDueAttribute()
    {
    return $this->created_at->addDays($this->lamapeminjaman);
    }
    public function getDenAttribute()
    {
    $jatuh = $this->created_at->addDays($this->lamapeminjaman);
    $sekarang = Carbon::now();
    if ($jatuh>=$sekarang){
        $den = "Tidak ada denda";
    }else{
        $hari = $sekarang->day - $jatuh->day;
        $den = $hari*100; 
    }
    return $den;
    }
}
