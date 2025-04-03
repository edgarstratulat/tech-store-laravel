<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Sluggable, Searchable;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'price',
        'manufacturer_id',
        'sale_price',
        'description',
        'reconditioned',
        'category_id',
        'subcategory_id',
        'stock',
        'image_path'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class);
    }
}
