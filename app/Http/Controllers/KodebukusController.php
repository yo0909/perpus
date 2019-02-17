<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\Kodebuku;
use App\Http\Requests\StoreKodebukusRequest;
use App\Http\Requests\UpdateKodebukusRequest;

class KodebukusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
        $kodebuku = Kodebuku::with('buku');
        return Datatables::of($kodebuku)
            ->addColumn('action',function($Kodebuku){
                return view('Datatable._action', [
                    'model'             =>$Kodebuku,
                    'form_url'          =>route('kodebuku.destroy', $Kodebuku->id),
                    'edit_url'          =>route('kodebuku.edit', $Kodebuku->id),
                    'show_url'          =>route('kodebuku.show', $Kodebuku->id),
                    'confirm_message'   =>'yakin ingin menghapus', $Kodebuku->name . '?' ,

                ]);
            })->make(true);
      }
      $html = $htmlBuilder
        ->addColumn(['data' => 'kodebuku', 'kodebuku'=>'kodebuku', 'title'=>'Kode Buku'])
        ->addColumn(['data' => 'buku.judul', 'buku_id'=>'buku.judul', 'title'=>'Judul Buku'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'serachable'=>false]);

       return view('kodebuku.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kodebuku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreKodebukusRequest $request)
    {   
        $kodebuku = Kodebuku::create($request->all());
        Session::flash ("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $kodebuku->judul"
        ]);
        return redirect()->route('kodebuku.index');
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
        $kodebuku = Kodebuku::find($id);
        return view('kodebuku.edit')->with(compact('kodebuku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKodebukusRequest $request, $id)
    {
        $kodebuku = Kodebuku::find($id);
        $kodebuku->update($request->all());
        Session::flash('flash_notification',[
            "level"=>"success",
             "message"=>"Berhasil menyimpan $kodebuku->kode buku"
        ]);
        return redirect()->route('kodebuku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Kodebuku::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis berhasil dihapus"
            ]);
        return redirect()->route('kodebuku.index');
    }
}
