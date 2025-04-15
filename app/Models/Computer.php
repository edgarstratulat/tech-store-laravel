<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    protected $table = 'computer_specs';

    protected $fillable = [
        'processor',
        'motherboard',
        'ram',
        'storage',
        'gpu',
        'case',
        'powersupply'
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }


}
