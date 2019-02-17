<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\User;
use App\Http\Requests\StorePemustakasRequest;
use App\Http\Requests\UpdatePemustakasRequest;
use App\Role;

class PemustakasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $pemustaka = User::all();
        return Datatables::of($pemustaka)
            ->addColumn('action',function($user){
                return view('Datatable._action', [
                    'model'             =>$user,
                    'form_url'          =>route('pemustaka.destroy', $user->id),
                    'edit_url'          =>route('pemustaka.edit', $user->id),
                    'show_url'          =>route('pemustaka.show', $user->id),
                    'confirm_message'   =>'yakin ingin menghapus', $user->name . '?' ,

                ]);
            })->make(true);
      }
      $html = $htmlBuilder
        ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Name'])
        ->addColumn(['data' => 'email', 'email'=>'email', 'title'=>'Email'])
         ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'serachable'=>false]);

       return view('pemustaka.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('pemustaka.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemustakasRequest $request)
    {
        $password = "rahasia";
        $data = $request->all();
        $data['password'] = bcrypt($password);

        $pemustaka = User::create($data);

        $pemustakaRole = Role::where('name','member')->first();
        $pemustaka->attachRole($pemustakaRole);

        Session::flash ("flash_notification",[
            "level"=>"success",
            "message"=>"berhasil menyimpan $pemustaka->name"
        ]);
        return redirect()->route('pemustaka.index');
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
        $pemustaka = User::find($id);
        return view('pemustaka.edit')->with(compact('pemustaka'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemustakasRequest $request, $id)
    {
        $pemustaka = User::find($id);
        $pemustaka->update($request->only('name'));
        Session::flash('flash_notification',[
            "level"=>"success",
             "message"=>"Berhasil menyimpan $pemustaka->name"
        ]);
        return redirect()->route('pemustaka.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        if(!Pemustaka::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Penulis berhasil dihapus"
            ]);
        return redirect()->route('pemustaka.index');
    }
}
