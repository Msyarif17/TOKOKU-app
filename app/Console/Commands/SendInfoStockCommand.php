<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Barang;
use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\Http\Controllers\TelegramBotController;

class SendInfoStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:stok';

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
        $stock = Barang::where('stok','<=',2)->get();
        if($stock != null){
            $info = "<b>WARNING</b>\n";
            $message = "";

            foreach($stock as $s){
                $message = $message.
                "=====================\n".
                "Nama Barang : <b>".$s->nama."</b>\n".
                "Stok Barang : <b>".$s->stok."</b>\n".
                "segera lakukan pengisian ulang.\n";
            }
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
}
