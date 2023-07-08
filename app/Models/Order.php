<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['total', 'code','pdf_link'];

    public function order_attributes(){
        return $this->hasMany(OrderAttribute::class);
    }
}
