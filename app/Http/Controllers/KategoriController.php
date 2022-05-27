<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Kategori::query()->withTrashed())
                ->addColumn('nama', function (Kategori $kategori) {
                    return $kategori->name;
                })
                ->addColumn('kode', function (Kategori $kategori) {
                    return $kategori->kode;
                })
                ->addColumn('action', function (Kategori $kategori) {
                    return \view('dashboard.kategori.button_action', compact('kategori'));
                })
                ->addColumn('status', function (Kategori $kategori) {
                    if ($kategori->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('dashboard.kategori.index');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required',
            
        ]);
    
        $input = $request->all();
        

        $kategori = Kategori::create($input);
        
        
        return redirect()->route('admin.kategori.create')
                        ->with('success','kategori berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $kategori = Kategori::find($id);
        return view('dashboard.kategori.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('dashboard.kategori.edit',compact('kategori'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required',
            
        ]);
    
        $input = $request->all();
    
        $kategori = Kategori::find($id);
        $kategori->update($input);
        
    
        return redirect()->route('admin.kategori.edit',$id)
                        ->with('success','kategori updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('admin.kategori.index')
                        ->with('success','kategori deleted successfully');
    }
    
}
