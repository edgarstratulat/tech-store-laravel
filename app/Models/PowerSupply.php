<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PowerSupply extends Model
{
    protected $table = 'powersupply_specs';

    protected $fillable = [
        'format',
        'wattage',
        'efficiency',
        'modular',
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
