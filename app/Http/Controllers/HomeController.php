<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kodebuku;
use App\Penuli;
use App\Riwayat;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Riwayat::with('kodebuku')->where('user_id',Auth::user()->id)->where('status','Pinjam')->get();

        return view('home')->with(compact('book'));
    }

}
