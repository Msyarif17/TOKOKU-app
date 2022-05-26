<?php

namespace App\Http\Controllers;

use Exception;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Browser;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function alertForStock()
    {
        $stock = Barang::where('stok','<=',2)->get();

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
    public function loginInfo()
    {
        setlocale(LC_TIME, 'id_ID');
        $message = 
        "<b>LOGIN INFO</b>\n".
        "=====================\n".
        "Nama : <b>".Auth::user()->name."</b>\n".
        "IP : <b>".request()->ip()."</b>\n".
        "Perangkat : <b>".Browser::deviceFamily()." ".Browser::deviceModel()."</b>\n".
        "OS : <b>".Browser::platformName()."</b>\n".
        "Browser : <b>".Browser::browserFamily()."</b>\n".
        "Waktu : <b>".Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('dddd, D MMM Y , HH:mm:SS')."</b>\n".
        "=====================\n";
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
