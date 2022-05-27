<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplyer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    public function index(Datatables $datatables, Request $request)
    {
        if ($request->ajax()) {
            return $datatables->of(Barang::query()->withTrashed())
                ->addColumn('name', function (Barang $barang) {
                    return $barang->name;
                })
                ->addColumn('hargaEcer', function (Barang $barang) {
                    return $barang->harga_beli_satuan;
                })
                ->addColumn('hargaBeli', function (Barang $barang) {
                    return $barang->harga_jual_satuan;
                })
                ->addColumn('kadaluarsa', function (Barang $barang) {
                    return $barang->kadaluarsa == null ? '-':$barang->kadaluarsa;
                })
                ->addColumn('stok', function (Barang $barang) {
                    return \view('dashboard.barang.button_stok_action', compact('barang'));
                })
                ->addColumn('action', function (Barang $barang) {

                    return \view('dashboard.barang.button_action', compact('barang'));
                })
                ->addColumn('status', function (Barang $barang) {
                    if ($barang->deleted_at) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } else {
            return view('dashboard.barang.index');

        }
    }
    // public function index(Request $request)
    // {
    //     $data = Barang::orderBy('id','DESC')->paginate(5);
    //     return view('dashboard.barang.index',compact('data'))
    //         ->with('i', ($request->input('page', 1) - 1) * 5);
    // }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::pluck('nama','id')->all();
        $supplyer = Supplyer::pluck('nama','id')->all();
        $discount = array();
        for($i = 0;$i<=100;$i++){
            array_push($discount,$i);
        }
        return view('dashboard.barang.create',compact('kategori','supplyer','discount'));
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
            'id_supplyer' => 'required',
            'kategori_id'=> 'required',
            'harga_beli_satuan' => 'required',
            'harga_jual_satuan' => 'required' ,
            'stok'=> 'required'
            
        ]);
    
        $input = $request->all();
        $input['discount'] = json_encode(array($request->discount));
        $input['kategori_id'] = implode("",$request->kategori_id);
        $input['id_supplyer'] = implode("",$request->id_supplyer);
        $id = 1;
        if(Barang::get()->count() != 0 || Barang::get()->count() != null){
            $id = Barang::latest()->first()->id;
        }
        $input['kode'] = (int)
        sprintf("%13s",$input['kategori_id']).
        sprintf("%03s",$input['id_supplyer']).
        sprintf("%03s",$id+1);

        $barang = Barang::create($input);
        
        
        return redirect()->route('admin.barang.create')
                        ->with('success','Barang berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $barang = Barang::find($id);
        return view('dashboard.barang.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::pluck('nama','id')->all();
        $supplyer = Supplyer::pluck('nama','id')->all();
        $discount = array();
        for($i = 0;$i<=100;$i++){
            array_push($discount,$i);
        }
        $barang = Barang::find($id);
        return view('dashboard.barang.edit',compact('barang','kategori','supplyer','discount'));
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
            'id_supplyer' => 'required',
            'kategori_id'=> 'required',
            'harga_beli_satuan' => 'required',
            'harga_jual_satuan' => 'required' ,
            'stok'=> 'required'
            
        ]);
    
        $input = $request->all();
        $input['discount'] = json_encode(array($request->discount));
        $input['kategori_id'] = implode("",$request->kategori_id);
        $input['id_supplyer'] = implode("",$request->id_supplyer);
    
        $barang = Barang::find($id);
        $barang->update($input);
        
    
        return redirect()->route('admin.barang.edit',$id)
                        ->with('success','barang updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        return redirect()->route('admin.barang.index')
                        ->with('success','barang deleted successfully');
    }
    public function tambahStok($id){
        $input['stok'] = Barang::find($id)->stok+1;
        Barang::find($id)->update($input);
        return redirect()->route('admin.barang.index');
    }
    public function kurangiStok($id){
        $input['stok'] = Barang::find($id)->stok-1;
        Barang::find($id)->update($input);
        return redirect()->route('admin.barang.index');
    }
}
