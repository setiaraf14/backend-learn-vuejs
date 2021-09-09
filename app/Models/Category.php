<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'image'
    ];

    public function getImageAtrribute($image)
    {
        return asset('storage/categories/'.$image);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
