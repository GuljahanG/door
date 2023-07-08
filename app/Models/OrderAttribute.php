<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderAttribute extends Model
{
    use HasFactory;
    protected $table = 'order_attributes';
    protected $fillable = ['order_id', 'attribute_id','attribute_value_id'];

    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }
    public function attribute(): BelongsTo{
        return $this->belongsTo(Attribute::class);
    }
    public function attribute_value(): BelongsTo{
        return $this->belongsTo(AttributeValue::class);
    }
}
