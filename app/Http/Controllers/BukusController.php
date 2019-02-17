<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\Buku;
use App\Http\Requests\StoreBukusRequest;
use App\Http\Requests\UpdateBukusRequest;

class BukusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
         if ($request->ajax()) {
        $buku = Buku::select(['id','judul','penulis_id','tahun_terbit','sinopsis']);
        return Datatables::of($buku)
            ->addColumn('action',function($Buku){
                return view('Datatable._action', [
                    'model'             =>$Buku,
                    'form_url'          =>route('buku.destroy', $Buku->id),
                    'edit_url'          =>route('buku.edit', $Buku->id),
                    'show_url'          =>route('buku.show', $Buku->id),
                    'confirm_message'   =>'yakin ingin menghapus', $Buku->name . '?' ,

                ]);
            })->make(true);
      }
      $html = $htmlBuilder
        ->addColumn(['data' => 'judul', 'judul'=>'judul', 'title'=>'Judul'])
        ->addColumn(['data' => 'penulis_id', 'penulis_id'=>'penulis_id', 'title'=>'Penulis'])
        ->addColumn(['data' => 'tahun_terbit', 'tahun_terbit'=>'tahun_terbit', 'title'=>'Tahun Terbit'])
        ->addColumn(['data' => 'sinopsis', 'sinopsis'=>'sinopsis', 'title'=>'Sinopsis'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'serachable'=>false]);

       return view('buku.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('buku.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukusRequest $request)
    {   
        $buku = Buku::create($request->all());
        Session::flash ("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $buku->judul"
        ]);
        return redirect()->route('buku.index');
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
        $buku = Buku::find($id);
        return view('buku.edit')->with(compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBukusRequest $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());
        Session::flash('flash_notification',[
            "level"=>"success",
             "message"=>"Berhasil menyimpan $buku->judul"
        ]);
        return redirect()->route('buku.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Buku::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis berhasil dihapus"
            ]);
        return redirect()->route('buku.index');
    }
}