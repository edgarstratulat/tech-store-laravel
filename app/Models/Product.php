<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'description',
        'category_id',
        'subcategory_id',
        'stock',
        'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(subCategory::class);
    }
}
