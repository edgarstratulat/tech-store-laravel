<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Motherboard extends Model
{
    protected $table = 'motherboard_specs';

    protected $fillable = [
        'format',
        'chipset',
        'cpu_socket',
        'ram_support',
        'max_ram',
    ];

    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    } 

    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class, 'motherboard');
    }
}
