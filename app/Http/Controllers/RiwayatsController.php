<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\Riwayat;
use App\User;
use App\Kodebuku;
use App\Http\Requests\StoreRiwayatsRequest;
use App\Http\Requests\UpdateRiwayatsRequest;

class RiwayatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
        $riwayat = Riwayat::with('user','kodebuku');
        return Datatables::of($riwayat)
            ->addColumn('action',function($riwayat){
                return view('Datatable._action1', [
                    'model'             =>$riwayat,
                    'form_url'          =>route('riwayat.destroy', $riwayat->id),
                    'confirm_message'   =>'yakin ingin mengembalikan', $riwayat->name . '?' ,

                ]);
            })->make(true);
      }
      $html = $htmlBuilder
        ->addColumn(['data' => 'kodebuku.kodebuku', 'kodebuku_id'=>'kodebuku.kodebuku', 'title'=>'Kode buku'])
        ->addColumn(['data' => 'created_at', 'created_at'=>'created_at', 'title'=>'Tanggal peminjaman'])
        ->addColumn(['data' => 'lamapeminjaman', 'lamapeminjaman'=>'lamapeminjaman', 'title'=>'Lama Peminjaman'])
        ->addColumn(['data' => 'denda', 'denda'=>'denda', 'title'=>'Denda'])
        ->addColumn(['data' => 'status', 'status'=>'status', 'title'=>'Status'])
        ->addColumn(['data' => 'user.name', 'user_id'=>'user.name', 'title'=>'User'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'serachable'=>false]);

       return view('riwayat.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('riwayat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreRiwayatsRequest $request)
    {   

        $riwayat = Riwayat::create($request->all());
        Session::flash ("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $riwayat->id"
        ]);
        return redirect()->route('riwayat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayat = Riwayat::find($id);
        return view('riwayat.edit')->with(compact('riwayat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        $riwayat = Riwayat::find($id);
        $riwayat->denda = $riwayat->den;
        $riwayat->status = 'Dikembalikan';
        $riwayat->save();

        Session::flash('flash_notification',[
            "level"=>"success",
             "message"=>"Berhasil menyimpan $riwayat->kode buku"
        ]);
        return redirect()->route('riwayat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = riwayat::find($id);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis berhasil dihapus"
            ]);
         return view('riwayat.edit1')->with(compact('riwayat'));
    }
}
