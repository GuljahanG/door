<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class TelegramBot extends Model
{
   public function send($link){

        $url = 'https://api.telegram.org/bot5997704029:AAGRvqDV3utH70UYI0ENeA_h3q8pSBNOTj8/sendDocument?chat_id=5585314171&document='.config('app.url').'/storage/'.$link;
        $client = new Client();
        $client->post($url, ['verify' => false]);
   }
}
