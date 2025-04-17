<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GPU extends Model
{
    protected $table = 'gpu_specs';

    protected $fillable= [
        'category',
        'model',
        'vram',
        'type_vram',
        'interface',
        'tdp'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'gpu_id');
    }

    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class, 'gpu');
    }
}
