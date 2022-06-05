<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AplikasiPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::pluck('nama','id')->all();
        $barang = Barang::pluck('nama','id')->all();
        return view('dashboard.penjualan.index',compact('kategori','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'barang_id',
            'jumlah_barang',
            'is_discount'
            
        ]);
    
        $input = $request->all();
        
        

        $barang = Barang::create($input);
        
        
        return redirect()->route('admin.aplikasi-barang-masuk.index')
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getDetail($id){
        $getBarang = Barang::where('kategori_id',$id)->get();
        Log::info($getBarang);
        return response()->json(['data' => $getBarang]);
    }
    public function getDiscount($id){
        $getDiscount = Barang::where('id',$id)->first();
        $tmp = array();
        foreach(json_decode( $getDiscount->discount) as $d){
            array_push($tmp,implode("+",$d));
        }
        
        $getDiscount->discount =implode("+",$tmp);
        
        return response()->json(['data' => $getDiscount]);

    }
    public function datalist($kode){
        $datalist = Barang::where('kode',$kode)->first();
        $tmp = array();
        foreach(json_decode( $datalist->discount) as $d){
            array_push($tmp,implode("+",$d));
        }
        
        $datalist->discount =implode("+",$tmp);
        return response()->json(['data' => $datalist]);
    }
}
