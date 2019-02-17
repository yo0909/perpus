<?php
use Illuminate\Support\Facades\Input;
use App\Penuli;
use App\Buku;
use App\Kodebuku;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/penulis','PenulissController@index');
Route::any('/search',function(){
	$q = Input::get ( 'q' );
    $book = Buku::with('penulis','kodebuku')->where('judul','LIKE','%'.$q.'%')->get();
    if(count($book) > 0)
        return view('welcome')->withDetails($book)->withQuery ( $q );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
	Route::resource('penulis', 'PenulisController');
	Route::resource('buku', 'BukusController');
	Route::post('/kembalikan/{id}','RiwayatsController@update1')->name('riwayat.update1');
	Route::resource('kodebuku', 'KodebukusController');
	Route::resource('riwayat', 'RiwayatsController');
	Route::resource('pemustaka', 'PemustakasController');
});

