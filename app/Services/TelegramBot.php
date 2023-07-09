<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class TelegramBot extends Model
{
   public function send($id){

        $url = 'https://api.telegram.org/bot5997704029:AAGRvqDV3utH70UYI0ENeA_h3q8pSBNOTj8/sendMessage?chat_id=5585314171&text='.route('client_orders.edit', $id);
        $client = new Client();
        $client->post($url, ['verify' => false]);
   }
}
