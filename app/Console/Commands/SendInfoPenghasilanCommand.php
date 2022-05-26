<?php

namespace App\Console\Commands;

use Exception;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\RiwayatPenjualan;
use Telegram\Bot\Laravel\Facades\Telegram;

class SendInfoPenghasilanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:penghasilan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $byDate = RiwayatPenjualan::whereDate('created_at', date('Y-m-d'));
        

        $byMonth = RiwayatPenjualan::whereMonth('created_at', date('m'));
        
        
        setlocale(LC_TIME, 'id_ID');
        
        $info = "<b>INFO PENDAPATAN</b>\n";
        $message = 
            "=====================\n".
            Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('dddd, D MMM Y , HH:mm:SS').
            "=====================\n".
            "<b>HARIAN<b>\n".
            "Jumlah Barang : <b>".$byDate->sum('jumlah_barang')."</b>\n".
            "Pendapatan : <b>".$byDate->sum('laba')."</b>\n".
            "=====================\n".
            "<b>BULANAN<b>\n".
            "Jumlah Barang : <b>".$byMonth->sum('jumlah_barang')."</b>\n".
            "Pendapatan : <b>".$byMonth->sum('laba')."</b>\n".
            "segera lakukan pengisian ulang.\n";
        
        $message = $info.$message;
        try {
            $activity = Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001713195471'),
                'parse_mode' => 'HTML',
                'text' => $message
            ]);
        }
        catch(Exception $e){
            return [false, $e];
        }
        return [true,"Berhasil Kirim Ke telegram"];
    }
}
