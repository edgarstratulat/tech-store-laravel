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
        'included_cooler',
        'bluetooth',
        'wifi',
        'stock',
        'sku',
        'image_path',
        'ram_id',
        'motherboard_id',
        'armazenamento_id',
        'cpu_id',
        'powersupply_id',
        'cpu_cooler_id',
        'pc_case_id',
        'smartphone_id',
        'computer_id',
        'mice_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'sku' => $this->sku,
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class, 'ram_id');
    }

    public function armazenamento()
    {
        return $this->belongsTo(Armazenamento::class, 'armazenamento_id');
    }

    public function cpu()
    {
        return $this->belongsTo(Processor::class, 'processor_id');
    }

    public function motherboard()
    {
        return $this->belongsTo(Motherboard::class, 'motherboard_id');
    }

    public function gpu()
    {
        return $this->belongsTo(GPU::class, 'gpu_id');
    }

    public function powerSupply()
    {
        return $this->belongsTo(PowerSupply::class, 'powersupply_id');
    }

    public function cpu_cooler()
    {
        return $this->belongsTo(cpuCooler::class, 'cpu_cooler_id');    
    }
    public function pc_case()
    {
        return $this->belongsTo(ComputerCase::class, 'pc_case_id');
    }
    public function smartphone()
    {
        return $this->belongsTo(Smartphone::class, 'smartphone_id');
    }
    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id');
    }
    public function mouse()
    {
        return $this->belongsTo(Mice::class, 'mice_id');
    }
}
