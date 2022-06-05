<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use App\Models\Supplyer;
use Illuminate\Http\Request;
use App\Models\RiwayatPenjualan;
use Illuminate\Support\Facades\DB;
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
        $expire = Barang::
        whereDate('kadaluarsa','<',date('Y-m-d'))->get();
        
        $message = array();
        if($stock != null){
            foreach($stock as $s){
                array_push($message,'Stok Barang <strong>'.$s->nama.'</strong> menipis,hanya tersisa <strong>'.$s->stok.'</strong>.segera lakukan pengisian ulang.<br>');
            }
            
        }
        if($expire!= null){
            foreach($expire as $s){
                array_push($message,'Barang <strong>'.$s->nama.'</strong> akan segera kadaluarsa, akan kadaluarsa pada <strong>'.$s->kadaluarsa.'</strong>.<br>SEGERA CEK BARANG TERSEBUT.<br>');
            }
        }


        $chart = [
            'label'=> array($this->getDayName(),$this->getWeek(),$this->getMonth()),
            'data' => array($this->penghasilan(1),$this->penghasilan(2),$this->penghasilan(3))
        ];

        return view('dashboard.index',compact(
            'barang','asset',
            'harian','bulanan',
            'supplyer','admin','message','chart'
        ));
        
    }

    
    public function telegram(){

        Artisan::call('schedule:work');
        
        return redirect()->route('admin.index')->with('success','Notifikasi Stok via Telegram Baerhasil Diaktifkan');
    }
    private function penghasilan($rentang)
    {
        //harian
        if($rentang == 1){
            return json_encode(array(RiwayatPenjualan::whereDate('created_at', date('Y-m-d'))->sum('laba')));
        }
        // mingguang
        if($rentang == 2){
            return json_encode(array(RiwayatPenjualan::whereBetween(
                'created_at', [
                Carbon::now()->setTimezone('Asia/Jakarta')->startOfWeek(), 
                Carbon::now()->setTimezone('Asia/Jakarta')->endOfWeek()
                ]
            )->sum('laba')));
        }
        // bulanan 
        if($rentang == 3){
            $b = RiwayatPenjualan::whereYear('created_at', now()->year)
            ->selectRaw("SUM(laba) as laba,MONTH(created_at) as month, YEAR(created_at) as year")
            ->groupBy('month', 'year')
            ->orderBy('month', 'asc')->get();
            $bu = array();
            foreach($b as $f){
                array_push($bu,$f->laba);
            }
            if($b->count() != 0){
                return json_encode($bu);
            }
            else{
                return json_encode([0]);
            }
        }      
    }
    private function getDayName(){
        $date = [];
        $start = Carbon::now()->subDays(7);
        foreach (range(0, 6) as $day) {
            $date[] = $start->copy()->addDays($day)->setTimezone('Asia/Jakarta')->isoFormat('dddd');
        }
        return json_encode($date);
    }
    private function getWeek(){
        return json_encode(["minggu ke-1","minggu ke-2","minggu ke-3","minggu ke-4"]);
    }

    private function getMonth(){
        if(RiwayatPenjualan::get()->count() != 0){
            $barang = RiwayatPenjualan::orderBy('created_at')->get()->first();
        
            $period = Carbon::parse($barang->created_at)->subMonths(12)->monthsUntil(Carbon::parse($barang->created_at));

            $data = array();
            foreach ($period as $date)
            {
                array_push($data,$date->shortMonthName);
            }
            return json_encode($data);
        }
        else{
            return json_encode([0]);
        }
    }
}
