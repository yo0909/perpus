<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\Penuli;
use App\Http\Requests\StorePenulisRequest;
use App\Http\Requests\UpdatePenulisRequest;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $penulis = Penuli::select(['id','nama']);
        return Datatables::of($penulis)
            ->addColumn('action',function($penuli){
                return view('Datatable._action', [
                    'model'             =>$penuli,
                    'form_url'          =>route('penulis.destroy', $penuli->id),
                    'edit_url'          =>route('penulis.edit', $penuli->id),
                    'show_url'          =>route('penulis.show', $penuli->id),
                    'confirm_message'   =>'yakin ingin menghapus', $penuli->name . '?' ,

                ]);
            })->make(true);
      }
      $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'nama'=>'nama', 'title'=>'Nama'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'serachable'=>false]);

       return view('penulis.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('penulis.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenulisRequest $request)
    {
        $penulis = Penuli::create($request->all());
        Session::flash ("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $penulis->nama"
        ]);
        return redirect()->route('penulis.index');
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
        $penulis = Penuli::find($id);
        return view('penulis.edit')->with(compact('penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenulisRequest $request, $id)
    {
        $penulis = Penuli::find($id);
        $penulis->update($request->only('nama'));
        Session::flash('flash_notification',[
            "level"=>"success",
             "message"=>"Berhasil menyimpan $penulis->nama"
        ]);
        return redirect()->route('penulis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        if(!Penuli::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis berhasil dihapus"
            ]);
        return redirect()->route('penulis.index');
    }
}
