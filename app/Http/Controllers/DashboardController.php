<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Supplyer;
use Illuminate\Http\Request;
use App\Models\RiwayatPenjualan;
use Illuminate\Support\Facades\Artisan;
use Telegram\Bot\Laravel\Facades\Telegram;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
        $barang = Barang::all()->count();

        $asset = Barang::all()->sum(function($t){ 
            return $t->stok * $t->harga_jual_satuan; 
        });
        

        $byDate = RiwayatPenjualan::whereDate('created_at', date('Y-m-d'));
        // dd($byDate);

        $harian = [
            'barang' => $byDate->sum('jumlah_barang'),
            'pendapatan' => $byDate->sum('laba')
        ];

        $byMonth = RiwayatPenjualan::whereMonth('created_at', date('m'));
        
        $bulanan = [
            'barang' => $byMonth->sum('jumlah_barang'),
            'pendapatan' => $byMonth->sum('laba')
        ];

        $supplyer = Supplyer::all()->count();
        
        $admin = User::all()->count();
        
        $stock = Barang::where('stok','<=',2)->get();
        
        
        $message = '';
        
        if($stock != null){

            
            
            $message = '';
            foreach($stock as $s){
                $message = $message.'Stok Barang <strong>'.$s->nama.'</strong> menipis,hanya tersisa <strong>'.$s->stok.'</strong>.segera lakukan pengisian ulang.<br>';
            }
            return view('dashboard.index',compact(
                'barang','asset',
                'harian','bulanan',
                'supplyer','admin','message'
            ));
            
        }
        return view('dashboard.index',compact(
            'barang','asset',
            'harian','bulanan',
            'supplyer','admin','message'
        ));
        
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
        //
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
    public function telegram(){
        Artisan::call('schedule:work');
        return redirect()->route('admin.index')
                        ->with('success','Notifikasi Stok via Telegram Baerhasil Diaktifkan');
    }
}
