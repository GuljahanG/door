<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    protected $table = 'attribute_values';
    protected $fillable = ['title', 'color','color_code','image','price','attribute_id'];

    public function attribute(): BelongsTo{
        return $this->belongsTo(Attribute::class);
    }
}
