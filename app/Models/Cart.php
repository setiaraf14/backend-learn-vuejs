<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'costumer_id', 'quantity', 'weight'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }    
}
