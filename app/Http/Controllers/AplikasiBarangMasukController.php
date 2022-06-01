<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplyer;
use Milon\Barcode\DNS1D;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AplikasiBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::pluck('nama','id')->all();
        $supplyer = Supplyer::pluck('nama','id')->all();
        $discount = array();
        for($i = 0;$i<=100;$i++){
            array_push($discount,$i);
        }
        return view('dashboard.barang-masuk.index',compact('kategori','supplyer','discount'));
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
            'nama' => 'required',
            'id_supplyer' => 'required',
            'kategori_id'=> 'required',
            'harga_beli_satuan' => 'required',
            'harga_jual_satuan' => 'required' ,
            'stok'=> 'required',
            
        ]);
    
        $input = $request->all();
        
        $image = $request->file('image');
        $image->storeAs('public/image/', 'img-'.$image->hashName());
        $input['img'] = '/image/img-'.$image->hashName();
        $input['discount'] = json_encode($request->discount);
        $input['kategori_id'] = implode("",$request->kategori_id);
        $input['id_supplyer'] = implode("",$request->id_supplyer);
        $id = 1;
        if(Barang::get()->count() != 0 || Barang::get()->count() != null){
            $id = Barang::latest()->first()->id+1;
        }
        $input['kode'] = (int)
        sprintf("%13s",$input['kategori_id']).
        sprintf("%03s",$input['id_supplyer']).
        sprintf("%03s",$id);
        $br = new DNS1D;
        $barcode =$br->getBarcodePNG($input['kode'], 'UPCA');

        Storage::disk('image')->put('barcode-'.str($input['kode']).'.png',base64_decode($br->getBarcodePNG($input['kode'], 'UPCA')));
        
        $input['barcode_img'] = 'image/barcode-'.str($input['kode']).'.png';

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
}
