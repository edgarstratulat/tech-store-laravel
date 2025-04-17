<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Stmt\Return_;

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
        return $this->hasMany(Product::class);
    }

    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class, 'gpu');
    }
}
