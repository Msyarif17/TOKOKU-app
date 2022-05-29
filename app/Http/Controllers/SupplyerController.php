<?php

namespace App\Http\Controllers;

use App\Models\Supplyer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SupplyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Supplyer::query()->withTrashed())
                ->addColumn('nama', function (Supplyer $supplyer) {
                    return $supplyer->nama;
                })
                ->addColumn('alamat', function (Supplyer $supplyer) {
                    return $supplyer->alamat;
                })
                ->addColumn('nomor_telepon', function (Supplyer $supplyer) {
                    return $supplyer->nomor_telepon;
                })
                ->addColumn('action', function (Supplyer $supplyer) {
                    return \view('dashboard.supplyer.button_action', compact('supplyer'));
                })
                ->addColumn('status', function (Supplyer $supplyer) {
                    if ($supplyer->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('dashboard.supplyer.index');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.supplyer.create');
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
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            
        ]);
    
        $input = $request->all();
        $supplyer = Supplyer::create($input);
        
        
        return redirect()->route('admin.supplyer.create')
                        ->with('success','supplyer berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $supplyer = Supplyer::find($id);
        return view('dashboard.supplyer.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplyer = Supplyer::find($id);
        return view('dashboard.supplyer.edit',compact('supplyer'));
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
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            
        ]);
    
        $input = $request->all();
    
        $supplyer = Supplyer::find($id);
        $supplyer->update($input);
        
    
        return redirect()->route('admin.supplyer.edit',$id)
                        ->with('success','supplyer updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplyer::find($id)->delete();
        return redirect()->route('admin.supplyer.index')
                        ->with('success','supplyer deleted successfully');
    }
}
